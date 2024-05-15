@section('title')
    {{$fan->name }}
@endsection

<div id="club">
    

    <div id="vue">
        @persist('vue')
            <livewire:auth.data />
        @endpersist
    </div>
   
    <div id="activity">
      <livewire:auth.activity :id="$fan->id" :couleur="$fan->club->couleur_primary" :$activity />
       </div>
  
    <div id="bulletin">
      @persist('bulletin')
      <livewire:partials.navbar />
      <hr>
      <x-club.bulletin 
        :scoreshomme="$fan->club->scores_homme" 
        :scoresfemme="$fan->club->scores_femme"
        :nom="$fan->club->nom"
        :siteofficiel="$fan->club->site_officiel"
        :chant="$fan->club->chant" 
          />
  
      @endpersist
    </div>
  
  
  </div>
  