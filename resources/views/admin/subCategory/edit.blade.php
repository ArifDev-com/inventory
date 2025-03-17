@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>{{ trans('sidebar.sub_category.edit.product edit sub category') }}</h4>
                <h6>{{ trans('sidebar.sub_category.edit.edit a product sub category') }}</h6>
            </div>
            <a href="{{ route('subCategory.index') }}" class="btn btn-info">Back</a>
        </div>
        <!-- /add -->
        <div class="card">
            <div class="card-body">
                <form action="{{ route('subCategory.update', $subCategory->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Category Name</label>
                                <select class="select2" name="category_id">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $subCategory->category_id ?
                                        'selected' : '' }}>
                                        {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Sub Category Name</label>
                                <input type="text" name="name" value="{{ $subCategory->name }}" required>
                            </div>
                        </div>

                        {{-- <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>{{ trans('edit-form.sub_category.caregory_code') }}</label>
                                <input type="text" name="code" value="{{ $subCategory->code }}">
                            </div>
                        </div> --}}


                        {{-- <div class="col-lg-12">
                            <div class="form-group">
                                <label>{{ trans('edit-form.sub_category.description') }}</label>
                                <textarea class="form-control"
                                    name="description">{{ $subCategory->description }}</textarea>
                            </div>
                        </div> --}}


                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">{{ trans('edit-form.sub_category.update')
                                }}</button>
                            <a href="" class="btn btn-cancel">{{ trans('edit-form.sub_category.cancel') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /add -->
    </div>
</div>

<script>
    $(document).ready(function () {
   $(".select2").select2();
 });
</script>
@endsection
