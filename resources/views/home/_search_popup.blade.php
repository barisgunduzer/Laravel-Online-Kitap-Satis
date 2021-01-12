<!-- Start Search Popup -->
<div class="brown--color box-search-content search_active block-bg close__top">
    <form id="search_mini_form" class="minisearch" action="{{route('getproduct')}}" method="post">
        @csrf
        <div class="field__search">
            @livewire('search')
            <a type="submit"><i class="zmdi zmdi-search"></i></a>
        </div>
    </form>
    @livewireScripts
    <div class="close__wrap">
        <span>Kapat</span>
    </div>
</div>
<!-- End Search Popup -->
