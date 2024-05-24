<div>    

    <div id="menuClub">      
      @if ($activity !== "settings") 
        <a wire:navigate class="bar" href="{{route('profil', 'posts' )}}"> <i class="bi bi-chat-dots"></i>             
                <span class="choiceSpan" @if ($activity == "posts" || $activity == "") style="border-bottom: 4px solid {{$couleur}}; @media screen and (max-width:767px) {.choiceSpan{color:{{$couleur}}}}}" @endif 
                    > Posts</span>
            </a>

        <a wire:navigate class="bar" href="{{route('profil', 'mailbox' )}}"> <i class="bi bi-mailbox"></i>           
                <span class="choiceSpan" @if ($activity == "mailbox" ) style="border-bottom: 4px solid {{$couleur}}; @media screen and (max-width:767px) {.choiceSpan{color:{{$couleur}}}}}" @endif 
                    >Messagerie </span> 
            </a>

        <a wire:navigate class="bar" href="{{route('profil', 'apidooze' )}}"> <i class="bi bi-file-text"></i>            
                <span class="choiceSpan" @if ($activity == "apidooze") style="border-bottom: 4px solid {{$couleur}}; @media screen and (max-width:767px) {.choiceSpan{color:{{$couleur}}}}}" @endif 
                    > API Dooze</span>
            </a>
      @endif
    </div>    

    <div id="pageClub" style="position:relative;">  
       
       
        @if ($activity == "posts" || $activity == "")   
            <livewire:auth.commentaires :$id  />
          
        @endif

        @if ($activity == "mailbox")
        <div>dfdfg</div>
       {{--     <livewire:auth.dashboard  :$id  :$part :key="$idpagedashboard" /> --}}
        @endif

        @if ($activity == "apidooze")   
        
            <x-api-dooze /> 
          
        @endif
                 
        @if ($activity == "settings")
         <livewire:auth.settings  />
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


