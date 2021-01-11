<!-- Start All Books Area -->
<section class="wn__bestseller__area bg--white pt--80  pb--30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__title text-center">
                    <h2 class="title__be--2" style="text-transform: none"><span class="color--theme">TÜM</span> KİTAPLAR</h2>
                </div>
            </div>
        </div>
        <div class="row mt--50">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="product__nav nav justify-content-center" role="tablist">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#nav-all" role="tab" style="text-transform:none;font-size:small">Hepsi</a>
                    @foreach($p_categories as $cat)
                        <a class="nav-item nav-link" data-toggle="tab" href="#nav-{{($cat->slug)}}" role="tab" style="text-transform:none;font-size:small">{{$cat->title}}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="tab__container mt--60">
            <!-- Start Single Tab Content -->
            <div class="row single__tab tab-pane fade show active" id="nav-all" role="tabpanel">
                <div class="product__indicator--4 arrows_style owl-carousel owl-theme">
                @foreach($allbooks as $rs)
                    <!-- Start Single Product -->
                        <div class="single__product">
                            <div class="product product__style--3">
                                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                    <div class="product__thumb">
                                        <a class="first__img" href="{{route('product',['id' => $rs->id,'slug' => $rs->slug])}}"><img src="{{ Storage::url($rs->image)}}" alt="product image"></a>
                                        <a class="second__img animation1" href="{{route('product',['id' => $rs->id,'slug' => $rs->slug])}}"><img src="{{ Storage::url($rs->image)}}" alt="product image"></a>
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
                                                    <li><a class="cart" href="{{route('addtocart',['id' => $rs->id])}}"><i
                                                                class="bi bi-shopping-bag4"></i></a></li>
                                                    <li><a class="wishlist" href="wishlist.html"><i
                                                                class="bi bi-shopping-cart-full"></i></a></li>
                                                    <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a>
                                                    </li>
                                                    <li><a data-toggle="modal" title="Quick View"
                                                           class="quickview modal-view detail-link"
                                                           href="#productmodal"><i class="bi bi-search"></i></a></li>
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
                            </div>
                        </div>
                        <!-- End Single Product -->
                    @endforeach
                </div>
            </div>
            @foreach($p_categories as $cat)
                <div class="row single__tab tab-pane fade" id="nav-{{$cat->slug}}" role="tabpanel">
                    <div class="product__indicator--4 arrows_style owl-carousel owl-theme">
                    @foreach($allbooks as $rs)
                        @if($rs->category_id == $cat->id)
                            <!-- Start Single Product -->
                                <div class="single__product">
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                                        <div class="product product__style--3">
                                            <div class="product__thumb">
                                                <a class="first__img" href="{{route('product',['id' => $rs->id,'slug' => $rs->slug])}}"><img src="{{ Storage::url($rs->image)}}" alt="product image"></a>
                                                <a class="second__img animation1" href="{{route('product',['id' => $rs->id,'slug' => $rs->slug])}}"><img src="{{ Storage::url($rs->image)}}" alt="product image"></a>
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
                                                            <li><a class="cart" href="{{route('addtocart',['id' => $rs->id])}}"><i
                                                                        class="bi bi-shopping-bag4"></i></a></li>
                                                            <li><a class="wishlist" href="wishlist.html"><i
                                                                        class="bi bi-shopping-cart-full"></i></a></li>
                                                            <li><a class="compare" href="#"><i class="bi bi-heart-beat"></i></a>
                                                            </li>
                                                            <li><a data-toggle="modal" title="Quick View"
                                                                   class="quickview modal-view detail-link"
                                                                   href="#productmodal"><i class="bi bi-search"></i></a></li>
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
                                    </div>
                                </div>
                            @endif
                    @endforeach
                    </div>
                </div>
            @endforeach
    <!-- End Single Tab Content -->
    </div>
    </div>
</section>
<!-- End All Books Area -->
