<div 
  @if ($redirection)
    wire:click="redirectDetailRencontre({{$lastmatch['fixture']['id']}})"
  @endif
  class="ligneMatch"
  > 
    <span> {{$lastmatch['teams']['home']['name']}}</span> 
    
    <span class="scoreGoalHome"> <span> {{$lastmatch['goals']['home']}}</span></span> 
    <span class="scoreTrait"> - </span>
    <span class="scoreGoalAway"> {{$lastmatch['goals']['away']}}</span>
  
    <span> {{$lastmatch['teams']['away']['name']}}</span> 
</div>