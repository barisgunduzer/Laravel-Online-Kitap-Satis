<div class="wn__sidebar">
    <!-- Start Single Widget -->
    <aside class="widget category_widget">
        <h3 class="widget-title" style="text-transform:none">Kullanıcı Paneli</h3>
        <ul>
            <li><a href="{{route('myprofile')}}">@if(Request::route()->getName() == 'myprofile')<b>Kullanıcı Bilgilerim</b> @else Kullanıcı Bilgilerim @endif</a></li>
            <li><a href="#">Siparişlerim</a></li>
            <li><a href="{{route('myreviews')}}">@if(Request::route()->getName() == 'myreviews')<b>Yorumlarım</b> @else Yorumlarım @endif</a></li>
            <li><a href="#">Sepetim</a></li>
            <li><a href="#">Mesajlarım</a></li>
            <li><a href="{{route('logout')}}">Çıkış</a></li>
        </ul>
    </aside>
    <!-- End Single Widget -->
</div>
