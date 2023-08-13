
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#live" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Live</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#man" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"> 1ère Equipe masculine</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#women" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">1ère Equipe féminine</button>
  </li>
  
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="live" role="tabpanel" aria-labelledby="home-tab" tabindex="0">...</div>
  <div class="tab-pane fade" id="man" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
  {{-- composant des scores --}}
  <x-scores :apiscores="$apiscores" /> 
  </div>
  <div class="tab-pane fade" id="women" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">...</div>
  
</div>

