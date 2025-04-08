<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Imports\Product2Import;
use App\Imports\ProductImport;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductStockUpdate;
use App\Models\SubCategory;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\Warehouse;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;
use Milon\Barcode\DNS1D;

class ProductController extends Controller
{
    public function inactive(Request $request)
    {
        $category = Category::latest()->get();
        $subCategory = SubCategory::latest()->get();
        $brand = Brand::latest()->get();
        $unit = Unit::latest()->get();
        $warehouses = Warehouse::latest()->get();
        $suppliers = Supplier::latest()->get();
        $authId = Auth::user()->id;
        $products = Product::withoutGlobalScope('active')
            ->with('user')
            ->where('status', '!=', 'active')
            ->orWhereNull('status')
            // ->latest()
            ->orderBy('name', 'asc')
            ->get();

        if($request->print) {
            $active = 0;
            $pdf = FacadePdf::loadView('admin.products.print', compact('products', 'active'));
            return $pdf->stream('Products.pdf');
        }
        return view('admin.products.inactive', compact('products', 'category', 'subCategory', 'brand', 'unit', 'warehouses', 'suppliers'));
    }
    public function index(Request $request)
    {
        $category = Category::latest()->get();
        $subCategory = SubCategory::latest()->get();
        $brand = Brand::latest()->get();
        $unit = Unit::latest()->get();
        $warehouses = Warehouse::latest()->get();
        $suppliers = Supplier::latest()->get();
        $authId = Auth::user()->id;
        $products = Product::with('user')->where('status', 'active')
            ->orderBy('name', 'asc')
            ->get();
        if($request->print) {
            $active = 1;
            $pdf = FacadePdf::loadView('admin.products.print', compact('products', 'active'));
            return $pdf->stream('Products.pdf');
        }
        return view('admin.products.index', compact('products', 'category', 'subCategory', 'brand', 'unit', 'warehouses', 'suppliers'));
    }

    public function lowStock()
    {
        $products = Product::with('user')
            ->where('status', 'active')
          	->orderBy('name', 'asc')
            ->get()
            ->filter(function ($product) {
                return $product->current_stock <= $product->alert_quantity;
            });

        return view('admin.products.low-stock', compact('products'));
    }

    public function indexShowroom()
    {
        $category = Category::latest()->get();
        $subCategory = SubCategory::latest()->get();
        $brand = Brand::latest()->get();
        $unit = Unit::latest()->get();
        $warehouses = Warehouse::latest()->get();
        $suppliers = Supplier::latest()->get();
        $products = Product::with('user')->where('warehouse_id', '4')->latest()->get();

        return view('admin.products.showroom', compact('products', 'category', 'subCategory', 'brand', 'unit', 'warehouses', 'suppliers'));
    }

    public function indexGodown()
    {
        $category = Category::latest()->get();
        $subCategory = SubCategory::latest()->get();
        $brand = Brand::latest()->get();
        $unit = Unit::latest()->get();
        $warehouses = Warehouse::latest()->get();
        $suppliers = Supplier::latest()->get();
        $products = Product::with('user')->where('warehouse_id', '5')->latest()->get();

        return view('admin.products.godown', compact('products', 'category', 'subCategory', 'brand', 'unit', 'warehouses', 'suppliers'));
    }

    public function indexCategory()
    {
        $authId = Auth::user()->id;
        $category = Category::latest()->get();
        $subCategory = SubCategory::latest()->get();
        $brand = Brand::latest()->get();
        $unit = Unit::latest()->get();
        $warehouses = Warehouse::latest()->get();
        $suppliers = Supplier::latest()->get();
        $products = Product::with('user')->latest()->get();

        return view('admin.products.category', compact('products', 'category', 'subCategory', 'brand', 'unit', 'warehouses', 'suppliers'));
    }

    public function create()
    {	
      	if(auth()->user()->user_role !== 'superadmin' && auth()->user()->user_role !== 'admin') abort(403);
        $authId = Auth::user()->id;
        $categories = Category::latest()->get();
        $subCategories = SubCategory::latest()->get();
        $brands = Brand::latest()->get();
        $units = Unit::latest()->get();
        $warehouses = Warehouse::latest()->get();
        $suppliers = Supplier::latest()->get();
        $products = Product::latest()->get();

        return view('admin.products.create', compact('products', 'categories', 'subCategories', 'brands', 'units', 'warehouses', 'suppliers'));
    }

    public function store(Request $request)
    {

        if ($request->hasFile('image')) {
            $imag = $request->file('image');

            $name_gen = hexdec(uniqid()).'.'.$imag->getClientOriginalExtension();
            Image::make($imag)->resize(270, 270)->save(public_path('upload/product/'.$name_gen));
            $img_url = 'upload/product/'.$name_gen;
        } else {
            $img_url = null;
        }

        // $name_gen = hexdec(uniqid()).'.'.$imag->getClientOriginalExtension();
        //    $path = public_path('upload/product/'.$name_gen);
        //     Image::make($imag->getRealPath())->resize(468,249)->save($path);
        //     $data['image'] = 'upload/product/'.$name_gen;

        // make barcode
        $barCodeName = $request->product_code.'.png';
        // $barcodeFile = base64_decode(DNS1D::getBarcodePNG($request->product_code, "C39+"));
        $barcodeFile = base64_decode(DNS1D::getBarcodePNG($request->product_code, 'C128'));
        $barCodeSavePath = 'upload/barcode/'.$barCodeName;
        Storage::disk('public_uploads')->put($barCodeName, $barcodeFile);

        Product::create([
            'name' => $request->name,
            // 'product_size' => $request->product_size,
            'user_id' => Auth::id(),
            'product_slug' => strtolower(str_replace(' ', '-', $request->name)),
            'category_id' => $request->category_id,
            'subCategory_id' => $request->subCategory_id,
            'brand_id' => $request->brand_id,
            'unit_id' => $request->unit_id,
            'warehouse_id' => $request->warehouse_id,
            'supplier_id' => $request->supplier_id,
            'product_code' => $request->product_code,
            'min_qty' => $request->min_qty ?: 0,
            'quantity' => $request->quantity ?: 0,
            // 'tax' => $request->tax,
            'tax' => 0,
            'discount' => $request->discount ?: 0,
            'purchase_price' => $request->purchase_price ?: 0,
            'wholesale_price' => $request->wholesale_price ?: 0,
            'retail_price' => $request->retail_price ?: 0,
            'price' => $request->price ?: 0,
            'description' => $request->description ?: '',
            'image' => $img_url,
            'barcode_url' => $barCodeSavePath,
            'status' => $request->status,
            'code' => 100 + Product::count(),
            'alert_quantity' => $request->alert_quantity ?: 0,
        ]);

        return redirect()->route('product.index')->with('success', 'Product Added');

    }

    public function edit($pro_id)
    {
      	if(auth()->user()->user_role !== 'superadmin' && auth()->user()->user_role !== 'admin') abort(403);
        $authId = Auth::user()->id;
        $categories = Category::latest()->get();
        $subCategories = SubCategory::latest()->get();
        $brands = Brand::latest()->get();
        $units = Unit::latest()->get();
        $warehouses = Warehouse::latest()->get();
        $suppliers = Supplier::latest()->get();
        $product = Product::withoutGlobalScope('active')->findOrFail($pro_id);

        return view('admin.products.edit', compact('product', 'categories', 'subCategories', 'brands', 'units', 'warehouses', 'suppliers'));
    }

    public function update(Request $request, $pro_id)
    {
		if(auth()->user()->user_role !== 'superadmin' && auth()->user()->user_role !== 'admin') abort(403);
        $pro_id = $request->id;

        $product = Product::withoutGlobalScope('active')->findOrFail($pro_id);

        if ($request->hasFile('image')) {
            $imag = $request->file('image');

            // $name_gen = hexdec(uniqid()).'.'.$imag->getClientOriginalExtension();
            // $path = public_path('upload/product/'.$name_gen);
            //  Image::make($imag->getRealPath())->resize(468,249)->save($path);
            //  $data['image'] = 'upload/product/'.$name_gen;

            $name_gen = hexdec(uniqid()).'.'.$imag->getClientOriginalExtension();
            Image::make($imag)->resize(270, 270)->save(public_path('upload/product/'.$name_gen));
            $img_url = 'upload/product/'.$name_gen;

        } else {
            $img_url = $product->image;
        }

        $product->update([
            'name' => $request->name,
            'product_slug' => strtolower(str_replace(' ', '-', $request->name)),
            'category_id' => $request->category_id,
            'subCategory_id' => $request->subCategory_id,
            'brand_id' => $request->brand_id,
            'unit_id' => $request->unit_id,
            'warehouse_id' => $request->warehouse_id,
            'supplier_id' => $request->supplier_id,
            'product_code' => $request->product_code,
            // 'product_size' => $request->product_size,
            'min_qty' => $request->min_qty,
            'quantity' => $request->quantity,
            'tax' => $request->tax,
            'discount' => $request->discount,
            'purchase_price' => $request->purchase_price,
            'wholesale_price' => $request->wholesale_price,
            'retail_price' => $request->retail_price,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $img_url,
            'status' => $request->status,
            'update_at' => Carbon::now(),
        ]);
        if($product->status == 'inactive') {
            return redirect()->route('product.inactive')->with('success', 'Product successfully Updated');
        }
        return redirect()->route('product.index')->with('success', 'Product successfully Updated');
    }

    public function destroy(Product $product)
    {
        try {
            $img = $product->image.'';
            $product->delete();
            @unlink($img);

            return redirect()->back()->with('delete', 'successfully Deleted');
        } catch (\Throwable $th) {

            return redirect()->back()->with('error', 'The product is used in other places. Not deletable.');
        }
    }

    public function product_details($pro_id)
    {
        $product = Product::withoutGlobalScope('active')
            ->with(['category', 'subcategory', 'brand', 'unit', 'warehouse', 'supplier'])
            ->where('id', $pro_id)
            ->latest()
            ->first();

        return view('admin.products.product_details', compact('product'));
    }

    public function import()
    {
        return view('admin.products.import-products');
    }

    public function export()
    {
        return Excel::download(new ProductsExport, 'products.csv');

    }

    // Import data
    public function importdata(Request $request)
    {

        Excel::import(new ProductImport, $request->file('file'));

        return back()->with('success', 'Import successfully!');
    }

    // Validate and Import data
    //  public function validateAndImportdata(Request $request){

    //     Excel::import(new Product2Import, "employees.xlsx");
    //     return back()->with('success', 'Import successfully!');
    //  }

    public function barcodePDF()
    {
        return view('admin.products.print-barcode');
    }

    public function stock()
    {
        if(auth()->user()->user_role !== 'superadmin' && auth()->user()->user_role !== 'admin') abort(403);
      	$products = Product::orderBy("name")->get();

        return view('admin.products.stock', compact('products'));
    }

    public function stockUpdate(Request $request)
    {
        if(auth()->user()->user_role !== 'superadmin' && auth()->user()->user_role !== 'admin') abort(403);
      	$request->validate([
            'quantity' => 'required|array',
            'quantity.*' => 'nullable|integer',
        ], [
            'quantity.required' => 'The quantity field is required.',
            'quantity.*.required' => 'The quantity field is required.',
            'quantity.*.integer' => 'The quantity must be an integer.',
        ]);

        foreach ($request->quantity as $productId => $quantity) {
            if($quantity == 0 && !is_numeric($quantity)) {
                continue;
            }
            $product = Product::find($productId);
            ProductStockUpdate::create([
                'product_id' => $productId,
                'quantity' => $quantity,
                'user_id' => Auth::user()->id,
                'prev_quantity' => $product->current_stock,
                'type' => 'stock_update',
                'note' => 'Stock updated by '.Auth::user()->name,
            ]);
        }

        return back()->with('success', 'Stock updated successfully!');
    }

    public function stockHistory()
    {
        $stockUpdates = ProductStockUpdate::with('product', 'user')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.products.stock-history', compact('stockUpdates'));
    }
}
