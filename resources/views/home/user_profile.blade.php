@extends('layouts.home')

@section('title','User Profile')

@section('content')

    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area bg-image--6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Hesabım</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="{{route('home')}}">Anasayfa</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb_item active">Hesabım</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    @include('home.usermenu')

@endsection




