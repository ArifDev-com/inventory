<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Quotation;
use App\Models\QuotationItem;
use App\Models\Warehouse;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function index()
    {
        $customer = Customer::latest()->get();
        $warehouse = Warehouse::latest()->get();
        $product = Product::latest()->get();
        $quotations = Quotation::latest()->get();

        // return $quotations;
        return view('admin.quotation.index', compact('product', 'quotations', 'customer', 'warehouse'));

    }

    public function create()
    {
        $cities = City::latest()->get();
        $countries = Country::latest()->get();
        $customers = Customer::latest()->get();
        $warehouses = Warehouse::latest()->get();
        $products = Product::latest()->get();
        $quotations = Quotation::latest()->get();

        return view('admin.quotation.create', compact('products', 'quotations', 'customers', 'warehouses', 'cities', 'countries'));
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

        //  $request->validate([
        //   'customer_id'=>'required|max:255',
        //   'warehouse_id'=>'required|max:255',
        //   'date'=>'required|max:255',
        //   'ref_code'=>'required|max:255',
        //   'tax'=>'required|max:255',
        //   'discount'=>'required|max:255',
        //   'shipping'=>'required|max:255',
        //   'grandtotal'=>'required|max:255',
        //   'status'=>'required|max:255',
        //   'description'=>'required',
        //  ],[
        //   'customer_id.required' => 'select supplier name',
        //   'warehouse_id.required' => 'select warehouse name',
        // ]);

        $quotation = Quotation::create([
            'customer_id' => $request->customer_id,
            'warehouse_id' => $request->warehouse_id,
            'date' => $request->date,
            'ref_code' => $request->ref_code,
            'tax' => $request->tax,
            'discount' => $request->discount,
            'shipping' => $request->shipping,
            'grandtotal' => $request->grand_total,
            'status' => $request->status,
            'description' => $request->description,
        ]);

        $pcount = count($request->product_id);

        for ($i = 0; $i < $pcount; $i++) {
            $quotation->items()->create([
                'product_id' => $request->product_id[$i],
                'quantity' => $request->quantity[$i],
                'sub_total' => $request->sub_total[$i],
            ]);

        }

        return Redirect()->route('quotation.index')->with('success', 'Quotation Added');
    }

    public function edit($quo_id)
    {
        $customers = Customer::latest()->get();
        $warehouses = Warehouse::latest()->get();
        $products = Product::latest()->get();
        $quotation = Quotation::with(['items.product'])->findOrFail($quo_id);

        return view('admin.quotation.edit', compact('customers', 'products', 'quotation', 'warehouses'));
    }

    public function update(Request $request, $quo_id)
    {

        // $quo_id = $request->id;

        Quotation::findOrFail($quo_id)->Update([
            'customer_id' => $request->customer_id,
            'warehouse_id' => $request->warehouse_id,
            'date' => $request->date,
            'ref_code' => $request->ref_code,
            'tax' => $request->tax,
            'discount' => $request->discount,
            'shipping' => $request->shipping,
            'grandtotal' => $request->grand_total,
            'status' => $request->status,
            'description' => $request->description,
        ]);

        $pcount = count($request->product_id);

        for ($i = 0; $i < $pcount; $i++) {
            QuotationItem::find($quo_id)->update([
                'product_id' => $request->product_id[$i],
                'quantity' => $request->quantity[$i],
                'sub_total' => $request->sub_total[$i],
            ]);

        }

        return Redirect()->route('quotation.index')->with('success', 'Quotation successfully Updated');
    }

    public function destroy($quo_id)
    {
        Quotation::findOrFail($quo_id)->delete();

        return Redirect()->back()->with('delete', 'successfully Deleted');
    }

    public function generatePDF(Quotation $quotation)
    {
        $randomNumber = random_int(100000, 999999);

        $quotation->
                    with(['customer' => function ($query) {
                        $query->select('id', 'name', 'email', 'address');
                    },
                        'warehouse' => function ($query) {
                            $query->select('id', 'name', 'email', 'address');
                        },

                        'items' => function ($query) {
                            $query->select('id', 'quotation_id', 'product_id', 'quantity', 'sub_total');
                        },

                        'items.product' => function ($query) {
                            $query->select('id', 'name');
                        }])->first();

        $pdf = Pdf::loadView('admin.quotation.print-page',compact('quotation','randomNumber'));

        return $pdf->download('invoice.pdf');

    }
}
