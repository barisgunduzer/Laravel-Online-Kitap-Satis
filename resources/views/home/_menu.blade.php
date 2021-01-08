@php
    $parentCategories = \App\Http\Controllers\HomeController::categorylist()
@endphp

<ul class="item item03">
    @foreach($parentCategories as $rs)
    <li><a href="shop-grid.html">{{$rs->title}}</a></li>
    @endforeach
</ul>
