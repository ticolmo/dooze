<div>    

    <div id="menuClub">
        
        <div wire:click="selectPage('posts')"> <i class="bi bi-chat-dots"></i>             
                <span class="choiceSpan" @if ($page == "posts" || $page == "") style="border-bottom: 4px solid {{$couleur}}; @media screen and (max-width:767px) {.choiceSpan{color:{{$couleur}}}}}" @endif 
                    > Posts</span>
            </div>

        <div wire:click="selectPage('messagerie')"> <i class="bi bi-mailbox"></i>           
                <span class="choiceSpan" @if ($page == "messagerie" ) style="border-bottom: 4px solid {{$couleur}}; @media screen and (max-width:767px) {.choiceSpan{color:{{$couleur}}}}}" @endif 
                    >Messagerie </span> 
            </div>

        <div wire:click="selectPage('apidooze')"> <i class="bi bi-file-text"></i>            
                <span class="choiceSpan" @if ($page == "apidooze") style="border-bottom: 4px solid {{$couleur}}; @media screen and (max-width:767px) {.choiceSpan{color:{{$couleur}}}}}" @endif 
                    > API Dooze</span>
            </div>
        
    </div>    

    <div id="pageClub" style="position:relative;">
{{--         @if ($page == "dashboard" || $page == "")
            <div style="text-align: end">
                <div class="btn btn-outline-secondary btn-sm"><a href="{{route('don')}}" > <i class="bi bi-person-badge"></i> Faire un don</a></div>
                <div class="btn btn-outline-secondary btn-sm" wire:click="changePart('settings')"> <i class="bi bi-gear"></i> Paramètres</div>
            </div>
        @endif --}}

        {{-- <div style="position:absolute; z-index:3; background-color:white;width:100%;height:100%; text-align:center; padding-top:20%" wire:loading> 
            <div class="spinner-border text-secondary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>             
        </div> --}}
  
       
        @if ($page == "posts" || $page == "")   
            <livewire:auth.commentaires :$id />
          
        @endif

        @if ($page == "messagerie")
            <livewire:auth.dashboard  :$id {{--:$part :key="$idpagedashboard" --}} />
        @endif

        @if ($page == "apidooze")   
            <x-api-dooze /> 
          
        @endif
                 
        @if ($page == "settings")
         <div style="position:fixed;top:0;width:55%;z-index:9; background-color:yellow"> Paramètres 
            <button type="button" class="btn-close text-end" aria-label="Close" wire:click="closeSettings" ></button>
        </div>

        {{ $slot }}

         {{-- <livewire:auth.settings  /> --}}
            {{-- <x-auth.edit />     --}}    
        @endif
        
    
    </div>
        


</div>
