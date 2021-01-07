@extends('layouts.home')

@section('title',$setting->title)

@section('description',$setting->description)

@section('keywords',$setting->keywords)

@section('author',$setting->author)

@section('content')

    @include('home._search_popup')
    @include('home._slider')
    @include('home._newbooks_section')
    @include('home._newsletter_section')
    @include('home._allbooks_section')
    @include('home._blog_section')
    @include('home._bestseller_section')
    @include('home._quickview_wrapper')

@endsection
