@extends('layouts.app')
@section('content')




    <div class="page-wrapper">
        <div class="content">

        @php 
  $shopDocument = Illuminate\Support\Facades\DB::table('shop_documents')->first();
  @endphp 

        <center>
  <img src="{{ asset($shopDocument->image) }}" alt="" style="height: 60px; width: 60px;"></center>
        <hr style="background: red;">
        <br><br>
            
            <div class="row">

            <!-- <div class="col-md-2">

            </div> -->

            <div class="col-md-12">
           <div class="row">
          

         <div class="col-md-3">
       <a href="{{ URL('admin/sales')}}">
       <div class="card " style="background-color: #e1e1ff;">
           <center><i class="fa fa-usd mt-4" style="font-size: 75px;"></i>
                   
                   </center>
  <div class="card-body">
  
    <center> <h1 class="card-title">Sales Module</h1></center>
   
  </div>
</div>
       </a>

         </div>

         <div class="col-md-3">
       <a href="{{ URL('admin/purchases')}}">
       <div class="card " style="background: #dcf5ea;">
           <center><i class="fa fa-cart-plus mt-4" style="font-size: 75px;"></i>
                   
                   </center>
  <div class="card-body">
  
    <center> <h1 class="card-title">Purchase Module</h1></center>
   
  </div>
</div>
       </a>

         </div>


      


         <div class="col-md-3">
        <a href="{{ URL('admin/products')}}">
        <div class="card " style="background: #85E6FA;">
           <center><i class="fa fa-clipboard mt-4" style="font-size: 75px;"></i>
                   
                   </center>
  <div class="card-body">
  
    <center> <h1 class="card-title">Products Entry</h1></center>
   
  </div>
</div>
        </a>

         </div>

         <div class="col-md-3">
       <a href="{{ URL('admin/customers')}}">
       <div class="card " style="background: #cfff9f;">
           <center><i class="fa fa-user mt-4" style="font-size: 75px;"></i>
                   
                   </center>
  <div class="card-body">
  
    <center> <h1 class="card-title">Customers Module</h1></center>
   
  </div>
</div>
       </a>

         </div>

         <div class="col-md-3"></div>

         <div class="col-md-3">
       <a href="#">
       <div class="card " style="background: #c6e2ff;">
           <center><i class="fa fa-calendar mt-4" style="font-size: 75px;"></i>
                   
                   </center>
  <div class="card-body">
  
    <center> <h1 class="card-title">Reports Module</h1></center>
   
  </div>
</div>
       </a>

         </div>

         <div class="col-md-3">

       

                    
       <a href="{{ URL('/') }}">
       
       <div class="card " style="background: #c6e2ff;">
           <center><i class="fa fa-sign-out mt-4" style="font-size: 75px;"></i>
                   
                   </center>
  <div class="card-body">
  
    <center> <h1 class="card-title">Log Out</h1></center>
   
  </div>
</div>
       </a>

         </div>

         <div class="col-md-3"></div>

               

       
           </div>
                </div>
<!-- 
                <div class="col-md-2">

            </div> -->

 
            


            </div>
        </div>
    </div>
@endsection
