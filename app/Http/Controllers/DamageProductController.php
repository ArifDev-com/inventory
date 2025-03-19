<?php

namespace App\Http\Controllers;

use App\Models\DamageProduct;
use App\Models\DamageProductItem;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Warehouse;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DamageProductController extends Controller
{
    public function index()
    {
        $warehouse = Warehouse::latest()->get();
        $supplier = Supplier::latest()->get();
        $damageProducts = DamageProduct::latest()->get();

        return view('admin.damageProducts.index', compact('warehouse', 'supplier', 'damageProducts'));
    }

    public function create()
    {
        $warehouses = Warehouse::latest()->get();
        $suppliers = Supplier::latest()->get();
        $damageproducts = DamageProduct::latest()->get();

        return view('admin.damageProducts.create', compact('warehouses', 'suppliers', 'damageproducts'));
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

        // $request->validate([
        // 'warehouse_id' => 'required|max:255',
        // 'supplier_id' => 'required|max:255',
        // 'date' => 'required|max:255',
        // 'ref_code' => 'required|max:255',
        // 'grandtotal' => 'required|max:255',
        // 'status' => 'required|max:255',
        // 'note' => 'required',
        // ]);

        $damageproduct = DamageProduct::create([
            'warehouse_id' => $request->warehouse_id,
            'supplier_id' => $request->supplier_id,
            'date' => $request->date,
            'ref_code' => $request->ref_code,
            'tax' => $request->tax,
            'discount' => $request->discount,
            'shipping' => $request->shipping,
            'grandtotal' => $request->grand_total,
            'status' => $request->status,
            'note' => $request->note,
        ]);

        $pcount = count($request->product_id);

        for ($i = 0; $i < $pcount; $i++) {
            $damageproduct->items()->create([
                'product_id' => $request->product_id[$i],
                'quantity' => $request->quantity[$i],
                'sub_total' => $request->sub_total[$i],
            ]);

            Product::where('id', $request->product_id[$i])->decrement('quantity', $request->quantity[$i]);

        }

        return redirect()->route('damage.product.index')->with('success', 'Damage Product Added');

    }

    public function edit($daPro_id)
    {
        $warehouses = Warehouse::latest()->get();
        $suppliers = Supplier::latest()->get();
        $product = Product::latest()->get();
        $damageProduct = DamageProduct::with(['items.product'])->findOrFail($daPro_id);

        // return $damageProduct;
        return view('admin.damageProducts.edit', compact('warehouses', 'suppliers', 'damageProduct', 'product'));
    }

    public function update(Request $request, $daPro_id)
    {
        //  return $request;
        $daPro_id = $request->id;

        DamageProduct::findOrFail($daPro_id)->Update([
            'warehouse_id' => $request->warehouse_id,
            'supplier_id' => $request->supplier_id,
            'date' => $request->date,
            'ref_code' => $request->ref_code,
            'tax' => $request->tax,
            'discount' => $request->discount,
            'shipping' => $request->shipping,
            'grandtotal' => $request->grand_total,
            'status' => $request->status,
            'note' => $request->note,
        ]);

        $pcount = count($request->product_id);

        for ($i = 0; $i < $pcount; $i++) {
            DamageProductItem::find($daPro_id)->update([
                'product_id' => $request->product_id[$i],
                'quantity' => $request->quantity[$i],
                'sub_total' => $request->sub_total[$i],
            ]);

            // Product::where('id',$request->product_id[$i])->decrement('quantity',$request->quantity[$i]);
        }

        return redirect()->route('damage.product.index')->with('success', 'Damage Product successfully Updated');

    }

    public function destroy($daPro_id)
    {
        DamageProduct::findOrFail($daPro_id)->delete();

        return redirect()->back()->with('delete', 'successfully Deleted');
    }

    public function generatePDF(DamageProduct $damageProduct)
    {
        $randomNumber = random_int(100000, 999999);

        $damageProduct->
                    with(['supplier' => function ($query) {
                        $query->select('id', 'name', 'email', 'address');
                    },
                        'warehouse' => function ($query) {
                            $query->select('id', 'name', 'email', 'address');
                        },

                        'items' => function ($query) {
                            $query->select('id', 'damage_product_id', 'product_id', 'quantity', 'sub_total');
                        },

                        'items.product' => function ($query) {
                            $query->select('id', 'name');
                        }])->first();

        $pdf = Pdf::loadView('admin.damageProducts.print-page',compact('damageProduct','randomNumber'));

        return $pdf->download('invoice.pdf');

    }
}
