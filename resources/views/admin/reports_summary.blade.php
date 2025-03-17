@extends('layouts.app')
@section('content')




    <div class="page-wrapper">
        <div class="content">

        <center>
  <h1 style="color: #4c77bb;"> Reports Module</h1>
</center>
        <hr style="background: red;">
        <br><br>
            
            <div class="row">

            <!-- <div class="col-md-2">

            </div> -->

            <div class="col-md-12">
           <div class="row">
          

         <div class="col-md-3">
       <a href="{{ route('inventory.report') }}">
       <div class="card " style="background: linear-gradient(to right, #78ffd6, #a8ff78);">
           <center><i class="fa fa-shopping-cart mt-4" style="font-size: 45px;"></i>
                   
                   </center>
  <div class="card-body">
  
    <center> <h1 class="card-title">Inventory Report</h1></center>
   
  </div>
</div>
       </a>

         </div>

         <div class="col-md-3">
       <a href="{{ route('sale.report') }}">
       <div class="card " style="background: linear-gradient(to right, #78ffd6, #a8ff78);">
           <center><i class="fa fa-list mt-4" style="font-size: 45px;"></i>
                   
                   </center>
  <div class="card-body">
  
    <center> <h1 class="card-title">Sales Reports</h1></center>
   
  </div>
</div>
       </a>

         </div>


      


         <div class="col-md-3">
        <a href="{{ route('profit.loss') }}">
        <div class="card " style="background: linear-gradient(to right, #78ffd6, #a8ff78);">
           <center><i class="fa fa-money-bill mt-4" style="font-size: 45px;"></i>
                   
                   </center>
  <div class="card-body">
  
    <center> <h1 class="card-title">Profit or Loss</h1></center>
   
  </div>
</div>
        </a>

         </div>

         <div class="col-md-3">
       <a href="{{ route('invoice.report') }}">
       <div class="card " style="background: linear-gradient(to right, #78ffd6, #a8ff78);">
           <center><i class="fa fa-print mt-4" style="font-size: 45px;"></i>
                   
                   </center>
  <div class="card-body">
  
    <center> <h1 class="card-title">Invoice Report</h1></center>
   
  </div>
</div>
       </a>

         </div>

       

         <div class="col-md-3">
       <a href="{{ route('due.report') }}">
       <div class="card " style="background: linear-gradient(to right, #78ffd6, #a8ff78);">
           <center><i class="fa fa-money-bill mt-4" style="font-size: 45px;"></i>
                   
                   </center>
  <div class="card-body">
  
    <center> <h1 class="card-title">Due Report</h1></center>
   
  </div>
</div>
       </a>

         </div>

        

               

       
           </div>
                </div>
<!-- 
                <div class="col-md-2">

            </div> -->

 
            


            </div>
        </div>
    </div>
@endsection