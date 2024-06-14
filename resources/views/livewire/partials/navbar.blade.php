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
          
    
  
        {{-- l'utilisateur n'est pas authentifié --}}
        @guest         
          <li class="parentIcon">
            <a role="link" aria-label="" class="iconNav" href="{{route('login')}}"  wire:navigate>
              <i class="bi bi-person"></i> 
              <div class="explicatifIcon"> <span> {{ __('Log In') }}</span>  </div>
            </a>            
  
          </li>
        @endguest
  
        {{-- l'utilisateur est authentifié --}}
        @auth         
          <li class="parentIcon">            
            <a role="link" aria-label="" class="iconNav" href="{{route('profil')}}" wire:navigate>
              <i class="bi bi-person"></i> 
              <div class="explicatifIcon"> <span> {{ __('My Account') }}</span>  </div>
            </a>
          </li>         
          
        @endauth
        
        <li class="parentIcon noDesktop">
          <a role="link" aria-label="" class="iconNav" href="/"> 
            <i>
              <img class="logo1 animate__animated animate__flipInY" src="{{Storage::url('logos/'.$club.'.png')}}" alt=""> 
            </i> 
          </a>
        </li> 

        {{-- Desktop / Menu  --}}
        <li class="noMobile parentIcon iconNav">
          <i class="bi bi-list" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"></i>  
          <div class="explicatifIcon"> <span> Menu</span>  </div>  
          <livewire:partials.menu  />
        </li>

          
        </ul>
      </div>

      
  
  </div>



 

 