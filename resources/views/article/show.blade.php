<x-layout>
    <div class="container my-5">
        <div  class="row justify-content-center formCust">
          <div class="col-12 col-md-6">
              <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiperArticles">
                <div class="swiper-wrapper">
                  @foreach($article->images as $image)
                  <div class="swiper-slide">
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
            <h2 class="text-break">{{$article->price}}€</h2>
            <p class="text-break my-2">Creato da <a class="text-danger" href="">{{$article->user->name}}</a></p>
          </div>
      </div>
    </div>
    
    

</x-layout>