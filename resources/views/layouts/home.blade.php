<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="@yield('author')">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{asset('assets')}}/images/favicon.ico">
    <link rel="apple-touch-icon" href="{{asset('assets')}}/images/icon.png">

    <!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/plugins.css">
    <link rel="stylesheet" href="{{asset('assets')}}/style.css">

    <!-- Cusom css -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/custom.css">

    <!-- Modernizer js -->
    <script src="{{asset('assets')}}/js/vendor/modernizr-3.5.0.min.js"></script>
    @yield('css')
    @yield('headerjs')
</head>
<body>
    @include('layouts._header')

    @section('content')
    @show

    @include('layouts._footer')
    @yield('footerjs')
</body>
</html>
