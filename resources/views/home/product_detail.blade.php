@extends('layouts.home')

@section('title',$book->title.', '.$book->author_name.' - Fiyatı & Satın Al | '.$setting->company)

@section('description',$book->description)

@section('keywords',$book->keywords)

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
                                <br>
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
                                        <ul class="rating-summary d-flex">
                                            <li><i class="zmdi zmdi-star-outline"></i></li>
                                            <li><i class="zmdi zmdi-star-outline"></i></li>
                                            <li><i class="zmdi zmdi-star-outline"></i></li>
                                            <li class="off"><i class="zmdi zmdi-star-outline"></i></li>
                                            <li class="off"><i class="zmdi zmdi-star-outline"></i></li>
                                        </ul>
                                    </div>
                                    <div class="price-box">
                                        <span>{{$book->price}}₺</span>
                                    </div>
                                    <div class="product__overview">
                                        <p><b>Yazar :</b> {{$book->author_name}}</p>
                                        <p><b>Yayınevi :</b> {{$book->publisher_name}}</p>
                                        <p><b>Tüm Ürün Formatları</b> (1 Adet)</p>
                                        <p><i class=" fa fa-box-open"></i> Standart Teslimat’ta 100 TL üzeri kargo bedava!</p>

                                    </div>
                                    <div class="box-tocart d-flex">
                                        <input id="qty" class="input-text qty" name="qty" min="1" value="1" title="Qty" type="number">
                                        <div class="addtocart__actions">
                                            <button class="tocart" type="submit" title="Add to Cart">Sepete Ekle</button>
                                        </div>
                                        <div class="product-addto-links clearfix">
                                            <a class="wishlist" href="#"></a>
                                            <a class="compare" href="#"></a>
                                        </div>
                                    </div>
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
                            <a class="nav-item nav-link" data-toggle="tab" href="#nav-review" role="tab" style="text-transform:none">Yorumlar</a>
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
                                <div class="review__attribute">
                                    <h1>Müşteri Yorumları</h1>
                                    <h2>kullanıcı adı buraya</h2>
                                    <div class="review__ratings__type d-flex">
                                        <div class="review-ratings">
                                            <div class="rating-summary d-flex">
                                                <span>Quality</span>
                                                <ul class="rating d-flex">
                                                    <li><i class="zmdi zmdi-star"></i></li>
                                                    <li><i class="zmdi zmdi-star"></i></li>
                                                    <li><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                </ul>
                                            </div>

                                            <div class="rating-summary d-flex">
                                                <span>Price</span>
                                                <ul class="rating d-flex">
                                                    <li><i class="zmdi zmdi-star"></i></li>
                                                    <li><i class="zmdi zmdi-star"></i></li>
                                                    <li><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                </ul>
                                            </div>
                                            <div class="rating-summary d-flex">
                                                <span>value</span>
                                                <ul class="rating d-flex">
                                                    <li><i class="zmdi zmdi-star"></i></li>
                                                    <li><i class="zmdi zmdi-star"></i></li>
                                                    <li><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="review-content">
                                            <p>Hastech</p>
                                            <p>Review by Hastech</p>
                                            <p>Posted on 11/6/2018</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="review-fieldset">
                                    <h2>You're reviewing:</h2>
                                    <h3>Chaz Kangeroo Hoodie</h3>
                                    <div class="review-field-ratings">
                                        <div class="product-review-table">
                                            <div class="review-field-rating d-flex">
                                                <span>Quality</span>
                                                <ul class="rating d-flex">
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                </ul>
                                            </div>
                                            <div class="review-field-rating d-flex">
                                                <span>Price</span>
                                                <ul class="rating d-flex">
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                </ul>
                                            </div>
                                            <div class="review-field-rating d-flex">
                                                <span>Value</span>
                                                <ul class="rating d-flex">
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                    <li class="off"><i class="zmdi zmdi-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="review_form_field">
                                        <div class="input__box">
                                            <span>Nickname</span>
                                            <input id="nickname_field" type="text" name="nickname">
                                        </div>
                                        <div class="input__box">
                                            <span>Summary</span>
                                            <input id="summery_field" type="text" name="summery">
                                        </div>
                                        <div class="input__box">
                                            <span>Review</span>
                                            <textarea name="review"></textarea>
                                        </div>
                                        <div class="review-form-actions">
                                            <button>Submit Review</button>
                                        </div>
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
                                            <h4><a href="single-product.html">{{$rs->author_name}}</a></h4>
                                            <h4><a href="single-product.html">{{$rs->title}}</a></h4>
                                            <ul class="prize d-flex">
                                                <li>{{$rs->price}}₺</li>
                                                <li class="old_prize">{{$rs->price+5}}₺</li>
                                            </ul>
                                            <div class="action">
                                                <div class="actions_inner">
                                                    <ul class="add_to_links">
                                                        <li><a class="cart" href="cart.html"><i class="bi bi-shopping-bag4"></i></a></li>
                                                        <li><a class="wishlist" href="wishlist.html"><i class="bi bi-shopping-cart-full"></i></a></li>
                                                        <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a></li>
                                                        <li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product__hover--content">
                                                <ul class="rating d-flex">
                                                    <li class="on"><i class="fa fa-star-o"></i></li>
                                                    <li class="on"><i class="fa fa-star-o"></i></li>
                                                    <li class="on"><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
                                                    <li><i class="fa fa-star-o"></i></li>
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




