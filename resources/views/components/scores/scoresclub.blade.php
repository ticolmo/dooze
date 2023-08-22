

@if (isset($lastmatch))
<div>
   <!-- DERNIER MATCH -->

        <div> {{ __('LAST MATCH') }}</div>
        <div> {{$lastmatch['ligue']}} </div>        
        <div>{{$lastmatch['date']}}</div>
        <div> <span> {{$lastmatch['equipe1']}}</span> <span> {{$lastmatch['score1']." -
            ".$lastmatch['score2']}}</span> <span>{{$lastmatch['equipe2']}}</span> </div>
        <div>Détails</div>
</div>   
@endif 
@if (isset($nextmatch))
<div>
  <!-- PROCHAIN MATCH -->

        <div>PROCHAIN MATCH</div>
        
        <div>{{$nextmatch['ligue']}}</div>        
        <div>{{$nextmatch['date']}}</div>
        <div> <span> {{$nextmatch['equipe1']}}</span> <span> - </span><span>{{$nextmatch['equipe2']}}</span> </div>
        
        
</div>
@endif    
        


