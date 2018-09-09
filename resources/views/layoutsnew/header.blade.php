<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
    <link href="{{ asset('css/admin/bootstrap-4-navbar.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    @if(Request::is('*admin*'))
        <title>Dashboard - Telkomsel SETIA</title>
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
        <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" rel="stylesheet" />
        <link type="text/css" rel="stylesheet" href="{{ asset('css/frontend/css/style.css') }}"/>
        <style media="screen">
            .select2-container--bootstrap {
                width: 100% !important;
            }
        </style>
        <link href="{{ asset('css/admin/pages/dashboard.css') }}" rel="stylesheet">
    @else
        <title>Telkomsel SETIA</title>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700%7CLato:300,400" rel="stylesheet">
		<link rel="shortcut icon" href="{{ asset('images/frontend/favicon.ico')}}">
		<!-- <link type="text/css" rel="stylesheet" href="{{ asset('css/frontend/css/bootstrap.min.css') }}"/> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
		<link rel="stylesheet" href="{{ asset('css/frontend/css/font-awesome.min.css') }}">
		<link type="text/css" rel="stylesheet" href="{{ asset('css/frontend/css/style.css') }}"/>
    @endif
    <!-- <link href="{{ asset('css/admin/bootstrap.min.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('css/admin/bootstrap-responsive.min.css') }}" rel="stylesheet"> -->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
