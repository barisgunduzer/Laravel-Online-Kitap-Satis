@foreach($children as $subcategory)
    @if(count($subcategory->children))
        <ul>
            <li class="label2"><a href="#">{{$subcategory->title}}</a></li>
            @include('layouts.categorytree',['children' => $subcategory->children])
        </ul>
    @else
        <ul>
            <li><a href="#">{{$subcategory->title}}</a></li>
        </ul>
    @endif
@endforeach
