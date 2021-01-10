@extends('layouts.home')

@section('title', $setting->company.' | Referanslar')

@section('content')

    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area bg-image--6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title" style="text-transform:none">İLETİŞİM</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="{{route('home')}}">Anasayfa</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb_item active">İletişim</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- Start Contact Area -->
    <section class="wn_contact_area bg--white pt--80 pb--80">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="contact-form-wrap">
                        <h2 class="contact__title" style="text-transform:none">İletişim Formu</h2>
                        <form id="contact-form" action="{{route('sendmessage')}}" method="post">
                            @csrf
                            <div class="single-contact-form space-between">
                                <input type="text" name="name" placeholder="Adınız ve Soyadınız">
                            </div>
                            <div class="single-contact-form space-between">
                                <input type="email" name="email" placeholder="Email">
                                <input type="text" name="phone" placeholder="Telefon">
                            </div>
                            <div class="single-contact-form">
                                <input type="text" name="subject" placeholder="Konu">
                            </div>
                            <div class="single-contact-form message">
                                <textarea name="message" placeholder="Mesajınızı buraya yazın.."></textarea>
                            </div>
                            <div class="contact-btn">
                                <button type="submit">Gönder</button>
                            </div>
                        </form>
                    </div>
                    <!--<div class="form-output">
                        <p class="form-messege">
                    </div> -->
                </div>
                <div class="col-lg-4 col-12 md-mt-40 sm-mt-40">
                    <div class="wn__address">
                        <div class="wn__addres__wreapper">

                            <div class="single__address">
                                <i class="icon-location-pin icons"></i>
                                <div class="content">
                                    <span style="text-transform:none">Adres:</span>
                                    <p>{{$setting->address}}</p>
                                </div>
                            </div>
                            <div class="single__address">
                                <i class="icon-phone icons"></i>
                                <div class="content">
                                    <span style="text-transform:none">Telefon:</span>
                                    <p>{{$setting->phone}}</p>
                                </div>
                            </div>
                            <div class="single__address">
                                <i class="icon-envelope icons"></i>
                                <div class="content">
                                    <span style="text-transform:none">Email:</span>
                                    <p><a href="mailto:{{$setting->email}}">{{$setting->email}}</a></p>
                                </div>
                            </div>

                            <div class="single__address">
                                <i class="icon-globe icons"></i>
                                <div class="content">
                                    <span style="text-transform:none">İletişim Formu:</span>
                                    <p><a href="{{route('contact')}}">www.kitapsokagi.com/contact</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-12" style="text-align: center;">
                    <br>
                    <div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Merkez%20Mah.,%20Mecidiyek%C3%B6y%20Yolu%20Cad.%20,%C5%9Ei%C5%9Fli,%C4%B0stanbul+(Kitap%20Soka%C4%9F%C4%B1)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe></div>
                    <br>
                    {!! $setting->contact !!}
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Area -->

@endsection
