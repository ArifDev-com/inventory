<?php

    namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;

    use App\Models\Product;
    
    class BarcodeController extends Controller
    {
        public function barcode(){
            return view('admin.products.barcode');
        }

      // search here 
      public function searchProduct(Request $request){
        $request->validate([
        'search'=>'required'
        ]);
      
        $products=Product::where("name", "LIKE", "%" .$request->search. "%")
                       ->paginate(5);
              return view('admin.products.search-result',compact('products'));  
                  
      }
      
      public function findProducts(Request $request){
        $request->validate([
          'search'=>'required'
        ]);
      
        $products = Product::where("name", "LIKE", "%" .$request->search. "%")->take(5)->get();
        // $products = Product::where("productcode", "LIKE", "%" .$request->search. "%")->take(5)->get();

          return view('admin.products.search-product',compact('products'));  
      
        }

        public function createBarcode() 
        {
            $productCode = rand(1234567890,50);
    
            return view('barcode', [
                'product_Code' => $productCode
            ]);
        }


    }

