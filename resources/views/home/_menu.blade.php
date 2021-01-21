@php
    $parentCategories = \App\Http\Controllers\HomeController::categorylist()
@endphp

<ul class="item item03">
    @foreach($parentCategories as $rs)
    <li><a href="{{route('category',['id'=>$rs->id,'slug'=>$rs->slug])}}">{{$rs->title}}</a></li>
    @endforeach
</ul>
