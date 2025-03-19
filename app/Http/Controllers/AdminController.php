<?php

namespace App\Http\Controllers;

use App\Models\ClientRegister;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Sale;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $purchaseDue = Purchase::latest()->sum('due_amount');
        $purchaseTotal = Purchase::latest()->sum('grandtotal');
        $saleDue = Sale::latest()->sum('due_amount');
        $saleTotal = Sale::latest()->sum('grandtotal');
        $sales = Sale::latest()->get();
        $cusCount = Customer::count();
        $supCount = Supplier::count();
        $pCount = Product::count();

        $recentProducts = Product::latest()->limit(5)->get(['id', 'name', 'price', 'image']);

        $stockLess = Product::with(['brand' => function ($q) {
            $q->select('id', 'name');
        },
            'category' => function ($query) {
                $query->select('id', 'name');
            }])->where('quantity', '<', '5')->get(['id', 'brand_id', 'category_id', 'product_code', 'name', 'quantity', 'image']);

        $cancellationRequests = Sale::whereNotNull('cancel_requested')->get();

        return view('admin.home',
            [
                'purchaseDue' => $purchaseDue,
                'purchaseTotal' => $purchaseTotal,
                'saleDue' => $saleDue,
                'saleTotal' => $saleTotal,
                // 'saleTotal' =>$sales->sum('grandtotal'),
                // 'salePaid' => $sales->sum('paid_amount'),
                // 'saleDue' => $sales->sum('due_amount'),
                'cusCount' => $cusCount,
                'supCount' => $supCount,
                'pCount' => $pCount,
                'saleCount' => $sales->count(),
                'recentProducts' => $recentProducts,
                'stockLess' => $stockLess,
                'cancellationRequests' => $cancellationRequests,
            ],
        );
    }

    public function superDashboard()
    {
        return view('admin.super_dashboard');
    }

    public function purchaseReport(Request $request)
    {
        $fromDate = '';
        $toDate = '';
        if (isset($request->from_date) && ! empty($request->from_date)) {
            $fromDate = Carbon::parse($request->from_date)->format('Y-m-d');
            $toDate = Carbon::parse($request->to_date)->format('Y-m-d');
        }

        $purchases = Purchase::latest()
            ->when($fromDate && $toDate != '', function ($q) use ($fromDate, $toDate) {
                return $q->whereBetween('date', [$fromDate, $toDate]);
            })
            ->get();

        return view('admin.home', [
            'purchases' => $purchases,
            'grandtotalSum' => $purchases->sum('grandtotal'),
            'paidAmountSum' => $purchases->sum('paid_amount'),
            'dueAmountSum' => $purchases->sum('due_amount'),
        ]);
    }

    public function saleReport(Request $request)
    {
        $fromDate = '';
        $toDate = '';
        if (isset($request->from_date) && ! empty($request->from_date)) {
            $fromDate = Carbon::parse($request->from_date)->format('Y-m-d');
            $toDate = Carbon::parse($request->to_date)->format('Y-m-d');
        }

        $sales = Sale::latest()
            ->when($fromDate && $toDate != '', function ($q) use ($fromDate, $toDate) {
                return $q->whereBetween('date', [$fromDate, $toDate]);
            })
            ->get();

        return view('admin.home', [
            'sales' => $sales,
            'grandtotalSum' => $sales->sum('grandtotal'),
            'paidAmountSum' => $sales->sum('paid_amount'),
            'dueAmountSum' => $sales->sum('due_amount'),
        ]);
    }

    // Client Register
    public function clientRegister()
    {
        return view('admin.client.register');
    }

    public function clientRegisterStore(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
        ]);

        ClientRegister::insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'note' => $request->note,
            'created_at' => Carbon::now(),
        ]);

        //  return redirect()->route('login')->with('success', 'Register Added');
        return back()->with('success', 'Your Register has been Successfull, Our team will contact with you.');
    }
}
