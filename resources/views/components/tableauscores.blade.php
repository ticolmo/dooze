@inject('api', 'App\Api\Apifootball')
@php
if ($api->getLiveMatch($scoreshomme,date("Y-m-d")) !== null || $api->getLiveMatch($scoresfemme,date("Y-m-d")) !== null)
{
$livescoreH = $api->getLiveMatch($scoreshomme,date("Y-m-d"));
$livescoreF = $api->getLiveMatch($scoresfemme,date("Y-m-d"));
if ($livescoreH !== null || $livescoreF !== null ){
$liveactif = true;
}else{
$liveactif = false;
}
}else{
$liveactif = false;
}

@endphp





<ul class="nav nav-tabs" id="myTab" role="tablist">

  @if ($liveactif)
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#live" type="button" role="tab"
      aria-controls="home-tab-pane" aria-selected="true">Match du jour</button>
  </li>
  @endif
  <li class="nav-item" role="presentation">
    <button class="nav-link @if ($liveactif == false ) active @endif " id="profile-tab" data-bs-toggle="tab"
      data-bs-target="#man" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"> 1ère Equipe
      masculine</button>
  </li>

  @if ($scoresfemme !== 0)
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#women" type="button" role="tab"
      aria-controls="contact-tab-pane" aria-selected="false">1ère Equipe féminine</button>
  </li>
  @endif


</ul>
<div class="tab-content" id="myTabContent">

  @if ($liveactif)
  <div class="tab-pane fade show active" id="live" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
    {{-- composant des scores --}}
    <x-livescore :livescoreh="$livescoreH" />
  </div>
  @endif

  <div class="tab-pane fade  @if ($liveactif == false ) show active @endif " id="man" role="tabpanel"
    aria-labelledby="profile-tab" tabindex="0">
    {{-- composant des scores Homme--}}
    <x-scores :apiscores="$scoreshomme" />
  </div>
  @if ($scoresfemme !== 0)
  <div class="tab-pane fade " id="women" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
    {{-- composant des scores Femme--}}
    <x-scores :apiscores="$scoresfemme" />
  </div>
  @endif

</div>

</div>