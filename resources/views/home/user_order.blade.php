@extends('layouts.home')

@section('title','Yaptığım Yorumlar')

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
                        <h2 class="bradcaump-title" style="text-transform:none;color:#1d2124">Siparişlerim</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="{{route('home')}}" style="text-transform:none;color:#1d2124">Anasayfa</a>
                            <span class="brd-separetor" style="text-transform:none;color:#1d2124">/</span>
                            <span class="breadcrumb_item active" style="text-transform:none;color:#e59285">Siparişlerim</span>
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
                        <table style="text-align:center" class="table table-striped table-bordered first">
                            <thead>
                            <tr>
                                <th style="text-transform:none">ID</th>
                                <th style="text-transform:none">İsim</th>
                                <th style="text-transform:none">Email</th>
                                <th style="text-transform:none">Adres</th>
                                <th style="text-transform:none">Telefon</th>
                                <th style="text-transform:none">Toplam</th>
                                <th style="text-transform:none">Tarih</th>
                                <th style="text-transform:none">Durum</th>
                                <th style="text-transform:none">Detay</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $rs)
                                <tr>
                                    <td>{{$rs->id}}</td>
                                    <td>{{$rs->name}}</td>
                                    <td>{{$rs->email}}</td>
                                    <td>{{$rs->address}}</td>
                                    <td>{{$rs->phone}}</td>
                                    <td>{{$rs->total}}₺</td>
                                    <td>{{$rs->created_at->format('d.m.Y H:i:s ')}}</td>
                                    <td>{{$rs->status}}</td>
                                    <td><a href="{{route('myorders_show',['id' => $rs->id])}}"><i class="fas fa-search"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




