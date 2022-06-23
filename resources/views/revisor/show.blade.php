<x-layout>
  <div class="container my-5">
    <div  class="row justify-content-center formCust">
      <div class="col-12 col-md-6">
        <h2>Contenuti identificati</h2>
          <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiperArticles">
            <div class="swiper-wrapper">
              @foreach($article->images as $image)
              <div class="swiper-slide">
                <div class="container">
                  <div class="row justify-content-start">
                    <div class="col-6">
                      <p class=""><span class="{{$image->adult}} "></span> Adulti</p>
                    </div>
                    <div class="col-6">
                      <p class=""><span class="{{$image->spoof}} "></span> Satira</p>
                    </div>
                    <div class="col-6">
                      <p class=""><span class="{{$image->medical}} "></span> Medicina</p>
                    </div>
                    <div class="col-6">
                      <p class=""><span class="{{$image->violence}} "></span> Violenza</p>
                    </div>
                    <div class="col-6">
                      <p class=""><span class="{{$image->racy}} "></span> Razzismo</p>
                    </div>
                  </div>
                </div>
                <img class="img-round" src="{{$image->getUrl(200,250)}}" />
              </div>
              @endforeach
            </div>
            <div class="swiper-button-next f-pacifico"></div>
            <div class="swiper-button-prev f-pacifico"></div>
          </div>
          <div thumbsSlider="" class="swiper h25 mySwiperArticle">
            <div class="swiper-wrapper">
              @foreach($article->images as $image)
              <div class="swiper-slide">
                <img class="img-round" src="{{$image->getUrl(200,250)}}" />
              </div>
              @endforeach
            </div>
          </div>
      </div>
      <div class="col-12 col-md-6">
            <h1 class="text-danger">Titolo</h1>
            <h2 class="text-break">{{$article->title}}</h2>
            <h1 class="text-danger">Descrizione</h1>
            <h4 class="text-break">{{$article->body}}</h4>
            <h2 class="text-danger">Prezzo</h2>
            <h2 class="text-break">{{$article->price}}€</>
            <p class="text-break my-2">Creato da <a class="text-danger" href="">{{$article->user->name}}</a></p>
          </div>
  </div>
      
      
    </div>
    <div class="d-flex justify-content-center">
      <div class="col-6">
      <form action="{{route('revisor.accept_article', ['article'=>$article])}}" method="POST">
                  @csrf
                  @method('PATCH')
                  <x-bladewind.button
                  can_submit="true"
                  color="yellow"
                  >Accetta Articolo
                  </x-bladewind.button>
              </form>
          </div>
          <div class="col-6">
              <form action="{{route('revisor.reject_article', ['article'=>$article])}}" method="POST">
                  @csrf
                  @method('PATCH')
                  <x-bladewind.button
                  can_submit="true"
                  color="red"
                  >Rifiuta Articolo
                  </x-bladewind.button>
              </form>
          </div>   
  </div>
    
    

</x-layout>