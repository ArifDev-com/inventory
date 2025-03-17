 @extends('layouts.app')
 @section('content')
     <div class="page-wrapper">
         <div class="content">
             <div class="page-header">
                 <div class="page-title">
                     <h4>{{ trans('sidebar.brand.edit.brand edit') }}</h4>
                     <h6>{{ trans('sidebar.brand.edit.update your brand') }}</h6>
                 </div>
                 <a href="{{ route('brand.index') }}" class="btn btn-info" >Back</a>
             </div>
             <!-- /add -->
             <div class="card">
                 <div class="card-body">
                    <form action="{{ route('brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                     <div class="row">
                       
                             <div class="col-lg-3 col-sm-6 col-12">
                                 <div class="form-group">
                                     <label>{{ trans('edit-form.brand.brand_name') }}</label>
                                     <input type="text" name="name" value="{{ $brand->name }}">
                                 </div>
                             </div>


                             {{-- <div class="col-lg-9 ">
                                 <div class="form-group">
                                     <label>{{ trans('edit-form.brand.description') }}</label>
                                     <input type="text" name="description" value="{{ $brand->description }}">
                                
                                 </div>
                             </div> --}}


                             <div class="col-lg-12 d-none">
                                 <div class="form-group">
                                     <label>{{ trans('edit-form.brand.product image') }}</label>
                                     <div class="image-upload">
                                         <input type="file" name="image">
                                         <div class="image-uploads">
                                             <img src="{{ asset('backend') }}/img/icons/upload.svg" alt="img">
                                             <h4>{{ trans('edit-form.brand.drag and drop a file to upload') }}</h4>
                                         </div>
                                     </div>
                                 </div>
                             </div>


                             <div class="col-12 d-none">
                                 <div class="product-list">
                                     <ul class="row">
                                         <li>
                                             <div class="productviews">
                                                 <div class="productviewsimg">
                                                     <img src="{{ asset($brand->image) }}" alt="img">
                                                 </div>
                                                 <div class="productviewscontent">
                                                     <div class="productviewsname">
                                                         <h2>{{ $brand->name }}</h2>
                                                         <h3>581kb</h3>
                                                     </div>
                                                     <a href="javascript:void(0);">x</a>
                                                 </div>
                                             </div>
                                         </li>
                                     </ul>
                                 </div>
                             </div>


                             <div class="col-lg-12">
                                 <button type="submit" class="btn btn-submit me-2">{{ trans('edit-form.brand.update') }}</button>
                                 <a href="" class="btn btn-cancel">{{ trans('edit-form.brand.cancel') }}</a>
                             </div>
                        
                     </div>
                    </form>
                 </div>
             </div>
             <!-- /add -->
         </div>
     </div>
 @endsection
