<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'วิทยาลัยการอาชีพละงู') }}</title>
	<link rel="icon" href="{{asset('images/logo.png')}}" type="image/png" sizes="16x16">
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
	<link rel="stylesheet" href="{{asset('assets/font-awesome/4.5.0/css/font-awesome.min.css')}}" />

	<!-- page specific plugin styles -->
	<link rel="stylesheet" href="{{asset('assets/css/colorbox.min.css')}}" />

	<!-- text fonts -->
	<link rel="stylesheet" href="{{asset('assets/css/fonts.googleapis.com.css')}}" />

	<!-- ace styles -->
	<link rel="stylesheet" href="{{asset('assets/css/ace.min.css')}}" class="ace-main-stylesheet" id="main-ace-style" />

	<!--[if lte IE 9]>
	<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
<![endif]-->
<link rel="stylesheet" href="{{asset('assets/css/ace-skins.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/ace-rtl.min.css')}}" />

	<!--[if lte IE 9]>
	<link rel="stylesheet" href="assets/css/ace-ie.min.css" />
<![endif]-->

<!-- inline styles related to this page -->

<!-- ace settings handler -->
<script src="{{asset('assets/js/ace-extra.min.js')}}"></script>

<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

	<!--[if lte IE 8]>
	<script src="assets/js/html5shiv.min.js"></script>
	<script src="assets/js/respond.min.js"></script>
<![endif]-->
<!--calendar-->
<link rel="stylesheet" href="{{asset('assets/css/jquery-ui.custom.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/fullcalendar.min.css')}}" />
</head>
<body class="no-skin">

	<!-- /.navbar-container -->
	<div id="navbar" class="navbar navbar-default  ace-save-state">
		<div class="navbar-container ace-save-state" id="navbar-container">
			<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
				<span class="sr-only">Toggle sidebar</span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>
			</button>

			<div class="navbar-header pull-left">
				<a href="{{ url('admin/home') }}" class="navbar-brand">
					<small>
						{{ config('app.name', 'วิทยาลัยการอาชีพละงู') }}
					</small>
				</a>
			</div>

			<div class="navbar-buttons navbar-header pull-right" role="navigation">
				<ul class="nav ace-nav">

					<li class="light-blue dropdown-modal">
						<a data-toggle="dropdown" href="#" class="dropdown-toggle">
							<img class="nav-user-photo" src="{{asset('assets/images/avatars/avatar2.png')}}" alt="Jason's Photo" />
							<span class="user-info">
								<small>{{ Auth::user()->name }} </small>
							</span>
							<i class="ace-icon fa fa-caret-down"></i>
						</a>

						<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

							<li class="divider"></li>

							<li>
								<a href="{{ route('logout') }}"  >
									<i class="ace-icon fa fa-power-off" ></i>
									Logout
								</a>

							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<!-- /.navbar-container -->
	<!-- /.menu -->
	<div class="main-container ace-save-state" id="main-container">
		<script type="text/javascript">
			try{ace.settings.loadState('main-container')}catch(e){}
		</script>

		<div id="sidebar" class="sidebar  responsive ace-save-state">
			<script type="text/javascript">
				try{ace.settings.loadState('sidebar')}catch(e){}
			</script>

			<ul class="nav nav-list">
				<li class="{{($title=='Dashboard')?"active":""}}">
					<a href="{{ url('admin/dashboard') }}">
						<i class="menu-icon fa fa-tachometer"></i>
						<span class="menu-text"> Dashboard </span>
					</a>

					<b class="arrow"></b>
				</li>
				<li class="{{($title=='Manage')?"active":""}}">
					<a href="{{ url('admin/manage') }}">
						<i class="menu-icon fa fa-list-alt"></i>
						<span class="menu-text"> จัดการข้อมูลผู้สมัคร </span>
					</a>

					<b class="arrow"></b>
				</li>

			</ul><!-- /.nav-list -->

			<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
				<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
			</div>
		</div>
		<!-- end menu -->

		@yield('content')

		<div class="footer">
			<div class="footer-inner">
				<div class="footer-content">
					<span class="bigger-120">
						<span class="blue bolder">Ace</span>
						Application &copy; 
					</span>

					&nbsp; &nbsp;
					<span class="action-buttons">
						<a href="#">
							<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
						</a>

						<a href="#">
							<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
						</a>

						<a href="#">
							<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
						</a>
					</span>
				</div>
			</div>
		</div>
		<!-- <script src="{{ asset('js/app.js') }}"></script> -->

		<script src="{{asset('assets/js/jquery-2.1.4.min.js')}}"></script>


		<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

		<!-- page specific plugin scripts -->

		<script src="{{asset('assets/js/ace-elements.min.js')}}"></script>
		<script src="{{asset('assets/js/ace.min.js')}}"></script>
	</body>
	</html>
