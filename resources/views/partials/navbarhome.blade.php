<nav class="navbar navbar-expand-lg mb-lg-3 entete fontsize16">
  <div class="container-fluid justify-content-end">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="http://dooze.test:8089/">Dooze</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('don')}}"> Faire un don ?</a>
        </li>

        {{-- l'utilisateur n'est pas authentifié --}}
        @guest
        <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}"> {{ __('Login') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('createaccount')}}"> Créer un compte</a>
        </li>

        @endguest

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
          <a class="nav-link" href="{{route('contact')}}"> Contact</a>
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