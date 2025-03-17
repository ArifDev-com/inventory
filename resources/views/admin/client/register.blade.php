<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="POS - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Register - Pos Software</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('backend')}}/img/logo.jpeg">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('backend')}}/css/bootstrap.min.css">
		
        <!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{asset('backend')}}/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="{{asset('backend')}}/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('backend')}}/css/style.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        

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
  animation: fadeinout 6s infinite;
}

@keyframes fadeinout
{
  0%{
    opacity:10;
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
                                <h3>Register</h3>
                                <h4>Please register to your account</h4>

                              
                                
                            </div>
                            <form action="{{route('client.register.store')}}" method="post">
                            @csrf

                            <div class="form-login">
                                <label>Name</label>
                                <div class="form-addons">
                                    <input type="test" name="name" placeholder="Enter your Name" required >
                                    <img src="{{asset('backend')}}/img/icons/users1.svg" alt="img">
                                </div>

                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                
                            </div>

                            <div class="form-login">
                                <label>Phone</label>
                                <div class="form-addons">
                                    <input type="test" name="phone" placeholder="Enter your phone" required >
                                    <img src="{{asset('backend')}}/img/icons/phone-call-svgrepo-com.svg" alt="img">
                                </div>

                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                
                            </div>

                            <div class="form-login">
                                <label>Note</label>
                                <div class="form-addons">
                               

                                    <textarea name="note" id="" cols="30" rows="10" class="form-control" placeholder="Enter your note (Optional)"></textarea>
                                </div>

                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                
                            </div>

                           
                           

                            <div class="form-login d-none" >
                                <div class="alreadyuser">
                                    <h4><a href="forgetpassword.html" class="hover-a">Forgot Password?</a></h4>
                                </div>
                            </div>

                            <div class="form-login">
                                <button type="submit" class="btn btn-login">Register</button>
                            </div>
                            </form>
                            <div class="signinform text-center ">
                                <h4>Do have an account? <a href="{{ url('/')}}" class="hover-a">Login</a></h4>
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

        @if(Session::has('success'))
        <script>
            toastr.success("{!! Session::get('success') !!}");
        </script>
        @endif
		
    </body>
</html>