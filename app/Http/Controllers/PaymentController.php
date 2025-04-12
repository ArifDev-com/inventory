<?php

namespace App\Http\Controllers;

use App\Actions\SMSApi;
use App\Models\AdvancePaymentChange;
use App\Models\Customer;
use App\Models\CutomerPayment;
use App\Models\Sale;
// use App\Models\CustomerPayment;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function createDuePay()
    {
        return view('admin.customer.duePayment', [
            'customers' => Customer::query()
                ->whereHas('sales', function ($query) {
                    $query->where('due_amount', '>', 0);
                })
                ->get(),
        ]);
    }

    public function duePay(Request $request)
    {
        $data = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'payment_date' => 'required',
            'next_due_date' => 'nullable',
            'paying_amount' => 'required',
            'payment_method' => 'required',
            'discount' => 'nullable|numeric|min:0',
        ]);
        $customer = Customer::find($data['customer_id']);
        $dueSaleList = Sale::where('customer_id', $request->customer_id)
            ->orderBy('created_at', 'asc')
            ->where('due_amount', '>', 0)->get();
        $totalDues = $dueSaleList->sum('due_amount');

        // Distribute payment and discount across sales
        $discount = $data['discount'] ?? 0;
        $remainingPayment = $data['paying_amount'];
        $remainingDiscount = $discount;
        $payments = [];
        if($data['payment_method'] == 'advance' && $remainingPayment > $customer->advance) {
            return redirect()->back()
                ->with('error', 'Advance amount is less than the payment amount')
                ->withInput();
        }

        foreach ($dueSaleList as $sale) {
            // Calculate how much to pay and discount for this sale
            $paymentForThisSale = min($remainingPayment, $sale->due_amount);
            $discountForThisSale = 0;

            // If there's still discount to apply and payment doesn't cover the full due amount
            if ($remainingDiscount > 0 && $sale->due_amount > $paymentForThisSale) {
                $discountForThisSale = min($remainingDiscount, $sale->due_amount - $paymentForThisSale);
            }

            if ($paymentForThisSale > 0 || $discountForThisSale > 0) {
                // Create payment record with both payment and discount
                $payments[] = CutomerPayment::create([
                    'user_id' => Auth::id(),
                    'date' => $data['payment_date'],
                    'paying_amount' => $paymentForThisSale,
                    'discount' => $discountForThisSale,
                    'customer_id' => $data['customer_id'],
                    'payment_method' => $data['payment_method'],
                    'note' => $data['note'] ?? '',
                    'is_due_pay' => true,
                    'created_at' => Carbon::now(),
                    'sale_id' => $sale->id,
                    'due_date' => $sale->due_date,
                    'bank_note' => $data['bank_note'] ?? '',
                ]);

                // Update sale due amount by both payment and discount
                $sale->due_amount -= ($paymentForThisSale + $discountForThisSale);
                $remainingPayment -= $paymentForThisSale;
                $remainingDiscount -= $discountForThisSale;
            }

            // Update due date if provided
            if ($data['next_due_date'] ?? null) {
                $sale->due_date = $data['next_due_date'];
            }
            $sale->save();

            // Break if both payment and discount are fully distributed
            if ($remainingPayment <= 0 && $remainingDiscount <= 0) {
                break;
            }
        }
        session()->flash('payments', json_encode($payments));

        $invoices = [];
        $paid_amount = 0;
        $discount = 0;
        $due_amount = $customer->sales()->where('due_amount', '>', 0)->sum('due_amount');
        foreach ($payments as $payment) {
            if ($payment->sale) {
                $invoices[] = $payment->sale->ref_code;
                $paid_amount += $payment->paying_amount;
                $discount += $payment->discount;
            }
        }
        $invoices = implode(', ', $invoices);

        if($data['payment_method'] == 'advance') {
            $customer->advance -= $paid_amount;
            $customer->save();
            AdvancePaymentChange::create([
                'customer_id' => $customer->id,
                'amount' => $paid_amount,
                'date' => $data['payment_date'],
                'method' => $data['payment_method'],
                'note' => "Due Payment #{$invoices}",
                'is_add' => false,
                'before_balance' => $customer->advance + $paid_amount,
                'after_balance' => $customer->advance,
                'created_by' => Auth::id(),
            ]);
        }

        return redirect()->back()->with('success', 'Payment and discount processed successfully');
    }

    public function dueList(Request $request)
    {
        $customers = Customer::query()
            ->whereHas('sales', function ($query) use ($request) {
                // $query->where('due_amount', '>', 0);
                if($request->from_date && $request->to_date) {
                    $query->whereBetween('created_at', [
                        Carbon::parse($request->from_date)->format('Y-m-d') . ' 00:00:00', Carbon::parse($request->to_date)->format('Y-m-d') . ' 23:59:59'
                    ]);
                }
            })
            ->orderBy('name', 'asc')
            ->with('sales');
        if ($request->print) {
            $pdf = Pdf::loadView('admin.customer.dueListPrint', [
                'customers' => $customers->get(),
            ]);

            return $pdf->stream('Due list.pdf', ['Attachment' => false]);
        }

        return view('admin.customer.dueList', [
            'customers' => $customers->get(),
        ]);
    }

    public function duePayList(Request $request)
    {
        $payments = CutomerPayment::latest();
        $payments->whereDate('created_at', '>=', $request->start_date ?: Carbon::now());
        $payments->whereDate('created_at', '<=', $request->end_date ?: Carbon::now());
        if ($request->print) {
            $pdf = Pdf::loadView('admin.customer.duePaymentListPrint', [
                'payments' => $payments->get(),
                'start_date' => Carbon::parse($request->start_date ?? now()->format('Y-m-d'))->format('d-m-Y'),
                'end_date' => Carbon::parse($request->end_date ?? now()->format('Y-m-d'))->format('d-m-Y'),
            ]);

            return $pdf->stream('due payment.pdf', ['Attachment' => false]);
        }

        return view('admin.customer.duePaymentList', [
            'payments' => $payments->get(),
        ]);
    }

    public function duePayPrint($payment)
    {
        return Pdf::loadView('admin.customer.duePaymentPrint', [
            'payment' => CutomerPayment::find($payment),
        ])->stream('due payment.pdf', ['Attachment' => false]);
    }

    public function supPay(Request $request)
    {

        // dd($request->all());

        //    CustomerPayment::create([
        //     // 'created_at' => $request->date,
        //     'reference' => $request->reference,
        //     'paying_amount' => $request->paying_amount,

        // ]);

        DB::table('supplier_payments')->insert([
            'user_id' => Auth::id(),
            'date' => $request->date,
            'reference' => $request->reference,
            'paying_amount' => $request->paying_amount,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back();

    }
}
