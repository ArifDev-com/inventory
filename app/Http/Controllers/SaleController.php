<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Customer;
use App\Models\CutomerPayment;
use App\Models\Order_emi;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Quotation;
use App\Models\QuotationItem;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\Warehouse;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Milon\Barcode\DNS1D;

class SaleController extends Controller
{
    public function index()
    {
        $authId = Auth::user()->id;
        $product = Product::latest()->get();
        $customer = Customer::latest()
            ->with(['sales' => function ($q) {
                $q->select(
                    'grandtotal',
                    'paid_amount',
                    'due_amount'
                );
            }])
            ->get();
        $warehouse = Warehouse::latest()->get();
        $sales = Sale::with('user')->latest()->get();

        return view('admin.sales.index', compact('product', 'customer', 'warehouse', 'sales'));
    }

    public function create()
    {
        $authId = Auth::user()->id;
        $cities = City::latest()->get();
        $countries = Country::latest()->get();
        $products = Product::latest()
            ->where('status', 'active')
            ->get();
        $customers = Customer::latest()
            ->with(['sales'])
            ->get();
        // dd($customers->toArray());
        $warehouses = Warehouse::latest()->get();
        $sales = Sale::latest()->get();

        return view('admin.sales.create', compact('products', 'customers', 'warehouses', 'sales', 'cities', 'countries'));
    }

    // search here
    public function searchProduct(Request $request)
    {
        $request->validate([
            'search' => 'required',
        ]);

        $products = Product::where('name', 'LIKE', '%' . $request->search . '%')->paginate(10);

        return view('admin.search-result', compact('products'));
    }

    public function findProducts(Request $request)
    {
        $request->validate([
            'search' => 'required',
        ]);

        // $products = Product::where("name", "LIKE", "%" .$request->search. "%")->take(5)->get();
        $authId = Auth::user()->id;

        $products = Product::where(function ($query) use ($request) {
            $query->where('product_code', 'LIKE', '%' . $request->search . '%');
        })->orWhere(function ($query) use ($request) {
            $query->where('name', 'LIKE', '%' . $request->search . '%')
                ->where('quantity', '>', 0);
        })
            ->where('status', 'active')
            ->take(5)->get();

        return view('admin.search-product', compact('products'));
    }

    public function store(Request $request)
    {

        // return $request->all();

        // dd($request->all());

        // $request->validate([
        // 'customer_id'=> 'required|max:255',
        // 'warehouse_id'=> 'required|max:255',
        // 'date' => 'required|max:255',
        // 'ref_code' => 'required|max:255',
        // 'tax' => 'required|max:255',
        // 'discount' => 'required|max:255',
        // 'shipping' => 'required|max:255',
        // 'grandtotal' => 'required|max:255',
        // 'paid_amount' => 'required|max:255',
        // 'due_amount' => 'required|max:255',
        // 'payment_status' => 'required|max:255',
        // 'payment_type' => 'required|max:255',
        // 'note' => 'required'
        // ]);
        // dd($request->all());
        // make barcode
        $ref_code = 100 + Sale::count();
        $barCodeName = $ref_code . '.png';
        $barcodeFile = base64_decode(DNS1D::getBarcodePNG($ref_code, 'C39+'));
        $barCodeSavePath = 'upload/barcode/' . $barCodeName;
        Storage::disk('public_uploads')->put($barCodeName, $barcodeFile);

        $sale = Sale::create([
            'user_id' => Auth::id(),
            'customer_id' => $request->customer_id,
            'warehouse_id' => $request->warehouse_id,
            'date' => $request->date,
            'ref_code' => $ref_code,
            'tax' => $request->tax,
            'discount' => $request->discount,
            'shipping' => $request->shipping,
            'grandtotal' => $request->grand_total,
            'paid_amount' => $request->paid_amount,
            'due_amount' => $request->due_amount,
            'due_date' => $request->due_date,
            'other_cost' => $request->other_cost ?: 0,
            'payment_status' => $request->payment_status,
            'payment_type' => $request->payment_type,
            'barcode_url' => $barCodeSavePath,
            'note' => $request->note,
        ]);

        DB::table('cutomer_payments')->insert([
            'user_id' => Auth::id(),
            'sale_id' => $sale->id,
            'reference' => $sale->ref_code,
            'date' => $request->date,
            'paying_amount' => $sale->paid_amount,
            'down_payment' => $sale->paid_amount,
            'created_at' => Carbon::now(),
        ]);

        // foreach ($request->inputs as $input) {
        //     Order_emi::create([
        //         'user_id' => Auth::id(),
        //         'order_id' => $sale->id,
        //         'emi_amount' => $input['emi_amount'],
        //         'emi_date' => $input['emi_date'],
        //     ]);
        // }

        $pcount = count($request->product_id);

        for ($i = 0; $i < $pcount; $i++) {
            $sale->items()->create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id[$i],
                'quantity' => $request->quantity[$i],
                'price' => $request->price[$i],
                'purchase_price' => $request->purchase_price[$i],
                'sub_total' => $request->sub_total[$i],
                'price_type' => $request->price_type[$i] ?? '',
            ]);

            Product::where('id', $request->product_id[$i])->decrement('quantity', $request->quantity[$i]);
        }
        session()->flash('sale_id', $sale->id);

        return Redirect()->route('sale.index')->with('success', 'Sale Added');
    }

    public function edit($sale_id)
    {
        $product = Product::latest()->get();
        $customers = Customer::latest()->get();
        $warehouses = Warehouse::latest()->get();
        $sale = Sale::findOrFail($sale_id);

        return view('admin.sales.edit', compact('product', 'customers', 'warehouses', 'sale'));
    }

    public function return($saleId)
    {

        $product = Product::latest()->get();
        $customers = Customer::latest()->get();
        $warehouses = Warehouse::latest()->get();
        $sale = Sale::with(['items.product'])->findOrFail($saleId);

        // return $sale;
        return view('admin.sales.create_return', compact('product', 'customers', 'warehouses', 'sale'));
    }

    public function update(Request $request, $id)
    {

        // dd($request->all());

        // make barcode
        $barCodeName = $request->ref_code . '.png';
        $barcodeFile = base64_decode(DNS1D::getBarcodePNG($request->ref_code, 'C39+'));
        $barCodeSavePath = 'upload/barcode/' . $barCodeName;
        Storage::disk('public_uploads')->put($barCodeName, $barcodeFile);

        Sale::findOrFail($id)->update([
            'customer_id' => $request->customer_id,
            'user_id' => Auth::id(),
            'warehouse_id' => $request->warehouse_id,
            'date' => $request->date,
            'tax' => $request->tax,
            'discount' => $request->discount,
            'shipping' => $request->shipping,
            'grandtotal' => $request->grand_total,
            'paid_amount' => $request->paid_amount,
            'due_amount' => $request->due_amount,
            'payment_status' => $request->payment_status,
            'payment_type' => $request->payment_type,
            'barcode_url' => $barCodeSavePath,
            'note' => $request->note,
            'update_at' => Carbon::now(),
        ]);

        $pcount = count($request->product_id);

        for ($i = 0; $i < $pcount; $i++) {
            // SaleItem::find($id) ->update([
            //   'product_id' => $request->product_id[$i],
            //   'quantity' => $request->quantity[$i],
            //   'sub_total' => $request->sub_total[$i],
            //   'update_at' => Carbon::now(),
            // ]);

            Product::where('id', $request->product_id[$i])->decrement('quantity', $request->quantity[$i]);
        }

        return Redirect()->route('sale.index')->with('success', 'Sale successfully Updated');
    }

    public function destroy($sale_id)
    {
        abort_if(Auth::user()->user_role != 'admin', 403, 'Unauthorized');
        Sale::findOrFail($sale_id)->delete();

        SaleItem::where('sale_id', $sale_id)->delete();
        Order_emi::where('order_id', $sale_id)->delete();
        CutomerPayment::where('sale_id', $sale_id)->delete();
        Order_emi::where('order_id', $sale_id)->delete();

        return Redirect()->back()->with('delete', 'successfully Deleted');
    }

    public function generatePDF(Sale $sale)
    {
        $randomNumber = random_int(100000, 999999);

        $sale->with([
            'customer' => function ($query) {
                $query->select('id', 'name', 'email', 'address');
            },
            'warehouse' => function ($query) {
                $query->select('id', 'name', 'email', 'address');
            },

            'items' => function ($query) {
                $query->select('id', 'sale_id', 'product_id', 'quantity', 'sub_total');
            },

            'items.product' => function ($query) {
                $query->select('id', 'name');
            }
        ])->first();

        $pdf = Pdf::loadView('admin.sales.print-page', compact('sale', 'randomNumber'));

        return $pdf->download('invoice.pdf');

        // return $pdf->download('codesolutionstuff.pdf');
        // return view('admin.sales.print-page');

        // return view('admin.sales.print-page',compact('sale','randomNumber'));
    }

    public function generateChallanPDF(Sale $sale)
    {
        $sale->with([
            'customer' => function ($query) {
                $query->select('id', 'name', 'email', 'address');
            },
            'warehouse' => function ($query) {
                $query->select('id', 'name', 'email', 'address');
            },

            'items' => function ($query) {
                $query->select('id', 'sale_id', 'product_id', 'quantity', 'sub_total');
            },

            'items.product' => function ($query) {
                $query->select('id', 'name');
            }
        ])->first();
        // return view('admin.sales.print-challan-page', compact('sale'));
        $pdf = Pdf::loadView('admin.sales.print-challan-page', compact('sale'));

        return $pdf->download('challan - ' . $sale->ref_code . '.pdf');

        // return $pdf->download('codesolutionstuff.pdf');
        // return view('admin.sales.print-page');

        // return view('admin.sales.print-page',compact('sale','randomNumber'));
    }

    public function sale_details($sale_id)
    {
        $product = Product::latest()->get();
        $customers = Customer::latest()->get();
        $warehouses = Warehouse::latest()->get();
        $sale = Sale::with(['items.product', 'customer'])->findOrFail($sale_id);

        return view('admin.sales.sale-details', compact('customers', 'product', 'sale', 'warehouses'));
    }

    public function quotation_store(Request $request)
    {
        // dd($request->all());

        $quotation = Quotation::create([
            'customer_id' => $request->customer_id,
            'date' => $request->date,
            'discount' => $request->discount ?? 0,
            'grandtotal' => $request->grand_total,
            'warehouse_id' => $request->warehouse_id ?? 0,
            'description' => $request->description ?? '',
            'ref_code' => $request->ref_code ?? 0,
            'status' => 'pending',
            'paid_amount' => $request->paid_amount ?? 0,
            'due_amount' => $request->due_amount ?? 0,
            'payment_type' => $request->payment_type,
            'due_date' => $request->due_date ?? null,
            'note' => $request->note ?? '',
        ]);

        $quotationItem = new QuotationItem;

        foreach ($request->product_id as $key => $value) {
            $quotationItem::create([
                'quotation_id' => $quotation->id,
                'product_id' => $value,
                'quantity' => $request->quantity[$key],
                'sub_total' => $request->sub_total[$key],
            ]);
        }

        return back();
    }
}
