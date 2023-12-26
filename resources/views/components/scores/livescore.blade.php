<div class="match">

  <div> {{ $slot }}</div>
  <div class="titreMatch">
    @if ($pageCompetMatch['page'])
    {{-- Redirection vers page competition --}}
    <span> <a href="{{route('competition', $pageCompetMatch['url'])}}">{{$livescore['league']['name']}} </a></span>
    @else
    <span>{{$livescore['league']['name']}} </span>
    @endif
    <span> - </span>
    @if ($pageCompetMatch['page'])
    {{-- Redirection vers page competition vers la journée affichée --}}
    <livewire:club.bulletin.redirect-journee :url="$pageCompetMatch['url']" :league="$livescore['league']['round']" />
    @else
    <span>{{$livescore['league']['round']}} </span>
    @endif
  </div>

  <div class="date">{{date('l d F', $livescore['fixture']['timestamp'])}}</div>
  <div class="ligneMatch">
    <span> {{$livescore['teams']['home']['name']}}</span>

    <span class="scoreGoalHome"> <span> {{$livescore['goals']['home']}}</span></span>
    <span class="scoreTrait"> - </span>
    <span class="scoreGoalAway"> {{$livescore['goals']['away']}}</span>

    <span> {{$livescore['teams']['away']['name']}}</span>
  </div>




</div>