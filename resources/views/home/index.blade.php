@extends('layouts.home')

@section('title','Kitap Sokağı | Kitapseverlerin Buluşma Adresi')

@section('description','Dünya klasiklerinden, çocuk edebiyatına; kırtasiye malzemelerinden hobi ve elektroniğe varan yüzlerce kategoriden binlerce ürün sizleri bekliyor!')

@section('keywords','kitap, roman, türk edebiyatı, klasik batı edebiyatı, şiir, fantezi, bilim kurgu')

@section('author','barisgunduzer')

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




