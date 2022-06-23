<x-layout>
<x-slot name="title">Tutti gli Articoli per {{$category->name}}</x-slot>
    <div class="container my-5">
        <div class="row justify-content-start">
            @if(count($category->articles)>=1)
            <h1 class="text-center">Ecco tutti gli <span class="text-danger">Annunci</span> della categoria <span class="text-danger">{{$category->name}}</span> !</h1>
                @foreach ($articles as $article)
                    <div class="col-12 col-md-4 my-2 mx-auto">
                        <x-card :article="$article" />
                    </div>
                @endforeach
                @else
                    <div class="col-12 col-md-12 text-center">
                        <h1 class="my-5">{{__('ui.nessunArticolo')}} <span class="text-danger">{{__('ui.categoria')}}!</span></h1>
                        <h3 class="my-5">{{__('ui.esploraAltreCategorie')}}</h3>
                        <x-bladewind.empty-state
                            button_label="{{__('ui.vaiAllaHome')}}"
                            onclick="location.href='{{route('article.index')}}'">
                        </x-bladewind.empty-state>
                    </div>
            @endif
        </div>
        <div class="my-3 row justify-content-center">
            <div class="linkCust col-12 col-md-3 mb-5">
                {{$articles->links('vendor.pagination.custom')}}
            </div>
        </div>
    </div>
</x-layout>