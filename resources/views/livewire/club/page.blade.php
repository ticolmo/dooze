<div>
    
    <div style="display: flex; background-color:green; justify-content:center;column-gap:100px;">
        <div wire:click="page('actu')">Actu</div>
        <div wire:click="page('fans')">Fans</div>
        <div wire:click="page('live')">Live</div>
    </div>
  
    @if ($choice == "actu" || $choice == "")
        <x-actu :$flux :$nom />
    @endif
    @if ($choice == "fans")
        <x-fans :$idclub /> 
    @endif
    
    @if ($choice == "live")
    <x-lives :$idclub /> 
    @endif
    
    




</div>
