@foreach($children as $subcategory)
    @if(count($subcategory->children))
        <ul>
            <li><a href="{{route('category',['id'=>$subcategory->id,'slug'=>$subcategory->slug])}}">{{$subcategory->title}}</a></li>
            @include('layouts.categorytree2',['children' => $subcategory->children])
        </ul>
    @else
        <ul>
            <li><a href="{{route('category',['id'=>$subcategory->id,'slug'=>$subcategory->slug])}}">{{$subcategory->title}}</a></li>
        </ul>
    @endif
@endforeach
