<div>

    @section('title')
    {{$journee}}
    @endsection

    <div> Journée:</div>
    <livewire:features.liste-deroulante :selection="$journee" :tableau="$listeJournee " />
      @php
          $jour = "";
      @endphp  
    <table id="tableJournee">
      
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
            <tr class="dateJournee">
                <td colspan="7"> {{date('l d F', $rencontre['fixture']['timestamp'])}}  </td>
            </tr>
        @endif
      
                
        <tr 
            @if ($matchencours || $matchfini) wire:click="redirectDetailRencontre({{$rencontre['fixture']['id']}})" @endif            
            class="ligneJournee {{-- @if ($matchencours == false)  --}}{{-- bottomRencontre --}} {{-- @endif  --}}"
            >
            
            
            <td class="teamHome"> {{$rencontre['teams']['home']['name']}}</td>
            <td class="centreLigne"> <img class="logoClub" src="{{$rencontre['teams']['home']['logo']}}" alt="" /> </td>
            
            @if ($rencontre['fixture']['status']['short'] == 'NS')
                <td colspan="3"> {{date('H:i', $rencontre['fixture']['timestamp'])}} </td>
            @else
                @if ($matchencours)
                <td class="centreLigne" style="color: red"> {{$rencontre['goals']['home']}} </td>
                <td class="trait score"> - </td>
                <td class="centreLigne" style="color: red"> {{$rencontre['goals']['away']}} </td> 
                @else
                <td class="scoreHome score"> {{$rencontre['goals']['home']}} </td>
                <td class="score trait"> - </td>
                <td class="scoreAway score"> {{$rencontre['goals']['away']}} </td>
                @endif

            @endif
            <td class="centreLigne"> <img class="logoClub" src="{{$rencontre['teams']['away']['logo']}}" alt="" /> </td>
            <td class="teamAway"> {{$rencontre['teams']['away']['name']}}</td>
        </tr>   
        
        <tr class="bottomRencontre"> <td colspan="7" class="status"> {{$rencontre['fixture']['status']['short']}} </td> </tr>        
        
        @php
           
            $jour = substr($rencontre['fixture']['date'],0 , 10);
             
        @endphp

        @endforeach   
    </table>
    
</div>