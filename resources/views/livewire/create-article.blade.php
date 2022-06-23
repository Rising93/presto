<div>
    <div class="formCust">
    <form wire:submit.prevent="store">
        <div>
            @if (session()->has('message'))
            <script>
                    showNotification('Perfetto!', "{!!session('message')!!}",'success','2');
            </script>
            @endif
            @if (session()->has('allert'))
            <script>
                    showNotification('Attenzione!', "{!!session('allert')!!}",'warning','5');
            </script>
            @endif
            @if (session()->has('status'))
            <script>
                    showNotification('Errore!', "{!!session('status')!!}",'error','2');
            </script>
            @endif
        </div>
        @csrf
        <div class="mb-2">
            <label for="title">Titolo</label>
            <input class="@error('title') is-invalid @enderror form-control form-control-lg" wire:model="title" type="text">
            @error('title')<p class="my-2 alert alert-danger">{{$message}}</p>@enderror
        </div>
        <div class="mb-2">
            <label for="body">Descrizione</label>
            <textarea class="@error('body') is-invalid @enderror form-control" wire:model="body" rows="3"></textarea>
            @error('body')<p class="my-2 alert alert-danger">{{$message}}</p>@enderror
        </div>
        <div class="mb-2">
            <label for="price">Prezzo</label>
            <input  class="@error('price') is-invalid @enderror form-control form-control-lg" wire:model="price" type="text">
            @error('price')<p class="my-2 alert alert-danger">{{$message}}</p>@enderror
        </div>
        <div class="mb-2">
            <label for="image">Immagine</label>
            <input wire:model="temporary_images" type="file" name="images" multiple class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="immagine">
            @error('temporary_images.*')
               <p class="my-2 alert alert-danger">{{$message}}</p>
            @enderror
        </div>
        @if(!empty($images))
        <div class="container">
            <div class="row justify-content-start align-items-center">
                @foreach($images as $key => $image)
                    <div class="d-inline-flex flex-column align-items-center col-12 col-md-3 my-3">
                        <img src="{{$image->temporaryUrl()}}" style="width:100px; heigth:100px" alt="">
                        <button class="btn btn-danger shadow d-block text-center mt-2 mx-auto" type="button" wire:click="removeImage({{$key}})">Cancella File</button>
                    </div>
                @endforeach
            </div>
        </div>
        @endif
        <div class="mb-2">
            <label for="category">Categoria</label>
            <select class="form-select" id="category" wire:model.defer="category">
                <option >scegli la categoria</option>
                @foreach ($categories as $category)
                <option value="{{  $category->id }}">{{  $category->name }}</option>
                @endforeach
            </select>
        </div>
        <x-bladewind.button
        color="yellow"
        can-submit="true">
            Aggiungi Articolo!
        </x-bladewind.button>
    </form>
    </div>
    <div>
    @if(!empty($images))
    <h1 class="text-center mt-5">Anteprima Articolo!</h1>
    <div class="container my-5">
        <div  class="row justify-content-center formCust">
          <div class="col-12 col-md-6">
              <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiperArticles">
                <div class="swiper-wrapper">
                  @foreach($images as $image)
                  <div class="swiper-slide">
                    <img class="img-round" src="{{$image->temporaryUrl()}}" />
                  </div>
                  @endforeach
                </div>
                <div class="swiper-button-next f-pacifico"></div>
                <div class="swiper-button-prev f-pacifico"></div>
              </div>
              <div thumbsSlider="" class="swiper h25 mySwiperArticle">
                <div class="swiper-wrapper">
                  @foreach($images as $image)
                  <div class="swiper-slide">
                    <img class="img-round" src="{{$image->temporaryUrl()}}" />
                  </div>
                  @endforeach
                </div>
              </div>
          </div>
          <div class="col-12 col-md-6">
            <h1 class="text-danger">Titolo</h1>
            <h2 class="text-break">{{$title}}</h2>
            <h1 class="text-danger">Descrizione</h1>
            <h4 class="text-break">{{$body}}</h4>
            <h2 class="text-danger">Prezzo</h2>
            <h2 class="text-break">{{$price}}€</h2>
            <p class="text-break my-2">Creato da <a class="text-danger" href="">{{Auth::user()->name}}</a></p>
          </div>
      </div>
        @endif
    </div>
</div>


