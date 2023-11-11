<div>
    <div wire:loading> 
        <div class="spinner-border text-secondary" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>          
    </div>
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

                <div  @if ($matchencours || $matchfini) data-bs-toggle="modal" data-bs-target="#rencontre{{$rencontre['fixture']['id']}}" @endif>             
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
                    @if ($matchencours || $matchfini)
                    {{-- <x-modals.detail-rencontre :idrencontre="$rencontre['fixture']['id']"/>    --}}  
                    <livewire:home.detail-rencontre :idrencontre="$rencontre['fixture']['id']" wire:key="{{$rencontre['fixture']['id']}}" lazy />

                    @endif
                <hr>
                @endforeach
                <div class="bottomcompet"></div>
            @endif
            @endforeach
        @endif
        
        @endforeach
    @endif  
</div>
