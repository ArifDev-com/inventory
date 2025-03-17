<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\CustomerPayment;
use Illuminate\Support\Facades\DB;
use App\Models\Sale;
use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function duePay(Request $request){

       // dd($request->all());

    //    CustomerPayment::create([
    //     // 'created_at' => $request->date,
    //     'reference' => $request->reference,
    //     'paying_amount' => $request->paying_amount,
       
    // ]);

    DB::table('cutomer_payments')->insert([
        'user_id' => Auth::id(),
        'date' => $request->date,
        'reference' => $request->reference,
        'paying_amount' => $request->paying_amount,
        'created_at' => Carbon::now(),
    ]);

    // Sale::where('ref_code',$request->reference)->decrement('due_amount',$request->paying_amount)->increment('paid_amount',$request->paying_amount);

    Sale::where('ref_code',$request->reference)->decrement('due_amount',$request->paying_amount);
    Sale::where('ref_code',$request->reference)->increment('paid_amount',$request->paying_amount);

    return redirect()->back();

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