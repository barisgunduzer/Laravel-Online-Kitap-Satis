@php
    $avgrev = \App\Http\Controllers\HomeController::avrgreview($book->id);
    $countreview = \App\Http\Controllers\HomeController::countreview($book->id);
@endphp

@extends('layouts.home')

@section('title',$book->title.', '.$book->author_name.' - Fiyatı & Satın Al | '.$setting->company)

@section('description',$book->description)

@section('keywords',$book->keywords)

@section('css')
    <style>
        .txt-center {
            text-align: center;
        }
        .hide {
            display: none;
        }

        .clear {
            float: none;
            clear: both;
        }

        .rating > label {
            float: right;
            display: inline;
            padding: 0;
            margin: 0;
            position: relative;
            width: 1.1em;
            cursor: pointer;
            color: #aaaaaa;
        }

        .rating > label:hover,
        .rating > label:hover ~ label,
        .rating > input.radio-btn:checked ~ label {
            color: #e59285;
        }

        .rating > label:hover:before,
        .rating > label:hover ~ label:before,
        .rating > input.radio-btn:checked ~ label:before,
        .rating > input.radio-btn:checked ~ label:before {
            font-family: "Font Awesome 5 Free";
            content: "\f005";
            position: absolute;
            left: 0;
            color: #e59285;
        }
    </style>
@endsection

@section('content')

    <!-- Start main Content -->
    <div class="maincontent bg--white pt--80 pb--55">
        <div class="container">
            <div class="row">
                <!-- Start Bradcaump area -->
                <div class="row">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <br><br>
                                <div class="bradcaump__inner text-left">
                                    <nav class="bradcaump-content">
                                        <a href="{{route('home')}}">Anasayfa</a>
                                        <span> > </span>
                                        <a href="#">Kategori</a>
                                        <span> > </span>
                                        <span>{{ \App\Http\Controllers\HomeController::categorytags($category, $category->title) }}</span>
                                        <span> > </span>
                                        <a href="#">{{$book->title}}</a>
                                    </nav>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Bradcaump area -->
            </div>
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="wn__single__product">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="wn__fotorama__wrapper">
                                    <div class="fotorama wn__fotorama__action" data-nav="thumbs">
                                        <a href=""><img src="{{Storage::url($book->image)}}" alt=""></a>
                                        @foreach($images as $im)
                                            <a href=""><img src="{{Storage::url($im->image)}}" alt=""></a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="product__info__main">
                                    <h1>{{$book->title}}</h1>
                                    <div class="product-reviews-summary d-flex">
                                        <ul class="rating d-flex">
                                            @if($avgrev == 0)
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                            @else
                                                <li @if($avgrev >= 1) class="on" @else class="off" @endif><i class="fas fa-star"></i></li>
                                                <li @if($avgrev >= 2) class="on" @else class="off" @endif><i class="fas fa-star"></i></li>
                                                <li @if($avgrev >= 3) class="on" @else class="off" @endif><i class="fas fa-star"></i></li>
                                                <li @if($avgrev >= 4) class="on" @else class="off" @endif><i class="fas fa-star"></i></li>
                                                <li @if($avgrev >= 5) class="on" @else class="off" @endif><i class="fas fa-star"></i></li>
                                            @endif
                                        </ul>
                                        <p> @if($avgrev == 0) 0/5 - {{$countreview}} Kişi @else {{(int)$avgrev}}/5 - {{$countreview}} Kişi @endif</p>
                                    </div>
                                    <div class="s-price-box">
                                        <br>
                                        <span class="new-price">{{$book->price}}₺</span>
                                        <span class="old-price">{{$book->price*1.2}}₺</span>
                                    </div>

                                    <div class="product__overview">
                                        <p><b>Yazar :</b> {{$book->author_name}}</p>
                                        <p><b>Yayınevi :</b> {{$book->publisher_name}}</p>
                                        <p><b>Tüm Ürün Formatları</b> (1 Adet)</p>
                                        <p><i class=" fa fa-box-open"></i> Standart Teslimat’ta 100 TL üzeri kargo bedava!</p>

                                    </div>
                                    <form action="{{route('myshopcart_add',['id'=>$book->id])}}" method="post">
                                        @csrf
                                        <div class="box-tocart d-flex">
                                            <input id="quantity" class="input-text qty" name="quantity" min="1" value="1" max="{{$book->quantity_in_stock}}" title="Qty" type="number">
                                            <div class="addtocart__actions">
                                                <button class="tocart" type="submit" title="Add to Cart">Sepete Ekle</button>
                                            </div>
                                            <div class="product-addto-links clearfix">
                                                <a class="wishlist" href="#"></a>
                                                <a class="compare" href="#"></a>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="product_meta">
											<span class="posted_in">Kategoriler:
												{{ \App\Http\Controllers\HomeController::categorytags($category, $category->title) }}
											</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product__info__detailed">
                        <div class="pro_details_nav nav justify-content-start" role="tablist">
                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-details" role="tab" style="text-transform:none">Kitap Detayı</a>
                            <a class="nav-item nav-link" data-toggle="tab" href="#nav-review" role="tab" style="text-transform:none">Yorumlar ({{$countreview}})</a>
                        </div>
                        <div class="tab__container">
                            <!-- Start Single Tab Content -->
                            <div class="pro__tab_label tab-pane fade show active" id="nav-details" role="tabpanel">
                                <div class="description__attribute">
                                    {!! $book->book_detail !!}
                                </div>
                            </div>
                            <!-- End Single Tab Content -->
                            <!-- Start Single Tab Content -->
                            <div class="pro__tab_label tab-pane fade" id="nav-review" role="tabpanel">
                                @foreach($reviews as $rs)
                                    <div class="review__attribute">
                                        <div class="review__ratings__type d-flex">
                                            <div class="review-ratings">
                                                <div class="rating d-flex">
                                                    <ul class="rating d-flex">
                                                        <li @if($avgrev >= 1) class="on" @else class="off" @endif><i class="fas fa-star"></i></li>
                                                        <li @if($avgrev >= 2) class="on" @else class="off" @endif><i class="fas fa-star"></i></li>
                                                        <li @if($avgrev >= 3) class="on" @else class="off" @endif><i class="fas fa-star"></i></li>
                                                        <li @if($avgrev >= 4) class="on" @else class="off" @endif><i class="fas fa-star"></i></li>
                                                        <li @if($avgrev >= 5) class="on" @else class="off" @endif><i class="fas fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="review-content">
                                                <b>{{$rs->subject}}</b>
                                                <p>{{$rs->review}}</p>
                                                <p><small>{{$rs->user->name}} | {{$rs->created_at->format('d.m.Y | H:i:s ')}}</small></p>
                                            </div>
                                        </div>
                                    </div>
                                    <br class="divider">
                                @endforeach
                                <div class="review-fieldset">
                                    <div class="review_form_field">
                                        @auth
                                        <form action="{{route('addreview',$book->id)}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="input__box">
                                                <span>Ürünü Değerlendir :</span>
                                            </div>
                                            <div class="rating" style="float:left">
                                                <input id="star5" name="star" type="radio" value="5" class="radio-btn hide" />
                                                <label for="star5"><i class="fas fa-star"></i></label>
                                                <input id="star4" name="star" type="radio" value="4" class="radio-btn hide" />
                                                <label for="star4"><i class="fas fa-star"></i></label>
                                                <input id="star3" name="star" type="radio" value="3" class="radio-btn hide" />
                                                <label for="star3"><i class="fas fa-star"></i></label>
                                                <input id="star2" name="star" type="radio" value="2" class="radio-btn hide" />
                                                <label for="star2"><i class="fas fa-star"></i></label>
                                                <input id="star1" name="star" type="radio" value="1" class="radio-btn hide" />
                                                <label for="star1"><i class="fas fa-star"></i></label>
                                                <div class="clear"></div>
                                            </div>
                                            <small>(1:Kötü, 2:İdare Eder, 3:Fena Değil, 4:İyi, 5:Çok İyi)</small>
                                            <div class="input__box">
                                                <br>
                                                <span>Başlık:</span>
                                                <input id="summery_field" type="text" name="subject">
                                                @error('subject') <span class="text-danger">{{$message}}</span>@enderror
                                            </div>

                                            <div class="input__box">
                                                <span>Yorumunuz:</span>
                                                <textarea rows="3" name="review"></textarea>
                                                @error('review') <span class="text-danger">{{$message}}</span>@enderror
                                            </div>

                                            <div class="review-form-actions">
                                                <button type="submit">Yorum Yap</button>
                                            </div>
                                            @else
                                                <p>Yorum yapmak için lütfen <a href="{{route('login')}}"><span class="color--theme">Giriş</span></a> yapın</p>
                                            @endauth
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Tab Content -->
                        </div>
                    </div>
                    <div class="wn__related__product pt--80 pb--50">
                        <div class="section__title text-center">
                            <h2 class="title__be--2" style="text-transform:none">Kategorinin Çok Satan Ürünleri</h2>
                        </div>
                        <div class="row mt--60">
                            <div class="productcategory__slide--2 arrows_style owl-carousel owl-theme">
                            @foreach($relatedbooks as $rs)
                                @if($rs->id != $book->id)
                                    <!-- Start Single Product -->
                                        <div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
                                            <div class="product__thumb">
                                                <a class="first__img" href="{{route('product',['id' => $rs->id,'slug' => $rs->slug])}}"><img src="{{Storage::url($rs->image)}}" alt="product image"></a>
                                                <a class="second__img animation1" href="{{route('product',['id' => $rs->id,'slug' => $rs->slug])}}"><img src="{{Storage::url($rs->image)}}" alt="product image"></a>
                                            </div>
                                            <div class="product__content content--center content--center">
                                                <h4><a href="#">{{$rs->author_name}}</a></h4>
                                                <h4><a href="#">{{$rs->title}}</a></h4>
                                                <ul class="prize d-flex">
                                                    <li>{{$rs->price}}₺</li>
                                                    <li class="old_prize">{{$rs->price*1.2}}₺</li>
                                                </ul>
                                                <div class="action">
                                                    <div class="actions_inner">
                                                        <ul class="add_to_links">
                                                            <li><a class="cart" href="{{route('myshopcart_add_single',['id'=> $rs->id])}}"><i class="fas fa-cart-plus"></i></a></li>
                                                            <li><a class="wishlist" href="#"><i class="fas fa-heart"></i></a></li>
                                                            <li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="fas fa-search"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product__hover--content">
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
                                        <!-- End Single Product -->
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
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
                            <h3 class="wedget__title" style="text-transform:none">Etiketler</h3>
                            <ul>
                                <li><a href="{{route('category',[$category->id, $category->slug])}}">{{$category->title}}</a></li>
                                @foreach($categories as $cat)
                                    @if($cat->id != $category->id)
                                        <li><a href="{{route('category',[$cat->id, $cat->slug])}}">{{$cat->title}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End main Content -->
@endsection

