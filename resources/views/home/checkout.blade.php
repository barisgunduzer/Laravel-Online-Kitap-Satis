@extends('layouts.home')

@section('title','User Profile')

@section('description',$setting->description)

@section('keywords',$setting->keywords)

@section('author',$setting->author)

@section('content')

    <!-- Start Checkout Area -->
    <form class="checkout__form" action="{{route('myorders_store')}}" method="post">
        @csrf
        <section class="wn__checkout__area section-padding--lg bg__white">
            <div class="container">
                <br><br><br>
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="customer_details">
                            <h3>Gönderi Adresi</h3>
                            <div class="customar__field">
                                <div class="margin_between">
                                    <div class="input_box space_between">
                                        <label>Adınız ve Soyadınız:<span>*</span></label>
                                        <input type="text" name="name" value="{{Auth::user()->name}}">
                                    </div>
                                </div>
                                <div class="input_box">
                                    <label>Adres:<span>*</span></label>
                                    <input type="text" name="address" value="{{Auth::user()->address}}">
                                </div>
                                <div class="margin_between">
                                    <div class="input_box space_between">
                                        <label>Telefon <span>*</span></label>
                                        <input type="text" name="phone" value="{{Auth::user()->phone}}" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
                                    </div>
                                    <div class="input_box space_between">
                                        <label>Eposta Adresi:<span>*</span></label>
                                        <input type="email" name="email" value="{{Auth::user()->email}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="customer_details">
                            <div id="accordion" class="checkout_accordion mt--30" role="tablist">
                                <div class="payment">
                                    <div class="che__header" role="tab" id="headingOne">
                                        <a class="checkout__title" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <span>Banka / Kredi Kartı</span>
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="payment-body">
                                            <div class="customar__field">
                                                <div class="margin_between">
                                                    <div class="input_box space_between">
                                                        <label>Adınız ve Soyadınız:<span>*</span></label>
                                                        <input type="text" value="{{Auth::user()->name}}">
                                                    </div>
                                                </div>
                                                <div class="input_box">
                                                    <label>Kart Numarası:<span>*</span></label>
                                                    <input id="ccn" type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx">
                                                </div>
                                                <div class="margin_between">
                                                    <div class="input_box space_between">
                                                        <label>Güvenlik Kodu <span>*</span></label>
                                                        <input class="required" id="field" type="text" maxlength="4">
                                                    </div>
                                                    <div class="input_box space_between">
                                                        <label>Son Kullanım Tarihi:<span>*</span></label>
                                                        <select name='expireMM' id='expireMM'>
                                                            <option value=''>Ay</option>
                                                            <option value='01'>Ocak</option>
                                                            <option value='02'>Şubat</option>
                                                            <option value='03'>Mart</option>
                                                            <option value='04'>Nisan</option>
                                                            <option value='05'>Mayıs</option>
                                                            <option value='06'>Haziran</option>
                                                            <option value='07'>Temmuz</option>
                                                            <option value='08'>Ağustos</option>
                                                            <option value='09'>Eylül</option>
                                                            <option value='10'>Ekim</option>
                                                            <option value='11'>Kasım</option>
                                                            <option value='12'>Aralık</option>
                                                        </select>
                                                        <select name='expireYY' id='expireYY'>
                                                            <option value=''>Yıl</option>
                                                            <option value='10'>2021</option>
                                                            <option value='11'>2021</option>
                                                            <option value='12'>2022</option>
                                                            <option value='12'>2023</option>
                                                            <option value='12'>2024</option>
                                                            <option value='12'>2025</option>
                                                            <option value='12'>2026</option>
                                                            <option value='12'>2027</option>
                                                            <option value='12'>2028</option>
                                                            <option value='12'>2029</option>
                                                        </select>
                                                        @php
                                                        $cost = 10;
                                                        if($subtotal < 100)
                                                            $total = $subtotal + $cost;
                                                        else
                                                            $total = $subtotal;
                                                        @endphp
                                                        <input type="hidden" name="total" value="{{$total}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="payment">
                                    <div class="che__header" role="tab" id="headingTwo">
                                        <a class="collapsed checkout__title" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <span>Anında Havale</span>
                                        </a>
                                    </div>
                                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="payment-body">Anında Havale seçeneğini kullanarak siparişinizi anında onaylatabilirsiniz.</div>
                                    </div>
                                </div>
                                <div class="payment">
                                    <div class="che__header" role="tab" id="headingThree">
                                        <a class="collapsed checkout__title" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <span>Alışveriş Kredisi</span>
                                        </a>
                                    </div>
                                    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="payment-body">750 TL üzeri alışverişlerinizde 36 aya varan vade seçeneğinden yararlanabilirsiniz.</div>
                                    </div>
                                </div>
                                <div class="payment">
                                    <div class="che__header" role="tab" id="headingFour">
                                        <a class="collapsed checkout__title" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            <span>Çoklu Kredi Kartı</span>
                                        </a>
                                    </div>
                                    <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour" data-parent="#accordion">
                                        <div class="payment-body">Ödemenizi istediğiniz tutarlarda bölerek iki kredi kartı ile tamamlama imkanından yararlanabilirsiniz.</div>
                                    </div>
                                </div>
                                <div class="payment">
                                    <div class="che__header" role="tab" id="headingFour">
                                        <a class="collapsed checkout__title" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            <span>Dijital Banka Cüzdanı</span>
                                        </a>
                                    </div>
                                    <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour" data-parent="#accordion">
                                        <div class="payment-body">Kart bilgisi girmeden dijital hesaplarınızı kolaylıkla kullanabilirsiniz.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12 md-mt-40 sm-mt-40">
                        <div class="wn__order__box">
                            <h3 class="onder__title" style="text-transform:none">Sipariş Özeti</h3>
                            <ul class="order__total">
                                <li>Ürün</li>
                                <li>Toplam</li>
                            </ul>
                            <ul class="order_product">
                                @foreach($cart as $rs)
                                    <li><a href="{{route('product',['id'=>$rs->product->id,'slug'=>$rs->product->slug])}}"><img src="{{Storage::url($rs->product->image)}}" width="50" alt=""></a> {{$rs->product->title}} × {{$rs->quantity}}<span>{{$rs->product->price * $rs->quantity}}₺</span> </li>
                                @endforeach
                            </ul>
                            <ul class="shipping__method">
                                <li>Ürün Toplamı<span>{{$subtotal}}₺</span></li>
                                @if($subtotal < 100)
                                    <li>Kargo Ücreti<span>{{$cost}}₺</span></li>
                                @else
                                    <li>Ücretsiz Kargo<span><s>{{$cost}}</s></span></li>
                                @endif
                            </ul>
                            <ul class="total__amount">
                                    <li>Toplam <span>{{$total}}₺</span></li>
                            </ul>
                        </div>
                        <div class="cartbox__btn">
                            <ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">
                                <li></li>
                                <li><a href="javascript:void(0)" class="order__btn">Sipariş Ver</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
    <!-- End Checkout Area -->
@endsection




