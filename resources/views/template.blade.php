@if(session('theuser') == 'admin')
	<?php $active = 'admin';
	$home = url('admin'); ?>
@elseif(session('theuser') == 'client')
	<?php $active = 'client';
	$home = url('client'); ?>
@elseif(session('theuser') == 'program')
	<?php $active = 'program';
	$home = url('program'); ?>
@else
<?php $active ='';
$home = '#'; ?>
@endif

<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>M-Voucher 3</title>

	<!-- Main Styles -->
	{!! HTML::style('assets/styles/style.min.css') !!}	
	<!-- Material Design Icon -->
	{!! HTML::style('assets/fonts/material-design/css/materialdesignicons.css') !!}
	<!-- mCustomScrollbar -->
	{!! HTML::style('assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css') !!}
	<!-- Waves Effect -->
	{!! HTML::style('assets/plugin/waves/waves.min.css') !!}
	<!-- Sweet Alert -->
	{!! HTML::style('assets/plugin/sweet-alert/sweetalert.css') !!}

	@yield('styles')


	    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
	
</head>

<body>
<div class="main-menu">
	<header class="header">
		<a href="{{ $home }}" class="logo"><i class="mdi mdi-credit-card-multiple"></i> M-Voucher</a>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
		<div class="user">
			<a href="#" class="avatar"><img src="{{ asset('profile_photos/'.auth()->user()->photo) }}" alt=""><span class="status online"></span></a>
			<h5 class="name"><a href="profile.html">{{ auth()->user()->name }}</a></h5>
			<h5 class="position">{{ auth()->user()->role->title }}</h5>
			<!-- /.name -->
			<div class="control-wrap js__drop_down">
				<i class="fa fa-caret-down js__drop_down_button"></i>
				<div class="control-list">
					<div class="control-item"><a href="{{ url('my_profile') }}"><i class="fa fa-user"></i> Profile</a></div>
					<div class="control-item"><a href="{{ url('auth/logout') }}"><i class="fa fa-sign-out"></i> Log out</a></div>
				</div>
				<!-- /.control-list -->
			</div>
			<!-- /.control-wrap -->
		</div>
		<!-- /.user -->
	</header>
	<!-- /.header -->
	<div class="content">

		<div class="navigation">
			<h5 class="title">Main Menu</h5>
			<!-- /.title -->

			<ul class="menu js__accordion">
				<li {!! classActivePath($active) !!}>
					<a class="waves-effect" href="{{ $home }}"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Dashboard</span></a>
				</li>

				@if (session('theuser')=='admin')
					<li {!! classActiveSegment(1, 'organisation') !!}>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-account-card-details"></i><span>Organisations</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li {!! classActivePath('organisationlist') !!}><a href="{{ url('organisationlist') }}">List organisations</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
				@endif

				@if (session('theuser')=='admin' || session('theuser')=='client')
					<li {!! classActiveSegment(1, 'programme') !!}>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-chemical-weapon"></i><span>Programmes</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
					@if (session('theuser')=='admin')
						<li {!! classActivePath('programmelist') !!}><a href="{{ url('programmelist') }}">List programmes</a></li>
					@elseif(session('theuser')=='client')
						<li {!! classActivePath('programme_of_org') !!}><a href="{{ url('programme_of_org') }}">List Programmes</a></li>
					@endif						
						</ul>
					<!-- /.sub-menu js__content -->
				</li>
				@endif
				
				
				<li {!! classActiveSegment(1, 'beneficiary') !!}>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-worker"></i><span>Beneficiaries</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
					@if (session('theuser')=='admin')
						<li {!! classActivePath('beneficiarylist') !!}><a href="{{ url('beneficiarylist') }}">List Beneficiaries</a></li>
					@elseif(session('theuser')=='client')
						<li {!! classActivePath('beneficiary_of_org') !!}><a href="{{ url('beneficiary_of_org') }}">List Beneficiaries</a></li>
					@elseif (session('theuser')=='program')
						<li {!! classActivePath('beneficiary_of_prog') !!}><a href="{{ url('beneficiary_of_prog') }}">List Beneficiaries</a></li>
					@endif						
					</ul>
					<!-- /.sub-menu js__content -->
				</li>

				<li {!! classActiveSegment(1, 'dealer') !!}>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-account-location"></i><span>Agro Dealers</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
					@if (session('theuser')=='admin')
						<li {!! classActivePath('dealerlist') !!}><a href="{{ url('dealerlist') }}">List Agents</a></li>
					@elseif (session('theuser')=='client')
						<li {!! classActivePath('dealer_of_org') !!}><a href="{{ url('dealer_of_org') }}">List Dealers</a></li>
					@elseif(session('theuser')=='program')
						<li {!! classActivePath('dealer_of_prog') !!}><a href="{{ url('dealer_of_prog') }}">List Dealers</a></li>
					@endif
					</ul>
					<!-- /.sub-menu js__content -->
				</li>

				<li {!! classActiveSegment(1, 'agent') !!}>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-account-switch"></i><span>Dealer Agents</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
					@if (session('theuser')=='admin')
						<li {!! classActivePath('agentlist') !!}><a href="{{ url('agentlist') }}">List Agents</a></li>
					@elseif (session('theuser')=='client')
						<li {!! classActivePath('agent_of_org') !!}><a href="{{ url('agent_of_org') }}">List Agents</a></li>
					@elseif(session('theuser')=='program')
						<li {!! classActivePath('agent_of_prog') !!}><a href="{{ url('agent_of_prog') }}">List Agents</a></li>
					@endif
					</ul>
					<!-- /.sub-menu js__content -->
				</li>

				<li {!! classActiveSegment(1, 'voucher') !!}>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-barcode"></i><span>Vouchers</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
					@if (session('theuser')=='admin')
						<li><a href="{{ url('voucher_types') }}">List types</a></li>
						<li><a href="{{ url('voucher_batches') }}">List generated</a></li>
					@elseif (session('theuser')=='client')
						<li><a href="{{ url('voucher_types_of_org') }}">List types</a></li>						
						<li><a href="{{ url('voucher_org_batches') }}">List generated</a></li>
					@elseif(session('theuser')=='program')
						<li><a href="{{ url('voucher_types_of_prog') }}">List implemented</a></li>
						<li><a href="{{ url('voucher_prog_batches') }}">List generated</a></li>
					@endif


					</ul>
					<!-- /.sub-menu js__content -->
				</li>

				@if (session('theuser')=='admin' || session('theuser')=='client')
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-envira"></i><span>Products</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="#">List Products</a></li>
						<li><a href="#">List Varieties</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
				@endif
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-cash-multiple"></i><span>Payments</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="#">Float accounts</a></li>
						<li><a href="#">Payment Logs</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-account-convert"></i><span>Redemptions</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="#">Organisation</a></li>
						<li><a href="#">Programme</a></li>
						<li><a href="#">Dealer</a></li>
						<li><a href="#">Voucher</a></li>
						<li><a href="#">Product</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>

				@if (session('theuser')=='admin')
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-headset"></i><span>Call Center</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="#">View Logs</a></li>
						<li><a href="#">Sub menu 2</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
				@endif
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-chart-areaspline"></i><span>Reports</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="#">sub menu 1</a></li>
						<li><a href="#">Sub menu 2</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-user"></i><span>Profile</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{ url('my_profile') }}">View Info</a></li>
						<li><a href="#">Edit Info</a></li>
						<li><a href="{{ url('change_pass') }}">Change Password</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>

				@if (session('theuser')=='admin')
				<li {!! classActiveSegment(1, 'configuration') !!}>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-gear"></i><span>Configuration</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="{{ url('configuration_vlimits') }}">Voucher Numbers</a></li>
						<li><a href="{{ url('configuration_slimits') }}">Serial Numbers</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
					
				@endif

				@if (session('theuser')=='admin')
					<li {!! classActiveSegment(1, 'user') !!}>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-account-settings-variant"></i><span>User Management</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li {!! classActivePath('user') !!}><a href="{{ url('user') }}">List Users</a></li>
						<li {!! classActivePath('usertrail') !!}><a href="{{ url('usertrail') }}">Log Trail</a></li>
					</ul>
					<!-- /.sub-menu js__content -->
				</li>
				@endif

				<li>
					<a class="waves-effect js__control" href="#"><span>&nbsp;</span></a>
				</li>
			
			</ul>
			<!-- /.menu js__accordion -->
		</div>
		<!-- /.navigation -->
	</div>
	<!-- /.content -->
</div>
<!-- /.main-menu -->

<div class="fixed-navbar">
	<div class="pull-left">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
		<h1 class="page-title">{{ $page_name }}</h1>
		<!-- /.page-title -->
	</div>
	<!-- /.pull-left -->
	<div class="pull-right">
		<div class="ico-item">
			<a href="#" class="ico-item mdi mdi-magnify js__toggle_open" data-target="#searchform-header"></a>
			<form action="#" id="searchform-header" class="searchform js__toggle"><input type="search" placeholder="Search..." class="input-search"><button class="mdi mdi-magnify button-search" type="submit"></button></form>
			<!-- /.searchform -->
		</div>
		<!-- /.ico-item -->
		<a href="#" class="ico-item mdi mdi-bell notice-alarm js__toggle_open" data-target="#notification-popup"></a>
		<a href="{{ url('auth/logout') }}" class="ico-item mdi mdi-logout"></a>
	</div>
	<!-- /.pull-right -->
</div>
<!-- /.fixed-navbar -->

<div id="notification-popup" class="notice-popup js__toggle" data-space="75">
	<h2 class="popup-title">Your Notifications</h2>
	<!-- /.popup-title -->
	<div class="content">
		<ul class="notice-list">
			<li>
				<a href="#">
					<span class="avatar"><img src="assets/images/avatar-sm-1.jpg" alt=""></span>
					<span class="name">John Doe</span>
					<span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
					<span class="time">10 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="assets/images/avatar-sm-2.jpg" alt=""></span>
					<span class="name">Anna William</span>
					<span class="desc">Like your post: “Facebook Messenger”</span>
					<span class="time">15 min</span>
				</a>
			</li>
		</ul>
		<!-- /.notice-list -->
		<a href="#" class="notice-read-more">See more messages <i class="fa fa-angle-down"></i></a>
	</div>
	<!-- /.content -->
</div>
<!-- /#notification-popup -->

<div id="wrapper">
	<div class="main-content">

	@yield('main')
		
		<footer class="footer">
			<ul class="list-inline">
				<li>Powered by !nnovate © {{ date("Y") }}</li>
				<li><a href="#">Privacy</a></li>
				<li><a href="#">Terms</a></li>
				<li><a href="#">Help</a></li>
			</ul>
		</footer>
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
	
	<!-- Placed at the end of the document so the pages load faster -->
	{!! HTML::script('assets/scripts/jquery.min.js') !!}
	{!! HTML::script('assets/scripts/modernizr.min.js') !!}
	{!! HTML::script('assets/plugin/bootstrap/js/bootstrap.min.js') !!}
	{!! HTML::script('assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js') !!}
	{!! HTML::script('assets/plugin/nprogress/nprogress.js') !!}
	{!! HTML::script('assets/plugin/sweet-alert/sweetalert.min.js') !!}
	{!! HTML::script('assets/plugin/waves/waves.min.js') !!}

	  <script type="text/javascript">
      $(".alert-success").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert-success").slideUp(500);
});
    </script>

	@yield('scripts')

	{!! HTML::script('assets/scripts/main.min.js') !!}
</body>


</html>