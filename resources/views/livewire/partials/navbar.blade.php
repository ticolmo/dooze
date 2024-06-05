<div id="navigbar" >
      <div  role="navigation" aria-label="Navigation de la page">
        <ul id="navigation">

          <livewire:partials.search  />

          <li class="parentIcon">
            <a role="link" aria-label="" class="iconNav" href="/"> 
              @if ($uri ==="/")
                <i class="bi bi-house-door-fill"></i>
              @else
                <i class="bi bi-house-door"></i> 
              @endif              
              <div class="explicatifIcon"> <span> {{ __('Home') }}</span>  </div>
            </a>
          </li>  

          {{-- recherche Mobile --}}
          <li class="parentIcon noDesktop">
            <a role="link" aria-label="" class="iconNav" href="/" wire:navigate> 
              <i class="bi bi-search"></i>
            </a>
          </li>  
          
          <li class="dropdown parentIcon noMobile">
            <a role="link" aria-label="" class="dropdown-toggle iconNav" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
          <li class="parentIcon">
            <a role="link" aria-label="" class="iconNav" href="" role="button" >
              <i class="bi bi-person"></i> 
              <div class="explicatifIcon"> <span> {{ __('My Account') }}</span>  </div>
            </a>            
  
          </li>
        @endguest
  
        {{-- l'utilisateur est authentifié --}}
        @auth         
          <li class=" parentIcon">            
            <a role="link" aria-label="" class="iconNav" href="{{route('profil')}}" >
              <i class="bi bi-person"></i> 
              <div class="explicatifIcon"> <span> {{ __('My Account') }}</span>  </div>
            </a>
          </li>

          <li class=" parentIcon noMobile">            
            <a role="link" aria-label="" href="" class="iconNav" onclick="event.preventDefault(); document.getElementById('logout').submit();">
              <i class="bi bi-box-arrow-right"></i>
              <div class="explicatifIcon"> <span> {{ __('Logout') }}</span>  </div>
            </a>
          </li>

          {{-- formulaire caché de déconnexion --}}
          <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
          
        @endauth
        
        <li class="parentIcon noDesktop">
          <a role="link" aria-label="" class="iconNav" href="/"> 
            <i>
              <img class="logo1 animate__animated animate__flipInY" src="{{Storage::url('logos/'.$club.'.png')}}" alt=""> 
            </i> 
          </a>
        </li> 

          
        </ul>
      </div>

  
  </div>



 

 