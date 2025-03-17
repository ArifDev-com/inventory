<?php

namespace App\Http\Controllers;

use App\Models\PurchaseReturn;

use App\Models\PurchaseReturnItem;

use App\Models\Warehouse;

use App\Models\Supplier;

use App\Models\Product;

use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

class PurchaseReturnController extends Controller
{
 public function index(){
    $supplier=Supplier::latest()->get();
    $warehouse=Warehouse::latest()->get();
    $purchaseReturns=PurchaseReturn::latest()->get();
    return view('admin.purchaseReturn.index',compact('supplier','warehouse','purchaseReturns'));
 }

 public function create(){
   $suppliers=Supplier::latest()->get();
   $warehouses=Warehouse::latest()->get();
   $purchaseReturn=PurchaseReturn::latest()->get();
   return view('admin.purchaseReturn.create',compact('suppliers','warehouses','purchaseReturn'));
}

      // search here 
      public function searchProduct(Request $request){
         $request->validate([
         'search'=>'required'
         ]);
       
         $products=Product::where("name", "LIKE", "%" .$request->search. "%")
                        ->paginate(5);
               return view('admin.search-result',compact('products'));  
                   
       }
       
       public function findProducts(Request $request){
         $request->validate([
           'search'=>'required'
         ]);
       
         $products = Product::where("name", "LIKE", "%" .$request->search. "%")->take(5)->get();
   
           return view('admin.search-product',compact('products'));  
       
         }

public function store(Request $request){

   // return $request->all();
   
   // $request->validate([
   //    'supplier_id'=>'required|max:255',
   //    'warehouse_id'=>'required|max:255',
   //    'date' =>'required|max:255',
   //    'ref_code' =>'required|max:255',
   //    'tax' =>'required|max:255',
   //    'discount' =>'required|max:255',
   //    'shipping' =>'required|max:255',
   //    'grandtotal' =>'required|max:255',
   //    'status' =>'required|max:255',
   //    'note' =>'required|max:255',
   // ]);
   $purchaseReport =  PurchaseReturn::create([
      'supplier_id' => $request->supplier_id,
      'warehouse_id' => $request->warehouse_id,
      'date'=>$request->date,
      'ref_code' => $request->ref_code,
      'tax'=>$request->tax,
      'discount'=>$request->discount,
      'shipping'=>$request->shipping,
      'grandtotal'=>$request->grand_total,
      'paid_amount'=>$request->paid_amount,
      'status'=>$request->status,
      'note'=>$request->note,
    ]);

    $pcount = count($request->product_id);

    for ($i = 0; $i < $pcount; $i++) {
      $purchaseReport->items()->create([
        'product_id' => $request->product_id[$i],
        'quantity' => $request->quantity[$i],
        'sub_total' => $request->sub_total[$i],
      ]);

      Product::where('id',$request->product_id[$i])->decrement('quantity',$request->quantity[$i]);
 
    }
 
    return Redirect()->route('purchaseReturn.index')->with('success','Purchase Return Added');

  }

  public function edit($purRet_id){
    $suppliers=Supplier::latest()->get();
    $warehouses=Warehouse::latest()->get();
    $purchaseReturn=PurchaseReturn::with(['items.product'])->findOrFail($purRet_id);
    return view('admin.purchaseReturn.edit',compact('suppliers','warehouses','purchaseReturn'));
 }

 
 public function update(Request $request, $purRet_id){
 
  // dd($request->all());

   PurchaseReturn::findOrFail($purRet_id)->Update([
    'supplier_id' => $request->supplier_id,
    'warehouse_id' => $request->warehouse_id,
    'date'=>$request->date,
    'ref_code' => $request->ref_code,
    'tax'=>$request->tax,
    'discount'=>$request->discount,
    'shipping'=>$request->shipping,
    'grandtotal'=>$request->grand_total,
    'status'=>$request->status,
    'note'=>$request->note,
  ]);

  $pcount = count($request->product_id);

  for ($i = 0; $i < $pcount; $i++) {
    PurchaseReturnItem::find($purRet_id) ->update([
      'product_id' => $request->product_id[$i],
      'quantity' => $request->quantity[$i],
      'sub_total' => $request->sub_total[$i],
    ]);

  // Product::where('id',$request->product_id[$i])->decrement('quantity',$request->quantity[$i]);
  }
  
  return Redirect()->route('purchaseReturn.index')->with('success','Purchase Return successfully Updated');
}

public function destroy($purRet_id){
  PurchaseReturn::findOrFail($purRet_id)->delete();
  PurchaseReturnItem::where('purchase_return_id', $purRet_id)->delete();

  return Redirect()->back()->with('delete','successfully Deleted');
  }

  public function generatePDF(PurchaseReturn $purchaseReturn)
  {
    $randomNumber = random_int(100000, 999999);

    $purchaseReturn->
                with(['supplier'=> function($query){
                $query->select('id','name','email','address');
              },
              'warehouse' => function($query){
                $query->select('id','name','email','address');
              },

              'items' => function($query){
                $query->select('id','purchase_return_id','product_id','quantity','sub_total');
              },
              
              'items.product' => function($query){
                $query->select('id','name');
              }])->first();

    $pdf = Pdf::loadView('admin.purchaseReturn.print-page',compact('purchaseReturn','randomNumber'));
    return $pdf->download('invoice.pdf');

  }

}
