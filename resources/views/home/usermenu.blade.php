<div class="wn__sidebar">
    <!-- Start Single Widget -->
    <aside class="widget category_widget">
        <h3 class="widget-title" style="text-transform:none">Kullanıcı Paneli</h3>
        <ul>
            <li><a href="{{route('myprofile')}}">@if(Request::route()->getName() == 'myprofile')<span class="color--theme">Hesabım</span> @else Hesabım @endif</a></li>
            <li><a href="{{route('myshopcart')}}">@if(Request::route()->getName() == 'myshopcart')<span class="color--theme">Sepetim</span> @else Sepetim @endif</a></li>
            <li><a href="{{route('myorders')}}">@if(Request::route()->getName() == 'myorders')<span class="color--theme">Siparişlerim</span> @else Siparişlerim @endif</a></li>
            <li><a href="{{route('myreviews')}}">@if(Request::route()->getName() == 'myreviews')<span class="color--theme">Yorumlarım</span> @else Yorumlarım @endif</a></li>
            <li><a href="{{route('logout')}}">Çıkış</a></li>
        </ul>
    </aside>
    <!-- End Single Widget -->
</div>
