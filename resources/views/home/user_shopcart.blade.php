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
                        <h2 class="bradcaump-title" style="text-transform:none">Sepetim</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="{{route('home')}}">Anasayfa</a>
                            <span class="brd-separetor">/</span>
                            <a class="breadcrumb_item" href="{{route('myprofile')}}">Hesabım</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb_item active">Sepetim</span>
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
                                            @include('home.message')
                                            <table>
                                                <thead>
                                                <tr class="title-top">
                                                    <th class="product-thumbnail" style="text-transform:none">Görsel</th>
                                                    <th class="product-name" style="text-transform:none">Ürün</th>
                                                    <th class="product-price" style="text-transform:none">Fiyat</th>
                                                    <th class="product-quantity" style="text-transform:none">Adet</th>
                                                    <th class="product-subtotal" style="text-transform:none">Toplam Fiyat</th>
                                                    <th class="product-remove" style="text-transform:none">Sepetten Çıkar</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                    $subtotal = 0;
                                                @endphp
                                                @foreach($cart as $rs)
                                                    <tr>
                                                        <td class="product-thumbnail"><a href="{{route('product',['id'=>$rs->product->id,'slug'=>$rs->product->slug])}}"><img src="{{Storage::url($rs->product->image)}}" alt="product img"></a></td>
                                                        <td class="product-name"><a href="{{route('product',['id'=>$rs->product->id,'slug'=>$rs->product->slug])}}">{{$rs->product->title}}</a></td>
                                                        <td class="product-price"><span class="price">{{$rs->product->price}}₺</span></td>
                                                        <form id="edit_form" action="{{route('myshopcart_edit',['id' => $rs->id])}}" method="post">
                                                            @csrf
                                                            <td class="product-quantity"><input type="number" name="quantity" min="1" max="{{$rs->product->quantity_in_stock}}" onchange="this.form.submit()" value="{{$rs->quantity}}"></td>
                                                        </form>
                                                        <td class="product-subtotal">{{$rs->product->price * $rs->quantity}}₺</td>
                                                        <td class="product-remove"><a href="{{route('myshopcart_delete',['id'=>$rs->id])}}" onclick="return confirm('Ürün sepetten kaldırılsın mı?')">X</a></td>
                                                    </tr>
                                                    @php
                                                      $subtotal += $rs->product->price * $rs->quantity
                                                    @endphp
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="cartbox__btn">
                                            <ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">
                                                <li></li>
                                                <li><a href="#">Siparişi Tamamla</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 offset-lg-6">
                                        <div class="cartbox__total__area">
                                            <div class="cartbox-total d-flex justify-content-between">

                                                <ul class="cart__total__list">
                                                    <li>Ara Tutar (KDV Dahil)</li>
                                                </ul>
                                                <ul class="cart__total__tk">
                                                    <li>
                                                        {{$subtotal}}₺
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="cart__total__amount">
                                                <span>Ara Toplam</span>
                                                <span>
                                                    {{\App\Http\Controllers\ShopcartController::subtotal()}}₺
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
