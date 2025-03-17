 @extends('layouts.app')
 @section('content')

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


     <div class="page-wrapper">
         <div class="content">
             <div class="page-header">
                 <div class="page-title">
                     <h4>{{ trans('sidebar.unit.create.unit add') }}</h4>
                     <h6>{{ trans('sidebar.unit.create.create new unit') }}</h6>
                 </div>
                 <a href="{{ route('unit.index') }}" class="btn btn-info" >Back</a>
             </div>
             <!-- /add -->
             <div class="card">
                 <div class="card-body">
                     <div class="row">
                         <form action="{{ route('unit.store') }}" method="POST" enctype="multipart/form-data">
                             @csrf
                             <div class="col-lg-3 col-sm-6 col-12">
                                 <div class="form-group">
                                     <label>{{ trans('form.unit.unit_name') }}</label>
                                     <input type="text" name="name" placeholder="{{ trans('form.unit.enter unit name') }}">
                                 </div>
                             </div>

                             <div class="col-lg-12">
                                 <button type="submit" class="btn btn-submit me-2">{{ trans('form.unit.save') }}</button>
                                 <a href="" class="btn btn-cancel">{{ trans('form.unit.cancel') }}</a>
                             </div>
                         </form>
                     </div>
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
