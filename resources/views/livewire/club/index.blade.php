<div>
    
    <div style="display: flex; height:50px; justify-content:center;column-gap:100px;">
        <div wire:click="page('actu')">Actualité</div>
        <div wire:click="page('fans')">Fans</div>
        <div wire:click="page('live')">Live</div>
    </div>

    <div style="position:relative;">
        <div style="position:absolute; z-index:3; background-color:white;width:100%;height:100%" wire:loading> 
            <div class="spinner-border text-secondary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>          
        </div>
  
        @if ($section == "actu" || $section == "")
            <x-actu :$flux :$nom />
        @endif
        @if ($section == "fans")
            <x-fans :$idclub /> 
        @endif
        
        @if ($section == "live")
        <x-lives :$idclub /> 
        @endif
        
    
    </div>



</div>
