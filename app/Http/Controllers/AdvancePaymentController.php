<?php

namespace App\Http\Controllers;

use App\Actions\SMSApi;
use App\Models\AdvancePayment;
use App\Models\AdvancePaymentChange;
use App\Models\Customer;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdvancePaymentController extends Controller
{
    public function index(Request $request)
    {
        $payments = AdvancePaymentChange::with('customer')
            ->when($request->customer_id, function ($query, $customer_id) {
                return $query->where('customer_id', $customer_id);
            })
            // ->when($request->start_date || now(), function ($query, $start_date) {
            //     return $query->where('date', '>=', $start_date ?? now()->subDays(30));
            // })
            // ->when($request->end_date || now(), function ($query, $end_date) {
            //     return $query->where('date', '<=', $end_date ?? now());
            // })
            ->orderBy('id', 'desc')
            ->get();
        return view('admin.customer.advance.index', compact('payments'));
    }
    public function create()
    {
        $customers = Customer::all();
        return view('admin.customer.advance.pay', compact('customers'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'amount' => 'required|numeric|min:1',
            'date' => 'required|date',
            'method' => 'required|string',
            'note' => 'nullable|string',
            'bank_note' => 'nullable|string',
        ]);
        $customer = Customer::findOrFail($request->customer_id);
        $pay = AdvancePayment::create($request->all());

        try {
            SMSApi::send(
                $customer->phone,
                "Dear Customer: {$customer->name},
Date: ". Carbon::parse($pay->date)->format('d-m-Y ').date('h:i A')."
Advance Payment: {$pay->amount} Tk.
Thank you."
            );
        } catch (\Exception $e) {
            Log::error('SMS API Error: '.$e->getMessage());
        }
        session()->flash('print', $pay->id);
        return redirect()
            ->route('advance.index')
            ->with('success', 'Advance Payment Created Successfully')
            ->with('print', $pay->id);
    }
    function balance()
    {
        $customers = Customer::where('advance', '>', 0)
            ->get();
        return view('admin.customer.advance.balance', compact('customers'));
    }
    function print(AdvancePayment $advancePayment)
    {
        $payment = &$advancePayment;
        $pdf = Pdf::loadView('admin.customer.advance.print', compact('payment'));
        return $pdf->stream('advance_payment.pdf', ['Attachment' => false]);
    }
}
