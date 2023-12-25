<div class="scoreclub">

  <!-- DERNIER MATCH -->
  @if (isset($lastmatch) && !empty($lastmatch))
  <div class="match">    
    <div> Dernier match</div>

    <div class="titreMatch">      
      @if ($pageCompetLastMatch['page'])
        {{-- Redirection vers page competition --}}
        <span> <a href="{{route('competition', $pageCompetLastMatch['url'])}}">{{$lastmatch['league']['name']}} </a></span> 
      @else  
        <span>{{$lastmatch['league']['name']}} </span>
      @endif      
      <span> - </span>
      @if ($pageCompetLastMatch['page'])
        {{-- Redirection vers page competition vers la journée affichée --}}
        <livewire:club.bulletin.redirect-journee :url="$pageCompetLastMatch['url']" :league="$lastmatch['league']['round']" />        
      @else  
      <span>{{$lastmatch['league']['round']}} </span>
      @endif  
    </div>

    <div class="date">{{date('l d F', $lastmatch['fixture']['timestamp'])}}</div>
    <div class="ligneMatch"> 
      <span> {{$lastmatch['teams']['home']['name']}}</span> 
      
      <span class="scoreGoalHome"> <span> {{$lastmatch['goals']['home']}}</span></span> 
      <span class="scoreTrait"> - </span>
      <span class="scoreGoalAway"> {{$lastmatch['goals']['away']}}</span>
    
      <span> {{$lastmatch['teams']['away']['name']}}</span> 
    </div>
  </div>
  @endif

  <!-- PROCHAIN MATCH -->
  @if (isset($nextmatch) && !empty($nextmatch))
  <div class="match">
    
    <div>Prochain match</div>

    <div class="titreMatch">
      @if ($pageCompetNextMatch['page'])
        <span> <a href="{{route('competition', $pageCompetNextMatch['url'])}}">{{$nextmatch['league']['name']}} </a></span> 
      @else  
        <span>{{$nextmatch['league']['name']}} </span>
      @endif  
      <span> - </span>
      @if ($pageCompetNextMatch['page'])
        {{-- Redirection vers page competition vers la journée affichée --}}
        <livewire:club.bulletin.redirect-journee :url="$pageCompetNextMatch['url']" :league="$nextmatch['league']['round']" />        
      @else  
      <span>{{$nextmatch['league']['round']}} </span>
      @endif  
    </div>
  
    <div class="date">{{date('l d F', $nextmatch['fixture']['timestamp'])}}</div>
    <div class="date">{{date('H:i', $nextmatch['fixture']['timestamp'])}}</div>
    <div class="ligneMatch"> 
      <span> {{$nextmatch['teams']['home']['name']}}</span> 
      <span class="scoreGoal"> {{$nextmatch['goals']['home']}}</span> 
      <span class="scoreTrait"> - </span>
      <span class="scoreGoal"> {{$nextmatch['goals']['away']}}</span>
      <span> {{$nextmatch['teams']['away']['name']}}</span> 
    </div>
  </div>



  @endif

</div>