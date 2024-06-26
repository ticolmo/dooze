<div id="resultats" x-data="{ open: false}">  
    <div id="tableauScores">  

      <livewire:features.liste-deroulante :selection="$timezone" :tableau="$listeTimezone"/>
      
      <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link " id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">{{ now()->locale(app()->getLocale())->subDay()->format('l j F')}}</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"> {{ now()->locale(app()->getLocale())->format('l j F') }}</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">{{ now()->addDay()->format('l j F') }}</button>
        </li>    
      </ul>
  
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">          
          <livewire:home.rencontre :choicedate="$dateyesterday" :$timezone lazy="on-load"  />
        </div>
        <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">          
          <livewire:home.rencontre :choicedate="$datetoday" :$timezone/>
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">         
          <livewire:home.rencontre :choicedate="$datetomorrow" :$timezone lazy="on-load" />
        </div>
      </div> 
    </div>
  </div> 