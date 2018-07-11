<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <title>Dashboard - SETIA Portal News</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/admin/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/bootstrap-responsive.min.css') }}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="{{ asset('css/admin/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/pages/signin.css') }}" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    @include('admin.navbar')
    @yield('content')
    <div class="login-extra">
        <a href="#">Reset Password</a>
    </div> <!-- /login-extra -->

    <script src="{{ asset('js/admin/jquery-1.7.2.min.js') }}"></script>
    <script src="{{ asset('js/admin/signin.js') }}"></script>
    <script src="{{ asset('js/admin/bootstrap.js') }}"></script>
</body>

</html>
