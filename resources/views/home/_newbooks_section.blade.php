<!-- Start New Books Area -->
<section class="wn__product__area brown--color pt--80  pb--30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__title text-center">
                    <h2 class="title__be--2" style="text-transform:none"><span class="color--theme">YENİ</span> ÇIKANLAR</h2>
                </div>
            </div>
        </div>
        <!-- Start Single Tab Content -->
        <div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50">
        @foreach($newbooks as $rs)
            <!-- Start Single Product -->
                <div class="product product__style--3">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="product__thumb">
                            <a class="first__img" href="{{route('product',['id' => $rs->id,'slug' => $rs->slug])}}"><img src="{{ Storage::url($rs->image)}}" alt="product image"></a>
                            <a class="second__img animation1" href="{{route('product',['id' => $rs->id,'slug' => $rs->slug])}}"><img src="{{Storage::url($rs->image)}}" alt="product image"></a>
                            <div class="hot__box">
                                <span class="hot-label" style="text-transform:none">YENİ</span>
                            </div>
                        </div>
                        <div class="product__content content--center">
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
                                        <li><a class="wishlist" href="wishlist.html"><i class="fas fa-heart"></i></a></li>
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
                                    <li></li>
                                    <li><span class="color--theme">({{\App\Http\Controllers\HomeController::countreview($rs->id)}})</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
        <!-- End Single Product -->
        </div>
        <!-- End Single Tab Content -->
    </div>
</section>
<!-- End New Books Area -->
