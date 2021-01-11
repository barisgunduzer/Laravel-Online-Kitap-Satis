@php
    $parentCategories = \App\Http\Controllers\HomeController::categorylist()
@endphp

@foreach($parentCategories as $rs)
    <li @if (count($rs->children)) class="label2" @else @endif><a href="{{route('category',['id'=>$rs->id,'slug'=>$rs->slug])}}">{{$rs->title}}</a></li>
    @if(count($rs->children))
        @include('layouts.categorytree',['children' => $rs->children])
    @endif
@endforeach

