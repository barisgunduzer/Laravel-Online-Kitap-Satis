@php
    $setting = \App\Http\Controllers\HomeController::getsetting();
@endphp

<!-- Start Footer Area -->
<footer id="wn__footer" class="footer__area bg__cat--8 brown--color">
    <div class="footer-static-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__widget footer__menu">
                        <div class="ft__logo">
                            <a href="{{route('home')}}">
                                <img src="{{asset('assets')}}/images/logo/3.png" alt="logo">
                            </a>
                            <p>{{$setting->description}}</p><br>
                        </div>
                        <div class="footer__content">
                            <ul class="social__net social__net--2 d-flex justify-content-center">
                                @if ($setting->facebook != null) <li><a href="{{$setting->facebook}}" target="_blank"><i class="fab fa-facebook"></i></a></li> @endif
                                @if ($setting->instagram != null) <li><a href="{{$setting->instagram}}"><i class="fab fa-instagram"></i></a></li> @endif
                                @if ($setting->twitter != null) <li><a href="{{$setting->twitter}}"><i class="fab fa-twitter"></i></a></li> @endif
                                @if ($setting->youtube != null) <li><a href="{{$setting->youtube}}"><i class="fab fa-youtube"></i></a></li> @endif
                            </ul>
                            <ul class="mainmenu d-flex justify-content-center">
                                <li><a href="{{route('contact')}}">İletişim</a></li>
                                <li><a href="{{route('aboutus')}}">Hakkımızda</a></li>
                                <li><a href="{{route('faq')}}">Yardım/SSS</a></li>
                                <li><a href="#">İşlem Merkezi</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright__wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="copyright">
                        <div class="copy__right__inner text-left">
                            <p><i class="far fa-copyright"></i> <a href="https://github.com/barisgunduzer">barisgunduzer</a> | <script>document.write(new Date().getFullYear());</script> {{$setting->company}} | Tüm Hakları Saklıdır</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="payment text-right">
                        <img src="{{asset('assets')}}/images/icons/payment.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer Area -->

</div>
<!-- End Main Wrapper -->

<!-- JS Files -->
<script src="{{asset('assets')}}/js/vendor/jquery-3.2.1.min.js"></script>
<script src="{{asset('assets')}}/js/popper.min.js"></script>
<script src="{{asset('assets')}}/js/bootstrap.min.js"></script>
<script src="{{asset('assets')}}/js/plugins.js"></script>
<script src="{{asset('assets')}}/js/active.js"></script>
@livewireScripts()
