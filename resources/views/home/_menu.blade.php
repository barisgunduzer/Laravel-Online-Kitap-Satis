@php
    $parentCategories = \App\Http\Controllers\HomeController::categorylist()
@endphp

<ul class="item item03">
    <li class="title">Kategoriler</li>
    @foreach($parentCategories as $rs)
    <li><a href="shop-grid.html">{{$rs->title}}</a></li>
    @endforeach
</ul>
