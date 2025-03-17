<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Country;

use Carbon\Carbon;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::orderBy('id', 'DESC')->get();
        return view('admin.country.index', compact('countries'));
    }

    public function create()
    {
        $countries = Country::latest()->get();
        return view('admin.country.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Country::insert([
            'name' => $request->name,
            'created_at' => Carbon::now(),
        ]);
        return Redirect()->route('country.index')->with('success', 'Country Added');
    }

    public function edit($con_id)
    {
        $country = Country::findOrFail($con_id);
        return view('admin.country.edit', compact('country'));
    }

    public function update(Request $request, $con_id)
    {
        $con_id = $request->id;

        Country::findOrFail($con_id)->Update([
            'name' => $request->name,
            'update_at' => Carbon::now(),
        ]);

        return Redirect()->route('country.index')->with('success', 'Country successfully Updated');
    }

    // public function delete($con_id)
    // {
    //     Country::findOrFail($con_id)->delete();
    //     return Redirect()->back()->with('delete', 'successfully Deleted');
    // }

    public function destroy(Country $country)
    {
        $country->delete();
        return Redirect()->back()->with('delete', 'successfully Deleted');
    }
}
