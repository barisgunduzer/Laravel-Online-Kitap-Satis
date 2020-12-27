<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/admin')}}/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/vendor/fonts/circular-std/style.css" >
    <link rel="stylesheet" href="{{asset('assets/admin')}}/libs/css/style.css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/vendor/fonts/fontawesome/css/fontawesome-all.css">
    @yield('css')
    @yield('headerjs')
</head>

<body>
@include('admin._navbar')
@include('admin._sidebar')

@section('content')
@show

@include('admin._footer')
@yield('footerjs')
</body>

</html>
