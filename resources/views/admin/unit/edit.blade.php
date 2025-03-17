 @extends('layouts.app')
 @section('content')
     <div class="page-wrapper">
         <div class="content">
             <div class="page-header">
                 <div class="page-title">
                     <h4>{{ trans('sidebar.unit.edit.unit edit') }}</h4>
                     <h6>{{ trans('sidebar.unit.edit.update your unit') }}</h6>
                 </div>
                 <a href="{{ route('unit.index') }}" class="btn btn-info" >Back</a>
             </div>
             <!-- /add -->
             <div class="card">
                 <div class="card-body">
                     <div class="row">
                         <form action="{{ route('unit.update', $unit->id) }}" method="POST" enctype="multipart/form-data">
                             @csrf
                             <div class="col-lg-3 col-sm-6 col-12">
                                 <div class="form-group">
                                     <label>{{ trans('edit-form.unit.unit_name') }}</label>
                                     <input type="text" name="name" value="{{ $unit->name }}">
                                 </div>
                             </div>
                             <div class="col-lg-12">
                                 <button type="submit" class="btn btn-submit me-2">{{ trans('edit-form.unit.update') }}</button>
                                 <a href="brandlist.html" class="btn btn-cancel">{{ trans('edit-form.unit.cancel') }}</a>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
             <!-- /add -->
         </div>
     </div>
 @endsection
