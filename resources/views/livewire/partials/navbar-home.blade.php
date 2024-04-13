<div x-data="{ open: false }">
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
            <div>
                <a class="navTitle" href="{{route('don')}}" wire:navigate> Faire un don ?</a>
            </div>
        
            {{-- l'utilisateur n'est pas authentifié --}}
            @guest        
                <div >
                    <a href="{{route('login')}}" wire:navigate class="navTitle"> {{ __('Login') }}</a>
                </div>
                <div>
                    <div @click="open = ! open" class="navTitle">Créer un compte</div>
                    <div 
                        x-show="open"
                        x-transition:enter.duration.400ms
                        x-transition:leave.duration.400ms
                        class="navAccountTitle"
                        >
                        Vous êtes ...
                    </div>
                    <div 
                        x-show="open"
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
                <div>
                    <a class="navTitle" href="{{route('profil')}}"> <i class="bi bi-person"></i>  {{ __('My Profile') }}</a>
                </div>
                <div>
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button id="buttonnavbar" class="navTitle" type="submit"><i class="bi bi-person-slash"></i>
                        {{ __('Logout') }}</button>
                    </form>
                </div>

            @endauth
        
        
        </div>
    </div>
    

</div>
