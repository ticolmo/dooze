<div>
    
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

        <div  @if ($matchencours || $matchfini) @endif>             
            <div class="rencontres">
            <span> {{$rencontre['teams']['home']['name']}}</span>                  
            <span>                   
                @if ($rencontre['fixture']['status']['short'] == 'NS')
                {{date('H:i', $rencontre['fixture']['timestamp'])}}
                @else
                    @if ($matchencours)
                        <span style="color: red"> {{$rencontre['goals']['home']." - ".$rencontre['goals']['away']}} </span>                       
                    @else
                        <span> {{$rencontre['goals']['home']." - ".$rencontre['goals']['away']}} </span> 
                    @endif                        
                
                @endif
            </span> 
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
</div>
