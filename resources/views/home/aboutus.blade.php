@extends('layouts.home')

@section('title', $setting->company.' | Hakkımızda')

@section('content')

    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area bg-image--6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Hakkımızda</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="{{route('home')}}">Anasayfa</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb_item active">Hakkımızda</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- Start About Area -->
    <div class="page-about about_area bg--white section-padding--lg">
        <div class="container">
            <div class="row">
            </div>
            <div class="row align-items-center">
                <div class="col-lg-12 col-sm-12 col-12">
                    <div class="content">
                        {!! $setting->aboutus !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Area -->

@endsection
