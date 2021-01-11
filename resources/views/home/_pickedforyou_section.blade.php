<!-- Best Sale Area -->
<section class="best-seel-area pt--80 pb--60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__title text-center pb--50">
                    <h2 class="title__be--2" style="text-transform:none"><span class="color--theme">SİZİN İÇİN </span>SEÇTİKLERİMİZ</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="slider center">
        @foreach($picked as $rs)
        <!-- Single product start -->
        <div class="product product__style--3">
            <div class="product__thumb">
                <a class="first__img" href="{{route('product',['id' => $rs->id,'slug' => $rs->slug])}}"><img src="{{Storage::url($rs->image)}}" alt="product image"></a>
            </div>
            <div class="product__content content--center">
                <div class="action">
                    <div class="actions_inner">
                        <ul class="add_to_links">
                            <li><a class="cart" href="{{route('addtocart',['id' => $rs->id])}}"><i class="bi bi-shopping-bag4"></i></a></li>
                            <li><a class="wishlist" href="wishlist.html"><i class="bi bi-heart-beat"></i></a></li>
                            <li><a data-toggle="modal" title="Quick View" class="quickview modal-view detail-link"
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
        <!-- Single product end -->
        @endforeach
    </div>
</section>
