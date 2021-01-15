@extends('layouts.home')

@section('title',$category->title.' Kategorisindeki Tüm Kitaplar | Kitap Sokağı')

@section('description',$category->description)

@section('keywords',$category->keywords)

@section('author',$category->author)

@section('content')

    <!-- Start Shop Page -->
    <div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
        <div class="container">
            <!-- Start Bradcaump area -->
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <br>
                                <div class="bradcaump__inner text-left">
                                    <nav class="bradcaump-content">
                                        <a href="{{route('home')}}">Anasayfa</a>
                                        <span> > </span>
                                        <a href="#">Kategori</a>
                                        <span> > </span>
                                        <span>{{ \App\Http\Controllers\HomeController::categorytags($category, $category->title) }}</span>
                                    </nav>
                                </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Bradcaump area -->
            <div class="row">
                <div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
                    <div class="shop__sidebar">
                        <aside class="wedget__categories poroduct--cat">
                            <h3 class="wedget__title" style="text-transform:none">Kategoriler</h3>
                            <ul>
                                @foreach($categories as $cat)
                                    @if($cat->id == $category->id)
                                        <li><a href="{{route('category',[$cat->id, $cat->slug])}}"><b>{{$cat->title}}</b><span>{{\App\Http\Controllers\HomeController::numberofbooks($cat->id)}}</span></a></li>
                                    @else
                                        <li><a href="{{route('category',[$cat->id, $cat->slug])}}">{{$cat->title}}<span>{{\App\Http\Controllers\HomeController::numberofbooks($cat->id)}}</span></a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </aside>
                        <aside class="wedget__categories pro--range">
                            <h3 class="wedget__title" style="text-transform:none">Fiyat Aralığı</h3>
                            <div class="content-shopby">
                                <div class="price_filter s-filter clear">
                                    <form action="#" method="GET">
                                        <div id="slider-range"></div>
                                        <div class="slider__range--output">
                                            <div class="price__output--wrap">
                                                <div class="price--output">
                                                    <span>Fiyat Aralığı :</span><input type="text" id="amount" readonly="">
                                                </div>
                                                <div class="price--filter">
                                                    <a href="#" style="text-transform:none">Filtrele</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </aside>
                        <aside class="wedget__categories poroduct--tag">
                            <h3 class="wedget__title" style="text-transform:none">Kategoriler</h3>
                            <ul>
                                <li><a href="">{{$category->title}}</a></li>
                                @foreach($categories as $cat)
                                    @if($cat->id != $category->id)
                                        <li><a href="">{{$cat->title}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </aside>
                    </div>
                </div>
                <div class="col-lg-9 col-12 order-1 order-lg-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
                                <div class="shop__list nav justify-content-center" role="tablist">
                                    <a class="nav-item nav-link active" data-toggle="tab" href="#nav-grid" role="tab"><i class="fa fa-th"></i></a>
                                    <a class="nav-item nav-link" data-toggle="tab" href="#nav-list" role="tab"><i class="fa fa-list"></i></a>
                                </div>
                                <p>{{\App\Http\Controllers\HomeController::numberofbooks($category->id)}} sonuç arasından 1-12 tanesi gösteriliyor</p>
                                <div class="orderby__wrapper">
                                    <span>Sırala</span>
                                    <select class="shot__byselect">
                                        <option>En düşük fiyat</option>
                                        <option>En yüksek fiyat</option>
                                        <option>En çok satanlar</option>
                                        <option>En son çıkanlar</option>
                                        <option>En çok yorum alan</option>
                                        <option>En çok indirim alan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab__container">
                        <div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
                            <div class="row">
                                @foreach($books as $rs)
                                <!-- Start Single Product -->
                                <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                                    <div class="product__thumb">
                                        <a class="first__img" href="{{route('product',['id' => $rs->id,'slug' => $rs->slug])}}"><img src="{{Storage::url($rs->image)}}" alt="product image"></a>
                                        <a class="second__img animation1" href="{{route('product',['id' => $rs->id,'slug' => $rs->slug])}}"><img src="{{Storage::url($rs->image)}}" alt="product image"></a>
                                    </div>
                                    <div class="product__content content--center">
                                        <h4><a href="single-product.html">{{$rs->author_name}}</a></h4>
                                        <h4><a href="single-product.html">{{$rs->title}}</a></h4>
                                        <ul class="prize d-flex">
                                            <li>{{$rs->price}}₺</li>
                                            <li class="old_prize">{{$rs->price*1.2}}₺</li>
                                        </ul>
                                        <div class="action">
                                            <div class="actions_inner">
                                                <ul class="add_to_links">
                                                    <li><a class="cart" href="{{route('addtocart',['id' => $rs->id])}}"><i class="fas fa-cart-plus"></i></a></li>
                                                    <li><a class="wishlist" href="wishlist.html"><i class="fas fa-heart"></i></a></li>
                                                    <li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="fas fa-search"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product__hover--content">
                                            <div class="rating d-flex">
                                                <ul class="rating d-flex">
                                                    <li @if(App\Http\Controllers\HomeController::avrgreview($rs->id) >= 1) class="on" @else class="off" @endif><i class="fas fa-star"></i></li>
                                                    <li @if(App\Http\Controllers\HomeController::avrgreview($rs->id) >= 2) class="on" @else class="off" @endif><i class="fas fa-star"></i></li>
                                                    <li @if(App\Http\Controllers\HomeController::avrgreview($rs->id) >= 3) class="on" @else class="off" @endif><i class="fas fa-star"></i></li>
                                                    <li @if(App\Http\Controllers\HomeController::avrgreview($rs->id) >= 4) class="on" @else class="off" @endif><i class="fas fa-star"></i></li>
                                                    <li @if(App\Http\Controllers\HomeController::avrgreview($rs->id) >= 5) class="on" @else class="off" @endif><i class="fas fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                                @endforeach
                            </div>
                            <ul class="wn__pagination">
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->
@endsection




