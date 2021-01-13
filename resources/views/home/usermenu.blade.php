<div class="page-blog-details pt--80 pb--45 bg--white">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12 md-mt-40 sm-mt-40">
                <div class="wn__sidebar">
                    <!-- Start Single Widget -->
                    <aside class="widget category_widget">
                        <h3 class="widget-title" style="text-transform:none">Kullanıcı Paneli</h3>
                        <ul>
                            <li><a href="{{route('myprofile')}}">Hesabım</a></li>
                            <li><a href="#">Siparişlerim</a></li>
                            <li><a href="#">Değerlendirmelerim</a></li>
                            <li><a href="#">Sepetim</a></li>
                            <li><a href="#">Mesajlarım</a></li>
                            <li><a href="{{route('logout')}}">Çıkış</a></li>
                        </ul>
                    </aside>
                    <!-- End Single Widget -->
                </div>
            </div>
            <div class="col-lg-9 col-12">
                <div class="blog-details content">
                    @include('profile.show')
                </div>
            </div>
        </div>
    </div>
</div>
