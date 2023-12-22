<div>
    
    <div id="menuClub">
        <div wire:click="selectPage('news')"> <i class="bi bi-house-door"></i> Actualité</div>
        <div wire:click="selectPage('fans')"> <i class="bi bi-chat-dots"></i> Fans</div>
        <div wire:click="selectPage('socialmedia')"> <i class="bi bi-wifi"></i> Réseaux Sociaux</div>
        <div wire:click="selectPage('match')" id="resultats"> <i><img class="logo1 animate__animated animate__flipInY" src="{{Storage::url('logos/'.$nom.'.png')}}" alt=""> </i>  Résultats</div>
        {{-- <div wire:click="selectPage('live')">Live</div> --}}
    </div>

    <div id="pageClub" style="position:relative;">
        <div style="position:absolute; z-index:3; background-color:white;width:100%;height:100%" wire:loading> 
            <div class="spinner-border text-secondary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>          
        </div>
  
        @if ($page == "news" || $page == "")
            <x-actu :$flux :$nom />
        @endif
        @if ($page == "fans")
            {{-- <x-fans :$idclub /> --}}
            <livewire:club.fans.index :$idclub > 
        @endif
        @if ($page == "socialmedia")
            
        @endif
        
        {{-- @if ($page == "live")
        <x-lives :$idclub /> 
        @endif --}}
        @if ($page == "comment")
        {{-- composant avec #[Url(except: '')] $comment ; except null pour empêcher page blanche --}}
        @endif
        
    
    </div>



</div>
