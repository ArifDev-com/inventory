<?php

namespace App\Http\Controllers;

use App\Models\Adjustment;
use App\Models\AdjustmentItem;
use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class AdjustmentController extends Controller
{
    public function index()
    {
        $warehouses = Warehouse::latest()->get();
        $adjustments = Adjustment::latest()->get();

        return view('admin.adjustments.index', compact('warehouses', 'adjustments'));
    }

    public function create()
    {
        $warehouses = Warehouse::latest()->get();
        $adjustments = Adjustment::latest()->get();

        return view('admin.adjustments.create', compact('warehouses', 'adjustments'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'warehouse_id' => 'required|max:255',
            'date' => 'required|max:255',
            'ref_code' => 'required|max:255',
            'status' => 'required|max:255',
        ], [
            'warehouse_id.required' => 'select warehouse name',
        ]);

        $adjustment = Adjustment::create([
            'warehouse_id' => $request->warehouse_id,
            'date' => $request->date,
            'ref_code' => $request->ref_code,
            'status' => $request->status,
        ]);

        $pcount = count($request->product_id);

        for ($i = 0; $i < $pcount; $i++) {
            $adjustment->items()->create([
                'product_id' => $request->product_id[$i],
                'quantity' => $request->quantity[$i],
            ]);

            Product::where('id', $request->product_id[$i])->increment('quantity', $request->quantity[$i]);

        }

        return redirect()->route('adjustment.index')->with('success', 'Adjustment Added');
    }

    public function edit($adj_id)
    {
        $warehouses = Warehouse::latest()->get();
        $adjustment = Adjustment::with(['items.product'])->findOrFail($adj_id);

        // return $adjustment;
        return view('admin.adjustments.edit', compact('warehouses', 'adjustment'));
    }

    public function update(Request $request, $adj_id)
    {

        // $purch_id = $request->id;

        Adjustment::findOrFail($adj_id)->Update([
            'warehouse_id' => $request->warehouse_id,
            'date' => $request->date,
            'ref_code' => $request->ref_code,
            'status' => $request->status,
        ]);

        $pcount = count($request->product_id);

        for ($i = 0; $i < $pcount; $i++) {
            AdjustmentItem::find($adj_id)->update([
                'product_id' => $request->product_id[$i],
                'quantity' => $request->quantity[$i],
            ]);

            // Product::where('id',$request->product_id[$i])->increment('quantity',$request->quantity[$i]);

        }

        return redirect()->route('adjustment.index')->with('success', 'Adjustment successfully Updated');

    }

    // public function destroy($adj_id){
    //   Adjustment::findOrFail($adj_id)->delete();
    //   return redirect()->back()->with('delete','successfully Deleted');
    //   }

    public function destroy(Adjustment $adjustment)
    {
        $adjustment->delete();

        return redirect()->back()->with('delete', 'successfully Deleted');
    }
}
