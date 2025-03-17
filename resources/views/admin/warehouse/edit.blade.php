 @extends('layouts.app')
 @section('content')
     <div class="page-wrapper">
         <div class="content">
             <div class="page-header">
                 <div class="page-title">
                     <h4>Warehouse Management</h4>
                     <h6>Edit/Update Warehouse</h6>
                 </div>
                 <a href="{{ route('warehouse.index') }}" class="btn btn-info" >Back</a>
             </div>
             <!-- /add -->
             <div class="card">
                 <div class="card-body">
                    <form action="{{ route('warehouse.update', $warehouse->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                     <div class="row">
                             <div class="col-lg-3 col-sm-6 col-12">
                                 <div class="form-group">
                                     <label>Warehouser Name</label>
                                     <input type="text" name="name" value="{{ $warehouse->name }}" required>
                                 </div>
                             </div>
                             <div class="col-lg-3 col-sm-6 col-12">
                                 <div class="form-group">
                                     <label>Email</label>
                                     <input type="text" name="email" value="{{ $warehouse->email }}">
                                 </div>
                             </div>
                             <div class="col-lg-3 col-sm-6 col-12">
                                 <div class="form-group">
                                     <label>Phone</label>
                                     <input type="text" name="phone" value="{{ $warehouse->phone }}">
                                 </div>
                             </div>
                             {{-- <div class="col-lg-3 col-sm-6 col-12">
                                 <div class="form-group">
                                     <label>Choose Country</label>
                                     <select class="select">
                                         <option>United States</option>
                                         <option>India</option>
                                     </select>
                                 </div>
                             </div> --}}


        {{-- <div class="col-lg-3 col-sm-6 col-12">
            <div class="form-group">
                <label>City</label>
                <select class="select" name="city_id">
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}"
                            {{ $city->id == $warehouse->city_id ? 'selected' : '' }}>
                            {{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
        </div> --}}

        {{-- <div class="col-lg-3 col-sm-6 col-12">
            <div class="form-group">
                <label>Zip Code</label>
                <input type="text" name="zip_code" value="{{ $warehouse->zip_code }}">
            </div>
        </div> --}}


                             <div class="col-lg-9 col-12">
                                 <div class="form-group">
                                     <label>Address</label>
                                     <input type="text" name="address" value="{{ $warehouse->address }}">
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
 @endsection
