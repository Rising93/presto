
<nav class="navbar navbar-expand-lg navbarCust bgColor sticky-top" style="z-index: 1050">
  <div class="container-fluid">
    <a class="underlineHover navbar-brand" href="{{route('home')}}">Presto.it <i class="fa-solid fa-truck-fast"></i></a>
    <button type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="btnBar">
        <div class="btnBar1"></div>
        <div class="btnBar2"></div>
        <div class="btnBar3"></div>
      </span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
      <ul class="navbar-nav posCust ">
      <li class="nav-item">
          <a href="{{route('home')}}">
            <button type="button" class="underlineHover btnCustom" >{{__('ui.homeNavbar')}}</button>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('article.index')}}">
               <button type="button" class="underlineHover btnCustom" >{{__('ui.articoliNavbar')}}</button>
          </a>
        </li>
        @if(!Auth::user())
        <li class="nav-item">
          
          <button type="button" class="underlineHover btnCustom" data-bs-toggle="modal" data-bs-target="#loginModal">
        {{__('ui.loginNavbar')}}
          </button>
          
        </li>
        <li class="nav-item">
          <button type="button" class="underlineHover btnCustom" data-bs-toggle="modal" data-bs-target="#registerModal">
        {{__('ui.registratiNavbar')}}
          </button>
         
        </li>
        <li class="nav-item">
          <a href="{{route('password.request')}}">
            <button type="button" class="underlineHover btnCustom" >{{__('ui.reimpostaPassword')}}</button>
          </a>
        </li>
       
          @else
          <li class="nav-item">
            <a href="{{ route('article.create')}}">
              <button type="button" class="underlineHover btnCustom" >{{__('ui.creaArticoloNavbar')}}</button>
            </a>
          </li>
          @if(Auth::user()->is_revisor)
          <li class="nav-item">
            <a href="{{ route('revisor.index')}}">
              <button type="button" class="underlineHover btnCustom" ><span class="text-danger">{{__('ui.zonaRevisoreNavbar')}}</span>
                @if(App\Models\Article::toBeRevisionedCount() > 0)
                <span class="notification">
                  {{App\Models\Article::toBeRevisionedCount()}}
                  <span>
                    @endif </button>
              <span class="visually-hidden">unread messages</span>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a>
            <button type="button" class="underlineHover btnCustom">{{__('ui.benvenutoNavbar')}}, {{Auth::user()->name}}!</button>
              </a>
          </li>
          <li class="nav-item">
            <form action="{{route('logout')}}" method="post">
              @csrf
                <button type="submit" class="underlineHover btnCustom">{{__('ui.logoutNavbar')}}</button> 
            </form>
          </li>
          @endif
        </li>
      </ul>
    </div>
  </div>
  
</nav>
<x-modalLogin/>
<x-modalRegister/>

