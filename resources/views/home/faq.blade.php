@extends('layouts.home')

@section('title','User Profile')

@section('description',$setting->description)

@section('keywords',$setting->keywords)

@section('author',$setting->author)

@section('content')

    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area bg-image--6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title">Sıkça Sorulan Sorular</h2>
                        <nav class="bradcaump-content">
                            <a class="breadcrumb_item" href="index.html">Anasayfa</a>
                            <span class="brd-separetor">/</span>
                            <span class="breadcrumb_item active">SSS</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- Start Faq Area -->
    <section class="wn__faq__area bg--white pt--80 pb--60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wn__accordeion__content">
                        <h2>Aklınıza takılan soruları sizler için cevapladık.</h2>
                    </div>
                    <div id="accordion" class="wn_accordion" role="tablist">
                        @foreach($faqs as $rs)
                        <div class="card">
                            <div class="acc-header" role="tab" id="heading-{{$rs->id}}">
                                <h5>
                                    <a data-toggle="collapse" href="#collapse-{{$rs->id}}" role="button" aria-expanded="true" aria-controls="collapse-{{$rs->id}}">{{$rs->question}}</a>
                                </h5>
                            </div>
                            <div id="collapse-{{$rs->id}}" class="collapse" role="tabpanel" aria-labelledby="heading-{{$rs->id}}" data-parent="#accordion">
                                <div class="card-body">{!! $rs->answer !!}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Faq Area -->
@endsection




