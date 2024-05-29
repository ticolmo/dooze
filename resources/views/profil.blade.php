@extends('layouts.app')


@section('title')
{{$fan->name }}
@endsection


@section('content')

<div id="club">

    <div id="vue">
        <x-profil.data 
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
    <x-profil.commentaires :id="$fan->id"/>
  </div>

  <div id="bulletin">
    @persist('bulletin')
    <livewire:partials.navbar />
    <hr>
    
    @endpersist
  </div>


</div>


@endsection