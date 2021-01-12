@extends('layouts.admin')

@section('title','Admin Panel')

@section('css')<link rel="stylesheet" href="{{asset('assets/admin')}}/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/vendor/fonts/flag-icon-css/flag-icon.min.css">
@endsection

@section('content')

    @include('admin._header')
    @include('admin._content')

@endsection

@section('footerjs') <!-- Optional JavaScript -->
<!-- jquery 3.3.1 -->
<script src="{{asset('assets')}}/admin/vendor/jquery/jquery-3.3.1.min.js"></script>
<!-- bootstap bundle js -->
<script src="{{asset('assets')}}/admin/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<!-- slimscroll js -->
<script src="{{asset('assets')}}/admin/vendor/slimscroll/jquery.slimscroll.js"></script>
<!-- main js -->
<script src="{{asset('assets')}}/admin/libs/js/main-js.js"></script>
<!-- chart chartist js -->
<script src="{{asset('assets')}}/admin/vendor/charts/chartist-bundle/chartist.min.js"></script>
<!-- sparkline js -->
<script src="{{asset('assets')}}/admin/vendor/charts/sparkline/jquery.sparkline.js"></script>
<!-- morris js -->
<script src="{{asset('assets')}}/admin/vendor/charts/morris-bundle/raphael.min.js"></script>
<script src="{{asset('assets')}}/admin/vendor/charts/morris-bundle/morris.js"></script>
<!-- chart c3 js -->
<script src="{{asset('assets')}}/admin/vendor/charts/c3charts/c3.min.js"></script>
<script src="{{asset('assets')}}/admin/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
<script src="{{asset('assets')}}/admin/vendor/charts/c3charts/C3chartjs.js"></script>
<script src="{{asset('assets')}}/admin/libs/js/dashboard-ecommerce.js"></script>
@endsection
