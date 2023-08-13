
<div>
   <!-- DERNIER MATCH -->

        <div> Equipe Homme</div>
        <div> {{$livescoreh['ligue']}} </div>        
        <div>{{$livescoreh['date']}}</div>
        <div> <span> {{$livescoreh['equipe1']}}</span> <span> {{$livescoreh['score1']." -
            ".$livescoreh['score2']}}</span> <span>{{$livescoreh['equipe2']}}</span> </div>
        <div>{{$livescoreh['time']}} </div>
</div>   

@if (!empty($livescoref))
<div>
  <!-- PROCHAIN MATCH -->

        <div>Equipe Femme</div>
        
        <div>{{$livescoref['ligue']}}</div>        
        <div>{{$livescoref['date']}}</div>
        <div> <span> {{$livescoref['equipe1']}}</span> <span> - </span><span>{{$livescoref['equipe2']}}</span> </div>
        
        
</div>
@endif    
        


