<x-layout>

<!-- Header -->

  <!-- <div class="container header">
    <div class="row">
      <div class="col-md-12">
        <x-logoimage.logo/>
      </div>
    </div>
  </div> -->
  @if(session()->has('denied'))
        <script>
                showNotification('Accesso negato!', "{!!session('denied')!!}",'error','2');
        </script>
    @endif
    @if(session()->has('revisor'))
        <script>
                showNotification('Perfetto!', "{!!session('revisor')!!}",'success','2');
        </script>
    @endif
    @if(session()->has('password'))
        <script>
                showNotification('Perfetto!', "{!!session('password')!!}",'success','2');
        </script>
    @endif
    @if(session()->has('revisor'))
        <script>
                showNotification('Perfetto!', "{!!session('revisor')!!}",'success','2');
        </script>
    @endif
    @if(session()->has('status'))
        <script>
                showNotification('Attenzione!', "{!!session('status')!!}",'error','2');
        </script>
    @endif
    @if(session()->has('emailsend'))
        <script>
                showNotification('Perfetto!', "{!!session('emailsend')!!}",'success','4');
        </script>
    @endif
    @if(count($articles) > 0 )
    <h1 class="text-center mt-5">{{__('ui.esplorainostri')}} <span class="text-danger">{{__('ui.articoli')}}</span> {{__('ui.piurecenti')}}!</h1>
    <div class="container swiper mySwiper mb-5">
          <div class="d-flex flex-row swiper-wrapper">
          @foreach ($articles as $article)
            <div class="col-12 col-md-4 swiper-slide">
              <x-card :article="$article"/>
            </div>
          @endforeach
          </div>
          <div class="swiper-pagination"></div>
        </div>
        @endif
        <x-articlefind/>
        <h1 class="my-5 text-center">{{__('ui.contattaci')}}</h1>
        <p class="my-5 text-center">{{__('ui.siamoAdisposizione')}}</p>
        <x-contact />
        <div>
          <h1 class="my-5">{{__('ui.mappa')}}</h1>
        <div style="width: 100%;position: relative;"><iframe width="100%" height="440" src="https://maps.google.com/maps?width=700&amp;height=440&amp;hl=en&amp;q=Strada%20S.%20Giorgio%20Martire%2C%202D%2C%2070124+(Aulab)&amp;ie=UTF8&amp;t=&amp;z=10&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><div style="position: absolute;width: 80%;bottom: 10px;left: 0;right: 0;margin-left: auto;margin-right: auto;color: #000;text-align: center;"><small style="line-height: 1.8;font-size: 2px;background: #fff;">Powered by <a href="http://www.googlemapsgenerator.com/pt/">googlemapsgen (pt)</a> & <a href="https://bettingsidor-utan-svensk-licens.se/">https://bettingsidor-utan-svensk-licens.se/</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><br />
        </div>

</x-layout>