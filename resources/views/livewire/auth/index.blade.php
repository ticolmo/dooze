<div>    

    <div id="menuClub">

        <div wire:click="selectPage('dashboard')"> <i class="bi bi-house-door"></i>              
                <span class="choiceSpan" @if ($page == "dashboard" || $page == "") style="border-bottom: 4px solid {{$couleur}}; @media screen and (max-width:767px) {.choiceSpan{color:{{$couleur}}}}}" @endif 
                    >Tableau de bord </span> 
            </div>
        <div wire:click="selectPage('profil')"> <i class="bi bi-chat-dots"></i>             
                <span class="choiceSpan" @if ($page == "profil") style="border-bottom: 4px solid {{$couleur}}; @media screen and (max-width:767px) {.choiceSpan{color:{{$couleur}}}}}" @endif 
                    > Profil</span>
            </div>
        
    </div>    

    <div id="pageClub" style="position:relative;">
        <div style="position:absolute; z-index:3; background-color:white;width:100%;height:100%; text-align:center; padding-top:20%" wire:loading> 
            <div class="spinner-border text-secondary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>             
        </div>
  
        @if ($page == "dashboard" || $page == "")
            <livewire:auth.dashboard :$id :$part :key="$idpagedashboard" />
        @endif
        @if ($page == "profil")   
            <livewire:auth.profil :$id />
          
        @endif
        
    
    </div>
        


</div>
