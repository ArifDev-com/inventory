

<!DOCTYPE html>
<html>
<head>
    <title>Sell Pdf</title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
    }
    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 100%;
    }
    .w-50{
        width:50%;   
    }
    .w-85{
        width:85%;   
    }
    .w-15{
        width:15%;   
    }
    .logo img{
        width:200px;
        height:60px;        
    }
    .gray-color{
        color:#5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    table tr,th,td{
        border: 1px solid #d2d2d2;
        border-collapse:collapse;
        padding:5px 5px;
    }
    table tr th{
        background: #4c77bb;
        font-size:15px;
        color: white;
    }
    table tr td{
        font-size:13px;
    }
    table{
        border-collapse:collapse;
    }
    .box-text p{
        line-height:10px;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:16px;
        line-height:12px;
    }
    .total-right p{
        padding-right:20px;
    }
</style>
<body>

<div class="table-section bill-tbl w-100 ">
    <div class="table w-100 ">
       
       
                <div style="float: left;">
                    <div style="float: left;"  style="margin-top: -10px;">
                <img src="{{ public_path("image/fav.png") }}" alt="" style="height: 50px; width: 50px;"> 
                </div>

                <div style="float: right; margin-left: 55px; margin-top: -70px;">
                <h3>Sadia <br>Trading <br>Corporation</h3>
                <p style="font-size: 12px; margin-top: -15px;">Phone: 01830596312</p>
                <p  style="font-size: 12px; margin-top: -10px;">Email: sadia@gmail.com</p>
                </div>
                  
                </div>
            
                <div >
					<p style="margin-left: 550px; font-size: 12px; margin-top: -18px;">Print Date: 01/01/24</p>
                    <h3  style="margin-left: 550px; margin-top: -10px;">invoice</h3>
                    <p style="margin-left: 550px; font-size: 12px; margin-top: -15px;">Address: 225/5, Safiuddin Road, Tongi, Gazipur.</p>
                    <p style="margin-left: 550px; font-size: 12px; font-weight: bold; margin-top: 0px;">Invoice Date: {{ Carbon\Carbon::parse($sale->created_at)->format('d-m-Y') }}</p>
                </div>
           
</div>
</div>


<div class="add-detail mt-10">
    <div class="w-50 float-left mt-10">
        <p class="m-0 pt-5 text-bold w-100">Invoice Number: <span class="gray-color">{{ $sale->ref_code }}</span></p>
        <p class="m-0 pt-5 text-bold w-100">Customer Name: <span class="gray-color">{{ $sale->customer->name }}</span></p>
        <p class="m-0 pt-5 text-bold w-100">Phone: <span class="gray-color">{{ $sale->customer->phone }}</span></p>
        <p class="m-0 pt-5 text-bold w-100">Address: <span class="gray-color">{{ $sale->customer->address }}</span></p>
        
    </div>
   
    <div style="clear: both;"></div>
</div>


<div class="table-section bill-tbl w-100 mt-10 ">
    <table class="table w-100 mt-10 " >
        <tr>
          
            <th>Sl</th>
            <th >Product Name</th>
            <th >Qty</th>
            <th >Total Price</th> 
        </tr>

        @foreach ($sale->items as $key => $item)

        <tr align="center">
         <td>{{ $key + 1 }}</td>
            <td>{{ $item->product->name }}</td>
            <td>{{ $item->quantity }} </td>            
            <td>{{ $item->sub_total*$item->quantity }}</td>
           
        </tr>

	@endforeach
       
        <tr>
            <td colspan="7">
                <div class="total-part">
                    <div class="total-left w-85 float-left" align="right">
                        <p>Sub Total</p>
                        <p>Discount</p>
                        <p>Total Price</p>
                        <p>Previous Due</p>

                        <p>Paid</p>
                        <p>Due</p>
                        
                    </div>
                    <div class="total-right w-15 float-left text-bold" align="right">
                        <p>{{$sale->grandtotal}}</p>
                        <p>{{ $sale->discount ?? 0 }}</p>
                        <p>{{$sale->discount+$sale->grandtotal}}</p>

                        @php
                            $cusId = $sale->customer_id;
                            $sales = DB::table('customers')->join('sales', 'sales.customer_id', '=', 'customers.id')->where('customers.id', $cusId)->sum('sales.due_amount');
                        @endphp

                        <p>{{ $sales - $sale->due_amount ?? 0 }}</p>

                        <p>{{ $sale->paid_amount }}</p>
                        <p>{{ $sale->due_amount+$sales - ($sale->due_amount) }}</p>
                        
                    </div>
                    <div style="clear: both;"></div>
                </div> 
            </td>
        </tr>
    </table>
</div>
</html>