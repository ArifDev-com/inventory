<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index()
    {
        $currencies = Currency::latest()->get();

        return view('admin.currencies.index', compact('currencies'));
    }

    public function create()
    {
        $currencies = Currency::latest()->get();

        return view('admin.currencies.create', compact('currencies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'code' => 'required|max:255',
            'symbol' => 'required|max:255',
        ]);

        Currency::create([
            'name' => $request->name,
            'code' => $request->code,
            'symbol' => $request->symbol,
        ]);

        return redirect()->route('currency.index')->with('success', 'Currency Added');
    }

    public function edit($curr_id)
    {
        $currency = Currency::findOrFail($curr_id);

        return view('admin.currencies.edit', compact('currency'));
    }

    public function update(Request $request, $curr_id)
    {

        $curr_id = $request->id;

        Currency::findOrFail($curr_id)->Update([
            'name' => $request->name,
            'code' => $request->code,
            'symbol' => $request->symbol,
        ]);

        return redirect()->route('currency.index')->with('success', 'Currency successfully Updated');
    }

    // public function destroy($curr_id){

    //     Currency::findOrFail($curr_id)->delete();
    //     return redirect()->back()->with('delete','successfully Deleted');
    //     }

    public function destroy(Currency $currency)
    {
        $currency->delete();

        return redirect()->back()->with('delete', 'successfully Deleted');
    }
}
