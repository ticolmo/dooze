@extends('layouts.app')


@section('title')
{{$club->nom }}
@endsection

@section('navbar')
  <livewire:partials.navbar :club="$club->nom" />
@endsection


@section('content')

<div id="club">

  <div id="vue">
    <div id="stade"
    style="background-image:url('{{Storage::url('stades/'.$club->nom.' stadium.jpg')}}');background-size: cover;{{$club->image_position }}"
    >
      <div id="legende">
        <div id="nameStade"> <a href="{{$club->url_stade}}" target="_blank">{{$club->stade}}  
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-crosshair" viewBox="0 0 16 16">
          <path d="M8.5.5a.5.5 0 0 0-1 0v.518A7.001 7.001 0 0 0 1.018 7.5H.5a.5.5 0 0 0 0 1h.518A7.001 7.001 0 0 0 7.5 14.982v.518a.5.5 0 0 0 1 0v-.518A7.001 7.001 0 0 0 14.982 8.5h.518a.5.5 0 0 0 0-1h-.518A7.001 7.001 0 0 0 8.5 1.018zm-6.48 7A6.001 6.001 0 0 1 7.5 2.02v.48a.5.5 0 0 0 1 0v-.48a6.001 6.001 0 0 1 5.48 5.48h-.48a.5.5 0 0 0 0 1h.48a6.002 6.002 0 0 1-5.48 5.48v-.48a.5.5 0 0 0-1 0v.48A6.001 6.001 0 0 1 2.02 8.5h.48a.5.5 0 0 0 0-1h-.48M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
          </svg> </a>
        </div>
        @if (!empty($club->auteur_credit))
        <div id="credit"> Crédit: <a href="{{$club->lien_credit}}">{{$club->auteur_credit}}</a></div>  
        @endif  
      </div>
      
    </div>
    
  </div>
  <div id="activity">
    <x-errors-validation />
    <livewire:club.index 
      :flux="$club->flux_rss_blogs" 
      :nom="$club->nom" 
      :idclub="$club->id_club" 
      :couleur="$club->couleur_primary" 
      :fluxrs="$club->flux_rss_reseaux_sociaux" 
      :urlclub="$club->url" 
      />
  </div>

  <div id="bulletin">
    @persist('bulletin')    
   
    <x-club.bulletin 
      :scoreshomme="$club->scores_homme" 
      :scoresfemme="$club->scores_femme"
      :nom="$club->nom"
      :siteofficiel="$club->site_officiel"  
      :chant="$club->chant" 
      />

    @endpersist
  </div>


</div>


@endsection