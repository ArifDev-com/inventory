 @extends('layouts.app')
 @section('content')

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
 
     <div class="page-wrapper">
         <div class="content">
             <div class="page-header">
                 <div class="page-title">
                     <h4>Supplier Management</h4>
                     <h6>Edit/Update Supplier</h6>
                 </div>
                 <a href="{{ route('supplier.index') }}" class="btn btn-info" >Back</a>
             </div>
             <!-- /add -->
             <div class="card">
                 <div class="card-body">
                    <form action="{{ route('supplier.update', $supplier->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                     <div class="row">
                     
                             <div class="col-lg-4 col-sm-6 col-12">
                                 <div class="form-group">
                                     <label>Supplier Name</label>
                                     <input type="text" name="name" value="{{ $supplier->name }}">
                                 </div>
                             </div>


                             {{-- <div class="col-lg-4 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Brand</label>
                                    <select class="select" name="brand_id">
                                        <option value="">Default</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"
                                                {{ $brand->id == $supplier->brand_id ? 'selected' : '' }}>
                                                {{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Brand</label>
                                    <select class="" name="brand_id">
                                        <option value="">Default</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"
                                            >
                                                {{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}


                             <div class="col-lg-4 col-sm-6 col-12">
                                 <div class="form-group">
                                     <label>Email</label>
                                     <input type="text" name="email" value="{{ $supplier->email }}">
                                 </div>
                             </div>

                             <div class="col-lg-4 col-sm-6 col-12">
                                 <div class="form-group">
                                     <label>Phone</label>
                                     <input type="text" name="phone" value="{{ $supplier->phone }}">
                                 </div>
                             </div>



                             {{-- <div class="col-lg-4 col-sm-6 col-12">
                                 <div class="form-group">
                                     <label>Choose Country</label>
                                     <select class="select" name="country_id">
                                        <option value="">Default</option>
                                         @foreach ($countries as $country)
                                             <option value="{{ $country->id }}"
                                                 {{ $country->id == $supplier->country_id ? 'selected' : '' }}>
                                                 {{ $country->name }}</option>
                                         @endforeach
                                     </select>
                                 </div>

                                 <div class="form-group">
                                    <label>Choose Country</label>
                                    <select class="" name="country_id">
                                       <option value="">Default</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                              >
                                                {{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                             </div> --}}





{{--                              
                             <div class="col-lg-4 col-sm-6 col-12">
                                 <div class="form-group">
                                     <label>City</label>
                                     <select class="select" name="city_id">
                                        <option value="">Default</option>
                                         @foreach ($cities as $city)
                                             <option value="{{ $city->id }}"
                                                 {{ $city->id == $supplier->city_id ? 'selected' : '' }}>
                                                 {{ $city->name }}</option>
                                         @endforeach
                                     </select>
                                 </div>

                                 <div class="form-group">
                                    <label>City</label>
                                    <select class="" name="city_id">
                                       <option value="">Default</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}"
                                                >
                                                {{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                             </div> --}}


                             <div class="col-lg-12 col-12">
                                 <div class="form-group">
                                     <label>Address</label>
                                     <input type="text" name="address" value="{{ $supplier->address }}">
                                 </div>
                             </div>

                             {{-- <div class="col-lg-12">
                             <div class="form-group">
                                 <label>Description</label>
                                 <textarea class="form-control">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text </textarea>
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
                                 <button type="submit" class="btn btn-submit me-2">Update</button>
                                 <a href="" class="btn btn-cancel">Cancel</a>
                             </div>
                     </div>
                    </form>
                 </div>
             </div>
             <!-- /add -->
         </div>
     </div>

     <script>
        $('select').select2({ width: '100%', placeholder: "Default", allowClear: true });
   
        
       </script>
 @endsection
