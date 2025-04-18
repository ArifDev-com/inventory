<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="POS - Bootstrap Admin Template">
		<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
        <meta name="author" content="Dreamguys - Bootstrap Admin Template">
        <meta name="robots" content="noindex, nofollow">
        <title>Login - Pos template</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('backend')}}/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('backend')}}/css/bootstrap.min.css">
		
        <!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{asset('backend')}}/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="{{asset('backend')}}/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('backend')}}/css/style.css">
        
		
    </head>
    <body class="account-page">
	
		 
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<div class="account-content">
				<div class="login-wrapper">
                    <div class="login-content">
                        <div class="login-userset">
                            <div class="login-logo logo-normal">
                                <img src="{{asset('backend')}}/img/logo.png" alt="img">
                            </div>
							<a href="index.html" class="login-logo logo-white">
								<img src="{{asset('backend')}}/img/logo-white.png"  alt="">
							</a>
                            <div class="login-userheading">
                                <h3>Create an Account</h3>
                                <h4>Continue where you left off</h4>
                            </div>
                            <div class="form-login">
                                <label>Full Name</label>
                                <div class="form-addons">
                                    <input type="text" placeholder="Enter your full name">
                                    <img src="{{asset('backend')}}/img/icons/users1.svg" alt="img">
                                </div>
                            </div>
                            <div class="form-login">
                                <label>Email</label>
                                <div class="form-addons">
                                    <input type="text" placeholder="Enter your email address">
                                    <img src="{{asset('backend')}}/img/icons/mail.svg" alt="img">
                                </div>
                            </div>
                            <div class="form-login">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input type="password" class="pass-input" placeholder="Enter your password">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>
                            <div class="form-login">
                                <a class="btn btn-login">Sign Up</a>
                            </div>
                            <div class="signinform text-center">
                                <h4>Already a user? <a href="signin.html" class="hover-a">Sign In</a></h4>
                            </div>
                            <div class="form-setlogin">
                                <h4>Or sign up with</h4>
                            </div>
                            <div class="form-sociallink">
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
                        <img src="{{asset('backend')}}/img/login.jpg" alt="img">
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