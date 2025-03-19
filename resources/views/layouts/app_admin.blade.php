<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="POS - Bootstrap Admin Template">
	<meta name="keywords"
		content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
	<meta name="author" content="Dreamguys - Bootstrap Admin Template">
	<meta name="robots" content="noindex, nofollow">

	{{-- @php
	$shopDocument = Illuminate\Support\Facades\DB::table('shop_documents')->first();
	@endphp --}}

	{{-- <title>{{ $shopDocument->name }}</title> --}}
	<title>Inventory Management Software</title>

	<!-- Favicon -->
	{{--
	<link rel="icon" type="image/x-icon" href="{{ asset($shopDocument->image) }}"> --}}
	<link rel="icon" type="image/x-icon" href="#">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('backend') }}/css/bootstrap.min.css">

	<!-- Datetimepicker CSS -->
	<link rel="stylesheet" href="{{ asset('backend') }}/css/bootstrap-datetimepicker.min.css">

	<!-- animation CSS -->
	<link rel="stylesheet" href="{{ asset('backend') }}/css/animate.css">

	<!-- Select2 CSS -->
	<link rel="stylesheet" href="{{ asset('backend') }}/plugins/select2/css/select2.min.css">

	<!-- Owl Carousel CSS -->
	<link rel="stylesheet" href="{{ asset('backend') }}/plugins/owlcarousel/owl.carousel.min.css">

	<!-- Datatable CSS -->
	<link rel="stylesheet" href="{{ asset('backend') }}/css/dataTables.bootstrap4.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="{{ asset('backend') }}/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="{{ asset('backend') }}/plugins/fontawesome/css/all.min.css">

	<!-- Main CSS -->

	<link rel="stylesheet" href="{{ asset('backend') }}/css/style.css">

	<style>
		img {
			cursor: pointer !important;
		}

		.copyright {
			position: fixed;
			bottom: 0;
			right: 0;
			padding: 1em;
			width: 100%;
			color: grey;
			font-weight: bold;

		}

		.dt-button {
			background: #4c77bb !important;
			color: white !important;

			border: 2px solid white !important;
			border-radius: 8px !important;



		}


		/* Theme Color Black Change */
		/* .sidebar .slimScrollDiv{
			background: #0f0f0f!important;
		}

		.header{
			background: #0f0f0f!important;
		}

		.sidebar .sidebar-menu > ul > li > a.active{
			background: #3F4042!important;
		}

		.sidebar .sidebar-menu > ul > li > a:hover{
			background: #3F4042!important;
		} */

		.dash-widget.sherazi1 {
			background: #004eff24;
		}

		.dash-widget.sherazi2 {
			background: #4fddf359;
		}

		.dash-widget.sherazi3 {
			background: #00ffa12b;
		}

		.header {
			background: linear-gradient(45deg, red, #000058);
			;
		}

		.sidebar-inner {
			overflow: hidden;
			width: 100%;
			height: 416px;
			background: #bb1717;
		}

		.sidebar .sidebar-menu>ul>li>a {
			padding: 10px 15px;
			position: relative;
			/* color: #212B36; */
			border-bottom: solid 0.5px #34383b;
			/* background: black; */
			border-radius: 5px;
			background: #ffffff47;
		}



		.sidebar .sidebar-menu>ul>li>a span {

			color: #fff;
		}



		.form-select {
			background-color: ) !important;
			color: #d7dadd !important;
			border-radius: 50px !important;
		}

		/* button color change  */

		.page-header .btn-added {
			background: #b10505);

		}

		.btn-info {
			color: #fff;
			background-color: #b10505);

		}

		.btn-submit {
			background: #b10505);

		}


		.add-icon span,
		.add-icon a {

			background: #4c77bb !important;
		}

		.float {
			position: fixed;
			/* width:60px; */
			height: 20px;
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

</head>

<body>
	<!-- <div id="global-loader" >
			<div class="whirly-loader"> </div>
		</div> -->
	<!-- Main Wrapper -->
	<div class="main-wrapper">

		<!-- Header -->
		@include('layouts.partials.header_admin')
		<!-- Header -->

		<!-- Sidebar -->




		@include('layouts.partials.sidebar_admin')



		<!-- /Sidebar -->

		@yield('content')


	</div>
	<!-- /Main Wrapper -->




	<!-- jQuery -->
	<script src="{{ asset('backend') }}/js/jquery-3.6.0.min.js"></script>

	<!-- Feather Icon JS -->
	<script src="{{ asset('backend') }}/js/feather.min.js"></script>

	<!-- Slimscroll JS -->
	<script src="{{ asset('backend') }}/js/jquery.slimscroll.min.js"></script>

	<!-- Datatable JS -->
	<script src="{{ asset('backend') }}/js/jquery.dataTables.min.js"></script>
	<script src="{{ asset('backend') }}/js/dataTables.bootstrap4.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="{{ asset('backend') }}/js/bootstrap.bundle.min.js"></script>

	<!-- Owl JS -->
	<script src="{{ asset('backend') }}/plugins/owlcarousel/owl.carousel.min.js"></script>

	<!-- Select2 JS -->
	<script src="{{ asset('backend') }}/plugins/select2/js/select2.min.js"></script>

	<!-- Datetimepicker JS -->
	<script src="{{ asset('backend') }}/js/moment.min.js"></script>
	<script src="{{ asset('backend') }}/js/bootstrap-datetimepicker.min.js"></script>

	<!-- Sweetalert 2 -->
	{{-- <script src="{{ asset('backend') }}/plugins/sweetalert/sweetalert2.all.min.js"></script>
	<script src="{{ asset('backend') }}/plugins/sweetalert/sweetalerts.min.js"></script> --}}

	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

	<!-- Owl JS -->
	<script src="{{ asset('backend') }}/plugins/owlcarousel/owl.carousel.min.js"></script>

	<!-- Chart JS -->
	<script src="{{ asset('backend') }}/plugins/apexchart/apexcharts.min.js"></script>
	<script src="{{ asset('backend') }}/plugins/apexchart/chart-data.js"></script>

	<!-- Custom JS -->
	<script src="{{ asset('backend') }}/js/script.js"></script>


	@yield('scripts')



</body>

</html>
