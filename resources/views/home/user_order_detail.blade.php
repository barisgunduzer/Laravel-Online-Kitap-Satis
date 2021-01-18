@extends('layouts.home')

@section('title','Sepetim')

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
                        <h2 class="bradcaump-title" style="text-transform:none;color:#1d2124">Sipariş Detayı</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="{{route('home')}}" style="text-transform:none;color:#1d2124">Anasayfa</a>
                            <span class="brd-separetor" style="text-transform:none;color:#1d2124">/</span>
                            <span class="breadcrumb_item active" style="text-transform:none;color:#e59285">Sipariş Detayı</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-blog-details pt--80 pb--45 bg--white">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                    @include('home.usermenu')
                </div>
                <div class="col-lg-9 col-12">
                    <div class="blog-details content">
                        <!-- cart-main-area start -->
                        <div class="cart-main-area section-padding--lg bg--white">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 ol-lg-12">
                                        <div class="table-content wnro__table table-responsive">
                                            <table>
                                                <thead>
                                                <tr class="title-top">
                                                    <th class="product-thumbnail" style="text-transform:none">Görsel</th>
                                                    <th class="product-name" style="text-transform:none">Ürün</th>
                                                    <th class="product-price" style="text-transform:none">Fiyat</th>
                                                    <th class="product-quantity" style="text-transform:none">Adet</th>
                                                    <th class="product-subtotal" style="text-transform:none">Toplam</th>
                                                    <th class="product-remove" style="text-transform:none">Durum</th>
                                                    <th class="product-remove" style="text-transform:none">Not</th>
                                                    <th class="product-remove" style="text-transform:none">Sipariş Tarihi</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                    $subtotal = 0;
                                                @endphp
                                                @foreach($datalist as $rs)
                                                    <tr>
                                                        <td class="product-thumbnail"><a href="{{route('product',['id'=>$rs->product->id,'slug'=>$rs->product->slug])}}"><img src="{{Storage::url($rs->product->image)}}" alt="product img"></a></td>
                                                        <td class="product-name"><a href="{{route('product',['id'=>$rs->product->id,'slug'=>$rs->product->slug])}}">{{$rs->product->title}}</a></td>
                                                        <td class="product-price"><span class="price">{{$rs->product->price}}₺</span></td>
                                                        <td class="product-quantity"><span>{{$rs->quantity}}</span></td>
                                                        <td class="product-subtotal">{{$rs->product->price * $rs->quantity}}₺</td>
                                                        <td class="product-info">{{$rs->status}}</td>
                                                        <td class="product-description">{{$rs->note}}</td>
                                                        <td class="product-info">{{$rs->created_at->format('d.m.Y H:i:s ')}}</td>
                                                    </tr>
                                                    @php
                                                      $subtotal += $rs->product->price * $rs->quantity
                                                    @endphp
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-6">
                                        <div class="cartbox__total__area">
                                            <div class="cartbox-total d-flex justify-content-between">
                                                @php
                                                    $cost = 10;
                                                    if($subtotal < 100)
                                                        $total = $subtotal + $cost;
                                                    else
                                                        $total = $subtotal;
                                                @endphp
                                                <ul class="cart__total__list">
                                                    <li>Ara Tutar (KDV Dahil)</li>
                                                    @if($subtotal < 100)
                                                    <li>Kargo Bedeli</li>
                                                    @else
                                                    <li>Ücretsiz Kargo</li>
                                                    @endif
                                                </ul>
                                                <ul class="cart__total__tk">
                                                    <li>{{$subtotal}}₺</li>
                                                    @if($subtotal < 100)
                                                    <li>{{$cost}}₺</li>
                                                    @else
                                                    <li><s>{{$cost}}</s>₺</li>
                                                    @endif
                                                </ul>
                                            </div>
                                            <div class="cart__total__amount">
                                                <span>Toplam</span>
                                                <span>
                                                    {{$total}}₺
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- cart-main-area end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
@endsection
