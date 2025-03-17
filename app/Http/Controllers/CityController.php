<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\City;

use Carbon\Carbon;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::orderBy('id', 'DESC')->get();
        return view('admin.city.index', compact('cities'));
    }

    public function create()
    {
        $cities = City::latest()->get();
        return view('admin.city.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        City::insert([
            'name' => $request->name,
            'created_at' => Carbon::now(),
        ]);
        return Redirect()->route('city.index')->with('success', 'Unit Added');
    }

    public function edit($city_id)
    {
        $city = City::findOrFail($city_id);
        return view('admin.city.edit', compact('city'));
    }

    public function update(Request $request, $city_id)
    {
        $city_id = $request->id;

        City::findOrFail($city_id)->Update([
            'name' => $request->name,
            'update_at' => Carbon::now(),
        ]);

        return Redirect()->route('city.index')->with('success', 'City successfully Updated');
    }

    // public function delete($city_id)
    // {
    //     City::findOrFail($city_id)->delete();
    //     return Redirect()->back()->with('delete', 'successfully Deleted');
    // }

    public function destroy(City $city)
    {
        $city->delete();
        return Redirect()->back()->with('delete', 'successfully Deleted');
    }
}
