@extends('layouts.app')
@section('content')




<div class="page-wrapper">
    <div class="content">

        @php
        $authId = Auth::user()->id;
        $logo = App\Models\ShopDocument::first();
        $user = App\Models\User::where('id', $authId)->where('status',1)->first();
        $user_pending = App\Models\User::where('id', $authId)->where('status',0)->first();
        @endphp

        <center>
            @if($logo)
                <h2>
                    Welcome
                    @if(auth()->user()->user_role == 'admin')
                    <span style="font-weight: bold;">{{ $logo->name }}</span>
                    @else
                    <span style="font-weight: bold;">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                    @endif
                </h2>
            @endif

            @if($user)
            @php
            // Calculate the remaining days from the end date
            $endDate = \Carbon\Carbon::parse($user->end_date);
            $daysRemaining = $endDate->diffInDays(\Carbon\Carbon::now());

            $formattedStartDate = \Carbon\Carbon::parse($user->start_date)->format('d/m/Y');
            $formattedEndDate = \Carbon\Carbon::parse($user->end_date)->format('d/m/Y');
            @endphp





            @if($daysRemaining > 0)

            <h6 class="text-danger d-none"><span style="color: black; ">{{ $formattedStartDate }} - {{ $formattedEndDate
                    }}</span> ({{ $daysRemaining }} Days Remaining Bill Date)</h6>

            <hr style="background: red;">

            @else

            <style>
                .header .header-left {

                    display: none;
                }
            </style>

            {{-- <p style="color: green;">after bill pay then knock our support center button</p> --}}
            <hr style="background: red;">

            <div class="row">

                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="pricing-card">
                        <div class="card shadow-sm border-light text-center mt-1">
                            <!-- Header -->
                            <header class="card-header bg-white p-3">
                                <h2 class="h5 text-danger"><b>Monthly Bill</b> </h2>
                                <span class="d-block">
                                    <span class="display-3 text-dark font-weight-bold">
                                        <span class="align-top font-medium">৳ </span>500
                                    </span>
                                    <span class="d-block text-light font-small">/ month</span>
                                </span>
                            </header>
                            <!-- End Header -->
                            <!-- Content -->
                            <div class="card-body" style="margin-top: -50px;">
                                <ul class="list-group mb-3">
                                    <li class="list-group-item"><i class="fa fa-check"></i><strong> Product</strong>
                                        with Barcode</li>
                                    <li class="list-group-item"><i class="fa fa-check"></i><strong> Purchase</strong>
                                        One Invoice</li>
                                    <li class="list-group-item"><i class="fa fa-check"></i><strong> Sales</strong> with
                                        invoice</li>
                                    <li class="list-group-item"><i class="fa fa-check"></i><strong> Expense</strong>
                                        Category wise</li>
                                    <li class="list-group-item"><i class="fa fa-check"></i><strong> Return</strong>
                                        Purchase/Sales</li>
                                    <li class="list-group-item"><i class="fa fa-check"></i><strong> Reporting</strong>
                                        All Filter & Calendar wise</li>

                                </ul>

                                <div>
                                    <form action="{{ route('store.payment.gateway.invoice') }}" method="POST">
                                        @csrf

                                        <button type="submit" class="btn btn-danger btn-block animate-up-1">PAY
                                            NOW</button>

                                        {{-- <a href="{{ route('payment.gateway.dashboard')}}" type="submit"
                                            class="btn btn-danger btn-block animate-up-1" tabindex="0">PAY NOW</a> --}}

                                    </form>
                                </div>
                            </div>
                            <!-- End Content -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>



            {{-- <h4 class="text-danger"><span style="font-weight: bold;">Software Lock</span> - <span
                    style="color: black;">Please Pay Monthly Bill</span></h4> --}}



            @endif
            @endif


            {{-- Start PAyment Pending Condition --}}
            @if($user_pending)

            <style>
                .header .header-left {

                    display: none;
                }

                .sidebar .sidebar-menu {

                    display: none;
                }
            </style>

            {{-- <p style="color: green;">after bill pay then knock our support center button</p> --}}
            <hr style="background: red;">

            <div class="row">

                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="pricing-card">
                        <div class="card shadow-sm border-light text-center mt-1">
                            <!-- Header -->
                            <header class="card-header bg-white p-3">
                                <h2 class="h5 text-warning" style="font-size: 26px;"><b>Payment Verify Pending...</b>
                                </h2>
                                <h2 class="h5 text-warning" style="font-size: 26px;"><b>Wait Some Minute</b> </h2>

                            </header>
                            <!-- End Header -->


                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>



            {{-- <h4 class="text-danger"><span style="font-weight: bold;">Software Lock</span> - <span
                    style="color: black;">Please Pay Monthly Bill</span></h4> --}}




            @endif
            {{-- End Payment Pending Condition --}}
        </center>
        {{--
        <hr style="background: red;"> --}}
        <br><br>

        @if($user)
        @php
        // Calculate the remaining days from the end date
        $endDate = \Carbon\Carbon::parse($user->end_date);
        $daysRemaining = $endDate->diffInDays(\Carbon\Carbon::now());

        $formattedStartDate = \Carbon\Carbon::parse($user->start_date)->format('d/m/Y');
        $formattedEndDate = \Carbon\Carbon::parse($user->end_date)->format('d/m/Y');
        @endphp

        @if($daysRemaining > 0)



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

                                    <center>
                                        <h1 class="card-title">Sales Module</h1>
                                    </center>

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

                                    <center>
                                        <h1 class="card-title">Purchase Module</h1>
                                    </center>

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

                                    <center>
                                        <h1 class="card-title">Products Entry</h1>
                                    </center>

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

                                    <center>
                                        <h1 class="card-title">Customers Module</h1>
                                    </center>

                                </div>
                            </div>
                        </a>

                    </div>

                    <div class="col-md-3"></div>

                    <div class="col-md-3">
                        <a href="{{ route('reportssummary') }}">
                            <div class="card " style="background: #c6e2ff;">
                                <center><i class="fa fa-calendar mt-4" style="font-size: 75px;"></i>

                                </center>
                                <div class="card-body">

                                    <center>
                                        <h1 class="card-title">Reports Module</h1>
                                    </center>

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

                                    <center>
                                        <h1 class="card-title">Log Out</h1>
                                    </center>

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

        @else

        @endif
        @endif





    </div>
</div>
@endsection
