<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>M-Voucher 3</title>
	  {!! HTML::style('assets/styles/style.min.css') !!}
	<link rel="stylesheet" href="">

	<!-- Waves Effect -->
	  {!! HTML::style('assets/plugin/waves/waves.min.css') !!}

	    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />

</head>

<body>

<div id="single-wrapper">

@yield('main')

</div><!--/#single-wrapper -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	{{-- [if lt IE 9]>
		{!! HTML::script('assets/script/html5shiv.min.js') !!}
		{!! HTML::script('assets/script/respond.min.js') !!}
	<![endif] --}}

	<!-- 
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	{!! HTML::script('assets/scripts/jquery.min.js') !!}
	{!! HTML::script('assets/scripts/modernizr.min.js') !!}
	{!! HTML::script('assets/plugin/bootstrap/js/bootstrap.min.js') !!}
	{!! HTML::script('assets/plugin/nprogress/nprogress.js') !!}
	{!! HTML::script('assets/plugin/waves/waves.min.js') !!}

	{!! HTML::script('assets/scripts/main.min.js') !!}
</body>

</html>