<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CutomerPayment;
use Illuminate\Http\Request;
// use App\Models\CustomerPayment;
use Illuminate\Support\Facades\DB;
use App\Models\Sale;
use App\Models\Purchase;
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
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'payment_date' => 'required',
            'next_due_date' => 'nullable',
            'sale_id' => 'required|exists:sales,id',
            'paying_amount' => 'required',
            'payment_method' => 'required',
        ]);
        $pay = CutomerPayment::create([
            'user_id' => Auth::id(),
            'date' => $request->payment_date,
            'paying_amount' => $request->paying_amount,
            'customer_id' => $request->customer_id,
            'payment_method' => $request->payment_method,
            'note' => $request->note,
            'created_at' => Carbon::now(),
        ]);
        $affected_sales = [];
        $amount = $request->paying_amount;
        $next_due_date = $request->next_due_date;
        $sale = Sale::find($request->sale_id);
        $sale->update([
            'due_amount' => $sale->due_amount - $amount,
            'next_due_date' => $next_due_date ? $next_due_date : null,
        ]);

        // dd($pay, $affected_sales);
        return redirect()->back()->with('success', 'Payment successful');

    }

    public function duePayList(){
        return view('admin.customer.duePaymentList', [
            'payments' => CutomerPayment::latest()->get(),
        ]);
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

     // Sale::where('ref_code',$request->reference)->decrement('due_amount',$request->paying_amount)->increment('paid_amount',$request->paying_amount);

     Purchase::where('purchase_code',$request->reference)->decrement('due_amount',$request->paying_amount);
     Purchase::where('purchase_code',$request->reference)->increment('paid_amount',$request->paying_amount);

     return redirect()->back();

     }


}