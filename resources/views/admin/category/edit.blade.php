 @extends('layouts.app')
 @section('content')
     <div class="page-wrapper">
         <div class="content">
             <div class="page-header">
                 <div class="page-title">
                     <h4>{{ trans('sidebar.category.edit.product edit category') }}</h4>
                     <h6>{{ trans('sidebar.category.edit.edit a product category') }}</h6>
                 </div>
                 <a href="{{ route('category.index') }}" class="btn btn-info" >Back</a>
             </div>
             <!-- /add -->
             <div class="card">
                 <div class="card-body">
                    <form action="{{ route('category.update', $category->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                     <div class="row">
                    
                             <div class="col-lg-6 col-sm-6 col-12">
                                 <div class="form-group">
                                     <label>{{ trans('edit-form.category.category_name') }}</label>
                                     <input type="text" name="name" value="{{ $category->name }}">
                                 </div>
                             </div>

        {{-- <div class="col-lg-6 col-sm-6 col-12">
            <div class="form-group">
                <label>{{ trans('edit-form.category.category_code') }}</label>
                <input type="text" name="code" value="{{ $category->code }}">
            </div>
        </div>
         --}}

        {{-- <div class="col-lg-12">
            <div class="form-group">
                <label>{{ trans('edit-form.category.description') }}</label>
                <textarea class="form-control" name="description">{{ $category->description }}</textarea>
            </div>
        </div> --}}

                             {{-- <div class="col-lg-12">
                                 <div class="form-group">
                                     <label>{{ trans('edit-form.category.product image') }}</label>
                                     <div class="image-upload">
                                         <input type="file" name="image">
                                         <div class="image-uploads">
                                             <img src="{{ asset('backend') }}/img/icons/upload.svg" alt="img">
                                             <h4>{{ trans('edit-form.category.drag and drop a file to upload') }}</h4>
                                         </div>
                                     </div>
                                 </div>
                             </div> --}}
                             
{{-- 
                             <div class="col-12">
                                 <div class="product-list">
                                     <ul class="row">
                                         <li class="ps-0">
                                             <div class="productviews">
                                                 <div class="productviewsimg">
                                                 <img src="{{ asset('upload/category/'.$category->image) }}" alt="img">
                                                 </div>
                                                 <div class="productviewscontent">
                                                     <div class="productviewsname">
                                                         <h2>{{ $category->name }}</h2>
                                                         <h3>581kb</h3>
                                                     </div>
                                                     <a href="javascript:void(0);" class="hideset">x</a>
                                                 </div>
                                             </div>
                                         </li>
                                     </ul>
                                 </div>
                             </div> --}}

                             <div class="col-lg-12">
                                 <button type="submit" class="btn btn-submit me-2">{{ trans('edit-form.category.update') }}</button>
                                 <a href="" class="btn btn-cancel">{{ trans('edit-form.category.cancel') }}</a>
                             </div>
                     </div>
                    </form>
                 </div>
             </div>
             <!-- /add -->
         </div>
     </div>
 @endsection
