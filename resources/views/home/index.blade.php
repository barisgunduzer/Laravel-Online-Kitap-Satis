@php
    $books = \App\Http\Controllers\Admin\ProductController::allbooks();
    $setting = \App\Http\Controllers\HomeController::getsetting();
@endphp

@extends('layouts.home')

@section('title',$setting->title)

@section('description',$setting->description)

@section('keywords',$setting->keywords)

@section('author',$setting->author)

@section('content')

    @include('home._slider')
    @include('home._newbooks_section')
    @include('home._allbooks_section')
    @include('home._bestseller_section')
    @include('home._blog_section')
    @include('home._pickedforyou_section')
    @include('home._quickview_wrapper')
    @include('home._newsletter_section')

@endsection
