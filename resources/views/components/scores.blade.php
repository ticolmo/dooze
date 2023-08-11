
@inject('api', 'App\Api\Apifootball')
@php
   $lastmatch = $api->getlastmatch($apiscores);
   $nextmatch = $api->getnextmatch($apiscores); 
   
@endphp

    

<div class="info"> 
    <div class="result">       
       <!-- DERNIER MATCH -->
       <div> 
        <div> {{ __('LAST MATCH') }}</div>
        <div> {{$lastmatch['ligue']}} </div>
        <div>{{$lastmatch['journee']}} </div>
        <div> <span> {{$lastmatch['equipe1']}}</span> <span> {{$lastmatch['score1']." - ".$lastmatch['score2']}}</span> <span>{{$lastmatch['equipe2']}}</span> </div>
       
        
      </div>
      <!-- MATCH EN COURS -->
      <div> 
      
      </div>
      <!-- PROCHAIN MATCH -->
      <div> 
        <div>PROCHAIN MATCH</div>       
        @if (!empty($nextmatch))        
        <div>{{$nextmatch['ligue']}}</div>
        <div>{{$nextmatch['journee']}}</div>
        <div>{{$nextmatch['date']}}</div>
        <div> <span> {{$nextmatch['equipe1']}}</span> <span> - </span><span>{{$nextmatch['equipe2']}}</span> </div>  
        @endif            
          
           
      </div>
    </div>
       
    
  </div >
