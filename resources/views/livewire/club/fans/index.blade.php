<div x-data="index">
      
      <div class="fans" style="min-height:50vh">
        {{-- SECTION FAN --}}
        @if ($section == "")
          <div class="supporters formulaire">  
            
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
                      <livewire:club.fans.commentaires :$idclub :visiteur="0"/>  

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
                         

            
          </div>  
        @endif
        
      
        {{-- SECTION VISITEURS --}}
        @if ($section == "visitors")

          @auth
            @php
              $foo = 1;
            @endphp              
            <livewire:club.fans.formulaire :$idclub :visiteur="$foo" />  
            <livewire:club.fans.commentaires :$idclub :visiteur="1"/> 
          @endauth
          
          @guest
              {{-- si visiteurs --}}
              @php
                  $modalid = uniqid();
              @endphp        
              <x-club.fans.formulaire-visiteur> {{$modalid}} </x-club.fans.formulaire-visiteur>
              <x-modals.connexion> {{$modalid}}  </x-modals.connexion>
              <livewire:club.fans.commentaires :$idclub :visiteur="1"/>  
          @endguest
        @endif
      </div>

</div>