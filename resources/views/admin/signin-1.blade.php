<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="POS - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Login - Pos Software</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('backend')}}/img/logo.jpeg">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('backend')}}/css/bootstrap.min.css">
		
        <!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{asset('backend')}}/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="{{asset('backend')}}/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('backend')}}/css/style.css">

        {{-- // img animate  --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.0/css/foundation.min.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/foundation.min.js"></script>

        

        <style>
            .loginimg{
                max-width: none;
            }



            @import url('https://fonts.googleapis.com/css?family=Source+Code+Pro:200');

body  {
    background-image: url('https://static.pexels.com/photos/414171/pexels-photo-414171.jpeg');
  background-size:cover;
        -webkit-animation: slidein 100s;
        animation: slidein 100s;

        -webkit-animation-fill-mode: forwards;
        animation-fill-mode: forwards;

        -webkit-animation-iteration-count: infinite;
        animation-iteration-count: infinite;

        -webkit-animation-direction: alternate;
        animation-direction: alternate;              
}

@-webkit-keyframes slidein {
from {background-position: top; background-size:3000px; }
to {background-position: -100px 0px;background-size:2750px;}
}

@keyframes slidein {
from {background-position: top;background-size:3000px; }
to {background-position: -100px 0px;background-size:2750px;}

}



.center
{
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
  margin: auto;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background: rgba(75, 75, 250, 0.3);
  border-radius: 3px;
}
.center h1{
  text-align:center;
  color:white;
  font-family: 'Source Code Pro', monospace;
  text-transform:uppercase;
}

        </style>
		
    </head>
    <body class="account-page">
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<div class="account-content">
				<div class="login-wrapper">
                    <div class="login-content">
                        <div class="login-userset">
                           <div class="login-logo logo-normal">
                                <img src="{{asset('backend')}}/img/logo-banner.png" alt="img" style="height:70px; width: 200px; margin-left: -12px;
                                " class="loginimg">
                            </div> 
							{{-- <a href="index.html" class="login-logo logo-white">
								<img src="{{asset('backend')}}/img/logo-white.png"  alt="">
							</a> --}}
                            <div class="login-userheading">
                                <h3>Log In</h3>
                                <h4>Please login to your account</h4>
                            </div>
                            <form action="{{route('login')}}" method="post">
                            @csrf
                           <div class="form-login">
                                <label>Email</label>
                                <div class="form-addons">
                                    <input type="email" name="email" placeholder="Enter your email address" required value="admin@gmail.com">
                                    <img src="{{asset('backend')}}/img/icons/mail.svg" alt="img">
                                </div>

                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                
                            </div>
                            <div class="form-login">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input type="password" name="password" class="pass-input" placeholder="Enter your password" required value="12345678"> 
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>

                                @error('password')
                                <span class="text-danger">{{ $message }}</span>

                            @enderror
                            </div>

                            <div class="form-login d-none" >
                                <div class="alreadyuser">
                                    <h4><a href="forgetpassword.html" class="hover-a">Forgot Password?</a></h4>
                                </div>
                            </div>

                            <div class="form-login">
                                <button type="submit" class="btn btn-login">Log In</button>
                            </div>
                            </form>
                            <div class="signinform text-center ">
                                <h4>Don’t have an account? <a href="{{ route('client.register')}}" class="hover-a">Register</a></h4>
                            </div>
                            <div class="form-setlogin d-none">
                                <h4>Or sign up with</h4>
                            </div>
                            <div class="form-sociallink d-none">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <img src="{{asset('backend')}}/img/icons/google.png" class="me-2" alt="google">
                                            Sign Up using Google
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <img src="{{asset('backend')}}/img/icons/facebook.png" class="me-2" alt="google">
                                            Sign Up using Facebook
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="login-img">
                        <img src="{{asset('backend')}}/img/pos signin.jpeg" alt="img">
                    </div>
                </div>
			</div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="{{asset('backend')}}/js/jquery-3.6.0.min.js"></script>

         <!-- Feather Icon JS -->
		<script src="{{asset('backend')}}/js/feather.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="{{asset('backend')}}/js/bootstrap.bundle.min.js"></script>
		
		<!-- Custom JS -->
		<script src="{{asset('backend')}}/js/script.js"></script>
		
    </body>
</html>