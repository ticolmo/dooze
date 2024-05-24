<div 
    x-data="{
      search: '',

      items: @entangle('recherches'),

      get filteredItems() {
          return this.items.filter(
              i => i.toLowerCase().includes(this.search.toLowerCase())
          )
      }
    }" wire:ignore
>
    <nav class="navbar navbar-expand-lg entete fontsize16"> 
    <div class="container-fluid">
      
   
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">

          <li class="nav-item recherche">
            <input x-model="search" placeholder="Club / Compétition" class="form-control" list="datalistOptions" id="exampleDataList"> 
            <ul x-show="search.length > 1" @click.outside="search = ''">
                <template x-for="item in filteredItems" :key='item'>
                    <li x-text="item" @click="$wire.redirectRecherche(item)"></li>
                </template>
            </ul>
            {{-- <datalist id="datalistOptions">
              @foreach ($recherches as $recherche)
                 <option value="{{$recherche}}" @click="$wire.redirectRecherche(recherche)" @keyup.enter="$wire.redirectRecherche(recherche)" >         
              @endforeach                    
            </datalist> --}}


          </li>

          <li class="nav-item parentIcon">
            <a class="nav-link iconNav" href="/"> 
              <img id="faviconDooze" src="{{Storage::url('logos/favicon dooze 4.2')}}.png" alt=""> 
              <div class="explicatifIcon"> <span> {{ __('Home') }}</span>  </div>
            </a>
          </li>  
          
          <li class="nav-item dropdown parentIcon">
            <a class="nav-link dropdown-toggle iconNav" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-translate"></i>
              <div class="explicatifIcon"> <span> {{ __("Language")}} </span> </div>   
            </a>      
             
            <ul class="dropdown-menu scrollable-menu">
              <li><a class="dropdown-item @if (App::isLocale('de')) selectLangue @endif" href="{{route('choicelanguage', 'de')}}">Deutsch</a></li>
              <li><a class="dropdown-item @if (App::isLocale('en')) selectLangue @endif" href="{{route('choicelanguage', 'en')}}">English</a></li>
              <li><a class="dropdown-item @if (App::isLocale('es')) selectLangue @endif" href="{{route('choicelanguage', 'es')}}">Español</a></li>            
              <li><a class="dropdown-item @if (App::isLocale('fr')) selectLangue @endif" href="{{route('choicelanguage', 'fr')}}">Français</a></li>
              <li><a class="dropdown-item @if (App::isLocale('it')) selectLangue @endif" href="{{route('choicelanguage', 'it')}}">Italiano</a></li>
            </ul>
          </li>
    
  
        {{-- l'utilisateur n'est pas authentifié --}}
        @guest         
          <li class="nav-item dropdown parentIcon">
            <a class="nav-link dropdown-toggle iconNav" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person"></i> 
              <div class="explicatifIcon"> <span> {{ __('My Account') }}</span>  </div>
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
                  <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="E-mail">
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="{{ __('Password') }}">
                  {{-- <input type=hidden name="visit" value="@php echo $_SERVER['REQUEST_URI']; @endphp" type="text"> --}}
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="dropdownCheck">
                    <label class="form-check-label" for="dropdownCheck">
                      Remember me
                    </label>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Log In') }}</button>
              </form>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{route('createaccount.fan')}}">{{ __('Create a account') }}</a>
              <a class="dropdown-item" href="#">Forgot password?</a>
            </div>  
            
  
          </li>
        @endguest
  
        {{-- l'utilisateur est authentifié --}}
        @auth         
          <li class="nav-item parentIcon">            
            <a class="nav-link dropdown-toggle iconNav" href="{{route('profil')}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-person"></i> 
              <div class="explicatifIcon"> <span> {{ __('My Account') }}</span>  </div>
            </a>
          </li>

          <li class="nav-item parentIcon">            
            <a class="nav-link dropdown-toggle iconNav" onclick="event.preventDefault(); document.getElementById('logout').submit();" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="bi bi-box-arrow-right"></i>
              <div class="explicatifIcon"> <span> {{ __('Logout') }}</span>  </div>
            </a>
          </li>

          {{-- formulaire caché de déconnexion --}}
          <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
          
        @endauth
        

          
        </ul>
      </div>
    </div>
  </nav>
  
  </div>