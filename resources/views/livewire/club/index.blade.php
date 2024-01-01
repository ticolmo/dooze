<div>
    
    <div id="menuClub">
        <div wire:click="selectPage('news')"> <i class="bi bi-house-door"></i>              
                <span class="choiceSpan" @if ($page == "news" || $page == "") style="border-bottom: 4px solid {{$couleur}}; @media screen and (max-width:767px) {.choiceSpan{color:{{$couleur}}}}}" @endif 
                    >Actualité </span> 
            </div>
        <div wire:click="selectPage('fans')"> <i class="bi bi-chat-dots"></i>             
                <span class="choiceSpan" @if ($page == "fans") style="border-bottom: 4px solid {{$couleur}}; @media screen and (max-width:767px) {.choiceSpan{color:{{$couleur}}}}}" @endif 
                    > Fans</span>
            </div>
        <div wire:click="selectPage('socialmedia')"> <i class="bi bi-wifi"></i>             
                <span class="choiceSpan" @if ($page == "socialmedia") style="border-bottom: 4px solid {{$couleur}}; @media screen and (max-width:767px) {.choiceSpan{color:{{$couleur}}}}}" @endif 
                    >Réseaux Sociaux </span>
            </div>
        <div wire:click="selectPage('match')" id="resultats"> <i><img class="logo1 animate__animated animate__flipInY" src="{{Storage::url('logos/'.$nom.'.png')}}" alt=""> </i>  Résultats</div>
        {{-- <div wire:click="selectPage('live')">Live</div> --}}
    </div>

    <div id="pageClub" style="position:relative;">
        <div style="position:absolute; z-index:3; background-color:white;width:100%;height:100%; text-align:center; padding-top:20%" wire:loading> 
            <div class="spinner-border text-secondary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>             
        </div>
  
        @if ($page == "news" || $page == "")
            <x-actu :$flux :$nom />
        @endif
        @if ($page == "fans")
            {{-- <x-fans :$idclub /> --}}           
          
            <livewire:club.fans.index :$idclub :key="$idpagefans" /> 
        @endif
        @if ($page == "socialmedia")
            <div> RS</div>
        @endif

        @if ($page == "comment")
        {{-- composant avec #[Url(except: '')] $comment ; except null pour empêcher page blanche --}}
        <livewire:club.fans.unique-commentaire />
        @endif
        
        {{-- @if ($page == "live")
        <x-lives :$idclub /> 
        @endif --}}
        
        
    
    </div>
        


</div>
