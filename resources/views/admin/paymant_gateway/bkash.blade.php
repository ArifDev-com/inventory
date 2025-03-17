<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('paymant_gateway/fav.png')}}">

    <title>Secure Checkout - IT Poribar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    <style>
        body {
            font-family: "Roboto", sans-serif;
            font-weight: 300;
            background: linear-gradient(350deg, #f4f9ff, #edf4ffc9);
        }

        .card {
    min-height: 100%;
}
    </style>

</head>

<body>



    <div class="container mt-5">
        <div class="">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card p-5 shadow bg-body rounded" style="margin-top: 50px;">

                        <div class="card p-3 mb-4" style="background-color:  rgb(0 87 208 / 0.1);">
                            <div class="d-flex justify-content-between">

                                <a href="{{ route('payment.gateway.dashboard')}}" class="d-flex align-items-center"
                                    style="text-decoration: none; font-size: 16px; color: #6d7f9a;"><i
                                        class="fa fa-arrow-left"></i></a>
                                <a  class="d-flex align-items-center"
                                    style="text-decoration: none; font-size: 16px; color: #6d7f9a;"><i
                                        class="fa fa-close"></i></a>

                            </div>
                        </div>
                       
                        <center>
                       <img src="{{ asset('paymant_gateway/bkash.png')}}" class="img-fluid mb-3" alt="" style="height: 80px; width: 120px;">
                    </center>

                    @php 
                    $authId = Auth::user()->id;
                    $invoice = App\Models\InvoiceId::where('user_id',$authId)->orderBy('created_at', 'desc')->first();
                @endphp 
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card p-3">

                                <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('paymant_gateway/fav.png')}}" class="img-fluid " alt="" style="height: 50px; width: 50px;">
                                    </div>
                                    <div class="">
                                        <h5 style="color: #6d7f9a; margin-top: 5px;">IT PORIBAR </h5>
                                        <p style="color: #6d7f9a; margin-top: -8px;" >Invoice ID:</p>
                                        
                                        <p style="color: #6d7f9a; margin-top: -18px; margin-right: 60px;" ><b>{{$invoice->invoice_id}}</b></p>
                                    </div>
                                </div>


                              
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-3">
                               <div>
                                <h3 style="color: #6d7f9a; margin-top: 25px; margin-left: 10px; font-weight: bold;">৳ 500</h3>
                               </div>
                            </div>
                        </div>
                    </div>

                    <div class="card p-3 mt-3" style="background-color: #cf2771; color: white;">
                        <center><h6>Enter Transaction ID</h6></center>
                   
                            <input type="text" id="first" class="form-control" placeholder="Enter Transaction ID" >
                            <ul>
                                <br>
                                <li><p style="font-size: 11px; font-weight: bold;">Go to your BKASH Mobile Menu by dialing: *247# or Open BKASH App.</p></li>
                                <hr>
                                <li><p style="font-size: 14px; font-weight: bold;">Choose: <span class="text-warning">"Send Money"</span> </p></li>
                                <hr>
                                <li><p style="font-size: 14px; font-weight: bold;">Enter the Receiver Account Number <span class="text-warning">01830596312</span> </p></li>
                                <hr>
                                <li><p style="font-size: 14px; font-weight: bold;">Enter the amount: <span class="text-warning">500</span> </p></li>
                                <hr>
                                <li><p style="font-size: 14px; font-weight: bold;">Now enter your BKASH Mobile Menu PIN to confirm.</p></li>
                                <hr>
                                <li><p style="font-size: 12px; font-weight: bold;">Done! You will receive a confirmation message from BKASH</p></li>
                                <hr>
                                <li><p style="font-size: 12px; font-weight: bold;">Put the <span class="text-warning">Transaction ID</span> in the upper box and press <span class="text-warning">VERIFY</span> </p></li>
                            </ul>
                   
                    </div>

                    @php 
                    $authId = Auth::user()->id;
                    $user = App\Models\User::where('id',$authId)->first();
                    $invoice = App\Models\InvoiceId::where('user_id',$authId)->orderBy('created_at', 'desc')->first();
                @endphp 

                  
                    <form id="myForm" action="{{ route('update.payment.gateway.bkash',$user->id) }}" method="POST" >
                        @csrf
                        {{-- {{$user->id}} --}}
                        <input type="hidden" id="last" name="transaction_id" class="form-control" required>
                        <input type="hidden"  name="invoice_id" class="form-control" value="{{$invoice->invoice_id}}">

                        <button type="submit" class="btn btn-primary mt-3" style="background-color: #cf2771; display: inline-block; padding: 10px 20px; width: 100%; text-align: center;">VERIFY</button>

                    </form>

                        


                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    
    // Get references to the input elements
    var inputFirst = document.getElementById("first"),
            inputLast = document.getElementById("last"),
            form = document.getElementById("myForm");

        // Update hidden input field value on keyup event of the first input field
        inputFirst.onkeyup = function() {
            inputLast.value = this.value;
        };

        // Form submit event handler
        form.onsubmit = function(event) {
            if (!inputLast.value) {
                // Prevent form submission if hidden input is empty
                alert('Enter Your Transaction ID!');
                event.preventDefault(); // Prevent the form from submitting
            }
        };

    </script>
</body>

</html>