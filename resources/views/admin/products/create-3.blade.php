@extends('layouts.app')
@section('content')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

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
                                <label>{{ trans('form.form.product_name') }}</label>
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

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Scan Your Product</label>
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-10">
                                        <div class="form-group">

                                            <input type="text" name="product_code" placeholder="Scan Barcode" required>

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-2 ps-0">
                                        <div class="add-icons">
                                            <span><img src="http://127.0.0.1:8000/backend/img/icons/scanners.svg"
                                                    alt="img" class="scan"></span>
                                            {{-- <a href="javascript:void(0);" class="btn btn-adds"
                                                data-bs-toggle="modal" data-bs-target="#create"><i
                                                    class="fa fa-plus me-2"></i></a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>{{ trans('form.form.category') }}</label>
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-10">
                                        <div class="form-group">

                                            <select class="select2" name="category_id" reqiued>
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
                                                    data-bs-toggle="modal" data-bs-target="#create" alt="img"></span>
                                            {{-- <a href="javascript:void(0);" class="btn btn-adds"
                                                data-bs-toggle="modal" data-bs-target="#create"><i
                                                    class="fa fa-plus me-2"></i></a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>{{ trans('form.form.sub_category') }}</label>
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-10">
                                        <div class="form-group">

                                            <select class="select2" name="subCategory_id" reqiued>
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
                                                    data-bs-toggle="modal" data-bs-target="#create" alt="img"></span>
                                            {{-- <a href="javascript:void(0);" class="btn btn-adds"
                                                data-bs-toggle="modal" data-bs-target="#create"><i
                                                    class="fa fa-plus me-2"></i></a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>{{ trans('form.form.brand') }}</label>
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-10">
                                        <div class="form-group">

                                            <select class="select2" name="brand_id">
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
                                                    data-bs-toggle="modal" data-bs-target="#create" alt="img"></span>
                                            {{-- <a href="javascript:void(0);" class="btn btn-adds"
                                                data-bs-toggle="modal" data-bs-target="#create"><i
                                                    class="fa fa-plus me-2"></i></a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>{{ trans('form.form.unit') }}</label>
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-10">
                                        <div class="form-group">

                                            <select class="select2" name="unit_id">
                                                {{-- <option>{{ trans('form.form.choose unit') }}</option> --}}
                                                <option value="">Default</option>
                                                @foreach ($units as $unit)
                                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-2 ps-0">
                                        <div class="add-icon">
                                            <span><img src="{{asset('backend')}}/img/icons/plus1.svg"
                                                    data-bs-toggle="modal" data-bs-target="#create" alt="img"></span>
                                            {{-- <a href="javascript:void(0);" class="btn btn-adds"
                                                data-bs-toggle="modal" data-bs-target="#create"><i
                                                    class="fa fa-plus me-2"></i></a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>{{ trans('form.form.warehouse') }}</label>
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-10">
                                        <div class="form-group">

                                            <select class="select2" name="warehouse_id" required>
                                                {{-- <option>{{ trans('form.form.choose warehouse') }}</option> --}}
                                                @foreach ($warehouses as $warehouse)
                                                <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-2 ps-0">
                                        <div class="add-icon">
                                            <span><img src="{{asset('backend')}}/img/icons/plus1.svg"
                                                    data-bs-toggle="modal" data-bs-target="#create" alt="img"></span>
                                            {{-- <a href="javascript:void(0);" class="btn btn-adds"
                                                data-bs-toggle="modal" data-bs-target="#create"><i
                                                    class="fa fa-plus me-2"></i></a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Supplier</label>
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-10">
                                        <div class="form-group">
                                            {{-- <label>{{ trans('form.form.supplier') }}</label> --}}

                                            <select class="select2" name="supplier_id" reqiued>
                                                {{-- <option>{{ trans('form.form.choose supplier') }}</option> --}}
                                                {{-- <option>{{ trans('form.form.choose picker') }}</option> --}}


                                                {{-- <option value="">Default</option> --}}
                                                @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-2 ps-0">
                                        <div class="add-icon">
                                            <span><img src="{{asset('backend')}}/img/icons/plus1.svg"
                                                    data-bs-toggle="modal" data-bs-target="#create" alt="img"></span>
                                            {{-- <a href="javascript:void(0);" class="btn btn-adds"
                                                data-bs-toggle="modal" data-bs-target="#create"><i
                                                    class="fa fa-plus me-2"></i></a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>{{ trans('form.form.minimum_qty') }}</label>
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-10">
                                        <div class="form-group">

                                            <input type="number" class="form-control" name="min_qty" required
                                                placeholder="{{ trans('form.form.enter minimum_qty') }}" value="5">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>{{ trans('form.form.quantity') }}</label>
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-10">
                                        <div class="form-group">

                                            <input type="number" class="form-control" name="quantity" required
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

                                            <input type="text" name="purchase_price" required
                                                placeholder="{{ trans('form.form.enter purchase price') }}">
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

                                            <input type="text" name="price" required
                                                placeholder="{{ trans('form.form.enter price') }}">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-12">
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
                                <label>{{ trans('form.form.discount') }}</label>
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-10">
                                        <div class="form-group">

                                            <select class="select2" name="discount">

                                                {{-- <option>{{ trans('form.form.select discount') }}</option> --}}

                                                <option value="0">0%</option>
                                                <option value="5">5%</option>
                                                <option value="10">10%</option>
                                                <option value="15">15%</option>
                                                <option value="20">20%</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label> {{ trans('form.form.status') }}</label>
                                <div class="row">
                                    <div class="col-lg-10 col-sm-10 col-10">
                                        <div class="form-group">

                                            <select class="select2" name="status">
                                                {{-- <option>{{ trans('form.form.select status') }}</option> --}}
                                                <option value="">Default</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-12">
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



                        <div class="col-12">
                            <button type="submit" class="btn btn-submit me-2">{{ trans('form.form.save') }}</button>
                            <a href="" class="btn btn-cancel">{{ trans('form.form.cancel') }}</a>
                        </div>







                    </div>
                </form>

            </div>
        </div> <!-- crad -->
    </div>
</div>

<script>
    $(document).ready(function () {
$(".select2").select2();
});
</script>

@endsection
