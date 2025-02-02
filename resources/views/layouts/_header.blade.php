<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
<!--Start Main Wrapper -->
<div class="wrapper" id="wrapper">
    <!-- Header -->
    <header id="wn__header" class="header__area header__absolute sticky__header">
        @include('home.message')
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-6 col-lg-2">
                    <div class="logo">
                        <a href="{{route('home')}}">
                            <img src="{{asset('assets')}}/images/logo/logo.png" alt="logo images">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 d-none d-lg-block">
                    <nav class="mainmenu__nav">
                        <ul class="meninmenu d-flex justify-content-start">
                            <li><a href="{{route('home')}}" style="text-transform:none">Anasayfa</a></li>
                            <li class="drop with--one--item"><a href="" style="text-transform:none">Kitap</a>
                                <div class="megamenu mega02">
                                    <ul class="item item02">
                                        <li class="title" style="text-transform:none">En Çok Bakılanlar</li>
                                        @include('home._menu')
                                    </ul>
                                    <ul class="item item03">
                                        <li class="title" style="text-transform:none">En Çok Satanlar</li>
                                        <li><a href="http://127.0.0.1:8000/kategori/20/fantastik">Fantastik</a></li>
                                        <li><a href="http://127.0.0.1:8000/kategori/17/bilim-kurgu">Bilim Kurgu</a></li>
                                        <li><a href="http://127.0.0.1:8000/kategori/19/dunya">Dünya Edebiyatı</a></li>
                                        <li><a href="http://127.0.0.1:8000/kategori/15/bilgisayar">Bilgisayar</a></li>
                                        <li><a href="http://127.0.0.1:8000/kategori/8/egitim">Eğitim</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="drop"><a href="" style="text-transform:none">Kategoriler</a>
                                <div class="megamenu dropdown">
                                    <ul class="item item01">
                                        @include('layouts._category')
                                    </ul>
                                </div>
                            </li>
                            <li><a href="{{route('references')}}" style="text-transform:none">Refereranslar</a></li>
                            <li><a href="{{route('aboutus')}}" style="text-transform:none">Hakkımızda</a></li>
                            <li><a href="{{route('faq')}}" style="text-transform:none">SSS</a></li>
                            <li><a href="{{route('contact')}}" style="text-transform:none">İletişim</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-6 col-6 col-lg-2">
                    <ul class="header__sidebar__right d-flex justify-content-end align-items-center">
                        <li class="shop_search"><a class="search__active" href="#"></a></li>
                        <li class="wishlist"><a href="#"></a></li>
                        <li class="shopcart"><a class="cartbox_active" href="#"><span class="product_qun">{{\App\Http\Controllers\ShopcartController::countmyshopcart()}}</span></a>
                            <!-- Start Shopping Cart -->
                            <div class="block-minicart minicart__active">
                                <div class="minicart-content-wrapper">
                                    <div class="micart__close">
                                    </div>
                                    <div class="items-total d-flex justify-content-between">
                                        <span>Sepetim ({{\App\Http\Controllers\ShopcartController::countmyshopcart()}}) Ürün</span>
                                        <span>Toplam</span>
                                    </div>
                                    <div class="total_amount text-right">
                                        <span>{{\App\Http\Controllers\ShopcartController::subtotal()}}₺</span>
                                    </div>
                                    <form action="{{route('myorders_add')}}" method="post">
                                    @csrf
                                    <div class="mini_action checkout">
                                        <input type="hidden" name="total" value="{{\App\Http\Controllers\ShopcartController::subtotal()}}">
                                        <a class="checkout__btn" href="javascript:void(0)" style="text-transform:none">Siparişi Tamamla</a>
                                    </div>
                                    </form>
                                    <div class="single__items">
                                        <div class="miniproduct">
                                            @foreach(\App\Http\Controllers\ShopcartController::myshopcart() as $rs)
                                            <div class="item01 d-flex">
                                                <div class="thumb">
                                                    <a href="{{route('product',['id'=>$rs->product->id,'slug'=>$rs->product->slug])}}"><img src="{{Storage::url($rs->product->image)}}" alt="product images"></a>
                                                </div>
                                                <div class="content">
                                                    <h6><a href="{{route('product',['id'=>$rs->product->id,'slug'=>$rs->product->slug])}}">{{$rs->product->title}}</a></h6>
                                                    <span class="prize">{{$rs->product->price}}₺</span>
                                                    <div class="product_prize d-flex justify-content-between">
                                                        <span class="qun">Adet: <b>{{$rs->quantity}}</b></span>
                                                        <ul class="d-flex justify-content-end">
                                                            <li><a href="{{route('myshopcart_delete',['id'=>$rs->id])}}"><i class="zmdi zmdi-delete"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="mini_action cart">
                                        <a class="cart__btn" href="{{route('myshopcart')}}" style="text-transform:none;background-color:#e59285"><span class="color--white">Sepete Git</span></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Shopping Cart -->
                        <li class="setting__bar__icon"><a class="setting__active" href="#"></a>
                            <div class="searchbar__content setting__block">
                                <div class="content-inner">
                                    <div class="switcher-currency">
                                        <strong class="label switcher-label">
                                            <span class="color--theme">@auth{{Auth::user()->name}}@endauth</span>
                                        </strong>
                                        <div class="switcher-options">
                                            <div class="switcher-currency-trigger">
                                                <div class="setting__menu">
                                                    @auth
                                                        <span><a href="{{route('myprofile')}}"><i class="far fa-user-circle"></i> Hesabım</a></span>
                                                        <span><a href="{{route('myorders')}}"><i class="far fa-hand-point-right"></i> Siparişlerim</a></span>
                                                        <span><a href="{{route('myreviews')}}"><i class="far fa-comment"></i> Yorumlarım</a></span>
                                                        <span><a href="#"><i class="far fa-heart"></i> Favorilerim</a></span>
                                                        <span><a href="{{route('logout')}}"><i class="far fa-times-circle"></i> Çıkış</a></span>
                                                    @endauth
                                                    @guest
                                                        <span><a href="/login"><span class="color--theme">Giriş Yap</span></a></span>
                                                        <span><a href="/register">Üye Ol</a></span>
                                                    @endguest
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Start Mobile Menu -->
            <div class="row d-none">
                <div class="col-lg-12 d-none">
                    <nav class="mobilemenu__nav">
                        <ul class="meninmenu">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="#">Pages</a>
                                <ul>
                                    <li><a href="about.html">About Page</a></li>
                                    <li><a href="portfolio.html">Portfolio</a>
                                        <ul>
                                            <li><a href="portfolio.html">Portfolio</a></li>
                                            <li><a href="portfolio-details.html">Portfolio Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="my-account.html">My Account</a></li>
                                    <li><a href="cart.html">Cart Page</a></li>
                                    <li><a href="checkout.html">Checkout Page</a></li>
                                    <li><a href="wishlist.html">Wishlist Page</a></li>
                                    <li><a href="error404.html">404 Page</a></li>
                                    <li><a href="faq.html">Faq Page</a></li>
                                    <li><a href="team.html">Team Page</a></li>
                                </ul>
                            </li>
                            <li><a href="shop-grid.html">Shop</a>
                                <ul>
                                    <li><a href="shop-grid.html">Shop Grid</a></li>
                                    <li><a href="single-product.html">Single Product</a></li>
                                </ul>
                            </li>
                            <li><a href="blog.html">Blog</a>
                                <ul>
                                    <li><a href="blog.html">Blog Page</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">İletişim</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- End Mobile Menu -->
            <div class="mobile-menu d-block d-lg-none">
            </div>
            <!-- Mobile Menu -->
        </div>
        @include('home._search_popup')
    </header>
    <!-- //Header -->
</div>
