

@if (isset($matchsdujour))
    @foreach ($matchsdujour as $competition)             
      @if ($competition!=null)     
        @foreach ($competition as $matchs)
          @if (isset($matchs[0]["league"]["logo"]))
            <img class="logocompet"src="{{$matchs[0]["league"]["logo"]}}" alt="">      
          
            @foreach ($matchs as $rencontre)
              <div> 
                <span> {{$rencontre['teams']['home']['name']}}</span> 
                  @if ($rencontre['fixture']['status']['short'] == 'NS')
                  {{date('H:i', $rencontre['fixture']['timestamp'])}}
                  @endif
                <span> {{$rencontre['goals']['home']." - ".$rencontre['goals']['away']}}</span> 
                <span>{{$rencontre['teams']['away']['name']}}</span> 
              </div>
            @endforeach
          @endif
        @endforeach
      @endif
    
    @endforeach
  @endif  