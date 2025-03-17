@php
   
    $admin = \Auth::check() && \Auth::id() == 2;
@endphp

@if($admin)



   
@extends('layouts.app_admin')
@section('content')

<div class="page-wrapper">
        <div class="content">

        @php 
            $user_data = DB::table('users')->get();
           
        @endphp

        <div class="row">

        @foreach($user_data as $key=>$row)
            <div class="col-md-4">
            <div class="card p-3 shadow" >
            
                <span><b style="font-weight: bold;">Name:</b> <span class="badge text-badge" style="background-color: red; font-size: 13px;">{{ $key+1}}:) {{ $row->first_name}} {{ $row->last_name}}</span></span>
               
        @php 
            $user_id = $row->id;
            $company_name = DB::table('shop_documents')->where('user_id',$user_id)->first();
        @endphp

                <span class="mt-2"><b style="font-weight: bold;">Company Name:</b> <span class="badge text-badge" style="background-color: green;  font-size: 13px;">{{ $company_name->name}} </span></span>

                <span class="mt-2"><b style="font-weight: bold;">Phone number:</b> <span class="badge text-badge" style="background-color: green;  font-size: 13px;">{{ $row->phone}} </span></span>
                <hr>

                @php
      
      $endDate = \Carbon\Carbon::parse($row->end_date);
      $daysRemaining = $endDate->diffInDays(\Carbon\Carbon::now());

      $formattedStartDate = \Carbon\Carbon::parse($row->start_date)->format('d/m/Y');
  $formattedEndDate = \Carbon\Carbon::parse($row->end_date)->format('d/m/Y');
  @endphp

                <span class="mt-2"><b style="font-weight: bold;">Start Date:</b> <span class="badge text-badge" style="background-color: green;  font-size: 13px;">{{ $formattedStartDate}} </span></span>
                <span class="mt-2"><b style="font-weight: bold;">End Date:</b> <span class="badge text-badge" style="background-color: green;  font-size: 13px;">{{ $formattedEndDate}} </span></span> 

                <span class="mt-2"><b style="font-weight: bold;">Remaining Days:</b> <span class="badge text-badge" style="background-color: green;  font-size: 13px;">{{ $daysRemaining}} </span></span> 

                <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    @if($row->status == 1)
                    <a  class="btn btn-primary">Active</a>
                    @else($row->status == 0)
                    <a  class="btn btn-warning">Pending</a>
                    @endif
                </div>
            </div>
            
            </div>

          
            </div>
        @endforeach

        </div>

        </div>
</div>


@endsection

@else
  
@endif