<div>

    @section('title')
    {{$journee}}
    @endsection

    <div> Journée:</div>
    <livewire:features.liste-deroulante :selection="$journee" :tableau="$listeJournee " />
      @php
          $jour = "";
      @endphp  
    <div id="tableJournee">
              
        @foreach ($matchs as $rencontre)
            @php
                $afficheJour = false;   
                if ($jour !== substr($rencontre['fixture']['date'],0 , 10)) {
                        $afficheJour = true;  
                    };
                $matchencours = false;
                $matchfini = false;
                if (in_array($rencontre['fixture']['status']['short'], ['1H', 'HT', '2H', 'ET', 'BT', 'P', 'SUSP', 'INT'])){
                $matchencours = true;
                }
                if (in_array($rencontre['fixture']['status']['short'], ['FT', 'AET', 'PEN'])){
                $matchfini = true;
                }
            @endphp
    
        @if ($afficheJour)
            <div class="dateJournee">
                 {{date('l d F', $rencontre['fixture']['timestamp'])}} 
            </div>
        @endif
      
                
        <div 
            @if ($matchencours || $matchfini) wire:click="redirectDetailRencontre({{$rencontre['fixture']['id']}})" @endif            
            class="ligneJournee {{-- @if ($matchencours == false)  --}}{{-- bottomRencontre --}} {{-- @endif  --}}"
            >
            
            
            <span class="teamHome"> {{$rencontre['teams']['home']['name']}}</span>
            <span class="centreLigne"> <img class="logoClub" src="{{$rencontre['teams']['home']['logo']}}" alt="" /> </span>
            
            @if ($rencontre['fixture']['status']['short'] == 'NS')
                <span colspan="3"> {{date('H:i', $rencontre['fixture']['timestamp'])}} </span>
            @else
                @if ($matchencours)
                <span class="centreLigne" style="color: red"> {{$rencontre['goals']['home']}} </span>
                <span class="trait score"> - </span>
                <span class="centreLigne" style="color: red"> {{$rencontre['goals']['away']}} </span> 
                @else
                <span class="scoreHome score"> {{$rencontre['goals']['home']}} </span>
                <span class="score trait"> - </span>
                <span class="scoreAway score"> {{$rencontre['goals']['away']}} </span>
                @endif

            @endif
            <span class="centreLigne"> <img class="logoClub" src="{{$rencontre['teams']['away']['logo']}}" alt="" /> </span>
            <span class="teamAway"> {{$rencontre['teams']['away']['name']}}</span>
        </div>   
        
        <div class="bottomRencontre status"> {{$rencontre['fixture']['status']['short']}} </div>        
        
        @php
           
            $jour = substr($rencontre['fixture']['date'],0 , 10);
             
        @endphp

        @endforeach   
    </div>
    
</div>