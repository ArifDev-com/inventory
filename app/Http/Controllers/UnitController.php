<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    public function index()
    {
        $authId = Auth::user()->id;
        $units = Unit::orderBy('id', 'DESC')->where('user_id', $authId)->get();

        return view('admin.unit.index', compact('units'));
    }

    public function create()
    {
        $units = Unit::latest()->get();

        return view('admin.unit.create', compact('units'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        Unit::insert([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'created_at' => Carbon::now(),
        ]);

        // return redirect()->route('unit.index')->with('success', 'Unit Added');
        return redirect()->back()->with('success', 'Unit Added');
    }

    public function edit($unit_id)
    {
        $unit = Unit::findOrFail($unit_id);

        return view('admin.unit.edit', compact('unit'));
    }

    public function update(Request $request, $unit_id)
    {
        $unit_id = $request->id;

        Unit::findOrFail($unit_id)->Update([
            'name' => $request->name,
            'update_at' => Carbon::now(),
        ]);

        return redirect()->route('unit.index')->with('success', 'Unit successfully Updated');
    }

    // public function delete($unit_id)
    // {
    //     Unit::findOrFail($unit_id)->delete();
    //     return redirect()->back()->with('delete', 'successfully Deleted');
    // }

    public function destroy(Unit $unit)
    {
        $unit->delete();

        return redirect()->back()->with('delete', 'successfully Deleted');
    }
}
