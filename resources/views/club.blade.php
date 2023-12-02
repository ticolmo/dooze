@extends('layouts.app')


@section('title')
{{$club->nom }} -
@endsection


@section('content')


<div class="stade"
  style="background-image:url('{{Storage::url('stades/'.$club->nom.' stadium.jpg')}}');background-size: cover;{{$club->image_position }}">
  <img class="stade1" src="{{$club->nom}}" alt="{{$club->nom}}">
  
  <div class="logo">
    <a href="<?php echo $club->site_officiel?>" target="_blank">
      <img class="logo1 animate__animated animate__flipInY" src="{{Storage::url('logos/'.$club->nom.'.png')}}" alt="">
    </a>
    <div class="site_officiel">
      <a href="<?php echo $club->site_officiel;?>" target="_blank">
        <?php echo(substr($club->site_officiel,8))?>
      </a>
    </div>
  </div>
  @if (!empty($club->auteur_credit))
  <div id="credit"> Crédit:<a href="{{$club->lien_credit}}">{{$club->auteur_credit}}</a></div>  
  @endif
</div>


  
<div class="infot" style="background-color:{{$club->couleur_tableauscore}}">

    {{-- composant tableau des scores --}} 
<x-scores.tableau-scores-club :scoreshomme="$club->scores_homme" :scoresfemme="$club->scores_femme" /> 




</div>


<audio id="chant" src="{{Storage::url('audio/'.$club->nom.' Audio.mp3')}}" autoplay controls></audio>

<livewire:club.index :flux="$club->flux_rss_blogs" :nom="$club->nom" :idclub="$club->id_club"/>

@endsection