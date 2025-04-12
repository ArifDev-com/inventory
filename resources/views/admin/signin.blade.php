<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">



  {{-- @php
  $shopDocument = Illuminate\Support\Facades\DB::table('shop_documents')->first();
  @endphp --}}

  {{--
  <link rel="icon" type="image/x-icon" href="{{ asset($shopDocument->image) }}"> --}}
  <link rel="icon" type="image/x-icon" href="#">

  {{-- <title>{{ $shopDocument->name }}</title> --}}
  <title>Capital Lift Ltd.</title>



  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

    body {
      background: linear-gradient(45deg, red, #020285);
      /* background-image: url("{{ asset('image/background_two.png') }}");
  background-repeat: no-repeat;
  background-size: cover; */

      font-family: Raleway, sans-serif;
      color: #666;
      height: 100vh;
    }

    .login {
      margin: 20px auto;
      padding: 40px 50px;
      max-width: 300px;
      border-radius: 5px;
      background: #fff;
      box-shadow: 1px 1px 1px #666;
    }

    .login input {
      width: 100%;
      display: block;
      box-sizing: border-box;
      margin: 10px 0;
      padding: 14px 12px;
      font-size: 16px;
      border-radius: 2px;
      font-family: Raleway, sans-serif;

    }

    .login input[type=text],
    .login input[type=password] {
      border: 1px solid #c0c0c0;
      transition: .2s;
    }

    .login input[type=text]:hover {
      border-color: #F44336;
      outline: none;
      transition: all .2s ease-in-out;
    }

    .login input[type=submit] {
      border: none;
      /* background: #EF5350; */
      background: linear-gradient(45deg, red, #020285);
      color: white;
      font-weight: bold;
      transition: 0.2s;
      margin: 20px 0px;
    }

    .login input[type=submit]:hover {
      /* background: #F44336;   */
      background: linear-gradient(45deg, #020285, red);
    }

    .login h2 {
      margin: 20px 0 0;
      color: #EF5350;
      font-size: 28px;
    }

    .login p {
      margin-bottom: 40px;
    }

    .links {
      display: table;
      width: 100%;
      box-sizing: border-box;
      border-top: 1px solid #c0c0c0;
      margin-bottom: 10px;
    }

    /* .links a {
  display: table-cell;
  padding-top: 10px;
} */

    /* .links a:first-child {
  text-align: left;
}

.links a:last-child {
  text-align: right;
} */

    .login h2,
    .login p,
    .login a {
      text-align: center;
    }

    .login a {
      text-decoration: none;
      font-size: .8em;
    }

    .login a:visited {
      color: inherit;
    }

    .login a:hover {
      text-decoration: underline;
    }


    .float {
      position: fixed;
      /* width:60px; */
      height: 60px;
      bottom: 40px;
      right: 40px;
      /* background-color:#25d366; */
      color: #FFF;
      /* border-radius:50px; */
      text-align: center;
      font-size: 30px;
      /* box-shadow: 2px 2px 3px #999; */
      z-index: 100;
    }
  </style>

  <script src="https://unpkg.com/ityped@0.0.10"></script>


</head>

<body>
  <br><br>
  <center>
    <h1 style="color: white; margin-bottom: 10px;"><span class="">Welcome! Capital Lift Ltd.</span></h1>
    <h3 style="color: white;">Log in to your account.</h3>
  </center>





  <form action="{{route('login')}}" method="post" class="login">
    @csrf
    <!-- <h2>Welcome, User!</h2> -->
    <!-- <p>Please log in</p> -->

    {{-- @php
    $shopDocument = Illuminate\Support\Facades\DB::table('shop_documents')->first();
    @endphp --}}

    <center>
      <div style="margin-top: -25px;">
        {{-- <img src="{{ asset($shopDocument->image) }}" alt="" style="height: 60px; width: 60px;" class="img-fluid">
        <h4 style="margin-top: 0px;"><span class="">{{ $shopDocument->name }}</span></h4> --}}
      </div>
      <br><br><br>
    </center>
    <input type="text" name="phone" placeholder="Phone" value="{{ old('phone') }}" />
    @error('phone')
    <span class="text-danger" style="color: red;">{{ $message }}</span>
    @enderror

    <div class="wrap">
      <input type="password" name="password" id="password-field" class="left" placeholder="Password" />
      <span toggle="#password-field" class="fas fa-eye field-icon toggle-password right"
        style="float: right; margin-top: -40px; margin-right: 4px;"></span>
    </div>


    @error('password')
    <span class="text-danger" style="color: red;">{{ $message }}</span>

    @enderror

    <input type="submit" value="Log In" />
    <br>

    <div class="links">
      <br>
      <center> Developed By: <a href="#" target="_blank" style="color: red;  font-size: 18px;" );">
          Capital Lift Ltd.</a></center>

    </div>
  </form>


  <script>
    window.ityped.init(document.querySelector('.ityped'),{
                strings: ['Business Management Software!'],
                loop: true
            })
  </script>

  <script>
    $(".toggle-password").click(function() {

$(this).toggleClass("fa-eye fa-eye-slash");
var input = $($(this).attr("toggle"));
if (input.attr("type") == "password") {
  input.attr("type", "text");
} else {
  input.attr("type", "password");
}
});
  </script>

  @if(Session::has('success'))
  <script>
    toastr.success("{{Session::get('success')}}");
  </script>

  @endif

</body>

</html>