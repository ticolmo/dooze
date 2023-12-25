

<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">

  @if ($live['etat'])
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#live" type="button" role="tab"
      aria-controls="home-tab-pane" aria-selected="true">Match du jour</button>
  </li>
  @endif
  <li class="nav-item" role="presentation">
    <button class="nav-link @if ($live['etat'] == false ) active @endif " id="profile-tab" data-bs-toggle="tab"
      data-bs-target="#man" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"> 1ère Equipe
      masculine</button>
  </li>

  @if ($idequipefemme !== 0)
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#women" type="button" role="tab"
      aria-controls="contact-tab-pane" aria-selected="false">1ère Equipe féminine</button>
  </li>
  @endif


</ul>
<div class="tab-content" id="myTabContent">

  @if ($live['etat'])
  <div class="tab-pane fade show active" id="live" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
    {{-- composant des scores du jour --}}
    @if(isset($live['homme']))
      <x-scores.livescore :livescore="$live['homme']"> Equipe masculine </x-scores.livescore> 
    @endif
    @if(isset($live['femme']))
    <x-scores.livescore :livescore="$live['femme']"> Equipe féminine </x-scores.livescore>
    @endif

  </div>
  @endif

  <div class="tab-pane fade  @if ($live['etat'] == false ) show active @endif " id="man" role="tabpanel"
    aria-labelledby="profile-tab" tabindex="0">
    {{-- composant des scores Homme--}}
    <x-scores.scoresclub :lastmatch="$matchshomme['lastmatch']" :nextmatch="$matchshomme['nextmatch']"/>
  </div>

  @if ($idequipefemme !== 0)
  <div class="tab-pane fade " id="women" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
    {{-- composant des scores Femme--}}
    <x-scores.scoresclub :lastmatch="$matchsfemme['lastmatch']" :nextmatch="$matchsfemme['nextmatch']"/>
  </div>
  @endif

</div>

