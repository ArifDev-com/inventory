<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transfer;
use App\Models\TransferItem;
use App\Models\Warehouse;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransferController extends Controller
{
    public function index()
    {

        $transfers = Transfer::with(['from_warehouse' => function ($q) {
            $q->select(['name', 'id']);
        }, 'to_warehouse' => function ($q) {
            $q->select(['name', 'id']);
        }])->latest()->get();

        return view('admin.transfer.index', compact('transfers'));
    }

    public function create()
    {
        $warehouses = Warehouse::latest()->get();
        $transfers = Transfer::latest()->get();

        return view('admin.transfer.create', compact('warehouses', 'transfers'));
    }

    // search here
    public function searchProduct(Request $request)
    {
        $request->validate([
            'search' => 'required',
        ]);

        $products = Product::where('name', 'LIKE', '%'.$request->search.'%')->paginate(5);

        return view('admin.search-result', compact('products'));

    }

    public function findProducts(Request $request)
    {
        $request->validate([
            'search' => 'required',
        ]);

        $products = Product::where('name', 'LIKE', '%'.$request->search.'%')->take(5)->get();

        return view('admin.search-product', compact('products'));

    }

    public function store(Request $request)
    {

        // return $request->all();

        //   $request->validate([
        //   'from_warehouse_id'=>'required|max:255',
        //   'to_warehouse_id'=>'required|max:255',
        //   'date'=>'required|max:255',
        //   'ref_code'=>'required|max:255',
        //   'item'=>'required|max:255',
        //   'tax'=>'required|max:255',
        //   'discount'=>'required|max:255',
        //   'shipping'=>'required|max:255',
        //   'grandtotal'=>'required|max:255',
        //   'status'=>'required|max:255',
        //   'note'=>'required',
        //  ],[
        //   'warehouse_id.required' => 'select warehouse name',
        // ]);

        $transfer = Transfer::create([
            'from_warehouse_id' => $request->from_warehouse_id,
            'to_warehouse_id' => $request->to_warehouse_id,
            'date' => $request->date,
            'ref_code' => $request->ref_code,
            'item' => $request->item,
            'tax' => $request->tax,
            'discount' => $request->discount,
            'shipping' => $request->shipping,
            'grandtotal' => $request->grand_total,
            'status' => $request->status,
            'note' => $request->note,
        ]);

        $pcount = count($request->product_id);

        for ($i = 0; $i < $pcount; $i++) {
            $transfer->items()->create([
                'product_id' => $request->product_id[$i],
                'quantity' => $request->quantity[$i],
                'sub_total' => $request->sub_total[$i],

                // 'product_name' => $request->product_name[$i],
            ]);

            Product::where('id', $request->product_id[$i])->decrement('quantity', $request->quantity[$i]);

            Product::insert([
                'user_id' => Auth::id(),
                'warehouse_id' => $request->to_warehouse_id,
                'name' => $request->product_name[$i],
                'barcode_url' => $request->barcode[$i],
                'purchase_price' => $request->purchase_price[$i],
                'price' => $request->mrp_price[$i],

                'supplier_id' => $request->supplier_id[$i],
                'product_code' => $request->product_code[$i],

                'category_id' => $request->category[$i],
                'subCategory_id' => $request->subCategory_id[$i],
                'brand_id' => $request->brand_id[$i],
                'unit_id' => $request->unit_id[$i],
                'quantity' => $request->quantity[$i],

                // 'phone' => $request->phone,
                // 'city_id' => $request->city_id,
                // 'zip_code' => $request->zip_code,
                // 'address' => $request->address,
                'created_at' => Carbon::now(),
            ]);

        }

        return redirect()->route('transfer.index')->with('success', 'Transfer Added');
    }

    public function edit($trans_id)
    {
        $product = Product::latest()->get();
        $warehouses = Warehouse::latest()->get();
        $transfer = Transfer::with(['items.product'])->findOrFail($trans_id);

        return view('admin.transfer.edit', compact('warehouses', 'transfer', 'product'));
    }

    public function update(Request $request, $trans_id)
    {

        // $trans_id = $request->id;

        $transfer = Transfer::findOrFail($trans_id);

        $transfer->Update([
            'from_warehouse_id' => $request->from_warehouse_id,
            'to_warehouse_id' => $request->to_warehouse_id,
            'date' => $request->date,
            'ref_code' => $request->ref_code,
            'item' => $request->item,
            'tax' => $request->tax,
            'discount' => $request->discount,
            'shipping' => $request->shipping,
            'grandtotal' => $request->grand_total,
            'status' => $request->status,
            'note' => $request->note,
        ]);

        $pcount = count($request->product_id);

        for ($i = 0; $i < $pcount; $i++) {
            TransferItem::find($trans_id)->update([
                'product_id' => $request->product_id[$i],
                'quantity' => $request->quantity[$i],
                'sub_total' => $request->sub_total[$i],
            ]);

        }

        return redirect()->route('transfer.index')->with('success', 'Transfer successfully Updated');
    }

    public function destroy($trans_id)
    {
        Transfer::findOrFail($trans_id)->delete();

        return redirect()->back()->with('delete', 'successfully Deleted');
    }

    public function generatePDF(Transfer $transfer)
    {
        $randomNumber = random_int(100000, 999999);

        $transfer->
                  with(['from_warehouse' => function ($query) {
                      $query->select('id', 'name', 'email', 'address');
                  },
                      'to_warehouse' => function ($query) {
                          $query->select('id', 'name', 'email', 'address');
                      },

                      'items' => function ($query) {
                          $query->select('id', 'transfer_id', 'product_id', 'quantity');
                      },

                      'items.product' => function ($query) {
                          $query->select('id', 'name');
                      }])->first();

        $pdf = Pdf::loadView('admin.transfer.print-page', compact('transfer','randomNumber'));

        return $pdf->download('invoice.pdf');

    }
}
