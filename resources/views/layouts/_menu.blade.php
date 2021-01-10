@php
    $parentCategories = \App\Http\Controllers\HomeController::categorylist()
@endphp

@foreach($parentCategories as $rs)
    <li><a href="">{{$rs->title}}</a></li>
    @if(count($rs->children))
        @include('layouts.categorytree2',['children' => $rs->children])
    @endif
@endforeach

