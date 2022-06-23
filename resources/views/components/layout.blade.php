<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="images/icon_low.png">
    <!-- Livewire CSS -->
    @livewireStyles
    
    <!-- Swiper CSS -->
    <link
    rel="stylesheet" href= "https://unpkg.com/swiper/swiper-bundle.min.css"/>
    
    <!-- Bladewind Script & CSS -->
    <link href="{{ asset('bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,700;1,300;1,900&display=swap" rel="stylesheet">
    
    <!-- FotnAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- My Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <title>{{$title ?? 'Presto.it'}}</title>
</head>
<?php flush(); ?>
<body>
    <script src="{{ asset('bladewind/js/helpers.js') }}"></script>
    <x-bladewind.notification position="bottom right" />
    
            <div id="spinner"
                class="show lightMode position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
                <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>



        <x-navbar/>

        <div  class="swiper mySwiperCategory category-mobile category-mobile-query ">
            <div class="swiper-wrapper d-inline-flex">
            @foreach ($categories as $category)
                        @if(Route::getCurrentRoute()->uri == 'article/category/{category}/show')
                        <div  class="swiper-slide col">
                        <a href="{{route('article.category', compact('category'))}}" class="btn btn-outline-warning     {{Route::getCurrentRoute()->parameters['category']->id == $category->id ? 'active' : ''}}">
                            @else
                            <div  class="swiper-slide col">
                            <a href="{{route('article.category', compact('category'))}}" class="btn btn-outline-warning">
                        @endif
                        <x-category-name name="{{$category->name}}"/></a></div>
                        @endforeach       
                </div>
            </div>
        </div>
        <div id="searchMobile" class="category-mobile-query category-mobile-search sticky-top">
            <form action="{{ route('articles.search') }}" method="GET" class="d-flex">
                <input name="searched" class="form-control " type="search" placeholder="{{__('ui.pulsanteRicerca')}}" aria-label="{{__('ui.pulsanteRicerca')}}">
                <button class="btn btn-outline-warning " type="submit">{{__('ui.pulsanteRicerca')}}</button>
            </form>
        </div>
        
        <div class="container-fluid">
            <div  class="row justify-content-md-between">
                <div class="stickyCustom categorySearch col col-lg-2 my-2 text-center">
                    <ul class="list-group">
                        <h2 class="font-size-p my-5">{{__('ui.cercaArticles')}}</h2>
                        <li class="mb-5">
                            <form action="{{ route('articles.search') }}" method="GET" class="d-flex">
                                <input name="searched" class="form-control me-2" type="search" placeholder="{{__('ui.pulsanteRicerca')}}" aria-label="{{__('ui.pulsanteRicerca')}}">
                                <button class="btn btn-outline-warning" type="submit">{{__('ui.pulsanteRicerca')}}</button>
                            </form>
                        </li>
                        @foreach ($categories as $category)
                            @if(Route::getCurrentRoute()->uri == 'article/category/{category}/show')
                                <a href="{{route('article.category', compact('category'))}}" class="btn btn-outline-warning     {{Route::getCurrentRoute()->parameters['category']->id == $category->id ? 'active' : ''}}"><x-category-name name="{{$category->name}}"/></a>
                                @else
                                <a href="{{route('article.category', compact('category'))}}" class="btn btn-outline-warning"><x-category-name name="{{$category->name}}"/></a>
                            @endif
                        @endforeach    
                    </ul>
                </div>
                <div class="col col-lg-8">
                    {{ $slot }}
                </div>
                <div class="displayNone col col-lg-2 ">
                
                    </div>
                </div>
            </div>
        </div>

        <div class="divsotto"></div>


        <x-footer/>
        <!-- Livewire JS -->
        @livewireScripts
        
        <!-- Swiper JS -->
        <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
        
        
        <!-- My Script JS -->
        <script src="{{ asset('js/app.js') }}"></script>
    
</body>
</html>