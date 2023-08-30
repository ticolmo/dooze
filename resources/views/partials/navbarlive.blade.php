<nav class="navbar navbar-expand-lg bg-light  entete fontsize16">
  <div class="container-fluid">
    <a class="navbar-brand" href="http://dooze.test:8089/">Dooze</a>
 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">

       

  

      {{-- l'utilisateur n'est pas authentifié --}}
      @guest         
      
      @endguest

      {{-- l'utilisateur est authentifié --}}
      @auth         
        <li class="nav-item">
          <a class="nav-link" href="">  Retour à la page du club</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">  Quitter la session</a>
        </li>
              
    
      @endauth
      
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
      </ul>
    </div>
  </div>
</nav>