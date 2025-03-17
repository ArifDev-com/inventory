@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<style>
    .add-icons {
        margin-left: -44px !important;
        margin-top: 5px !important;
    }

    .scan {
        height: 28px;
    }
</style>



<div class="page-wrapper">
    <div class="content">


        <div class="page-header">
            <div class="page-title">
                <h4>{{ trans('sidebar.product.create.product create') }}</h4>
                <h6>{{ trans('sidebar.product.create.add your product') }}</h6>
            </div>
            <a href="{{ route('product.index') }}" class="btn btn-info">{{ trans('sidebar.product.create.back') }}</a>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>
                                    {{ trans('form.form.product_name') }}
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-10">
                                        <div class="form-group">

                                            <input type="text" name="name"
                                                placeholder="{{ trans('form.form.enter product name') }}" required>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>



                        <div class="col-lg-3 col-sm-6 col-12 d-none">
                            <div class="form-group">
                                <label>Product Code</label>
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-10">
                                        <div class="form-group">

                                            <input type="text" name="product_code" placeholder="Product Code"
                                                ID="ACCOUNT">

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-2 ps-0">
                                        <div class="add-icons">
                                            <span><img src="{{asset('backend')}}/img/icons/scanners.svg" alt="img"
                                                    class="scan"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="col-lg-3 col-sm-6 col-12  d-none">
                            <div class="form-group">
                                <label>{{ trans('form.form.category') }}</label>
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-10">
                                        <div class="form-group">
                                            <select class="select2 " name="category_id" reqiued>
                                                {{-- <option>{{ trans('form.form.choose category') }}</option> --}}
                                                <option value="">Default</option>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-2 ps-0">
                                        <div class="add-icon">
                                            <span><img src="{{asset('backend')}}/img/icons/plus1.svg"
                                                    data-bs-toggle="modal" data-bs-target="#category" alt="img"></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12  d-none">
                            <div class="form-group">
                                <label>{{ trans('form.form.sub_category') }}</label>
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-10">
                                        <div class="form-group">
                                            <select class="select2 " name="subCategory_id" reqiued>
                                                {{-- <option>{{ trans('form.form.choose subCategory') }}</option> --}}
                                                <option value="">Default</option>
                                                @foreach ($subCategories as $subCategory)
                                                <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-2 ps-0">
                                        <div class="add-icon">
                                            <span><img src="{{asset('backend')}}/img/icons/plus1.svg"
                                                    data-bs-toggle="modal" data-bs-target="#subcategory"
                                                    alt="img"></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6 col-12  d-none">
                            <div class="form-group">
                                <label>{{ trans('form.form.brand') }}</label>
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-10">
                                        <div class="form-group">
                                            <select class="select2 " name="brand_id">
                                                {{-- <option>{{ trans('form.form.choose brand') }}</option> --}}
                                                <option value="">Default</option>
                                                @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-2 ps-0">
                                        <div class="add-icon">
                                            <span><img src="{{asset('backend')}}/img/icons/plus1.svg"
                                                    data-bs-toggle="modal" data-bs-target="#brand" alt="img"></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6 col-12  d-none">
                            <div class="form-group">
                                <label>{{ trans('form.form.unit') }}</label>
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-10">
                                        <div class="form-group">
                                            <select class="select2 " name="unit_id">
                                                {{-- <option>{{ trans('form.form.choose unit') }}</option> --}}
                                                {{-- <option value="">Default</option> --}}
                                                @foreach ($units as $unit)
                                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-2 ps-0">
                                        <div class="add-icon">
                                            <span><img src="{{asset('backend')}}/img/icons/plus1.svg"
                                                    data-bs-toggle="modal" data-bs-target="#unit" alt="img"></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4 col-sm-6 col-12 d-none">
                            <div class="form-group">
                                <label>{{ trans('form.form.minimum_qty') }}</label>
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-10">
                                        <div class="form-group">

                                            <input type="number" class="form-control" name="min_qty"
                                                placeholder="{{ trans('form.form.enter minimum_qty') }}" value="5">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Opening Quantity</label>
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-10">
                                        <div class="form-group">

                                            <input type="number" class="form-control" name="quantity"
                                                placeholder="{{ trans('form.form.enter quantity') }}" value="0">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Stock Alert</label>
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-10">
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="alert_quantity"
                                                placeholder="{{ trans('form.form.enter quantity') }}" value="0">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>{{ trans('form.form.purchase_price') }}</label>
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-10">
                                        <div class="form-group">
                                            <input type="text" name="purchase_price"
                                                placeholder="{{ trans('form.form.enter purchase price') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Wholesale Price</label>
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-10">
                                        <div class="form-group">
                                            <input type="text" name="wholesale_price" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Retail Price</label>
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-10">
                                        <div class="form-group">
                                            <input type="text" name="retail_price" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>MRP Price</label>
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-10">
                                        <div class="form-group">

                                            <input type="text" name="price"
                                                placeholder="{{ trans('form.form.enter price') }}">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label> {{ trans('form.form.product image') }}</label>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">

                                            <div class="image-upload">
                                                <input type="file" name="image">
                                                <div class="image-uploads">
                                                    <img src="{{ asset('backend') }}/img/icons/upload.svg" alt="img">
                                                    <h4>{{ trans('form.form.drag and drop a file to upload') }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>{{ trans('form.form.description') }}</label>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">

                                            <textarea class="form-control" name="description"
                                                placeholder="{{ trans('form.form.enter description') }}"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="active" selected>Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-12">
                            <button type="submit" class="btn btn-submit me-2">{{ trans('form.form.save') }}</button>
                            <a href="" class="btn btn-cancel">{{ trans('form.form.cancel') }}</a>
                        </div>


                    </div> <!-- row -->



                </form>
            </div>
        </div>

    </div>
</div>

{{-- Category modal here --}}
<div class="modal fade" id="category" tabindex="-1" aria-labelledby="category" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Category</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <form action="{{ route('category.store') }}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>{{ trans('form.category.category_name') }}</label>
                                <input type="text" name="name"
                                    placeholder="{{ trans('form.category.enter category name') }}">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

{{-- Subcategory modal here --}}
<div class="modal fade" id="subcategory" tabindex="-1" aria-labelledby="subcategory" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sub Category</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('subCategory.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>{{ trans('form.sub_category.parent category') }}</label>
                                <select class="select2 " name="category_id">
                                    <option>{{ trans('form.sub_category.choose category') }}</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Sub Category Name</label>
                                <input type="text" name="name" placeholder="Enter Sub Category Name" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-submit me-2">Submit</button>
                        <a href="" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Brand modal here --}}
<div class="modal fade" id="brand" tabindex="-1" aria-labelledby="brand" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Brand</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('brand.store') }}" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>{{ trans('form.brand.brand_name') }}</label>
                                <input type="text" name="name" placeholder="{{ trans('form.brand.enter brand name') }}">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-submit me-2">Submit</button>
                        <a href="" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

{{-- Unit modal here --}}
<div class="modal fade" id="unit" tabindex="-1" aria-labelledby="unit" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Unit</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('unit.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>{{ trans('form.unit.unit_name') }}</label>
                                <input type="text" name="name" placeholder="{{ trans('form.unit.enter unit name') }}">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-submit me-2">Submit</button>
                        <a href="" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



{{-- Warehouse modal here --}}
<div class="modal fade" id="warehouse" tabindex="-1" aria-labelledby="warehouse" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Warehouse</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('warehouse.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Warehouse Name</label>
                                <input type="text" name="name" required>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email">
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone">
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-submit me-2">Submit</button>
                        <a href="" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Supplier modal here --}}
<div class="modal fade" id="supplier" tabindex="-1" aria-labelledby="supplier" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Supplier</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('supplier.store.modal') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Supplier Name</label>
                                <input type="text" name="name" required>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email">
                            </div>
                        </div>


                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone">
                            </div>
                        </div>

                        <div class="col-lg-12 col-12">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-submit me-2">Submit</button>
                        <a href="" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                    </div>

                </form>


            </div>
        </div>
    </div>
</div>


<script>
    function randomNumber(len) {
    var randomNumber;
    var n = '';

    for (var count = 0; count < len; count++) {
        randomNumber = Math.floor(Math.random() * 10);
        n += randomNumber.toString();
    }
    return n;
    }

    document.getElementById("ACCOUNT").value = randomNumber(9);
</script>


<script>
    $(document).ready(function () {
$(".select2").select2();
});
</script>

@if(Session::has('success'))
<script>
    toastr.success("{{Session::get('success')}}");
</script>
@endif

@endsection
