
<div style="display: inline-block;">
   <!-- DERNIER MATCH -->

        <div> {{ $slot }}</div>
        <div> {{$livescore['league']['name']}} </div>        
        <div>{{date("D d F Y", $livescore['fixture']['timestamp'])}}</div>
        <div> <span> {{$livescore['teams']['home']['name']}}</span> <span> {{$livescore['goals']['home']." -
            ".$livescore['goals']['away']}}</span> <span>{{$livescore['teams']['away']['name']}}</span> </div>
        <div>{{$livescore['fixture']['status']['elapsed']}} </div>
       
</div>   

  
        


