@extends('layouts.home')

@section('title','Hesabım')

@section('description',$setting->description)

@section('keywords',$setting->keywords)

@section('author',$setting->author)

@section('content')
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area bg-image--6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title" style="text-transform:none;color:#1d2124">Hesabım</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="{{route('home')}}" style="text-transform:none;color:#1d2124">Anasayfa</a>
                            <span class="brd-separetor" style="text-transform:none;color:#1d2124">/</span>
                            <span class="breadcrumb_item active" style="text-transform:none;color:#e59285">Hesabım</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <div class="page-blog-details pt--80 pb--45 bg--white">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                @include('home.usermenu')
                </div>
                <div class="col-lg-9 col-12">
                    <div class="blog-details content">
                        @include('profile.show')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




