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

        
        

        <style>

.copyright{
			position: fixed;
			bottom: 0;
			right: -140px;
			padding: 1em;
			width: 100%;
			color: grey;
			font-weight: bold;
			
		}


            .loginimg{
                max-width: none;
            }


            .fadeinout
{
  animation: fadeinout 16s infinite;
}

@keyframes fadeinout
{
  0%{
    opacity:0;
  }
  50%
  {
    opacity:1;
  }
  100%
  {
    opacity:0;
  }
}

.img-2{
    height: 100%;
margin-top: -234px;
display: block;
margin-top: -1044px;
margin-left: 800px;
width: 117vh;

}

        </style>
		
    </head>
    <body class="account-page">

        @php 
        $logo =  App\Models\ShopDocument::get();
    @endphp
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<div class="account-content">
				<div class="login-wrapper">
                    <div class="login-content">
                        <div class="login-userset">
                           <div class="login-logo logo-normal">
                                {{-- <img src="{{asset('backend')}}/img/logo-banner.png" alt="img" style="height:70px; width: 200px; margin-left: -12px;
                                " class="loginimg"> --}}
                                @foreach($logo as $item)
                        <img src="{{ asset($item->image) }}" alt="img" style="height:120px; width: 300px; margin-left: -12px;
                        " class="loginimg">
                        @endforeach
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
                                    <input type="email" name="email" placeholder="Enter your email address" required value="superadmin@gmail.com">
                                    <img src="{{asset('backend')}}/img/icons/mail.svg" alt="img">
                                </div>

                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                
                            </div>
                            <div class="form-login">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input type="password" name="password" class="pass-input" placeholder="Enter your password" required value="12345"> 
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
                        {{-- <img src="{{asset('backend')}}/img/pos signin.jpeg" alt="img" class="fadeinout"> 
                        <img src="{{asset('backend')}}/img/POs-01.jpg" alt="img" > --}}
                        
                       
                    </div>
                
                   
                </div>
			</div>
        </div>
		<!-- /Main Wrapper -->
        <img src="{{asset('backend')}}/img/POs-02.png" alt="img" class="img-2 ">






        <div class="copyright">
            <p>All Copyright © <?php echo date('Y'); ?> Reserved by <a href="https://iliussagar.dev/">Sagar Developer</a>.  Powered by <a href="https://iliussagar.dev/">Sagar Developer</a>.</p>
        </div>








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