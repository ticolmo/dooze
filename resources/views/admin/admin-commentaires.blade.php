@extends('admin.layouts.admin')

@section('content')
<div style="text-align:center">
  <a href="{{route('admin.index')}}">Accueil</a> /
  <a href="{{route('admin.mailbox')}}">Messagerie</a> 
</div>


<div style="text-align:center; font-size:20px"> Gestion des commentaires</div>
<br>
@if ((session()->has('commentairesupprime')))
    <div class="alert alert-success w-50 m-auto text-center"> {{session()->get('commentairesupprime')}} </div> <br>
@elseif ((session()->has('forcedelete')))
    <div class="alert alert-success w-50 m-auto text-center"> {{session()->get('forcedelete')}} </div> <br>
@elseif ((session()->has('restore')))
    <div class="alert alert-success w-50 m-auto text-center"> {{session()->get('restore')}} </div> <br>
@endif


<ul class="nav nav-pills mb-5" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Vérification</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Signalement</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Corbeille (commentaires supprimés)</button>
    </li>
  </ul>
  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
      {{-- composant vérification des commentaires --}}
      <x-admin.verif-comments />
    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
      {{-- composant signalement des commentaires --}}
      <x-admin.signal-comments />
    </div>
    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
      {{-- composant corbeille des messages supprimés --}}
      <x-admin.corbeille-comments />
    </div>
    
  </div>
  
    
@endsection