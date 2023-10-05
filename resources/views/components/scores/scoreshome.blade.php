@php
    date_default_timezone_set($slot)
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
                  if (in_array($rencontre['fixture']['status']['short'], ['1H', 'HT', '2H', 'ET', 'BT', 'P', 'SUSP', 'INT', 'FT', 'AET', 'PEN'])){
                    $matchencours = true;    
                  } else{
                    $matchencours = false; 
                  }  
              @endphp            

              <div class="rencontres" @if ($matchencours) data-bs-toggle="modal" data-bs-target="#rencontre{{$rencontre['fixture']['id']}}" @endif>             
                <span> {{$rencontre['teams']['home']['name']}}</span>                  
                <span>                   
                  @if ($rencontre['fixture']['status']['short'] == 'NS')
                  {{date('H:i', $rencontre['fixture']['timestamp'])}}
                  @else
                  {{$rencontre['goals']['home']." - ".$rencontre['goals']['away']}}
                  @endif
                </span> 
                <span>{{$rencontre['teams']['away']['name']}}</span>
              </div>                      
                  @if ($matchencours)
                  <x-modals.detail-rencontre :idrencontre="$rencontre['fixture']['id']"/>         
                  @endif
              <hr>
            @endforeach
            <div class="bottomcompet"></div>
          @endif
        @endforeach
      @endif
    
    @endforeach
  @endif  