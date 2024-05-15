<div>    

    <div id="menuClub">
        
        <div> <i class="bi bi-chat-dots"></i>             
                <span class="choiceSpan" @if ($activity == "posts" || $activity == "") style="border-bottom: 4px solid {{$couleur}}; @media screen and (max-width:767px) {.choiceSpan{color:{{$couleur}}}}}" @endif 
                    > Posts</span>
            </div>

        <div wire:click="selectPage('messagerie')"> <i class="bi bi-mailbox"></i>           
                <span class="choiceSpan" @if ($activity == "messagerie" ) style="border-bottom: 4px solid {{$couleur}}; @media screen and (max-width:767px) {.choiceSpan{color:{{$couleur}}}}}" @endif 
                    >Messagerie </span> 
            </div>

        <div> <i class="bi bi-file-text"></i>            
                <span class="choiceSpan" @if ($activity == "apidooze") style="border-bottom: 4px solid {{$couleur}}; @media screen and (max-width:767px) {.choiceSpan{color:{{$couleur}}}}}" @endif 
                    > API Dooze</span>
            </div>
        
    </div>    

    <div id="pageClub" style="position:relative;">
{{--         @if ($activity == "dashboard" || $activity == "")
            <div style="text-align: end">
                <div class="btn btn-outline-secondary btn-sm"><a href="{{route('don')}}" > <i class="bi bi-person-badge"></i> Faire un don</a></div>
                <div class="btn btn-outline-secondary btn-sm" wire:click="changePart('settings')"> <i class="bi bi-gear"></i> Paramètres</div>
            </div>
        @endif --}}
            
        <div style="position:absolute; z-index:3;background-color:red;width:100%;height:100vh; text-align:center; padding-top:20%" wire:loading> 
            <div class="spinner-border text-secondary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>             
        </div>
  
       
        @if ($activity == "posts" || $activity == "")   
            <livewire:auth.commentaires :$id />
          
        @endif

        @if ($activity == "messagerie")
            <livewire:auth.dashboard  :$id {{--:$part :key="$idpagedashboard" --}} />
        @endif

        @if ($activity == "apidooze")   
            <x-api-dooze /> 
          
        @endif
                 
        @if ($activity == "settings")
         <div style="position:fixed;top:0;width:55%;z-index:9; background-color:yellow"> Paramètres 
            <button type="button" class="btn-close text-end" aria-label="Close" wire:click="closeSettings" ></button>
        </div>

        {{ $slot }}

         {{-- <livewire:auth.settings  /> --}}
            {{-- <x-auth.edit />     --}}    
        @endif
        
    
    </div>
        


</div>
