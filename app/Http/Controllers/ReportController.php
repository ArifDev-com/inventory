<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Expense;
use App\Models\Product;
use App\Models\ProductStockUpdate;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\PurchaseReturn;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\SaleReturn;
use App\Models\SubCategory;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\Warehouse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    // public function purchaseOrder()
    // {
    //    return view('admin.reports.purchase-orderReport');
    // }

    public function purchaseReport(Request $request)
    {
        $fromDate = '';
        $toDate = '';
        if (isset($request->from_date) && ! empty($request->from_date)) {
            $fromDate = Carbon::parse($request->from_date)->format('Y-m-d');
            $toDate = Carbon::parse($request->to_date)->format('Y-m-d');
        }

        // return $fromDate;

        // return $request->all();
        $purchases = Purchase::latest()
            ->when($fromDate && $toDate != '', function ($q) use ($fromDate, $toDate) {
                return $q->whereBetween('date', [$fromDate, $toDate]);
            })
            ->with(['items'])
            ->get();

        // $grandtotalSum = $sales->sum('grandtotal');
        // return $sales;

        return view('admin.reports.purchase-report', [
            'purchases' => $purchases,
            'grandtotalSum' => $purchases->sum('grandtotal'),
            'paidAmountSum' => $purchases->sum('paid_amount'),
            'dueAmountSum' => $purchases->sum('due_amount'),
        ]);
    }

    public function saleReport(Request $request)
    {
        // $fromDate = Carbon::createFromFormat('d-m-Y',$request->from_date);
        // $toDate = Carbon::createFromFormat('d/m/Y',$request->to_date);

        // return $fromDate;

        $fromDate = '';
        $toDate = '';
        if (isset($request->from_date) && ! empty($request->from_date)) {
            $fromDate = Carbon::parse($request->from_date)->format('Y-m-d');
            $toDate = Carbon::parse($request->to_date)->format('Y-m-d');
        }

        // return $fromDate;

        // return $request->all();
        $authId = Auth::user()->id;
        $sales = Sale::latest()->where('user_id', $authId)
            ->when($fromDate && $toDate != '', function ($q) use ($fromDate, $toDate) {
                return $q->whereBetween('date', [$fromDate, $toDate]);
            })
            ->get();

        // $grandtotalSum = $sales->sum('grandtotal');
        // return $sales;

        return view('admin.reports.sales-report', [
            'sales' => $sales,
            'grandtotalSum' => $sales->sum('grandtotal'),
            'paidAmountSum' => $sales->sum('paid_amount'),
            'dueAmountSum' => $sales->sum('due_amount'),
        ]);
    }

    // Due Report
    public function dueReport(Request $request)
    {
        // $fromDate = Carbon::createFromFormat('d-m-Y',$request->from_date);
        // $toDate = Carbon::createFromFormat('d/m/Y',$request->to_date);

        // return $fromDate;

        $fromDate = '';
        $toDate = '';
        if (isset($request->from_date) && ! empty($request->from_date)) {
            $fromDate = Carbon::parse($request->from_date)->format('Y-m-d');
            $toDate = Carbon::parse($request->to_date)->format('Y-m-d');
        }

        // return $fromDate;

        // return $request->all();
        $authId = Auth::user()->id;
        $sales = Sale::latest()->where('user_id', $authId)
            ->when($fromDate && $toDate != '', function ($q) use ($fromDate, $toDate) {
                return $q->whereBetween('date', [$fromDate, $toDate]);
            })
            ->get();

        // $grandtotalSum = $sales->sum('grandtotal');
        // return $sales;

        return view('admin.reports.due-report', [
            'sales' => $sales,
            'grandtotalSum' => $sales->sum('grandtotal'),
            'paidAmountSum' => $sales->sum('paid_amount'),
            'dueAmountSum' => $sales->sum('due_amount'),
        ]);
    }

    public function customerReport(Request $request)
    {
        $fromDate = '';
        $toDate = '';
        if (isset($request->from_date) && ! empty($request->from_date)) {
            $fromDate = Carbon::parse($request->from_date)->format('Y-m-d');
            $toDate = Carbon::parse($request->to_date)->format('Y-m-d');
        }

        // return $fromDate;

        // return $request->all();
        $sales = Sale::latest()
            ->when($fromDate && $toDate != '', function ($q) use ($fromDate, $toDate) {
                return $q->whereBetween('date', [$fromDate, $toDate]);
            })
            ->with(['customer' => function ($query) {
                $query->select('id', 'name');
            }])
            ->get(['customer_id', 'grandtotal', 'paid_amount', 'due_amount', 'payment_status', 'payment_type']);

        // return $sales;

        return view('admin.reports.customer-report', [
            'sales' => $sales,
            'grandtotalSum' => $sales->sum('grandtotal'),
            'paidAmountSum' => $sales->sum('paid_amount'),
            'dueAmountSum' => $sales->sum('due_amount'),
        ]);
    }

    public function supplierReport(Request $request)
    {
        $fromDate = '';
        $toDate = '';
        if (isset($request->from_date) && ! empty($request->from_date)) {
            $fromDate = Carbon::parse($request->from_date)->format('Y-m-d');
            $toDate = Carbon::parse($request->to_date)->format('Y-m-d');
        }

        // return $fromDate;

        // return $request->all();
        $purchases = Purchase::latest()
            ->when($fromDate && $toDate != '', function ($q) use ($fromDate, $toDate) {
                return $q->whereBetween('date', [$fromDate, $toDate]);
            })
            ->with(['supplier' => function ($query) {
                $query->select('id', 'name');
            }, 'items'])
            ->get();

        $purchaseReturns = PurchaseReturn::latest()
            ->when($fromDate && $toDate != '', function ($q) use ($fromDate, $toDate) {
                return $q->whereBetween('date', [$fromDate, $toDate]);
            })
            ->with(['supplier' => function ($query) {
                $query->select('id', 'name');
            }])
            ->get();

        // return $purchases;
        // return $sales;

        return view('admin.reports.supplier-report', [
            'purchases' => $purchases,
            'grandtotalSum' => $purchases->sum('grandtotal'),
            'paidAmountSum' => $purchases->sum('paid_amount'),
            'dueAmountSum' => $purchases->sum('due_amount'),
        ],
            [
                'purchaseReturns' => $purchaseReturns,
                'grandtotalSum' => $purchaseReturns->sum('grandtotal'),
            ]);
    }

    public function invoiceReport(Request $request)
    {
        $fromDate = '';
        $toDate = '';
        if (isset($request->from_date) && ! empty($request->from_date)) {
            $fromDate = Carbon::parse($request->from_date)->format('Y-m-d');
            $toDate = Carbon::parse($request->to_date)->format('Y-m-d');
        }

        // return $fromDate;

        // return $request->all();
        $authId = Auth::user()->id;
        $sales = Sale::latest()->where('user_id', $authId)
            ->when($fromDate && $toDate != '', function ($q) use ($fromDate, $toDate) {
                return $q->whereBetween('date', [$fromDate, $toDate]);
            })
            ->with(['customer' => function ($query) {
                $query->select('id', 'name');
            }])
            ->get(['customer_id', 'grandtotal', 'paid_amount', 'due_amount', 'payment_status', 'payment_type', 'date', 'ref_code']);

        // return $sales;

        return view('admin.reports.invoice-report', [
            'sales' => $sales,
            'grandtotalSum' => $sales->sum('grandtotal'),
            'paidAmountSum' => $sales->sum('paid_amount'),
            'dueAmountSum' => $sales->sum('due_amount'),
        ]);
    }

    public function inventoryReport(Request $request)
    {
        // $stock = $request->stock;
        $authId = Auth::user()->id;
        $products = Product::latest()->where('user_id', $authId)
            ->when($request->stock == 'in', function ($q) {
                return $q->where('quantity', '>', 0);
            })
            ->when($request->stock == 'out', function ($q) {
                return $q->where('quantity', '=', 0);
            })->get();

        return view('admin.reports.inventory-report', [
            'products' => $products,
        ]);
    }

    // Warehouse Report
    public function warehouseReport(Request $request)
    {
        // $stock = $request->stock;

        $product = Product::latest()->get();
        $customer = Customer::latest()->get();
        $warehouse = Warehouse::latest()->get();
        // $sales= Sale::with('user')->where('warehouse_id',4)->latest()->paginate(10);
        $sales = Sale::with('user')->where('warehouse_id', 4)->get(['customer_id', 'warehouse_id', 'user_id', 'grandtotal', 'paid_amount', 'due_amount', 'payment_status', 'payment_type', 'date', 'ref_code']);

        return view('admin.reports.warehouse-report', [
            'sales' => $sales,
            'grandtotalSum' => $sales->sum('grandtotal'),
            'paidAmountSum' => $sales->sum('paid_amount'),
            'dueAmountSum' => $sales->sum('due_amount'),
        ], compact('product', 'customer', 'warehouse', 'sales'));
    }

    // Warehouse-2 Report
    public function warehouse2Report(Request $request)
    {
        // $stock = $request->stock;

        $product = Product::latest()->get();
        $customer = Customer::latest()->get();
        $warehouse = Warehouse::latest()->get();
        // $sales= Sale::with('user')->where('warehouse_id',5)->latest()->paginate(10);
        $sales = Sale::with('user')->where('warehouse_id', 5)->get(['customer_id', 'warehouse_id', 'user_id', 'grandtotal', 'paid_amount', 'due_amount', 'payment_status', 'payment_type', 'date', 'ref_code']);

        return view('admin.reports.warehouse-2-report', [
            'sales' => $sales,
            'grandtotalSum' => $sales->sum('grandtotal'),
            'paidAmountSum' => $sales->sum('paid_amount'),
            'dueAmountSum' => $sales->sum('due_amount'),
        ], compact('product', 'customer', 'warehouse', 'sales'));
    }

    public function report()
    {
        return view('admin.reports.report');
    }

    // Expenses Reports
    public function expenseReports(Request $request)
    {
        // $fromDate = Carbon::createFromFormat('d-m-Y',$request->from_date);
        // $toDate = Carbon::createFromFormat('d/m/Y',$request->to_date);

        // return $fromDate;

        $fromDate = '';
        $toDate = '';
        if (isset($request->from_date) && ! empty($request->from_date)) {
            $fromDate = Carbon::parse($request->from_date)->format('Y-m-d');
            $toDate = Carbon::parse($request->to_date)->format('Y-m-d');
        }

        // return $fromDate;

        // return $request->all();
        $expenses = Expense::latest()
            ->when($fromDate && $toDate != '', function ($q) use ($fromDate, $toDate) {
                return $q->whereBetween('date', [$fromDate, $toDate]);
            })
            ->get();

        // $grandtotalSum = $sales->sum('grandtotal');
        // return $sales;

        return view('admin.reports.expense-report', [
            'expenses' => $expenses,
            'amountSum' => $expenses->sum('amount'),

        ]);
    }

    // Profit or Loss
    public function profitLoss()
    {
        $product = Product::latest()->get();
        $customer = Customer::latest()->get();
        $warehouse = Warehouse::latest()->get();
        $sales = Sale::with('user')->latest()->get();

        $authId = Auth::user()->id;
        $data = Sale::join('sale_items', 'sale_items.sale_id', '=', 'sales.id')
            ->where('sales.user_id', $authId)
            ->join('products', 'products.id', '=', 'sale_items.product_id')
            ->get(['sale_items.product_id', 'sale_items.quantity', 'products.purchase_price', 'sales.date', 'sales.customer_id', 'sales.ref_code', 'sales.payment_status', 'sales.payment_type', 'sales.grandtotal', 'sales.paid_amount', 'sales.due_amount']);

        return view('admin.reports.profit-loss', compact('product', 'customer', 'warehouse', 'sales', 'data'));
    } // End Method

    // Warehose-2 Product List
    public function warehouse2productReport()
    {
        $category = Category::latest()->get();
        $subCategory = SubCategory::latest()->get();
        $brand = Brand::latest()->get();
        $unit = Unit::latest()->get();
        $warehouses = Warehouse::latest()->get();
        $suppliers = Supplier::latest()->get();
        // $products = Product::with('user')->where('warehouse_id',5)->latest()->paginate(10);
        $products = Product::with('user')->where('warehouse_id', 5)->get(['name', 'productcode', 'user_id', 'category_id', 'subCategory_id', 'brand_id', 'unit_id', 'warehouse_id', 'supplier_id', 'product_code', 'min_qty', 'quantity', 'tax', 'discount', 'purchase_price', 'price', 'description', 'product_slug', 'image', 'status', 'barcode_url']);

        return view('admin.reports.warehouse-2-product', [
            'products' => $products,
            'grandtotalSum' => $products->sum('purchase_price'),
            'paidAmountSum' => $products->sum('price'),
        ], compact('products', 'category', 'subCategory', 'brand', 'unit', 'warehouses', 'suppliers'));
    }

    // Warehose Product List
    public function warehouseproductReport()
    {
        $category = Category::latest()->get();
        $subCategory = SubCategory::latest()->get();
        $brand = Brand::latest()->get();
        $unit = Unit::latest()->get();
        $warehouses = Warehouse::latest()->get();
        $suppliers = Supplier::latest()->get();
        // $products = Product::with('user')->where('warehouse_id',4)->latest()->paginate(10);
        $products = Product::with('user')->where('warehouse_id', 4)->get(['name', 'productcode', 'user_id', 'category_id', 'subCategory_id', 'brand_id', 'unit_id', 'warehouse_id', 'supplier_id', 'product_code', 'min_qty', 'quantity', 'tax', 'discount', 'purchase_price', 'price', 'description', 'product_slug', 'image', 'status', 'barcode_url']);

        return view('admin.reports.warehouse-product', [
            'products' => $products,
            'grandtotalSum' => $products->sum('purchase_price'),
            'paidAmountSum' => $products->sum('price'),
        ], compact('products','category','subCategory','brand','unit','warehouses','suppliers'));
    }

    public function datewiseStockReport(Request $request)
    {

        $fromDate = now()->startOfMonth();
        $toDate = now();
        if (($request->from_date) && ($request->to_date)) {
            $fromDate = Carbon::createFromFormat('d-m-Y', $request->from_date);
            $toDate = Carbon::createFromFormat('d-m-Y', $request->to_date);
        }

        $products = Product::query()
            ->orderBy('name', 'asc')
            ->get()->map(function ($p) use ($fromDate, $toDate) {
            // $p->purchase_count = PurchaseItem::where('product_id', $p->id)
            //     ->whereBetween('created_at', [$fromDate, $toDate])
            //     ->sum('quantity');
            $p->add_count = ProductStockUpdate::where('product_id', $p->id)
                ->whereBetween('created_at', [$fromDate, $toDate])
                ->sum('quantity');
            $p->sales_count = SaleItem::where('product_id', $p->id)
                ->whereBetween('created_at', [$fromDate, $toDate])
                ->sum('quantity');
            return $p;
        });
        return view('admin.reports.datewise-stock-report', compact('products', 'fromDate', 'toDate'));
    }

    public function datewiseSaleReport(Request $request)
    {
        // $products = Product::latest()->get();
        $customers = Customer::latest()->get();
        $fromDate = '';
        $toDate = '';
        $data = [];
        if (isset($request->from_date) && ! empty($request->from_date)) {
            $fromDate = Carbon::parse($request->from_date)->format('Y-m-d');
            $toDate = Carbon::parse($request->to_date)->format('Y-m-d');
            $sales = Sale::latest()
                ->when($fromDate && $toDate != '', function ($q) use ($fromDate, $toDate) {
                    return $q->whereBetween('date', [$fromDate, $toDate]);
                })
                ->when($request->customer_id, function ($q) use ($request) {
                    return $q->where('customer_id', $request->customer_id);
                })
                ->get();
        }

        return view('admin.reports.datewise-sale-report', compact('customers', 'data', 'fromDate', 'toDate'));
    }

    public function productWiseReport(Request $request)
    {
        $product = null;
        $products = Product::latest()->get();
        $data = [];
        $fromDate = '';
        $toDate = '';
        if ($request->from_date && $request->to_date && $request->product_id) {
            $fromDate = Carbon::parse($request->from_date);
            $toDate = Carbon::parse($request->to_date);

            $product = Product::find($request->product_id);
            $dates = [];
            // loop through the dates
            for ($date = $fromDate; $date->lte($toDate); $date->addDay()) {
                $dates[] = $date->format('Y-m-d');
            }
            foreach ($dates as $date) {
                $sales = SaleItem::where('product_id', $product->id)
                    ->whereDate('created_at', $date)
                    ->sum('quantity');
                $add_quantity = ProductStockUpdate::where('product_id', $product->id)
                    ->whereDate('created_at', $date)
                    ->sum('quantity');
                $purchase_quantity = PurchaseItem::where('product_id', $product->id)
                    ->whereDate('created_at', $date)
                    ->sum('quantity');
                $data[$date] = [
                    'sales' => $sales,
                    'add_quantity' => $add_quantity,
                    'purchase_quantity' => $purchase_quantity,
                    'start_quantity' => $product->stockQuantityAtStartOf($date),
                    'end_quantity' => $product->stockQuantityAtEndOf($date),
                ];
            }
        }
        return view('admin.reports.product-wise-report', compact('product', 'data', 'fromDate', 'toDate', 'products'));
    }

    public function productList(Request $request)
    {
        $products = Product::orderBy("code")->get();
        return view('admin.reports.product-list', compact('products'));
    }

    public function returnReport(Request $request)
    {
        $fromDate = '';
        $toDate = '';
        if (($request->from_date) && ($request->to_date)) {
            $fromDate = Carbon::parse($request->from_date)->format('Y-m-d');
            $toDate = Carbon::parse($request->to_date)->format('Y-m-d');
        }
        $saleReturns = SaleReturn::latest()
            ->when($fromDate && $toDate, function ($q) use ($fromDate, $toDate) {
                return $q->whereBetween('date', [$fromDate, $toDate]);
            })
            ->get();
        return view('admin.reports.return-list', compact('saleReturns', 'fromDate', 'toDate'));
    }
}
