<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Basic Page Needs
		================================================== -->
		<meta charset="utf-8" />
		<title>
			@section('title')
			Transport App
			@show
		</title>
		@section('meta_keywords')
		<meta name="keywords" content="transport app" />
		@show
		@section('meta_author')
		<meta name="author" content="@Richard_Keep" />
		@show
		@section('meta_description')
		<meta name="description" content="A transport developed using Laravel 4" />
                @show
		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- CSS
		================================================== -->
        
        {{ HTML::style('css/bootstrap.min.css') }}

        {{ HTML::style('css/bootstrap.theme.min.css') }}

        {{ HTML::style('css/noprint.css') }}

		<style>
        body {
            padding: 60px 0;
        }
		.container .menu {
			background-color: floralwhite;
		}
			
		@section('styles')
		@show
		</style>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Favicons
		================================================== -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" href="{{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}}">
		<link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.png') }}}">
		
		
	</head>

	<body>
		<!-- To make sticky footer need to wrap in a div -->
		<div id="wrap">
		<!-- Navbar -->
		<div class="navbar navbar-default navbar-inverse navbar-fixed-top">
			 <div class="menu no-print">
                
               
                    <ul class="nav navbar-nav">
						<li {{ (Request::is('/') ? ' class="active"' : '') }}><a href="{{{ URL::to('') }}}">Home</a></li>
						<li {{ (Request::is('transport') ? ' class="active"' : '') }} role="presentation" id="2" ><a href="{{ URL::route('getTransport') }}">Transport Goods</a></li>
					    <li {{ (Request::is('clients') ? ' class="active"' : '') }}role="presentation" ><a href="{{ URL::route('getClients') }}">Clients</a></li>
					    <li {{ (Request::is('payments') ? ' class="active"' : '') }}role="presentation" ><a href="{{ URL::route('getPayments') }}">Payments</a></li>
					    <li {{ (Request::is('vehicles') ? ' class="active"' : '') }}role="presentation" ><a href="{{ URL::route('getVehicles') }}">Vehicles</a></li>
						<li {{ (Request::is('expenses') ? ' class="active"' : '') }}role="presentation" ><a href="{{ URL::route('getExpenses') }}">Expenses</a></li>
					
					</ul>

					<ul class="nav navbar-nav pull-right">
                        @if (Auth::check())
                        <li><a href="{{{ URL::to('user') }}}">Logged in as {{{ Auth::user()->username }}}</a></li>
                        <li><a href="{{{ URL::to('logout') }}}">Logout</a></li>
                        @else
                        <li {{ (Request::is('user/signin') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/signin') }}}">Login</a></li>
                        <li {{ (Request::is('user/create') ? ' class="active"' : '') }}><a href="{{{ URL::to('user/create') }}}">Register</a></li>
                        @endif
                    </ul>

                    <br>

                    
					<!-- ./ nav-collapse -->
				
			</div>
		</div>
		<!-- ./ navbar -->

		<!-- Container -->
		<div class="container">

			<!-- Notifications -->
				@include('layout.notifications')
			<!-- ./ notifications -->

			<!-- Content -->
			@yield('content')
			<!-- ./ content -->
		</div>
		<!-- ./ container -->

		<!-- the following div is needed to make a sticky footer -->
		<div id="push"></div>
		</div>
		<!-- ./wrap -->


	    <div id="footer">
	      <div class="container">
	        <center><small class="muted credit no-print">Developed by <a href="http://mmi.co.ke">MMI Technologies Ltd</a>.</small>
	      </div>
	    </div>

		<!-- Javascripts
		================================================== -->
        {{ HTML::script('js/jquery.js') }}
        {{ HTML::script('js/bootstrap.min.js') }}
        {{ HTML::script('js/delete.js') }}

        @yield('js')
	</body>
</html>
