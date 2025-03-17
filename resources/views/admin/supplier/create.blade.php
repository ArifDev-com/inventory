 @extends('layouts.app')
 @section('content')



     <div class="page-wrapper">
         <div class="content">
             <div class="page-header">
                 <div class="page-title">
                     <h4>Supplier Management</h4>
                     <h6>Add/Update Supplier</h6>
                 </div>
                 <a href="{{ route('supplier.index') }}" class="btn btn-info" >Back</a>
             </div>
             <!-- /add -->
             <div class="card">
                 <div class="card-body">
                    <form action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                     <div class="row">
                      
                             <div class="col-lg-4 col-sm-6 col-12">
                                 <div class="form-group">
                                     <label>Supplier Name</label>
                                     <input type="text" name="name" required>
                                 </div>
                             </div>
{{-- 
                             <div class="col-lg-4 col-sm-6 col-12">
                                 <div class="form-group">
                                     <label>Brand</label>
                                     <select class="" id="selectpicker" name="brand_id" value="Default">
                                      
                                        <option value="">Default</option>
                                        @foreach ($brands as $brand)
                                       
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                 </div>

                                
                             </div> --}}


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


                             {{-- <div class="col-lg-4 col-sm-6 col-12">
                                 <div class="form-group">
                                     <label>Choose Country</label>
                                     <select class="" name="country_id" >
                                         <option value="">Default</option>
                                         @foreach ($countries as $country)
                                             <option value="{{ $country->id }}">{{ $country->name }}</option>
                                         @endforeach
                                     </select>
                                 </div>
                             </div> --}}

                             
                             {{-- <div class="col-lg-4 col-sm-6 col-12">
                                 <div class="form-group">
                                     <label>City</label>
                                     <select class="" name="city_id">
                                         <option value="">Default</option>
                                         @foreach ($cities as $city)
                                             <option value="{{ $city->id }}">{{ $city->name }}</option>
                                         @endforeach
                                     </select>
                                 </div>
                             </div> --}}



                             <div class="col-lg-12 col-12">
                                 <div class="form-group">
                                     <label>Address</label>
                                     <input type="text" name="address">
                                 </div>
                             </div>


                             {{-- <div class="col-lg-12">
                             <div class="form-group">
                                 <label>Description</label>
                                 <textarea class="form-control" ></textarea>
                             </div>
                         </div>
                         <div class="col-lg-12">
                             <div class="form-group">
                                 <label> Avatar</label>
                                 <div class="image-upload">
                                     <input type="file">
                                     <div class="image-uploads">
                                         <img src="assets/img/icons/upload.svg" alt="img">
                                         <h4>Drag and drop a file to upload</h4>
                                     </div>
                                 </div>
                             </div>
                         </div> --}}
                             <div class="col-lg-12">
                                 <button type="submit" class="btn btn-submit me-2">Save</button>
                                 <a href="" class="btn btn-cancel">Cancel</a>
                             </div>
                     </div>
                    </form>
                 </div>
             </div>
             <!-- /add -->
         </div>
     </div>

     
     
    
 @endsection
