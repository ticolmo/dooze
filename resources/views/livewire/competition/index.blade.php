<div>
    <div style="display: flex; justify-content:center;column-gap:100px;">
        @if ($classement !== false)
           <div class="choix" wire:click="page('standing')">Classement</div> 
        @endif        
        <div class="choix" wire:click="page('round')">Journée</div>
        <div class="choix" wire:click="page('topscorers')">Buteurs</div>
    </div>

    <div style="position:relative;">
        <div style="position:absolute; z-index:3; background-color:white;width:100%;height:100%" wire:loading> 
            <div class="spinner-border text-secondary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>          
        </div>
        
        @if ($classement !== false)
            @if ($section == "standing" || $section == "")
            <x-competition.classement :$classement />
            @endif
        @endif
        @if ($section == "round" || $classement == false)
        <livewire:competition.journee :$codeCompetition /> 
        @endif
        @if ($section == "topscorers")
       
        <x-competition.buteurs :codecompetition="$codeCompetition" />  
        @endif


    </div>
    
</div>
