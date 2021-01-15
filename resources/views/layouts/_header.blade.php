<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!--Start Main Wrapper -->
<div class="wrapper" id="wrapper">
    <!-- Header -->
    <header id="wn__header" class="header__area header__absolute sticky__header">
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
                            <li class="drop"><a href="" style="text-transform:none">Kitap</a>
                                <div class="megamenu mega03">
                                    <ul class="item item03">
                                        <li class="title" style="text-transform:none">Kategoriler</li>
                                        @include('home._menu')
                                    </ul>
                                    <ul class="item item03">
                                        <li class="title" style="text-transform:none">En Çok Satanlar</li>
                                        <li><a href="">Mystery</a></li>
                                        <li><a href="l">Religion & Inspiration</a></li>
                                        <li><a href="">Romance</a></li>
                                        <li><a href="">Fiction/Fantasy</a></li>
                                        <li><a href="">Sleeveless</a></li>
                                    </ul>
                                    <ul class="item item03">
                                        <li class="title" style="text-transform:none">Koleksiyonlar</li>
                                        <li><a href="">Science </a></li>
                                        <li><a href="">Fiction/Fantasy</a></li>
                                        <li><a href="">Self-Improvement</a></li>
                                        <li><a href="">Home & Garden</a></li>
                                        <li><a href="">Humor Books</a></li>
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
                        </ul>
                    </nav>
                </div>
                <div class="col-md-6 col-sm-6 col-6 col-lg-2">
                    <ul class="header__sidebar__right d-flex justify-content-end align-items-center">
                        <li class="shop_search"><a class="search__active" href="#"></a></li>
                        <li class="wishlist"><a href="#"></a></li>
                        <li class="shopcart"><a class="cartbox_active" href="#"><span class="product_qun">3</span></a>
                            <!-- Start Shopping Cart -->
                            <div class="block-minicart minicart__active">
                                <div class="minicart-content-wrapper">
                                    <div class="micart__close">
                                        <span>close</span>
                                    </div>
                                    <div class="items-total d-flex justify-content-between">
                                        <span>3 items</span>
                                        <span>Cart Subtotal</span>
                                    </div>
                                    <div class="total_amount text-right">
                                        <span>$66.00</span>
                                    </div>
                                    <div class="mini_action checkout">
                                        <a class="checkout__btn" href="cart.html">Go to Checkout</a>
                                    </div>
                                    <div class="single__items">
                                        <div class="miniproduct">
                                            <div class="item01 d-flex">
                                                <div class="thumb">
                                                    <a href="product-details.html"><img src="{{asset('assets')}}/images/product/sm-img/1.jpg" alt="product images"></a>
                                                </div>
                                                <div class="content">
                                                    <h6><a href="product-details.html">Voyage Yoga Bag</a></h6>
                                                    <span class="prize">$30.00</span>
                                                    <div class="product_prize d-flex justify-content-between">
                                                        <span class="qun">Qty: 01</span>
                                                        <ul class="d-flex justify-content-end">
                                                            <li><a href="#"><i class="zmdi zmdi-settings"></i></a></li>
                                                            <li><a href="#"><i class="zmdi zmdi-delete"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item01 d-flex mt--20">
                                                <div class="thumb">
                                                    <a href="product-details.html"><img src="{{asset('assets')}}/images/product/sm-img/3.jpg" alt="product images"></a>
                                                </div>
                                                <div class="content">
                                                    <h6><a href="product-details.html">Impulse Duffle</a></h6>
                                                    <span class="prize">$40.00</span>
                                                    <div class="product_prize d-flex justify-content-between">
                                                        <span class="qun">Qty: 03</span>
                                                        <ul class="d-flex justify-content-end">
                                                            <li><a href="#"><i class="zmdi zmdi-settings"></i></a></li>
                                                            <li><a href="#"><i class="zmdi zmdi-delete"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item01 d-flex mt--20">
                                                <div class="thumb">
                                                    <a href="product-details.html"><img src="{{asset('assets')}}/images/product/sm-img/2.jpg" alt="product images"></a>
                                                </div>
                                                <div class="content">
                                                    <h6><a href="product-details.html">Compete Track Tote</a></h6>
                                                    <span class="prize">$40.00</span>
                                                    <div class="product_prize d-flex justify-content-between">
                                                        <span class="qun">Qty: 03</span>
                                                        <ul class="d-flex justify-content-end">
                                                            <li><a href="#"><i class="zmdi zmdi-settings"></i></a></li>
                                                            <li><a href="#"><i class="zmdi zmdi-delete"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mini_action cart">
                                        <a class="cart__btn" href="cart.html">View and edit cart</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Shopping Cart -->
                        </li>
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
                                                        <span><a href="#"><i class="far fa-hand-point-right"></i> Siparişlerim</a></span>
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
