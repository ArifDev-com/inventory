<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Imports\Product2Import;
use App\Imports\ProductImport;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\Warehouse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;
use Milon\Barcode\DNS1D;

class ProductController extends Controller
{
    public function index()
    {
        $category = Category::latest()->get();
        $subCategory = SubCategory::latest()->get();
        $brand = Brand::latest()->get();
        $unit = Unit::latest()->get();
        $warehouses = Warehouse::latest()->get();
        $suppliers = Supplier::latest()->get();
        $authId = Auth::user()->id;
        $products = Product::with('user')->latest()->get();

        return view('admin.products.index', compact('products', 'category', 'subCategory', 'brand', 'unit', 'warehouses', 'suppliers'));
    }

    public function product_quantity()
    {
        $category = Category::latest()->get();
        $subCategory = SubCategory::latest()->get();
        $brand = Brand::latest()->get();
        $unit = Unit::latest()->get();
        $warehouses = Warehouse::latest()->get();
        $suppliers = Supplier::latest()->get();
        $authId = Auth::user()->id;
        $products = Product::with('user')->latest()->get();
        return view('admin.products.quantity', compact('products', 'category', 'subCategory', 'brand', 'unit', 'warehouses', 'suppliers'));
    }

    public function product_quantity_update(Request $request)
    {
        dd($request->all());
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

            $name_gen = hexdec(uniqid()) . '.' . $imag->getClientOriginalExtension();
            Image::make($imag)->resize(270, 270)->save(public_path('upload/product/' . $name_gen));
            $img_url = 'upload/product/' . $name_gen;
        } else {
            $img_url = null;
        }

        // $name_gen = hexdec(uniqid()).'.'.$imag->getClientOriginalExtension();
        //    $path = public_path('upload/product/'.$name_gen);
        //     Image::make($imag->getRealPath())->resize(468,249)->save($path);
        //     $data['image'] = 'upload/product/'.$name_gen;

        // make barcode
        $barCodeName = $request->product_code . '.png';
        // $barcodeFile = base64_decode(DNS1D::getBarcodePNG($request->product_code, "C39+"));
        $barcodeFile = base64_decode(DNS1D::getBarcodePNG($request->product_code, 'C128'));
        $barCodeSavePath = 'upload/barcode/' . $barCodeName;
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

        return Redirect()->route('product.index')->with('success', 'Product Added');
    }

    public function edit($pro_id)
    {
        $authId = Auth::user()->id;
        $categories = Category::latest()->get();
        $subCategories = SubCategory::latest()->get();
        $brands = Brand::latest()->get();
        $units = Unit::latest()->get();
        $warehouses = Warehouse::latest()->get();
        $suppliers = Supplier::latest()->get();
        $product = Product::findOrFail($pro_id);

        return view('admin.products.edit', compact('product', 'categories', 'subCategories', 'brands', 'units', 'warehouses', 'suppliers'));
    }

    public function update(Request $request, $pro_id)
    {

        $pro_id = $request->id;

        $product = Product::findOrFail($pro_id);

        if ($request->hasFile('image')) {
            $imag = $request->file('image');

            // $name_gen = hexdec(uniqid()).'.'.$imag->getClientOriginalExtension();
            // $path = public_path('upload/product/'.$name_gen);
            //  Image::make($imag->getRealPath())->resize(468,249)->save($path);
            //  $data['image'] = 'upload/product/'.$name_gen;

            $name_gen = hexdec(uniqid()) . '.' . $imag->getClientOriginalExtension();
            Image::make($imag)->resize(270, 270)->save(public_path('upload/product/' . $name_gen));
            $img_url = 'upload/product/' . $name_gen;
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

        return Redirect()->route('product.index')->with('success', 'Product successfully Updated');
    }

    public function destroy(Product $product)
    {

        @unlink($product->image);
        $product->delete();

        return Redirect()->back()->with('delete', 'successfully Deleted');
    }

    public function product_details($pro_id)
    {
        $product = Product::with(['category', 'subcategory', 'brand', 'unit', 'warehouse', 'supplier'])->where('id', $pro_id)->latest()->first();

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
}
