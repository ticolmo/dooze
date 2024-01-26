<div>    

    <div id="menuClub">

        <div wire:click="selectPage('dashboard')"> <i class="bi bi-house-door"></i>              
                <span class="choiceSpan" @if ($page == "dashboard" || $page == "") style="border-bottom: 4px solid {{$couleur}}; @media screen and (max-width:767px) {.choiceSpan{color:{{$couleur}}}}}" @endif 
                    >Tableau de bord </span> 
            </div>
        <div wire:click="selectPage('posts')"> <i class="bi bi-chat-dots"></i>             
                <span class="choiceSpan" @if ($page == "posts") style="border-bottom: 4px solid {{$couleur}}; @media screen and (max-width:767px) {.choiceSpan{color:{{$couleur}}}}}" @endif 
                    > Posts</span>
            </div>
        
    </div>    

    <div id="pageClub" style="position:relative;">
        @if ($page == "dashboard" || $page == "")
            <div style="text-align: end">
                <div class="btn btn-outline-secondary btn-sm"><a href="{{route('don')}}" > <i class="bi bi-person-badge"></i> Faire un don</a></div>
                <div class="btn btn-outline-secondary btn-sm" wire:click="changePart('settings')"> <i class="bi bi-gear"></i> Paramètres</div>
            </div>
        @endif

        <div style="position:absolute; z-index:3; background-color:white;width:100%;height:100%; text-align:center; padding-top:20%" wire:loading> 
            <div class="spinner-border text-secondary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>             
        </div>
  
        @if ($page == "dashboard" || $page == "")
            <livewire:auth.dashboard :$id :$part :key="$idpagedashboard" />
        @endif
        @if ($page == "posts")   
            <livewire:auth.commentaires :$id />
          
        @endif
        
    
    </div>
        


</div>
