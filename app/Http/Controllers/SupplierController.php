<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\City;

use App\Models\Country;

use App\Models\Supplier;

use App\Models\Brand;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    public function index()
    {
        $authId = Auth::user()->id;
        $city = City::latest()->get();
        $country = Country::latest()->get();
        $suppliers = Supplier::with(['purchases' =>function($q){
            $q->select('grandtotal',
            'paid_amount',
            'due_amount');
        }])->orderBy('id', 'DESC')->where('user_id',$authId)->get();
        return view('admin.supplier.index', compact('city', 'country', 'suppliers'));
    }

    public function create()
    {
        $brands=Brand::latest()->get();
        $cities = City::latest()->get();
        $countries = Country::latest()->get();
        $suppliers = Supplier::latest()->get();
        return view('admin.supplier.create', compact('cities', 'countries', 'suppliers','brands'));
    }

    public function store(Request $request)
    {
        $this->supplierInsertCommon($request);
        return Redirect()->route('supplier.index')->with('success', 'Supplier Added');
    }

    //custome store with modal 

    public function storeModal(Request $request){

        $this->supplierInsertCommon($request);
        return redirect()->back();
    }

    public function supplierInsertCommon($request)
    {
        $request->validate([
            'name' => 'required|max:255',
            // 'brand_id' => 'nullable',
            // 'email' => 'required|max:255',
            // 'phone' => 'required|max:255',
            // 'country_id' => 'max:255|nullable',
            // 'city_id' => 'max:255|nullable',
            // 'address' => 'required|max:255',
        ]);

        Supplier::insert([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'address' => $request->address,
            'created_at' => Carbon::now(),
        ]);

        return Redirect()->back()->with('success', 'Supplier Added');
       
    }

    public function edit($supp_id)
    {
        $brands = Brand::latest()->get();
        $cities = City::latest()->get();
        $countries = Country::latest()->get();
        $supplier = Supplier::findOrFail($supp_id);
        return view('admin.supplier.edit', compact('countries', 'cities', 'supplier','brands'));
    }

    public function update(Request $request, $supp_id)
    {
        $supp_id = $request->id;

        Supplier::findOrFail($supp_id)->Update([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'email' => $request->email,
            'phone' => $request->phone,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'address' => $request->address,
            'update_at' => Carbon::now(),
        ]);

        return Redirect()->route('supplier.index')->with('success', 'Supplier successfully Updated');
    }

    // public function destroy($supp_id)
    // {
    //     Supplier::findOrFail($supp_id)->delete();
    //     return Redirect()->back()->with('delete', 'successfully Deleted');
    // }

    public function destroy(Supplier $supplier)
{
    $supplier->delete();
    return Redirect()->back()->with('delete', 'successfully Deleted');
}

    public function details(){
        return view('admin.supplier.supplier-details');
    }

    // public function detailsSup($id){


    //     // return Customer::where('id',$cusId)->with('cus_items.product')->first();

    

    //     // return $customer->with('sales')->first();
    //     return view('admin.supplier.supplier-detailssup',[
    //         // 'customer' => Supplier::where('id',$id)->with('cus_items.product')->first()
    //         'customer' => Supplier::where('id',$id)->first()
    //     ]);
    // }
}
