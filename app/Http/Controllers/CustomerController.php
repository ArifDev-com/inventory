<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
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
        }])->orderBy('id', 'DESC')->get();
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
        return Redirect()->route('customer.index')->with('success', 'Customer Added');
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
        ]);

        return Redirect()->route('customer.index')->with('success', 'Customer successfully Updated');
    }

    public function destroy($cus_id)
    {
        Customer::findOrFail($cus_id)->delete();

        return Redirect()->back()->with('delete', 'successfully Deleted');
    }

    public function details($cusId)
    {

        // return Customer::where('id',$cusId)->with('cus_items.product')->first();

        // return $customer->with('sales')->first();
        return view('admin.customer.customer-details', [
            'customer' => Customer::where('id', $cusId)->with('cus_items.product')->first(),
        ]);

    }
}
