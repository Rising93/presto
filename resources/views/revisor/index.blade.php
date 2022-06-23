<x-layout>
@if (session()->has('message'))
            <script>
                    showNotification('Perfetto!', "{!!session('message')!!}",'success','2');
            </script>
            @endif
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-12 col-md-6">
                @if(!$article_to_check)
                <h1 class="f-pacifico text-center text-white fs-1 my-5">Non ci sono articoli da mostrare!</h1>
                
                 <x-revisorSVG.svgnocode/>
                
                @else
                <h1 class="f-pacifico text-center text-white fs-1 mt-5">Ci sono i seguenti articoli da visionare</h1>
                @endif
            </div>
        </div>
    </div>
    <div class="container swiper dnonemobile mySwiperCard">
        <div class="d-flex flex-row swiper-wrapper">
            @foreach($article_to_check as $article)
            <div class="col-12 col-md-4 swiper-slide">
                <x-cards :article="$article"/>
            </div>
            @endforeach
        </div>
    </div>
    <div class="container swiper dnonemobilequery mySwiper">
        <div class="d-flex flex-row swiper-wrapper">
            @foreach($article_to_check as $article)
            <div class="col-12 col-md-6 swiper-slide">
                <x-cards :article="$article"/>
            </div>
            @endforeach
        </div>
    </div>
    @if(count($article_rejected)==0)
    <div class="container">
        <div class="d-flex justify-content-center mb-5">
            <div class="col-12 col-md-6">
                <h1 class="f-pacifico text-center text-white fs-1 my-5">
                    Non ci sono articoli scartati!
                </h1>
                <x-revisorSVG.svgnoactive/>
            </div>
        </div>
    </div>
    @else
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 ">
                <h1 class="f-pacifico text-center text-white fs-1 my-5">
                    Articoli scartati!
                </h1>
            </div>
            <div class="col-12 col-md-12">
                <table class="table formCust">
                    <thead>
                        <tr class="text-center">
                            <th class="text-center f-pacifico" scope="col">Nome Articolo</th>
                            <th class="text-center categorySearch f-pacifico" scope="col">Categoria</th>
                            <th class="text-center categorySearch f-pacifico" scope="col">Data Creazione</th>
                            <th class="text-center categorySearch f-pacifico" scope="col">Creato da</th>
                            <th class="text-center f-pacifico" scope="col">Action</th>

                        </tr>
                    </thead>
                    @foreach($article_rejected as $article)
                    @if(!$article->is_accepted)
                    <tbody class="text-center">
                        <tr>
                        <td>{{$article->title}}</td>
                        <td class="categorySearch">{{$article->category->name}}</td>
                        <td class="categorySearch">{{$article->created_at->diffForHumans()}}</td>
                        <td class="categorySearch">{{$article->user->name}}</td>
                        <td>
                        <form action="{{route('revisor.return_article', ['article'=>$article])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <x-bladewind.button
                            color="red"
                            size="small"
                            can-submit="true">
                            Riprendi Articolo
                            </x-bladewind.button>
                        </form>
                        </td>
                        </tr>
                    </tbody>
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
        
    </div>
    @endif

        
</x-layout>