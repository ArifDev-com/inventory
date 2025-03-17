<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\City;

use App\Models\Product;

use App\Models\Customer;

use App\Models\Sale;

use App\Models\Warehouse;

use Carbon\Carbon;

class WarehouseController extends Controller
{
    public function index()
    {
        $cities = City::latest()->get();
        $warehouses = Warehouse::orderBy('id', 'DESC')->get();
        return view('admin.warehouse.index', compact('cities', 'warehouses'));
    }

    public function create()
    {
        $cities = City::latest()->get();
        $warehouses = Warehouse::latest()->get();
        return view('admin.warehouse.create', compact('cities', 'warehouses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            // 'email' => 'required|max:255',
            // 'phone' => 'required|max:255',
            // 'city_id' => 'required|max:255',
            // 'zip_code' => 'required|max:255',
            // 'address' => 'required|max:255',
        ]);

        Warehouse::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city_id' => $request->city_id,
            'zip_code' => $request->zip_code,
            'address' => $request->address,
            'created_at' => Carbon::now(),
        ]);
       // return Redirect()->route('warehouse.index')->with('success', 'Warehouse Added');
        return Redirect()->back()->with('success', 'Warehouse Added');
    }

    public function edit($whouse_id)
    {
        $cities = City::latest()->get();
        $warehouse = Warehouse::findOrFail($whouse_id);
        return view('admin.warehouse.edit', compact('warehouse', 'cities'));
    }

    public function update(Request $request, $whouse_id)
    {
        $whouse_id = $request->id;

        Warehouse::findOrFail($whouse_id)->Update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city_id' => $request->city_id,
            'zip_code' => $request->zip_code,
            'address' => $request->address,
            'update_at' => Carbon::now(),
        ]);

        return Redirect()->route('warehouse.index')->with('success', 'Warehouse successfully Updated');
    }

    // public function destroy($whouse_id)
    // {
    //     Warehouse::findOrFail($whouse_id)->delete();
    //     return Redirect()->back()->with('delete', 'successfully Deleted');
    // }

    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();
        return Redirect()->back()->with('delete', 'successfully Deleted');
    }

    // public function details($id){
   
    //  return view('admin.warehouse.warehouse-details');

    
    // }
}
