<?php

namespace App\Http\Controllers;

use App\Models\Customer;

use App\Models\SaleReturn;

use App\Models\SaleReturnItem;

use App\Models\Warehouse;

use App\Models\Product;

use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\Auth;

class SaleReturnController extends Controller
{
  public function index(){
    $customer=Customer::latest()->get();
    $warehouse=Warehouse::latest()->get();
    $saleReturns=SaleReturn::latest()->get();
    return view('admin.saleReturn.index',compact('customer','warehouse','saleReturns'));
  }

  public function create(){
    $customers=Customer::latest()->get();
    $warehouses=Warehouse::latest()->get();
    $saleReturn=SaleReturn::latest()->get();
    return view('admin.saleReturn.create',compact('customers','warehouses','saleReturn'));
  }

    // search here 
    public function searchProduct(Request $request){
      $request->validate([
      'search'=>'required'
      ]);
    
      $products=Product::where("name", "LIKE", "%" .$request->search. "%")->paginate(5);
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
    //     'customer_id'=>'required|max:255',
    //     'warehouse_id'=>'required|max:255',
    //     'date' =>'required|max:255',
    //     'ref_code' =>'required|max:255',
    //     'tax' =>'required|max:255',
    //     'discount' =>'required|max:255',
    //     'shipping' =>'required|max:255',
    //     'grandtotal' =>'required|max:255',
    //     'status' =>'required|max:255',
    //     'note' =>'required|max:255',
    // ]);

    $saleReturn =  SaleReturn::create([
      'customer_id' => $request->customer_id,
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
      $saleReturn->items()->create([
        'product_id' => $request->product_id[$i],
        'quantity' => $request->quantity[$i],
        'sub_total' => $request->sub_total[$i],
      ]);
 
      Product::where('id',$request->product_id[$i])->increment('quantity',$request->quantity[$i]);
    }
 
    return Redirect()->route('saleReturn.index')->with('success','Sale Report Added');

  }

  public function edit($saleRet_id){
    $customers=Customer::latest()->get();
    $warehouses=Warehouse::latest()->get();
    $saleReturn=SaleReturn::with(['items.product'])->findOrFail($saleRet_id);
    return view('admin.saleReturn.edit',compact('customers','warehouses','saleReturn'));
  }

  public function update(Request $request, $saleRet_id){
 
    // dd($request->all());
  
     SaleReturn::findOrFail($saleRet_id)->Update([
      'customer_id' => $request->customer_id,
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
      SaleReturnItem::find($saleRet_id) ->update([
        'product_id' => $request->product_id[$i],
        'quantity' => $request->quantity[$i],
        'sub_total' => $request->sub_total[$i],
      ]);
  
    Product::where('id',$request->product_id[$i])->increment('quantity',$request->quantity[$i]);
    }
    
    return Redirect()->route('saleReturn.index')->with('success','Sale Return successfully Updated');
  }
  
  public function destroy($saleRet_id){
    SaleReturn::findOrFail($saleRet_id)->delete();
    SaleReturnItem::where('sale_return_id', $saleRet_id)->delete();
   
    return Redirect()->back()->with('delete','successfully Deleted');
    }

    public function generatePDF(SaleReturn $saleReturn)
    {
      $randomNumber = random_int(100000, 999999);

      $saleReturn->
                  with(['customer'=> function($query){
                  $query->select('id','name','email','address');
                },
                'warehouse' => function($query){
                  $query->select('id','name','email','address');
                },
  
                'items' => function($query){
                  $query->select('id','sale_return_id','product_id','quantity','sub_total');
                },
                
                'items.product' => function($query){
                  $query->select('id','name');
                }])->first();
  
      $pdf = Pdf::loadView('admin.saleReturn.print-page',compact('saleReturn','randomNumber'));
      return $pdf->download('invoice.pdf');
  
    }
}
