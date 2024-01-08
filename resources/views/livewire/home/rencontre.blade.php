<div>
    @php
    date_default_timezone_set($timezone)
    @endphp
   
    @if (isset($matchsdujour))
        @foreach ($matchsdujour as $competition)             
        @if ($competition!=null)     
            @foreach ($competition as $matchs)
            @if (isset($matchs[0]["league"]["logo"]))
                <div class="namecompet">
                <img class="logocompet"src="{{$matchs[0]["league"]["logo"]}}" alt=""> 
                <span>{{$matchs[0]["league"]["name"]}}</span>     
                </div>
                @foreach ($matchs as $rencontre)
                @php
                    $matchencours = false;
                    $matchfini = false; 
                    if (in_array($rencontre['fixture']['status']['short'], ['1H', 'HT', '2H', 'ET', 'BT', 'P', 'SUSP', 'INT'])){
                        $matchencours = true;    
                    } 
                    if (in_array($rencontre['fixture']['status']['short'], ['FT', 'AET', 'PEN'])){
                        $matchfini = true;    
                    }
                @endphp            

                <div  
                    @if ($matchencours || $matchfini) 
                     wire:click="redirectDetailRencontre({{$rencontre['fixture']['id']}})"
                    @endif
                >             
                    <div class="rencontres">
                        <span> {{$rencontre['teams']['home']['name']}}</span> 
                        <span class="centreLigne"> <img class="logoClub" src="{{$rencontre['teams']['home']['logo']}}" alt="" /> </span>             
                        <span>                   
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
                        </span> 
                        <span class="centreLigne"> <img class="logoClub" src="{{$rencontre['teams']['away']['logo']}}" alt="" /> </span>
                        <span>{{$rencontre['teams']['away']['name']}}</span>
                    </div>
                    @if ($matchencours)
                    <div style="text-align: center">
                        {{$rencontre['fixture']['status']['elapsed']}}'
                    </div>
                    @endif
                </div>                      
                  
                <hr>
                @endforeach
                <div class="bottomcompet"></div>
            @endif
            @endforeach
        @endif
        
        @endforeach
    @endif  
</div>
