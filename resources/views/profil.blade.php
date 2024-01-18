@extends('layouts.club')


@section('title')
{{$fan->name }}
@endsection


@section('content')

<div id="club">

    <div id="vue">
        <x-auth.data 
          :id="$fan->id"
          :photo="$fan->photoprofil" 
          :name="$fan->name"
          :pseudo="$fan->pseudo"
          :bio="$fan->bio"
          :categorie="$fan->categorie"
          :titrelienone="$fan->titrelien1"
          :lienone="$fan->lien1"
          :titrelientwo="$fan->titrelien2"
          :lientwo="$fan->lien2"        
        />        
    </div>
    
  <div id="activity">
    <livewire:auth.profil :id="$fan->id"/>
  </div>

  <div id="bulletin">
    @persist('bulletin')
    <livewire:partials.navbar />
    <hr>
    <x-club.bulletin 
      :scoreshomme="$fan->club->scores_homme" 
      :scoresfemme="$fan->club->scores_femme"
      :nom="$fan->club->nom"
      :siteofficiel="$fan->club->site_officiel"  />

    @endpersist
  </div>


</div>


@endsection