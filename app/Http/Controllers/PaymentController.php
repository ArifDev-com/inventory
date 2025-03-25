<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CutomerPayment;
use Illuminate\Http\Request;
// use App\Models\CustomerPayment;
use Illuminate\Support\Facades\DB;
use App\Models\Sale;
use App\Models\Purchase;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function createDuePay(){
        return view('admin.customer.duePayment', [
            'customers' => Customer::query()
                ->whereHas('sales', function($query){
                    $query->where('due_amount', '>', 0);
                })
                ->get(),
        ]);
    }

    public function duePay(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'payment_date' => 'required',
            'next_due_date' => 'nullable',
            'paying_amount' => 'required',
            'payment_method' => 'required',
        ]);
        $dueSaleList = Sale::where('customer_id', $request->customer_id)
            ->orderBy('created_at', 'asc')
            ->where('due_amount', '>', 0)->get();
        $totalDues = $dueSaleList->sum('due_amount');

        // Distribute payment across sales
        $remainingPayment = $data['paying_amount'];
        $payments = [];

        foreach ($dueSaleList as $sale) {
            $paymentForThisSale = min($remainingPayment, $sale->due_amount);
            if ($remainingPayment <= 0 || $paymentForThisSale <= 0) break;

            // Create payment record
            $payments[] = CutomerPayment::create([
                'user_id' => Auth::id(),
                'date' => $data['payment_date'],
                'paying_amount' => $paymentForThisSale,
                'customer_id' => $data['customer_id'],
                'payment_method' => $data['payment_method'],
                'note' => $data['note'] ?? '',
                'is_due_pay' => true,
                'created_at' => Carbon::now(),
                'sale_id' => $sale->id,
                'due_date' => $sale->due_date,
            ]);

            // Update sale due amount
            $sale->due_amount -= $paymentForThisSale;
            if($data['next_due_date'] ?? null){
                $sale->due_date = $data['next_due_date'];
            }
            $sale->save();
            $remainingPayment -= $paymentForThisSale;
        }
        session()->flash('payments', json_encode($payments));
        // dd($pay, $affected_sales);
        return redirect()->back()->with('success', 'Payment successful');

    }

    public function dueList(Request $request) {
        $customers = Customer::query()
                ->whereHas('sales', function($query){
                    $query->where('due_amount', '>', 0);
                })
                ->orderBy('name', 'asc')
                
                ->with('sales');
        if($request->print){
            $pdf = Pdf::loadView('admin.customer.dueListPrint', [
                'customers' => $customers->get(),
            ]);
            return $pdf->stream('Due list.pdf', ['Attachment' => false]);
        }
        return view('admin.customer.dueList', [
            'customers' => $customers->get(),
        ]);
    }

    public function duePayList(Request $request) {
        $payments = CutomerPayment::latest();
        $payments->whereDate('created_at', '>=', $request->start_date ?: Carbon::now());
        $payments->whereDate('created_at', '<=', $request->end_date ?: Carbon::now());
        if($request->print){
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
    public function duePayPrint($payment){
        return Pdf::loadView('admin.customer.duePaymentPrint', [
            'payment' => CutomerPayment::find($payment),
        ])->stream('due payment.pdf', ['Attachment' => false]);
    }

    public function supPay(Request $request){

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