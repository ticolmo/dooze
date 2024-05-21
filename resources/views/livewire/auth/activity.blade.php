<div>    

    <div id="menuClub">      
        
        <a wire:navigate.hover class="bar" href="{{route('profil', 'posts' )}}"> <i class="bi bi-chat-dots"></i>             
                <span class="choiceSpan" @if ($activity == "posts" || $activity == "") style="border-bottom: 4px solid {{$couleur}}; @media screen and (max-width:767px) {.choiceSpan{color:{{$couleur}}}}}" @endif 
                    > Posts</span>
            </a>

        <a wire:navigate.hover class="bar" href="{{route('profil', 'mailbox' )}}"> <i class="bi bi-mailbox"></i>           
                <span class="choiceSpan" @if ($activity == "mailbox" ) style="border-bottom: 4px solid {{$couleur}}; @media screen and (max-width:767px) {.choiceSpan{color:{{$couleur}}}}}" @endif 
                    >Messagerie </span> 
            </a>

        <a wire:navigate.hover class="bar" href="{{route('profil', 'apidooze' )}}"> <i class="bi bi-file-text"></i>            
                <span class="choiceSpan" @if ($activity == "apidooze") style="border-bottom: 4px solid {{$couleur}}; @media screen and (max-width:767px) {.choiceSpan{color:{{$couleur}}}}}" @endif 
                    > API Dooze</span>
            </a>
        
    </div>    

    <div id="pageClub" style="position:relative;">  
       
       
        @if ($activity == "posts" || $activity == "")   
            <livewire:auth.commentaires :$id  />
          
        @endif

        @if ($activity == "mailbox")
            <livewire:auth.dashboard  :$id  {{--:$part :key="$idpagedashboard" --}} />
        @endif

        @if ($activity == "apidooze")   
        
            <x-api-dooze /> 
          
        @endif
                 
        @if ($activity == "settings")
         <div style="position:fixed;top:0;width:55%;z-index:9; background-color:yellow"> Paramètres 
            <button type="button" class="btn-close text-end" aria-label="Close" wire:click="closeSettings" ></button>
        </div>

      
         <livewire:auth.settings  lazy/>
            {{-- <x-auth.edit />     --}}    
        @endif
        
    
    </div>
        


</div>

@script
<script>
    const chargingContent = `
      <div style="background-color:green;width:100%;height:100vh; text-align:center; padding-top:20%">
        <div class="spinner-border text-secondary" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
      </div>
    `;

    const chargingElement = document.getElementById('foo');
  
/*     document.addEventListener('livewire:navigating', () => {  
      
  
      if (chargingElement) {
        chargingElement.innerHTML = chargingContent;
      } else {
        console.error("Element with ID 'charging' not found!");
      }
    }); */

    document.querySelectorAll('.bar').forEach(function(element) {
  element.addEventListener('click', function() {
    document.getElementById('pageClub').innerHTML = chargingContent
    ;
  });
});

    document.addEventListener('livewire:navigated', () => {
      if (chargingElement) {
        chargingElement.innerHTML = ''; // Vider le contenu après la navigation
      }
    });
  </script>

@endscript


