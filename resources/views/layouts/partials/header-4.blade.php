<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .modal1 {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        opacity: 0;
        visibility: hidden;
        transform: scale(1.1);
        transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
    }

    .modal-content1 {
        position: absolute;
        top: 25%;
        left: 88%;
        transform: translate(-50%, -50%);
        background-color: rgb(255, 255, 255);
        /* padding: 2rem 2.5rem; */
        /* width: 30em; */
        padding: 1rem;
        border-radius: 0.5rem;

    }

    .close-button1 {
        float: right;
        width: 1.5rem;
        font-size: 1.2em;
        line-height: 1;
        padding: 0 .2em .15em;
        text-align: center;
        cursor: pointer;
        border-radius: 0.25rem;
        background-color: var(--clr-neutral);
        color: var(--clr-dark);
        transition: color 0.12s ease-in-out;
    }

    .close-button1:hover {
        color: var(--clr-main);
    }

    .show-modal1 {
        opacity: 1;
        visibility: visible;
        transform: scale(1.0);
        transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
    }


    .hcenter {
        text-align: center;
    }

    .table1 {
        border-collapse: collapse;
        border-radius: 5px;
    }

    .table1.center1 {
        margin-left: auto;
        margin-right: auto;
    }

    .td1,
    th {
        border: 1px solid #eee;
        text-align: left;
        /* Uncomment below and see */
        /* background-color: #eee; */
        padding: 8px;
    }

    input[type="button"] {
        background-color: #eee;
        color: #111;
        width: 100%;
        border-radius: 5px;
    }

    input[type="text"] {
        background-color: white;
        width: 95%;
        border-radius: 5px;
    }

    #toggle_btn {
        background: #fff;
        border-radius: 30px;
    }
</style>


<div class="header">

    @php
    $logo = App\Models\ShopDocument::get();
    @endphp

    <!-- Logo -->
    <div class="header-left active">
        <a href="{{ route('home') }}" class="logo logo-normal">
            {{-- <img src="{{asset('backend')}}/img/sherazi pos.png" style="height:55px; margin-left: 15px;" alt="">
            --}}
            @foreach($logo as $item)
            {{-- <img src="{{ asset($item->image) }}" style="height:55px; margin-left: 15px;" alt=""> --}}
            <h4 style="color: beige; font-weight: bold; font-family: 'Roboto', sans-serif; padding-top: 6px;">{{
                $item->name }}</h4>
            @endforeach
        </a>
        {{-- <a href="{{ route('home') }}" class="logo logo-white">
            <img src="{{asset('backend')}}/img/logo-white.png" alt="">
        </a>
        <a href="{{ route('home') }}" class="logo-small">
            <img src="{{asset('backend')}}/img/logo-small.png" alt="">
        </a> --}}
        <a id="toggle_btn" href="javascript:void(0);">
        </a>
    </div>
    <!-- /Logo -->

    <div class="d-none d-sm-block">

        <p style="font-size: 19px;
        padding: 16px;
        color: #fff;
        padding-left: 24px;
        align-items: center !important;
        /* padding-right: 502px; */
        align-items: initial;
        alignment-baseline: middle;
        float: left;"><i class="fa-solid fa-clock"></i> <span id="printDay"></span>, <span id="printDate"> </span>,
            <span id="printTime"></span>
        </p>

        <!-- <div class="">
  <div class="date" id="printDate"></div>
  <div class="date" id="printDay"></div>
  <div class="date" id="printTime"></div>
</div> -->

    </div>

    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <!-- Header Menu -->
    <ul class="nav user-menu">

        <!-- Search -->
        <li class="nav-item">
            <div class="top-nav-search">

                <a href="javascript:void(0);" class="responsive-search">
                    <i class="fa fa-search"></i>
                </a>


                {{-- <form action="#">
                    <div class="searchinputs">
                        <input type="text" placeholder="Search Here ...">
                        <div class="search-addon">
                            <span><img src="{{asset('backend')}}/img/icons/closes.svg" alt="img"></span>
                        </div>
                    </div>
                    <a class="btn" id="searchdiv"><img src="{{asset('backend')}}/img/icons/search.svg" alt="img"></a>
                </form> --}}


            </div>
        </li>
        <!-- /Search -->

        <!-- Flag -->
        <li class="nav-item dropdown has-arrow flag-nav mt-2">
            {{-- <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
                <img src="{{asset('backend')}}/img/flags/us1.png" alt="" height="20">
            </a> --}}
            {{-- <div class="dropdown-menu dropdown-menu-right"> --}}
                {{-- <a href="javascript:void(0);" class="dropdown-item">
                    <img src="{{asset('backend')}}/img/flags/us.png" alt="" height="16"> English
                </a>
                <a href="javascript:void(0);" class="dropdown-item">
                    <img src="{{asset('backend')}}/img/flags/fr.png" alt="" height="16"> Bangla
                </a> --}}

                {{-- <select class="form-control changeLang">
                    <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                    <option value="bn" {{ session()->get('locale') == 'bn' ? 'selected' : '' }}>Bangla</option>
                </select> --}}

                {{--
            </div> --}}

            <button class="btn trigger1 btn-primary d-none">Calculator</button>

        </li>

        <!-- Notifications -->

        @php
        // Assuming 'min_qty' is the column you want to use in the comparison
        // $minQty = Illuminate\Support\Facades\DB::table('products')->value('min_qty');

        // Retrieve products where 'quantity' is greater than 'min_qty'
        // $product = Illuminate\Support\Facades\DB::table('products')->where('min_qty', '<', 10)->get();
            $product = Illuminate\Support\Facades\DB::table('products')
            ->where('min_qty', '>', Illuminate\Support\Facades\DB::raw('quantity'))
            ->get();


            $product_list = Illuminate\Support\Facades\DB::table('products')
            ->where('min_qty', '>', Illuminate\Support\Facades\DB::raw('quantity'))
            ->get();

            $product_count = $product_list->count();
            @endphp

            <li class="nav-item dropdown">
                <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                    <img src="{{asset('backend')}}/img/icons/notification-bing.svg" alt="img">
                    <span class="badge rounded-pill">{{ $product_count}}</span>
                </a>


                <div class="dropdown-menu notifications">
                    <div class="topnav-dropdown-header">
                        <span class="notification-title">Notifications</span>
                        {{-- <a href="javascript:void(0)" class="clear-noti"> Clear All </a> --}}
                    </div>

                    {{-- @foreach($product as $item)
                    {{ $item->name }}
                    @endforeach --}}

                    <div class="noti-content">
                        <ul class="notification-list">
                            @foreach($product as $item)
                            <li class="notification-message">
                                <a>
                                    <div class="media d-flex">
                                        <span class="avatar flex-shrink-0">

                                            {{-- <img alt="" src="{{asset('backend')}}/img/profiles/avatar-02.jpg"> --}}
                                            @if($item->image)
                                            <img src="{{ asset($item->image) }}" alt="product">
                                            @else
                                            <img src="{{ asset('backend\img\img-01.jpg')}}" alt="product">
                                            @endif
                                        </span>

                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details"><span class="noti-title">{{ $item->name
                                                    }}<sup><code>{{ $item->quantity }}</code></sup> | {{
                                                    $item->product_code }}</p>

                                        </div>

                                        {{-- <div class="media-body flex-grow-1">
                                            <p class="noti-details"><span class="noti-title">John Doe</span> added new
                                                task <span class="noti-title">Patient appointment booking</span></p>
                                            <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                        </div> --}}

                                    </div>
                                </a>
                            </li>
                            @endforeach
                            {{--
                            <li class="notification-message">
                                <a href="activities.html">
                                    <div class="media d-flex">
                                        <span class="avatar flex-shrink-0">
                                            <img alt="" src="{{asset('backend')}}/img/profiles/avatar-03.jpg">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details"><span class="noti-title">Tarah Shropshire</span>
                                                changed the task name <span class="noti-title">Appointment booking with
                                                    payment gateway</span></p>
                                            <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li class="notification-message">
                                <a href="activities.html">
                                    <div class="media d-flex">
                                        <span class="avatar flex-shrink-0">
                                            <img alt="" src="{{asset('backend')}}/img/profiles/avatar-06.jpg">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details"><span class="noti-title">Misty Tison</span> added
                                                <span class="noti-title">Domenic Houston</span> and <span
                                                    class="noti-title">Claire Mapes</span> to project <span
                                                    class="noti-title">Doctor available module</span>
                                            </p>
                                            <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li class="notification-message">
                                <a href="activities.html">
                                    <div class="media d-flex">
                                        <span class="avatar flex-shrink-0">
                                            <img alt="" src="{{asset('backend')}}/img/profiles/avatar-17.jpg">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details"><span class="noti-title">Rolland Webber</span>
                                                completed task <span class="noti-title">Patient and Doctor video
                                                    conferencing</span></p>
                                            <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li class="notification-message">
                                <a href="activities.html">
                                    <div class="media d-flex">
                                        <span class="avatar flex-shrink-0">
                                            <img alt="" src="{{asset('backend')}}/img/profiles/avatar-13.jpg">
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details"><span class="noti-title">Bernardo Galaviz</span>
                                                added new task <span class="noti-title">Private chat module</span></p>
                                            <p class="noti-time"><span class="notification-time">2 days ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li> --}}

                        </ul>
                    </div>


                    <div class="topnav-dropdown-footer">
                        {{-- <a href="activities.html">View all Notifications</a> --}}
                    </div>
                </div>


            </li>
            <!-- /Notifications -->



            <li class="nav-item dropdown has-arrow main-drop">
                <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                    <span class="user-img">
                        @if (auth()->user()->image == null)
                        <img src="{{asset('backend')}}/img/profiles/avator1.jpg" alt="">
                        @else
                        <img src="{{ asset(auth()->user()->image) }}" alt="">
                        @endif
                        <span class="status online"></span></span>
                </a>
                <div class="dropdown-menu menu-drop-user">
                    <div class="profilename">
                        @auth
                        <div class="profileset">
                            <span class="user-img">
                                @if (auth()->user()->image == null)
                                <img src="{{asset('backend')}}/img/profiles/avator1.jpg" alt="">
                                @else
                                <img src="{{ asset(auth()->user()->image) }}" alt="">
                                @endif

                                <span class="status online"></span></span>


                            <div class="profilesets">
                                <h6>{{ auth()->user()->first_name . ' '. auth()->user()->last_name}}</h6>
                                <h5>{{ auth()->user()->role->name }}</h5>
                            </div>

                        </div>
                        @endauth
                        <hr class="m-0">

                        {{-- <a class="dropdown-item" href="{{ route('user.profile') }}"> <i class="me-2"
                                data-feather="user"></i> {{ trans('header.header.dropdown.my profile') }}</a> --}}

                        <a class="dropdown-item" href=""> <i class="me-2" data-feather="user"></i> {{
                            trans('header.header.dropdown.my profile') }}</a>


                        <a class="dropdown-item" href=""><i class="me-2" data-feather="settings"></i>{{
                            trans('header.header.dropdown.settings') }}</a>
                        {{-- <a class="dropdown-item" href=""> <i class="me-2" data-feather="languare"></i> Language</a>
                        --}}
                        <hr class="m-0">

                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item logout pb-0"><img
                                    src="{{asset('backend')}}/img/icons/log-out.svg" class="me-2" alt="img">{{
                                trans('header.header.dropdown.logout') }}</a>
                        </form>
                    </div>
                </div>
            </li>
    </ul>
    <!-- /Header Menu -->

    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
            aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route('user.index') }}">My Profile</a>
            <a class="dropdown-item" href="{{ route('shopDocument.index') }}">Settings</a>
            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
        </div>
    </div>
    <!-- /Mobile Menu -->
</div>








@section('scripts')
<script type="text/javascript">
    var url = "{{ route('changeLang') }}";
    $(".changeLang").change(function(){
        window.location.href = url + "?lang="+ $(this).val();
    });

</script>

<script>
    var modal = document.querySelector(".modal1");
var triggers = document.querySelectorAll(".trigger1");
var closeButton = document.querySelector(".close-button1");

function toggleModal() {
  modal.classList.toggle("show-modal1");
}

function windowOnClick(event) {
  if (event.target === modal) {
    toggleModal();
  }
}

for (var i = 0, len = triggers.length; i < len; i++) {
  triggers[i].addEventListener("click", toggleModal);
}
closeButton && closeButton.addEventListener("click", toggleModal);
window.addEventListener("click", windowOnClick);
</script>

<script>
    // display value
 function displayValue(val) {
   document.getElementById("result").value += val;
 }

 // evaluates the digit and return result
 function solve() {
   let x = document.getElementById("result").value;
   let y = eval(x);
   document.getElementById("result").value = y;
 }

 // clear the result
 function clearResult() {
   document.getElementById("result").value = "";
 }



</script>

<script>
    var date = new Date();
const elementDate = document.getElementById("printDate");
const elementDay = document.getElementById("printDay");
const elementTime = document.getElementById("printTime");
const listOfDays = [
  "Sunday",
  "Monday",
  "Tuesday",
  "Wednesday",
  "Thursday",
  "Friday",
  "Saturday"
];

function printDate() {
  var day = date.getDate();
  var month = date.getMonth();
  var year = date.getFullYear();

  elementDate.innerHTML = day + " / " + month + " / " + year;
}

function printDay() {
  date = new Date();
  var numberOfDay = date.getDay();
  var day = listOfDays[numberOfDay];
  elementDay.innerHTML = day;
}

function printTime() {
  date = new Date();
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var seconds = date.getSeconds();

  if (seconds < 10) {
    seconds = "0" + seconds;
  }
  if (minutes < 10) {
    minutes = "0" + minutes;
  }
  if (hours > 12) {
    hours = hours - 12;
    elementTime.innerHTML = hours + " : " + minutes + " : " + seconds + "  PM ";
  } else if (hours < 12) {
    elementTime.innerHTML = hours + " : " + minutes + " : " + seconds + "  AM ";
  } else if (hours = 12) {
    elementTime.innerHTML = hours + " : " + minutes + " : " + seconds + "  PM ";
  }
}

setInterval(function() {
  printTime();
  printDate();
  printDay();
}, 1000);
</script>



@endsection