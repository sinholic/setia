<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="csrf-token" content="{{ csrf_token() }}">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>SETIA - Portal news</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700%7CLato:300,400" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/frontend/css/bootstrap.min.css') }}"/>

		<!-- Owl Carousel -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/frontend/css/owl.carousel.css') }}" />
		<link type="text/css" rel="stylesheet" href="{{ asset('css/frontend/css/owl.theme.default.css') }}" />

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{ asset('css/frontend/css/font-awesome.min.css') }}">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/frontend/css/style.css') }}"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
		<style>
		/* #center-header{
			background: #f7f7f7;
		} */
		#trapezoid {

    border-bottom: 90px solid red;
    border-left: 50px solid transparent;
    border-right: 0px solid transparent;
    width: 100%;
		height:30px;
		margin:0;
		padding:0;
		}
		#center-header{
			margin:0 !important;
			padding:0 !important;
		}
		</style>
	<body>

		<!-- Header -->
		<header id="header" >
			<!-- Top Header -->

			<!-- /Top Header -->

			<!-- Center Header -->
			<div id="center-header">
				<!-- <div class="col-lg-4 col-md-4 col-sm-4" style="background:#fff"> -->
				<div class="container" style="background:#fff;">

					<div class="header-logo">
						<a href="#" class="logo"><img src="{{asset('images/frontend/setialogo2.png')}}" alt=""></a>
					</div>


					<!-- <div class="header-ads">
						<img class="center-block" src="./img/ad-2.jpg" alt="">
					</div> -->
				</div>
				<!-- </div> -->
				<!-- <div class="col-lg-8 col-md-8 col-sm-8" style="background:#fff;">
						<div class="container" style="background:#fff">
								<div id="trapezoid"></div>
				</div>
				</div> -->
			</div>
			<!-- /Center Header -->

			<!-- Nav Header -->
			<div id="nav-header" style="box-shadow:5px 5px 5px #999;">
				<div class="container">
					<nav id="main-nav">
						<div class="nav-logo">
							<a href="#" class="logo"><img src="./img/logo-alt.png" alt=""></a>
						</div>
						<ul class="main-nav nav navbar-nav">
							<li {{{ (Request::is('/') ? 'class=active' : '') }}}><a href="{{url('/')}}"><i class="fa fa-home" aria-hidden="true"></i>
 Home</a></li>
							@foreach($categorynews as $listData)
							<li {{{ (Request::is('data/$listData->nama') ? 'class=active' : '') }}}><a href="{{url('data/$listData->nama')}}">{{$listData->nama}}</a></li>
							@endforeach
						  <!-- <li {{{ (Request::is('data/handset') ? 'class=active' : '') }}}><a href="{{url('data/handset')}}">Roaming</a></li>
							<li {{{ (Request::is('operator') ? 'class=active' : '') }}}><a href="#">Handset</a></li>
							<li {{{ (Request::is('operator') ? 'class=active' : '') }}}><a href="#">Operator</a></li> -->
							<!-- <li {{{ (Request::is('roaminger') ? 'class=active' : '') }}}><a href="#">Roaming Exchange Rate</a></li>
							<li {{{ (Request::is('roamingp') ? 'class=active' : '') }}}><a href="#">Roaming Partner</a></li>
<<<<<<< HEAD
							<li {{{ (Request::is('data/roaming') ? 'class=active' : '') }}}><a href="{{url('data/roaming')}}">Roaming Partner Map</a></li> -->
							<!-- <li></li> -->
						</ul>
					</nav>
					<div class="button-nav">
						@guest
						<button class="search-collapse-btn" onclick="login('{{ route('login') }}');" ><a style="color:#fff !important;"><i class="fa fa-sign-in"></i> Login</a></button>
						<button class="nav-collapse-btn"><i class="fa fa-bars"></i></button>
						@endguest
						@auth
						<button class="search-collapse-btn" onclick="login('{{ route('admin.index') }}');" ><a style="color:#fff !important;"><i class="fa fa-sign-in"></i> Admin</a></button>
						<button class="nav-collapse-btn"><i class="fa fa-bars"></i></button>
						@endauth

						<!-- <div class="search-form">
							<form>
								<input class="input" type="text" name="search" placeholder="Search">
							</form>
						</div> -->
					</div>
				</div>
			</div>
			<!-- /Nav Header -->
		</header>
		<!-- /Header -->
    @yield('body')

    <!-- FOOTER -->
    <footer id="footer" >
      <!-- Bottom Footer -->
      <div id="bottom-footer" class="section">
        <!-- CONTAINER -->
        <div class="container">
          <!-- ROW -->
          <div class="row">
            <!-- footer links -->
            <!-- /footer links -->

            <!-- footer copyright -->
            <div>
              <div class="footer-copyright">
                <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="https://zonderstudio.com.com" target="_blank">Zonder Studio</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
              </div>
            </div>
            <!-- /footer copyright -->
          </div>
          <!-- /ROW -->
        </div>
        <!-- /CONTAINER -->
      </div>
      <!-- /Bottom Footer -->
    </footer>
    <!-- /FOOTER -->

    <!-- Back to top -->
    <div id="back-to-top"></div>
    <!-- Back to top -->

    <!-- jQuery Plugins -->
    <script src="{{ asset('js/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/frontend/js/main.js') }}"></script>
		<script>
			function login(obj){
				window.location = obj;
			}
		</script>
  </body>
</html>
