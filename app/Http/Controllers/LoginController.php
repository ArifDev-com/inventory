<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{

    // public function smsTest(){
       
    //         $url = "http://bulksmsbd.net/api/smsapi";
    //         $api_key = "rsItxLhVZncwaBJ5ERbp ";
    //         $senderid = "8809617620131";
    //         $number = "8801830596312";
    //         $message = "মেসেজ টেস্ট";
        
    //         $response = Http::asForm()->post($url, [
    //             'api_key' => $api_key,
    //             'senderid' => $senderid,
    //             'number' => $number,
    //             'message' => $message,
    //         ]);
        
    //         return $response->body();
     
    // }

    // Forget Password With Otp
    public function forgotPassword()
    {
        return view('admin.forgot_password');
    }

    public function updateOtp(Request $request)
    {
        // Validate the phone input
        $credentials = $request->validate([
            'phone' => ['required', 'string', 'exists:users,phone'], // Ensure the phone number exists in the users table
        ]);
    
        // Generate a random 4-digit OTP
        $otp = rand(1000, 9999);
    
        // Update the user's OTP where the phone number matches
        $user = User::where('phone', $request->phone)->first();

         // Send SMS using BulkSMSBD API
         $url = "http://bulksmsbd.net/api/smsapi";
         $api_key = "rsItxLhVZncwaBJ5ERbp";
         $senderid = "8809617620131";
         $number = $request->phone;
      

         $message = "সম্মানিত গ্রাহক ($user->first_name $user->last_name), আপনার OTP: $otp. অনুগ্রহ পূর্বক এই OTP টি শেয়ার করবেন না কোথাও।";
     
         $response = Http::asForm()->post($url, [
             'api_key' => $api_key,
             'senderid' => $senderid,
             'number' => $number,
             'message' => $message,
         ]);
    
        if ($user) {
            $user->update(['otp' => $otp]);
            
            // Redirect to the new password view after updating OTP
            return view('admin.new_password');
        } else {
            // Handle case if no user found
            return back()->withErrors(['phone' => 'Phone number not found.']);
        }
    }

    public function updateResetPassword(Request $request)
    {
        // Validate the phone input
        $credentials = $request->validate([
            'otp' => ['required', 'string', 'exists:users,otp'], // Ensure the phone number exists in the users table
            'password' => ['required'],
        ]);
    
        // Generate a random 4-digit OTP
        $password =  Hash::make($request->password);
    
        // Update the user's OTP where the phone number matches
        $user = User::where('otp', $request->otp)->first();
    
        if ($user) {
            $user->update(['password' => $password]);
            
            // Redirect to the new password view after updating OTP
            return redirect()->route('login')->with('success', 'New Password Inserted Successfully!');
        } else {
            // Handle case if no user found
            return back()->withErrors(['code' => 'OTP Code Invalid.']);
        }
    }
    

    public function loginForm()
    {
        return view('admin.signin');
    }

    public function registerForm()
    {
        return view('admin.signup');
    }

    // public function login(Request $request)
    // {

    //     $credentials = $request->validate([
    //         'phone' => ['required'],
    //         'password' => ['required'],
    //     ]);
 
    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();
    //         return redirect()->intended('/admin/dashboard');
    //     }
        
 
    //     return back()->withErrors([
    //         'phone' => 'The provided credentials do not match our records.',
    //     ]);
    // }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'phone' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
             // Check the user's status
        if ($user->id == 2) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/super/dashboard');
        }

        // Status is not 1, so redirect to a different page
        $request->session()->regenerate();
        return redirect()->intended('/admin/dashboard');
        }
        
 
        return back()->withErrors([
            'phone' => 'The provided credentials do not match our records.',
        ]);
    }

    public function register(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'name' => ['required'],
            'phone' => ['required', 'string', 'max:11', 'unique:users,phone'],
            'password' => ['required'],
        ]);
    
        // Define start and end dates
        $startDate = Carbon::today();
        $endDate = Carbon::today()->addDays(10);
    
        // Create a new user
        $user = User::create([
            'role_id' => 1,
            'status' => 1,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
    
        // Insert into shop_documents table
        DB::table('shop_documents')->insert([
            'user_id' => $user->id,
            'name' => $request->name,
            'phone' => $user->phone,
            'image' => 'upload/shop/1806717776944150.png',
            'created_at' => Carbon::now(),
        ]);
    
        // Send SMS using BulkSMSBD API
        $url = "http://bulksmsbd.net/api/smsapi";
        $api_key = "rsItxLhVZncwaBJ5ERbp";
        $senderid = "8809617620131";
       
        

        $messages =  [
            [
                "to" => $user->phone,
                "message" => "সম্মানিত গ্রাহক ($user->first_name $user->last_name), আইটি পরিবারের পক্ষ থেকে আপনাকে স্বাগতম। ইনভেন্টরি সফটওয়্যারটি সফলভাবে রেজিস্ট্রেশন হয়েছে। ১ম ১০ দিন আপনি ফ্রি ট্রায়াল পাচ্ছেন একদম বিনামূল্যে। কোনো প্রকার ইনস্টলেশন চার্জ ছাড়াই। আপনার সফটওয়্যার লিংক: https://inventory.itporibar.xyz/login ও যোগাযোগ নাম্বার: ০১৮৩০৫৯৬৩১২"
            ],
            [
                "to" => "8801830596312",
                "message" => "সম্মানিত গ্রাহক ($user->first_name $user->last_name), আইটি পরিবারের পক্ষ থেকে আপনাকে স্বাগতম। ইনভেন্টরি সফটওয়্যারটি সফলভাবে রেজিস্ট্রেশন হয়েছে। ১ম ১০ দিন আপনি ফ্রি ট্রায়াল পাচ্ছেন একদম বিনামূল্যে। কোনো প্রকার ইনস্টলেশন চার্জ ছাড়াই। আপনার সফটওয়্যার লিংক: https://inventory.itporibar.xyz/login ও যোগাযোগ নাম্বার: ০১৮৩০৫৯৬৩১২"
            ]
        ];
    
        foreach ($messages as $sms) {
            $response = Http::asForm()->post($url, [
                'api_key' => $api_key,
                'senderid' => $senderid,
                'number' => $sms['to'],
                'message' => $sms['message'],
            ]);

        }
    
        // Redirect to login route with a success message
        return redirect()->route('login')->with('success', 'Registration Successfully!');
    }

 public function registerapi(Request $request)
    {
       
// Validate the incoming request
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:11|unique:users,phone',
            'password' => 'required|string|min:6',
            'name' => 'required|string|max:255',
        ]);

        // Define start and end dates
        $startDate = Carbon::today();
        $endDate = Carbon::today()->addDays(10);

        // Create a new user
        $user = User::create([
            'role_id' => 1,
            'status' => 1,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        // Insert into shop_documents table
        $shop = DB::table('shop_documents')->insert([
            'user_id' => $user->id,
            'name' => $request->name,
            'phone' => $user->phone,
            'image' => 'upload/shop/1806717776944150.png',
            'created_at' => Carbon::now(),
        ]);

 // Send SMS using BulkSMSBD API
        $url = "http://bulksmsbd.net/api/smsapi";
        $api_key = "rsItxLhVZncwaBJ5ERbp";
        $senderid = "8809617620131";
       
        

        $messages =  [
            [
                "to" => $user->phone,
                "message" => "সম্মানিত গ্রাহক ($user->first_name $user->last_name), আইটি পরিবারের পক্ষ থেকে আপনাকে স্বাগতম। ইনভেন্টরি সফটওয়্যারটি সফলভাবে রেজিস্ট্রেশন হয়েছে। ১ম ১০ দিন আপনি ফ্রি ট্রায়াল পাচ্ছেন একদম বিনামূল্যে। কোনো প্রকার ইনস্টলেশন চার্জ ছাড়াই। আপনার সফটওয়্যার লিংক: https://inventory.itporibar.xyz/login ও যোগাযোগ নাম্বার: ০১৮৩০৫৯৬৩১২"
            ],
            [
                "to" => "8801830596312",
                "message" => "সম্মানিত গ্রাহক ($user->first_name $user->last_name), আইটি পরিবারের পক্ষ থেকে আপনাকে স্বাগতম। ইনভেন্টরি সফটওয়্যারটি সফলভাবে রেজিস্ট্রেশন হয়েছে। ১ম ১০ দিন আপনি ফ্রি ট্রায়াল পাচ্ছেন একদম বিনামূল্যে। কোনো প্রকার ইনস্টলেশন চার্জ ছাড়াই। আপনার সফটওয়্যার লিংক: https://inventory.itporibar.xyz/login ও যোগাযোগ নাম্বার: ০১৮৩০৫৯৬৩১২"
            ]
        ];
    
        foreach ($messages as $sms) {
            $response = Http::asForm()->post($url, [
                'api_key' => $api_key,
                'senderid' => $senderid,
                'number' => $sms['to'],
                'message' => $sms['message'],
            ]);

        }

       return response()->json(['user' => $user, 'shop_documents' => $shop, 'message' => 'Registration Successfully.'], 201);

       
      
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}