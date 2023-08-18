

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
            <a href="">
              <div class="rencontres">             
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
            </a>
              <hr>
            @endforeach
            <div class="bottomcompet"></div>
          @endif
        @endforeach
      @endif
    
    @endforeach
  @endif  