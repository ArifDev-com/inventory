@extends('layouts.app')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>{{ trans('sidebar.category.create.product add category') }}</h4>
                    <h6>{{ trans('sidebar.category.create.create new product category') }}</h6>
                </div>
            <a href="{{ route('category.index') }}" class="btn btn-info" >Back</a>

           

            </div>
            <!-- /add -->
            <div class="card">
                <div class="card-body">

                   

                   {{-- @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success')}}
                    </div>
                   @endif --}}



                    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                       
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>{{ trans('form.category.category_name') }}</label>
                                    <input type="text" name="name" placeholder="{{ trans('form.category.enter category name') }}">
                                </div>
                            </div>

            {{-- <div class="col-lg-6 col-sm-6 col-12">
                <div class="form-group">
                    <label>{{ trans('form.category.category_code') }}</label>
                    <input type="text" name="code" placeholder="{{ trans('form.category.enter category code') }}">
                </div>
            </div> --}}

        {{-- <div class="col-lg-12">
            <div class="form-group">
                <label>{{ trans('form.category.description') }}</label>
                <textarea class="form-control" name="description" placeholder="{{ trans('form.category.enter description') }}"></textarea>
            </div>
        </div> --}}




                            {{-- <div class="col-lg-12">
                                <div class="form-group">
                                    <label>{{ trans('form.category.product image') }}</label>
                                    <div class="image-upload">
                                        <input type="file" name="image">
                                        <div class="image-uploads">
                                            <img src="{{ asset('backend') }}/img/icons/upload.svg" alt="img">
                                            <h4>{{ trans('form.category.drag and drop a file to upload') }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">{{ trans('form.category.save') }}</button>
                                <a href="" class="btn btn-cancel">{{ trans('form.category.cancel') }}</a>
                            </div>
                
                    </div>
                </form>
                </div>
            </div>
            <!-- /add -->
        </div>
    </div>

    @if(Session::has('success'))
    <script>
        toastr.success("{{Session::get('success')}}");
    </script>
   
    @endif
     
   
@endsection
