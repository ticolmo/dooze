<nav class="navbar navbar-expand-lg bg-light entete fontsize16"
    x-data="{
      search: '',

      items: @entangle('recherches'),

      get filteredItems() {
          return this.items.filter(
              i => i.toLowerCase().startsWith(this.search.toLowerCase())
          )
      }
    }" wire:ignore
>
    <div class="container-fluid">
      <a class="navbar-brand" href="http://dooze.test:8089/">Dooze</a>
   
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
  
          <li class="nav-item dropdown recherche">
            <input x-model="search" placeholder="Search...">
 
            <ul x-show="search.length > 1" @click.outside="search = ''">
                <template x-for="item in filteredItems" :key='item'>
                    <li x-text="item" @click="$wire.redirectRecherche(item)"></li>
                </template>
            </ul>
          </li>
  
    
  
        {{-- l'utilisateur n'est pas authentifié --}}
        @guest         
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person"></i> {{ __('Login') }}
            </a>
        
            <div class="dropdown-menu">
              @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
              <form class="px-4 py-3" action="{{route('login')}}" method="post">
               @csrf
                <div class="mb-3">
                  <label for="exampleDropdownFormEmail1" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">
                </div>
                <div class="mb-3">
                  <label for="exampleDropdownFormPassword1" class="form-label">Password</label>
                  <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Mot de passe">
                  <input type=hidden name="visit" value="@php echo $_SERVER['REQUEST_URI']; @endphp" type="text">
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="dropdownCheck">
                    <label class="form-check-label" for="dropdownCheck">
                      Remember me
                    </label>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
              </form>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{route('createaccount')}}">Créer un compte</a>
              <a class="dropdown-item" href="#">Forgot password?</a>
            </div>  
            
  
          </li>
        @endguest
  
        {{-- l'utilisateur est authentifié --}}
        @auth         
          <li class="nav-item">
            <a class="nav-link" href="{{route('profil')}}"> <i class="bi bi-person"></i> {{ __('My Account') }}</a>
          </li>
                
        <li class="nav-item">
            <form action="{{route('logout')}}" method="post"> 
              @csrf
              <button id="buttonnavbar" class="nav-link"type="submit"><i class="bi bi-person-slash"></i> {{ __('Logout') }}</button> </form>          
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