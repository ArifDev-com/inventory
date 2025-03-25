<?php

namespace App\Http\Controllers;

use App\Actions\SMSApi;
use App\Models\City;
use App\Models\Country;
use App\Models\Customer;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    function searchCustomer(Request $request)
    {
        $customers = Customer::query()
            ->where(function ($query) use ($request) {
                $query->where('name', 'like', '%'.$request->search.'%')
                    ->where('name', '!=', '')
                    ->whereNotNull('name');
            })
            ->orWhere(function ($query) use ($request) {
                $query->where('phone', 'like', '%'.$request->search.'%')
                    ->where('phone', '!=', '')
                    ->whereNotNull('phone');
            })
            ->orWhere(function ($query) use ($request) {
                $query->where('email', 'like', '%'.$request->search.'%')
                    ->where('email', '!=', '')
                    ->whereNotNull('email');
            })
            ->orWhere(function ($query) use ($request) {
                $query->where('company_name', 'like', '%'.$request->search.'%')
                    ->where('company_name', '!=', '')
                    ->whereNotNull('company_name');
            })
            ->orderBy('name', 'ASC')
            // ->limit(10)
            ->get();
        return response()->json(['data' => $customers], 200);
    }
    public function dueResponse($cusId)
    {
        $customer = Customer::where('id', $cusId)->with(['sales' => function ($q) {
            $q->select('grandtotal',
                'paid_amount',
                'due_amount');
        }])->first();

        return response()->json(['data' => $customer], 200);

    }

    public function index()
    {
        $authId = Auth::user()->id;
        $city = City::latest()->get();
        $country = Country::latest()->get();
        $customers = Customer::with(['sales' => function ($q) {
            $q->select('grandtotal',
                'paid_amount',
                'due_amount');
        }])->orderBy('id', 'ASC')->get();

        // dd($customers);
        // return $customers;
        return view('admin.customer.index', compact('city', 'country', 'customers'));
    }

    public function create()
    {
        $cities = City::latest()->get();
        $countries = Country::latest()->get();
        $customers = Customer::latest()->get();

        return view('admin.customer.create', compact('cities', 'countries', 'customers'));
    }

    public function store(Request $request)
    {
        $customer = $this->customerInsertCommon($request);
        session()->flash('auto_customer_id', $customer->id);

        return redirect()->route('customer.index')->with('success', 'Customer Added');
    }

    // custome store with modal

    public function storeModal(Request $request)
    {

        $customer = $this->customerInsertCommon($request);
        session()->flash('auto_customer_id', $customer->id);

        return redirect()->back();
    }

    // customer insert

    public function customerInsertCommon($request)
    {
        $request->validate([
            // 'name' => 'required|max:255',
            // 'email' => 'required|max:255',
            'phone' => 'required|max:255',
            // 'country_id' => 'required|max:255',
            // 'city_id' => 'required|max:255',
            // 'address' => 'required|max:255',
            // 'dob' => 'required|max:255',
        ]);

        return Customer::create([
            'user_id' => Auth::id(),
            'name' => $request->name ?: $request->phone,
            'email' => $request->email ?: \Str::random(10).'@tmp.com',
            'phone' => $request->phone,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'address' => $request->address ?: '',
            'dob' => $request->dob ?: now(),
            'company_name' => $request->company_name ?: '',
            'created_at' => Carbon::now(),
        ]);

    }

    public function edit($cus_id)
    {
        $cities = City::latest()->get();
        $countries = Country::latest()->get();
        $customer = Customer::findOrFail($cus_id);

        return view('admin.customer.edit', compact('cities', 'countries', 'customer'));
    }

    public function update(Request $request, $cus_id)
    {

        $cus_id = $request->id;

        Customer::findOrFail($cus_id)->Update([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'address' => $request->address,
            'dob' => $request->dob,
            'company_name' => $request->company_name ?: '',
            'update_at' => Carbon::now(),
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('customer.index')->with('success', 'Customer successfully Updated');
    }

    public function destroy($cus_id)
    {
        Customer::findOrFail($cus_id)->delete();

        return redirect()->back()->with('delete', 'successfully Deleted');
    }

    public function details($cusId)
    {

        // return Customer::where('id',$cusId)->with('cus_items.product')->first();

        // return $customer->with('sales')->first();
        return view('admin.customer.customer-details', [
            'customer' => Customer::where('id', $cusId)->with('cus_items.product')->first(),
        ]);

    }

    public function bulkSms()
    {
        return view('admin.customer.bulk-sms', [
            'customers' => Customer::latest()->get(),
        ]);
    }

    public function sendBulkSms(Request $request)
    {
        $request->validate([
            'message' => 'required',
            'phones' => 'required|array',
        ]);

        $message = $request->message;
        $phones = $request->phones;
        // dd($phones, $message);
        foreach ($phones as $phone) {
            if(!$phone) continue;
            $phone = str_replace(' ', '', $phone);
            $phone = str_replace('-', '', $phone);
            $phone = str_replace('+', '', $phone);
            $phone = str_replace('(', '', $phone);
            $phone = str_replace(')', '', $phone);
            $phone = str_replace(' ', '', $phone);
            $phone = str_replace('-', '', $phone);
            $phone = str_replace('+', '', $phone);
            $phone = str_replace('(', '', $phone);
            $phone = str_replace(')', '', $phone);
            $phone = str_replace(' ', '', $phone);
            $phone = str_replace('-', '', $phone);
            $phone = str_replace('+', '', $phone);
            $phone = str_replace('(', '', $phone);
            $phone = str_replace(')', '', $phone);
            $phone = str_replace(' ', '', $phone);
            SMSApi::send($phone, $message);
        }
        return redirect()->back()->with('success', 'SMS Sent Successfully');
    }

    public function show(Customer $customer)
    {
        return view('admin.customer.show', compact('customer'));
    }

    public function print()
    {
        $customers = Customer::latest()->get();
        $pdf = Pdf::loadView('admin.customer.print', compact('customers'));
        return $pdf->stream('Customer List.pdf', ['Attachment' => false]);
    }
}
