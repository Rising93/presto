<x-layout>
<x-slot name="title">Tutti gli Articoli</x-slot>
   
    <div class="container my-5">
        <div class="row justify-content-start">
            @if(count($articles)>=1)
            <h1 class="my-5 text-center">Tutti i nostri <span class="text-danger">Articoli</span> !</h1>
            @foreach($articles as $article)
            <div class="col-12 col-md-4 my-2 mx-auto">
                <x-card :article="$article" />
            </div>
            @endforeach
            @else<div class="col-12 col-md-12 text-center">
                    <h1 class="my-5">Attualmente non sono presenti <span class="text-danger">Articoli</span>!</h1>
                    <h3 class="my-5">Rimani aggiornato!</h3>
                    <x-bladewind.empty-state
                        button_label="Vai alla Home"
                        onclick="location.href='{{route('home')}}'">
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