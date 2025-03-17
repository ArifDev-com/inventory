<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\City;
use App\Models\Country;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Supplier;
use App\Models\Warehouse;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function index()
    {
        $authId = Auth::user()->id;
        $warehouse = Warehouse::latest()->get();
        $supplier = Supplier::latest()->get();
        $products = Product::latest()->get();
        $purchases = Purchase::latest()->get();

        return view('admin.purchase.index', compact('supplier', 'products', 'purchases', 'warehouse'));
    }

    public function create()
    {
        $authId = Auth::user()->id;
        $cities = City::latest()->get();
        $countries = Country::latest()->get();
        $brands = Brand::latest()->get();
        $warehouses = Warehouse::latest()->get();
        $suppliers = Supplier::latest()->get();
        $products = Product::latest()->get();
        $purchases = Purchase::latest()->get();

        return view('admin.purchase.create', compact('suppliers', 'products', 'purchases', 'warehouses', 'brands', 'cities', 'countries'));
    }

    // search here
    public function searchProduct(Request $request)
    {
        $request->validate([
            'search' => 'required',
        ]);

        $products = Product::where('name', 'LIKE', '%'.$request->search.'%')
            ->paginate(5);

        return view('admin.search-result', compact('products'));

    }

    public function findProductsPurchase(Request $request)
    {
        $request->validate([
            'search' => 'required',
        ]);

        // $products = Product::where("name", "LIKE", "%" .$request->search. "%")->where('quantity','>',0)->take(5)->get();

        //  $products = Product::where("name", "LIKE", "%" .$request->search. "%")->where('quantity','>',0)->take(5)->get();
        $authId = Auth::user()->id;

        $products = Product::where(function ($query) use ($request) {
            $query->where('product_code', 'LIKE', '%'.$request->search.'%');
        })->orWhere(function ($query) use ($request) {
            $query->where('name', 'LIKE', '%'.$request->search.'%')
                ->where('quantity', '>', 0);
        })->take(5)->get();

        // return response()->json($products);

        // return $products;
        return view('admin.search-product', compact('products'));

    }

    public function store(Request $request)
    {

        // dd($request->all());

        //  $request->validate([
        //   'supplier_id'=>'required|max:255',
        //   'date'=>'required|max:255',
        //   'product_id'=>'required|max:255',
        //   'purchase_code'=>'required|max:255',
        //   'tax'=>'required|max:255',
        //   'discount'=>'required|max:255',
        //   'shipping'=>'required|max:255',
        //   'status'=>'required|max:255',
        //   'description'=>'required',
        //  ],[
        //   'supplier_id.required' => 'select supplier name',
        //   'product_id.required' => 'select product name',
        // ]);

        $purchase = Purchase::create([
            'user_id' => Auth::id(),
            'warehouse_id' => $request->warehouse_id,
            'supplier_id' => $request->supplier_id,
            'date' => $request->date,
            'purchase_code' => $request->purchase_code,
            'tax' => $request->tax,
            'discount' => $request->discount,
            'shipping' => $request->shipping,
            'grandtotal' => $request->grand_total,
            'paid_amount' => $request->paid_amount,
            'due_amount' => $request->due_amount,
            'status' => $request->status,
            'note' => $request->note,
        ]);

        $pcount = count($request->product_id);

        for ($i = 0; $i < $pcount; $i++) {
            $purchase->items()->create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id[$i],
                'quantity' => $request->quantity[$i],
                'sub_total' => $request->sub_total[$i],
            ]);

            Product::where('id', $request->product_id[$i])->increment('quantity', $request->quantity[$i]);

        }

        return Redirect()->route('purchase.index')->with('success', 'Purchase Added');
    }

    public function edit($purch_id)
    {
        $warehouses = Warehouse::latest()->get();
        $suppliers = Supplier::latest()->get();
        $products = Product::latest()->get();
        $purchase = Purchase::with(['items.product'])->findOrFail($purch_id);

        return view('admin.purchase.edit', compact('suppliers', 'products', 'purchase', 'warehouses'));
    }

    public function update(Request $request, $purch_id)
    {

        // $purch_id = $request->id;

        Purchase::findOrFail($purch_id)->Update([
            'warehouse_id' => $request->warehouse_id,
            'supplier_id' => $request->supplier_id,
            'date' => $request->date,
            'purchase_code' => $request->purchase_code,
            'tax' => $request->tax,
            'discount' => $request->discount,
            'shipping' => $request->shipping,
            'grandtotal' => $request->grand_total,
            'paid_amount' => $request->paid_amount,
            'due_amount' => $request->due_amount,
            'status' => $request->status,
            'note' => $request->note,
        ]);

        $pcount = count($request->product_id);

        for ($i = 0; $i < $pcount; $i++) {
            PurchaseItem::find($purch_id)->update([
                'product_id' => $request->product_id[$i],
                'quantity' => $request->quantity[$i],
                'sub_total' => $request->sub_total[$i],
            ]);

            // Product::where('id',$request->product_id[$i])->increment('quantity',$request->quantity[$i]);
        }

        return Redirect()->route('purchase.index')->with('success', 'Purchase successfully Updated');
    }

    public function destroy($purch_id)
    {
        abort_if(Auth::user()->user_role != 'admin', 403, 'Unauthorized');
        // Find the Purchase record
        $purchase = Purchase::findOrFail($purch_id);

        // Delete related PurchaseItem records
        PurchaseItem::where('purchase_id', $purch_id)->delete();

        // Delete the Purchase record
        $purchase->delete();

        return redirect()->back()->with('delete', 'Successfully Deleted');
    }

    public function purchase_details($purch_id)
    {
        $warehouses = Warehouse::latest()->get();
        $suppliers = Supplier::latest()->get();
        $products = Product::latest()->get();
        $purchase = Purchase::with(['items.product', 'supplier'])->findOrFail($purch_id);

        return view('admin.purchase.purchase-details', compact('suppliers', 'products', 'purchase', 'warehouses'));
    }

    public function generatePDF(Purchase $purchase)
    {
        $randomNumber = random_int(100000, 999999);

        $purchase->
                  with(['supplier' => function ($query) {
                      $query->select('id', 'name', 'email', 'address');
                  },
                      'warehouse' => function ($query) {
                          $query->select('id', 'name', 'email', 'address');
                      },

                      'items' => function ($query) {
                          $query->select('id', 'purchase_id', 'product_id', 'quantity', 'sub_total');
                      },

                      'items.product' => function ($query) {
                          $query->select('id', 'name');
                      }])->first();

        $pdf = Pdf::loadView('admin.purchase.print-page',compact('purchase','randomNumber'));

        return $pdf->download('invoice.pdf');

        // return $pdf->download('codesolutionstuff.pdf');
        // return view('admin.sales.print-page');
    }
}
