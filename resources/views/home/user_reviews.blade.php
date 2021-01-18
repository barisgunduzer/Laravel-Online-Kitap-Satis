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
                        <h2 class="bradcaump-title" style="text-transform:none;color:#1d2124">Yorumlarım</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="{{route('home')}}" style="text-transform:none;color:#1d2124">Anasayfa</a>
                            <span class="brd-separetor" style="text-transform:none;color:#1d2124">/</span>
                            <span class="breadcrumb_item active" style="text-transform:none;color:#e59285">Yorumlarım</span>
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
                                <th style="text-transform:none">Ürün</th>
                                <th style="text-transform:none">Başlık</th>
                                <th style="text-transform:none">Yorum</th>
                                <th style="text-transform:none">Puan</th>
                                <th style="text-transform:none">Tarih / Saat</th>
                                <th style="text-transform:none">Durum</th>
                                <th style="text-transform:none">Sil</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reviews as $rs)
                                <tr>
                                    <td>{{$rs->id}}</td>
                                    <td><a href="{{route('product',['id' => $rs->product->id,'slug' => $rs->product->slug])}}" target="_blank"></a>{{$rs->product->title}}, {{$rs->product->author_name}}</td>
                                    <td>{{$rs->subject}}</td>
                                    <td>{{$rs->review}}</td>
                                    <td>{{$rs->rate}}</td>
                                    <td>{{$rs->created_at->format('d.m.Y H:i:s ')}}</td>
                                    <td>{{$rs->status}}</td>
                                    <td><a href="{{route('admin_review_delete',['id' => $rs->id])}}" onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i></a></td>
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




