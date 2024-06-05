<div x-data="{ compte: false, langue:false }">
    <div style="text-align: center">
        <a class="navbar-brand" href="/"  wire:navigate id="lienLogoDooze"><img id="logoDooze" src="{{Storage::url('logos/logo dooze 4')}}.png" alt=""></a>
    </div>
    <div style="text-align:right; padding-right:50px">
        <span class="" type="" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="bi bi-list"></i></span>
    </div>
    
    
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">dooze.org</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">

        {{-- PRESENTATION --}}
            <div>
                <a class="navTitle" href="{{route('info')}}" wire:navigate> Présentation</a>
            </div>
            
        
            {{-- l'utilisateur n'est pas authentifié --}}
            @guest 

        {{-- LOGIN --}}       
                <div >
                    <a href="{{route('login')}}" wire:navigate class="navTitle"> {{ __('Login') }}</a>
                </div>

        {{-- CREER UN COMPTE --}}
                <div>
                    <div @click="compte = ! compte" class="navTitle">Créer un compte</div>
                    <div 
                        x-show="compte"
                        x-transition:enter.duration.400ms
                        x-transition:leave.duration.400ms
                        class="navAccountTitle"
                        >
                        Vous êtes ...
                    </div>
                    <div 
                        x-show="compte"
                        x-transition:enter.duration.600ms
                        x-transition:leave.duration.400ms
                        class="navAccountBody"
                        >
                        <div><a class="" href="{{route('createaccount.fan')}}" wire:navigate>un fan</a></div>
                        <div><a class="" href="{{route('createaccount.media')}}" wire:navigate>un media</a></div>
                    </div>
                    
                </div>
            @endguest

            {{-- l'utilisateur est authentifié --}}
            @auth

        {{-- MON COMPTE --}}
                <div>
                    <a class="navTitle" href="{{route('profil')}}"> <i class="bi bi-person"></i>  {{ __('My Profile') }}</a>
                </div>
        
        {{-- DECONNEXION --}}
                <div>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button id="buttonnavbar" class="navTitle" type="submit"><i class="bi bi-person-slash"></i>
                        {{ __('Logout') }}</button>
                    </form>
                </div>

            @endauth

        {{-- DON --}}
            <div>
                <a class="navTitle" href="{{route('don')}}" wire:navigate> Faire un don ?</a>
            </div>

        {{-- API DOOZE --}}
            <div>
                <a class="navTitle" href="{{route('api')}}" wire:navigate> API Dooze</a>
            </div>

        {{-- espacement --}}
        <div style="margin-bottom: 50px"></div>
            
        {{-- LANGUE --}}   
            <div>
                <div @click="langue = ! langue" class="navTitle">
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
                </div>
                <div 
                    x-show="langue"
                    x-transition:enter.duration.400ms
                    x-transition:leave.duration.400ms
                    class="navAccountTitle"
                    >
                    <div><a class="dropdown-item @if (App::isLocale('de')) d-none @endif" href="{{route('choicelanguage', 'de')}}">Deutsch</a></div>
                    <div><a class="dropdown-item @if (App::isLocale('en')) d-none @endif" href="{{route('choicelanguage', 'en')}}">English</a></div>
                    <div><a class="dropdown-item @if (App::isLocale('es')) d-none @endif" href="{{route('choicelanguage', 'es')}}">Español</a></div>            
                    <div><a class="dropdown-item @if (App::isLocale('fr')) d-none @endif" href="{{route('choicelanguage', 'fr')}}">Français</a></div>
                    <div><a class="dropdown-item @if (App::isLocale('it')) d-none @endif" href="{{route('choicelanguage', 'it')}}">Italiano</a></div>
                
                </div>                
            </div>
        
        
        </div>
    </div>
    

</div>
