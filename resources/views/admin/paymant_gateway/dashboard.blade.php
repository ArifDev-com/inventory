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
    </style>

</head>

<body>



    <div class="container mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card p-5 shadow bg-body rounded" style="margin-top: 50px;">

                        <div class="card p-3" style="background-color:  rgb(0 87 208 / 0.1);">
                            <div class="d-flex justify-content-between">

                                <a href="{{ url('admin/dashboard')}}" class="d-flex align-items-center"
                                    style="text-decoration: none; font-size: 16px; color: #6d7f9a;"><i
                                        class="fa fa-home"></i></a>
                                <a  class="d-flex align-items-center"
                                    style="text-decoration: none; font-size: 16px; color: #6d7f9a;"><i
                                        class="fa fa-close"></i></a>

                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-3">
                                <img src="{{ asset('paymant_gateway/fav.png')}}" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-9">
                                <h5 style="color: #6d7f9a;">IT PORIBAR</h5>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card p-2 ">
                                            <div class="d-flex justify-content-between">
                                                <a  style="text-decoration: none; font-size: 14px;">
                                                    <i class="fa fa-headphones"
                                                        style="color: #6d7f9a; margin-top: 4px;"></i>
                                                    <span style="color: #6d7f9a;">
                                                        Support
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card p-2 ">
                                            <div class="d-flex justify-content-between">
                                                <a  style="text-decoration: none; font-size: 14px;">
                                                    <i class="fa fa-info-circle"
                                                        style="color: #6d7f9a; margin-top: 4px;"></i>
                                                    <span style="color: #6d7f9a; margin-right: 25px;">
                                                        Info
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card p-2 ">
                                            <div class="d-flex justify-content-between">
                                                <a  style="text-decoration: none; font-size: 14px;">
                                                    <i class="fa fa-file-text"
                                                        style="color: #6d7f9a; margin-top: 4px;"></i>&nbsp;
                                                    <span style="color: #6d7f9a; margin-right: 25px;">
                                                        Details
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <a  class="btn btn-primary mt-3" style="background-color: #28357d;">Mobile Banking</a>


                        <div class="row mt-2">
                            <div class="col-md-3">
                                <div class="card p-2">
                                    <a href="{{ route('payment.gateway.bkash')}}">
                                        <img src="{{ asset('paymant_gateway/bkash.png')}}" class="img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class=" col-md-3">
                                <div class="card p-2">
                                    <a href="{{ route('payment.gateway.nagad')}}">
                                        <img src="{{ asset('paymant_gateway/nagad.png')}}" class="img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card p-2">
                                    <a href="{{ route('payment.gateway.rocket')}}">
                                        <img src="{{ asset('paymant_gateway/rocket.png')}}" class="img-fluid" alt="">
                                    </a>
                                </div>
                            </div>

                        </div>

                        <div class="card mt-3 p-1" style="background-color:  rgb(0 87 208 / 0.1);">
                            <center>
                                <h5 style="color: #0a5dd2;">Pay 500.00 BDT</h5>
                            </center>
                        </div>


                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>