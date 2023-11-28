<div>
    <div style="display: flex; justify-content:center;column-gap:100px;">
        <div class="choix" wire:click="page('standing')">Classement</div>
        <div class="choix" wire:click="page('round')">Journée</div>
        <div class="choix" wire:click="page('topscorers')">Buteurs</div>
    </div>

    <div style="position:relative;">
        <div style="position:absolute; z-index:3; background-color:white;width:100%;height:100%" wire:loading> 
            <div class="spinner-border text-secondary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>          
        </div>
        
        @if ($section == "standing" || $section == "")
        <x-competition.classement :$classement />
        @endif
        @if ($section == "round")
        <livewire:competition.journee :$competition :$codeCompetition /> 
        @endif
        @if ($section == "topscorers")
        <x-competition.buteurs :$competition />  
        @endif


    </div>
    
</div>
