<?php

namespace App\Http\Controllers;

use App\Models\InvoiceId;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaymentGatewayController extends Controller
{
    // public function dashboardPaymentGateway()
    // {
       
    //     return view('admin.paymant_gateway.dashboard');
    // }

    public function storeInvoicePaymentGateway(Request $request)
    {
        $randomInvoiceId = 'INV-' . Str::upper(Str::random(5)) . random_int(1000, 9999);
        
        InvoiceId::insert([
            'user_id' => Auth::id(),
            'invoice_id' => $randomInvoiceId,
            'pay_amount' => 500,
            'created_at' => Carbon::now(),
        ]);
        // return Redirect()->route('unit.index')->with('success', 'Unit Added');
         return Redirect()->route('payment.gateway.dashboard');
    }

   

    public function updateBkashPaymentGateway(Request $request, $id){

        $startDate = Carbon::today();
        $endDate = Carbon::today()->addDays(30);
    
            User::findOrFail($id)->Update([
                'status' => 0,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'update_at' => Carbon::now(),
            ]);

            DB::table('payment_histories')->insert([
                'user_id' => Auth::id(),
                'invoice_id' => $request->invoice_id,
                'transaction_id' => $request->transaction_id,
                'paid_amount' => 500,
                'paying_source' => 'bKash',
                'status' => 0,
               
                'created_at' => Carbon::now(),
            ]);
    
            return Redirect()->route('home')->with('success', 'Payment Verify Waiting!');
        }

        public function updateNagadPaymentGateway(Request $request, $id){

            $startDate = Carbon::today();
            $endDate = Carbon::today()->addDays(30);
        
                User::findOrFail($id)->Update([
                    'status' => 0,
                    'start_date' => $startDate,
                    'end_date' => $endDate,
                    'update_at' => Carbon::now(),
                ]);
    
                DB::table('payment_histories')->insert([
                    'user_id' => Auth::id(),
                    'invoice_id' => $request->invoice_id,
                    'transaction_id' => $request->transaction_id,
                    'paid_amount' => 500,
                    'paying_source' => 'Nagad',
                    'status' => 0,
                   
                    'created_at' => Carbon::now(),
                ]);
        
                return Redirect()->route('home')->with('success', 'Payment Verify Waiting!');
            }

            public function updateRocketPaymentGateway(Request $request, $id){

                $startDate = Carbon::today();
                $endDate = Carbon::today()->addDays(30);
            
                    User::findOrFail($id)->Update([
                        'status' => 0,
                        'start_date' => $startDate,
                        'end_date' => $endDate,
                        'update_at' => Carbon::now(),
                    ]);
        
                    DB::table('payment_histories')->insert([
                        'user_id' => Auth::id(),
                        'invoice_id' => $request->invoice_id,
                        'transaction_id' => $request->transaction_id,
                        'paid_amount' => 500,
                        'paying_source' => 'Rocket',
                        'status' => 0,
                       
                        'created_at' => Carbon::now(),
                    ]);
            
                    return Redirect()->route('home')->with('success', 'Payment Verify Waiting!');
                }

    public function dashboardPaymentGateway()
    {
       
        return view('admin.paymant_gateway.dashboard');
    }

    public function bkashPaymentGateway()
    {
       
        return view('admin.paymant_gateway.bkash');
    }

    public function nagadPaymentGateway()
    {
       
        return view('admin.paymant_gateway.nagad');
    }

    public function rocketPaymentGateway()
    {
       
        return view('admin.paymant_gateway.rocket');
    }

}