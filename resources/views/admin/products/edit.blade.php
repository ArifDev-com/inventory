@extends('layouts.app')
@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>{{ trans('sidebar.product.edit.product edit') }}</h4>
                    <h6>{{ trans('sidebar.product.edit.update your product') }}</h6>
                </div>
                <a href="{{ route('product.index') }}" class="btn btn-info">{{ trans('sidebar.product.edit.back') }}</a>
            </div>
            <!-- /add -->
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Code</label>
                                    <input type="text" readonly value="{{ $product->code }}">
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>{{ trans('edit-form.form.product_name') }}</label>
                                    <input type="text" name="name" value="{{ $product->name }}">
                                </div>
                            </div>


                            <div class="col-lg-4 col-sm-6 col-12 ">
                                <div class="form-group">
                                    <label>Stock Alert</label>
                                    <input type="text" name="alert_quantity" value="{{ $product->alert_quantity }}">
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>{{ trans('edit-form.form.purchase_price') }}</label>
                                    <input type="text" name="purchase_price" value="{{ $product->purchase_price }}">
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Wholesale Price</label>
                                    <input type="text" name="wholesale_price" value="{{ $product->wholesale_price }}">
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Retail Price</label>
                                    <input type="text" name="retail_price" value="{{ $product->retail_price }}">
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>MRP Price</label>
                                    <input type="text" name="price" value="{{ $product->price }}">
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>{{ trans('edit-form.form.product image') }}</label>
                                    <div class="image-upload">
                                        <input type="file" name="image">
                                        <div class="image-uploads">
                                            <img src="{{ asset('backend') }}/img/icons/upload.svg" alt="img">
                                            <h4>{{ trans('edit-form.form.drag and drop a file to upload') }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>{{ trans('edit-form.form.description') }}</label>
                                    <textarea class="form-control" name="description" placeholder="{{ trans('form.form.enter description') }}">{{ $product->description }}</textarea>
                                </div>
                            </div>





                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive" {{ $product->status == 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="product-list">
                                    <ul class="row">
                                        <li>
                                            <div class="productviews">
                                                <div class="productviewsimg">
                                                    @if ($product->image)
                                                        <img src="{{ asset($product->image) }}" alt="img">
                                                    @else
                                                        <img src="{{ asset('backend\img\img-01.jpg') }}" alt="product">
                                                    @endif
                                                </div>
                                                <div class="productviewscontent">
                                                    <div class="productviewsname">

                                                        <h2>{{ $product->name }}</h2>
                                                        <h3>581kb</h3>
                                                    </div>
                                                    <a href="javascript:void(0);" class="hideset">x</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>









                            <div class="col-lg-12">
                                <button type="submit"
                                    class="btn btn-submit me-2">{{ trans('edit-form.form.update') }}</button>
                                <a href="" class="btn btn-cancel">{{ trans('edit-form.form.cancel') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /add -->
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(".select2").select2();
        });
    </script>
@endsection
