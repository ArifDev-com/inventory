 @extends('layouts.app')
 @section('content')

 <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
 
 <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>

     <div class="page-wrapper">
         <div class="content">
             <div class="page-header">
                 <div class="page-title">
                     <h4>Supplier List</h4>
                     <h6>Manage your Supplier</h6>
                 </div>
                 <div class="page-btn">
                     <a href="{{ route('supplier.create') }}" class="btn btn-added"><img
                             src="{{ asset('backend') }}/img/icons/plus.svg" alt="img">Add
                             Supplier</a>
                 </div>
             </div>


             <!-- /product list -->
             <div class="card">
                 <div class="card-body">
                     {{-- <div class="table-top">
                         <div class="search-set">
                             <div class="search-path">
                                 <a class="btn btn-filter" id="filter_search">
                                     <img src="{{ asset('backend') }}/img/icons/filter.svg" alt="img">
                                     <span><img src="{{ asset('backend') }}/img/icons/closes.svg" alt="img"></span>
                                 </a>
                             </div>
                             <div class="search-input">
                                 <a class="btn btn-searchset"><img src="{{ asset('backend') }}/img/icons/search-white.svg"
                                         alt="img"></a>
                             </div>
                         </div>
                         <div class="wordset">
                             <ul>
                                 <li>
                                     <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                             src="{{ asset('backend') }}/img/icons/pdf.svg" alt="img"></a>
                                 </li>
                                 <li>
                                     <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                             src="{{ asset('backend') }}/img/icons/excel.svg" alt="img"></a>
                                 </li>
                                 <li>
                                     <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                             src="{{ asset('backend') }}/img/icons/printer.svg" alt="img"></a>
                                 </li>
                             </ul>
                         </div>
                     </div> --}}
                     <!-- /Filter -->
                     {{-- <div class="card" id="filter_inputs">
                         <div class="card-body pb-0">
                             <div class="row">
                                 <div class="col-lg-2 col-sm-6 col-12">
                                     <div class="form-group">
                                         <input type="text" placeholder="Enter Picker Code">
                                     </div>
                                 </div>
                                 <div class="col-lg-2 col-sm-6 col-12">
                                     <div class="form-group">
                                         <input type="text" placeholder="Enter Picker">
                                     </div>
                                 </div>
                                 <div class="col-lg-2 col-sm-6 col-12">
                                     <div class="form-group">
                                         <input type="text" placeholder="Enter Phone">
                                     </div>
                                 </div>
                                 <div class="col-lg-2 col-sm-6 col-12">
                                     <div class="form-group">
                                         <input type="text" placeholder="Enter Email">
                                     </div>
                                 </div>
                                 <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                                     <div class="form-group">
                                         <a class="btn btn-filters ms-auto"><img
                                                 src="{{ asset('backend') }}/img/icons/search-whites.svg"
                                                 alt="img"></a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div> --}}
                     <!-- /Filter -->
                     <div class="table-responsive">
                         <table class="table" id="example">
                             <thead>
                                 <tr>
                                    <th>Sl</th>
                                     <th>
                                         {{-- <label class="checkboxs">
                                             <input type="checkbox" id="select-all">
                                             <span class="checkmarks"></span>
                                         </label> --}}
                                     </th>
                                     <th>Supplier Name</th>
                                     {{-- <th>Brand</th> --}}
                                     <th>email</th>
                                     <th>Phone</th>
                                     {{-- <th>Country</th>
                                     <th>City</th> --}}
                                     <th>Address</th>
                                     <th>Total</th>
                                     <th>Paid</th>
                                     <th>Due</th>
                                     <th>Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach ($suppliers as $key=> $supplier)
                                     <tr>
                                        <td>{{ $key+1 }}</td>
                                         <td>
                                             {{-- <label class="checkboxs">
                                                 <input type="checkbox">
                                                 <span class="checkmarks"></span>
                                             </label> --}}
                                         </td>
                                         <td class="productimgname">
                                             {{-- <a href="javascript:void(0);" class="product-img">
                                                 <img src="{{ asset('backend') }}/img/product/noimage.png" alt="product">
                                             </a> --}}
                                             <a href="javascript:void(0);">{{ $supplier->name }}</a>
                                         </td>
                                       
                                         
                                         {{-- <td>{{ $supplier->brand->name }}</td> --}}

                                        {{-- @if($supplier->brand)
                                         <td>{{ $supplier->brand->name }}</td>
                                         @else 
                                         <td>Null</td>
                                         @endif --}}
                                       

                                     
                                         @if($supplier->email)
                                         <td>{{ $supplier->email }}</td>
                                         @else 
                                         <td>Null</td>
                                         @endif

                                         @if($supplier->phone)
                                         <td>{{ $supplier->phone }} </td>
                                         @else 
                                         <td>Null</td>
                                         @endif

                                         {{-- @if($supplier->country)
                                         <td>{{ $supplier->country->name }}</td>
                                         @else 
                                         <td>Null</td>
                                         @endif

                                         @if($supplier->city)
                                         <td>{{ $supplier->city->name }}</td>
                                         @else 
                                         <td>Null</td>
                                         @endif --}}

                                         @if($supplier->address)
                                         <td>{{ $supplier->address }}</td>
                                         @else 
                                         <td>Null</td>
                                         @endif


                                         <td>{{ $supplier->purchases()->sum('grandtotal') ?? 'N/A' }}</td>
                                         <td>{{ $supplier->purchases()->sum('paid_amount') ?? 'N/A'}}</td>
                                         <td>{{ $supplier->purchases()->sum('due_amount') ?? 'N/A' }}</td>
                                         <td class="text-center">

                                             {{-- <a class="me-3" href="{{ route('supplier.edit', $supplier->id) }}">
                                                 <img src="{{ asset('backend') }}/img/icons/edit.svg" alt="img">
                                             </a>
                                             <a class="me-3 confirm-text"
                                                 href="{{ route('supplier.delete', $supplier->id) }}">
                                                 <img src="{{ asset('backend') }}/img/icons/delete.svg" alt="img">
                                             </a> --}}
                                             <a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>

                                            <ul class="dropdown-menu" >
                                                {{-- <li>
                                                    <a href="{{route('supplier.details',$supplier->id)}}" class="dropdown-item"><img src="{{asset('backend')}}/img/icons/eye1.svg" class="me-2" alt="img">Supplier Details</a>
                                                </li> --}}

                                                <li>
                                                    <a href="{{ route('supplier.edit',$supplier->id) }}" class="dropdown-item"><img src="{{asset('backend')}}/img/icons/edit.svg" class="me-2" alt="img">Supplier Edit</a>
                                                </li>
        
                                                {{-- <li>
                                                    <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#showpayment"><img src="{{asset('backend')}}/img/icons/dollar-square.svg" class="me-2" alt="img">Show Payments</a>
                                                </li> --}}

                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#createpayment"><img src="{{asset('backend')}}/img/icons/plus-circle.svg" class="me-2" alt="img">Create Payment</a>
                                                </li>
                                              
                                                <li>
                                                    {{-- <a href="{{ route('supplier.delete',$supplier->id) }}" class="dropdown-item confirm-text"><img src="{{asset('backend')}}/img/icons/delete1.svg" class="me-2" alt="img">Picker Delete</a> --}}
                                                    <a href="{{ route('supplier.delete',$supplier->id)}}" class="dropdown-item confirm-text"><img src="{{asset('backend')}}/img/icons/delete1.svg" class="me-2" alt="img">Supplier Delete</a>
                                                </li>								
                                            </ul>
                                         </td>
                                     </tr>
                                 @endforeach
                             </tbody>
                         </table>
                         {{-- {!! $suppliers->links() !!} --}}
                     </div>
                 </div>
             </div>
             <!-- /product list -->
         </div>
     </div>

     	<!-- show payment Modal -->
    <div class="modal fade" id="showpayment" tabindex="-1" aria-labelledby="showpayment" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Show Payments</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Reference</th>
                                    <th>Amount	</th>
                                    <th>Paid By	</th>
                                    <th>Paid By	</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bor-b1">
                                    <td>2022-03-07	</td>
                                    <td>INV/SL0101</td>
                                    <td>$ 0.00	</td>
                                    <td>Cash</td>
                                    <td>
                                        <a class="me-2" href="javascript:void(0);">
                                            <img src="{{asset('backend')}}/img/icons/printer.svg" alt="img">
                                        </a>
                                        <a class="me-2" href="javascript:void(0);" data-bs-target="#editpayment" data-bs-toggle="modal" data-bs-dismiss="modal" >
                                            <img src="{{asset('backend')}}/img/icons/edit.svg" alt="img">
                                        </a>
                                        <a class="me-2 confirm-text" href="javascript:void(0);">
                                            <img src="{{asset('backend')}}/img/icons/delete.svg" alt="img">
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- show payment Modal -->

    <!-- show payment Modal -->
    <div class="modal fade" id="createpayment" tabindex="-1" aria-labelledby="createpayment" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>

                <form action="{{ route('sup.payment') }}" method="post">
                    @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">

                            <div class="form-group">
                                <label>Date</label>
                                <div class="input-groupicon">
                                    <input type="date" class="form-control" name="date" value="<?php echo date("Y-m-d");?>">
                                    {{-- <div class="addonset">
                                        <img src="{{asset('backend')}}/img/icons/calendars.svg" alt="img">
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Invoice No</label>
                                <input type="text" name="reference" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Paying Amount</label>
                                <input type="text" name="paying_amount" placeholder="Enter Pay Amount" required>
                            </div>
                        </div>

                     
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-submit">Submit</button>
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- show payment Modal -->

    <!-- edit payment Modal -->
    <div class="modal fade" id="editpayment" tabindex="-1" aria-labelledby="editpayment" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Payment</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Picker</label>
                                <div class="input-groupicon">
                                    <input type="text" value="2022-03-07" class="datetimepicker">
                                    <div class="addonset">
                                        <img src="{{asset('backend')}}/img/icons/datepicker.svg" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Reference</label>
                                <input type="text" value="INV/SL0101">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Received Amount</label>
                                <input type="text" value="0.00">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Paying Amount</label>
                                <input type="text" value="0.00">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Payment type</label>
                                <select class="select">
                                    <option>Cash</option>
                                    <option>Online</option>
                                    <option>Inprogress</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group mb-0">
                                <label>Note</label>
                                <textarea class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-submit">Submit</button>
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- edit payment Modal -->

    <script>

        $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf' , 'print'
            ]
        } );

        </script>
 @endsection