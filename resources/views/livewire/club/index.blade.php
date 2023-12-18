<div>
    
    <div id="selectPageActivity">
        <div wire:click="selectPage('news')">Actualité</div>
        <div wire:click="selectPage('fans')">Fans</div>
        <div wire:click="selectPage('live')">Live</div>
    </div>

    <div id="pageActivity" style="position:relative;">
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
        
        @if ($page == "live")
        <x-lives :$idclub /> 
        @endif
        
    
    </div>



</div>
