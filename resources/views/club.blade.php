@extends('layouts.club')


@section('title')
{{$club->nom }} -
@endsection


@section('content')

<div id="club">

  <div id="vue">
    <div
    style="background-image:url('{{Storage::url('stades/'.$club->nom.' stadium.jpg')}}');background-size: cover;{{$club->image_position }}"
    >
      @if (!empty($club->auteur_credit))
      <div id="credit"> Crédit:<a href="{{$club->lien_credit}}">{{$club->auteur_credit}}</a></div>  
      @endif  
    </div>
    
  </div>
    
  <div id="activity">
    <x-errors-validation />
    <livewire:club.index :flux="$club->flux_rss_blogs" :nom="$club->nom" :idclub="$club->id_club"/>
  </div>

  <div id="bulletin">
    {{-- peut-être pas nécessaire de tout mettre dans composant --}}
    <x-club.bulletin 
      :scoreshomme="$club->scores_homme" 
      :scoresfemme="$club->scores_femme"
      :nom="$club->nom"
      :couleur="$club->couleur_tableauscore"
      :siteofficiel="$club->site_officiel"  />
  </div>


</div>


@endsection