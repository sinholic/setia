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
		<link rel="shortcut icon" href="{{ asset('images/frontend/favicon.ico')}}">
		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/frontend/css/bootstrap.min.css') }}"/>

		<!-- Owl Carousel -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/frontend/css/owl.carousel.css') }}" />
		<link type="text/css" rel="stylesheet" href="{{ asset('css/frontend/css/owl.theme.default.css') }}" />
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
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
	<body id="fullLayout">

		<!-- Header -->
		<header id="header" >
			<!-- Top Header -->
			<div id="top-header">
				<div class="container">
					<div class="header-links">
						<ul style="padding:10px 0px 5px 0px;">
								<li {{{ (Request::is('/') ? 'class=active' : '') }}}>
									<a href="{{url('/')}}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
									</li>
							@foreach($categorynews as $listData)
								<li {{{ (Request::is('news/category/'.$listData->id) ? 'class=active' : '') }}}><a href="{{url('news/category', ['id' => $listData->id])}}">{{$listData->nama}}</a></li>
							@endforeach


						</ul>
					</div>
					<div class="header-social">
						<ul style="padding:5px 0px 5px 0px;">
							<li>
							{{ Form::open(array('route' => 'frontend.search', 'class' => 'form-horizontal')) }}
								<div class="input-group">
								<input class="input"  type="text" name="q" placeholder="Search">
								<span class="input-group-btn" >
									<button type="submit" style="height:40px" class="btn btn-default"><span class="fa fa-search"></spa></button>
								</span>
							</div>
						{{ Form::close() }}
						</li>
						<li>
							<div class="input-group">
							@guest
								<a style="color:#fff !important;" onclick="login('{{ route('login') }}');" ><i class="fa fa-sign-in"></i> Login</a>
								<!-- <button class="nav-collapse-btn"><i class="fa fa-bars"></i></button> -->
								@endguest
								@auth
								<a style="color:#fff !important;" onclick="login('{{ route('admin.index') }}');"><i class="fa fa-sign-in"></i> Admin</a>

								@endauth
							</div>
							</li>

						</ul>
					</div>
				</div>
			</div>
			<!-- /Top Header -->

			<!-- Center Header -->
			<div id="center-header">
				<!-- <div class="col-lg-4 col-md-4 col-sm-4" style="background:#fff"> -->
				<div class="container" >

					<div class="header-logo">
						<a href="#" class="logo"><img src="{{asset('images/frontend/setialogo2.png')}}" alt="" style="height:70px;"></a>
					</div>



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

					<!-- <button class="nav-collapse-btn"><i class="fa fa-bars"></i></button> -->
				</div></div>
			<!-- /Nav Header -->
		</header>
		<!-- /Header -->
		<div>
    	@yield('body')
		</div>
    <!-- FOOTER -->
    <footer id="footer" >
      <!-- Bottom Footer -->
      <div id="bottom-footer" style="background:transparent;" class="section">
        <!-- CONTAINER -->
        <div class="container">
          <!-- ROW -->
          <div class="row">
            <!-- footer links -->
            <!-- /footer links -->

            <!-- footer copyright -->
            <div>
              <div class="footer-copyright" >
                <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="https://zonderstudio.com.com" target="_blank">Telkomsel</a>
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
    <!-- <script src="{{ asset('js/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/frontend/js/bootstrap.min.js') }}"></script> -->
		<script src="{{ asset('js/frontend/js/jquerynew.min.js') }}"></script>
	  <script src="{{ asset('js/frontend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/frontend/js/main.js') }}"></script>


		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
		<!-- <script src="//code.jquery.com/jquery.js"></script> -->
		  @yield('js')
		<script>
			function login(obj){
				window.location = obj;
			}
		</script>
  </body>
</html>
