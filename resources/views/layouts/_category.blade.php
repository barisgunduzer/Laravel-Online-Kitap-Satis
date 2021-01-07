@php
    $parentCategories = \App\Http\Controllers\HomeController::categorylist()
@endphp

<li class="drop"><a href="#" style="text-transform:none">Kategoriler</a>
    <div class="megamenu dropdown">
        <ul class="item item01">
            @foreach($parentCategories as $rs)
            <li @if (count($rs->children)) class="label2" @else @endif><a href="#">{{$rs->title}}</a></li>
            @if(count($rs->children))
                @include('layouts.categorytree',['children' => $rs->children])
            @endif
            @endforeach
        </ul>
    </div>
</li>
