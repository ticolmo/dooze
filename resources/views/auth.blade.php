@extends('layouts.app')


@section('title')
{{$fan->name }}
@endsection


@section('content')
 
<div id="club">

  <div id="vue">
    <livewire:auth.data />
    
  </div>
    
  <div id="activity">
    <livewire:auth.index :id="$fan->id" :couleur="$fan->club->couleur_primary" />
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