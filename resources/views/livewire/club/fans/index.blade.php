<div x-data="index">
   
    
      
      <div class="fans" style="min-height:50vh">
        {{-- SECTION FAN --}}
        @if ($section == "")
          <div class="supporters formulaire">  
            {{--   @php
                $foo = true;
            @endphp
            <livewire:club.fans.formulaire :$idclub :visiteur="$foo" />  --}}
            
              @auth
                {{-- les fans du club --}}
                @if (auth()->user()->club_id == $idclub)   
                 
                @php
                  $foo = 0;
                @endphp              
                <livewire:club.fans.formulaire :$idclub :visiteur="$foo" /> 
                
                
                @else
                  {{-- si fan autre club  --}}           
                      @php
                          $modalid = uniqid();
                      @endphp
                      <x-club.fans.formulaire-visiteur> {{$modalid}} </x-club.fans.formulaire-visiteur>
                      <x-modals.fanautreclub> {{$modalid}} </x-modals.fanautreclub> 

                  @endif  

                  
              @endauth
                  
              @guest
                  {{-- si visiteurs --}}
                  @php
                      $modalid = uniqid();
                  @endphp        
                  <x-club.fans.formulaire-visiteur> {{$modalid}} </x-club.fans.formulaire-visiteur>
                  <x-modals.connexion> {{$modalid}}  </x-modals.connexion>
                  <livewire:club.fans.commentaires :$idclub :visiteur="0"/>

              @endguest
              
              {{-- <x-modals.bouton-visiteur :idclub :$idclub submit>            
                Publier
                <x-slot:form>
                  commentaireclub
                </x-slot>
              </x-modals.bouton-visiteur> --}}
        
            {{-- affichage des commentaire des fans du club --}}
            

            {{-- <div wire:loading wire:target="pagination"> 
              <div class="spinner-border text-secondary" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>          
            </div> --}}
            
          </div>  
        @endif
        
      
        {{-- SECTION VISITEURS --}}
        @if ($section == "visitors")
          <div> visiteurs</div>
        @endif
      </div>

</div>