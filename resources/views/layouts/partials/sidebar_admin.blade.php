@php
   
    $admin = \Auth::check() && \Auth::id() == 2;
@endphp

@if($admin)

<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                

                <li >
                    <a href="{{ route('super.home') }}" ><img  src="{{asset('backend')}}/img/icons/dashboard.svg" alt="img"><span> {{ trans('sidebar.dashboard.menu_name') }}</span> </a>
                </li>
         

            </ul>
        </div>
    </div>
</div>

@else
  
@endif