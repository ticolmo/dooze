<div style="text-align: center">
  <a class="navbar-brand" href="/"  wire:navigate id="lienLogoDooze"><img id="logoDooze" src="{{Storage::url('logos/logo dooze 4')}}.png" alt=""></a>
</div>
<div style="text-align:right; padding-right:50px">
  <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="bi bi-list"></i></button>
</div>


<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasRightLabel">Offcanvas right</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div>
      <a class="nav-link" href="{{route('don')}}" wire:navigate> Faire un don ?</a>
    </div>

    {{-- l'utilisateur n'est pas authentifié --}}
    @guest
    
    <div>
      <a href="{{route('login')}}" wire:navigate> {{ __('Login') }}</a>
    </div>

    <div class="accordion accordion-flush" id="accordionFlushExample">
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            Créer un compte
          </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <div><a class="" href="{{route('createaccount.fan')}}" wire:navigate>fan</a></div>
            <div><a class="" href="{{route('createaccount.media')}}" wire:navigate>media</a></div>
          </div>
        </div>
      </div>
     

    </div>
    @endguest



  </div>
</div>

<nav class="navbar navbar-expand-lg mb-lg-3 entete fontsize16">
  <div class="container-fluid ">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          
        </li>

  
      

        {{-- l'utilisateur est authentifié --}}
        @auth
        <li class="nav-item">
          <a class="nav-link" href="{{route('profil')}}"> <i class="bi bi-person"></i>  {{ __('My Profile') }}</a>
        </li>
        <li class="nav-item">
          <form action="{{route('logout')}}" method="post">
            @csrf
            <button id="buttonnavbar" class="nav-link" type="submit"><i class="bi bi-person-slash"></i>
              {{ __('Logout') }}</button>
          </form>
        </li>
        @endauth

        <li class="nav-item">
          <a class="nav-link" href="{{route('contact')}}" wire:navigate> Contact</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-translate"></i> 
            @if (App::isLocale('en')) 
              English
            @elseif (App::isLocale('fr'))
              Français
            @elseif (App::isLocale('de'))
              Deutsch
            @elseif (App::isLocale('es'))
              Español
            @elseif (App::isLocale('it'))
              Italiano
            @endif
          </a>          
          <ul class="dropdown-menu scrollable-menu">
            <li><a class="dropdown-item @if (App::isLocale('de')) d-none @endif" href="{{route('choicelanguage', 'de')}}">Deutsch</a></li>
            <li><a class="dropdown-item @if (App::isLocale('en')) d-none @endif" href="{{route('choicelanguage', 'en')}}">English</a></li>
            <li><a class="dropdown-item @if (App::isLocale('es')) d-none @endif" href="{{route('choicelanguage', 'es')}}">Español</a></li>            
            <li><a class="dropdown-item @if (App::isLocale('fr')) d-none @endif" href="{{route('choicelanguage', 'fr')}}">Français</a></li>
            <li><a class="dropdown-item @if (App::isLocale('it')) d-none @endif" href="{{route('choicelanguage', 'it')}}">Italiano</a></li>
          </ul>
        </li>
    </div>
  </div>
</nav>