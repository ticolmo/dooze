@extends('layouts.home')

@section('content')

@if ((session()->has('new')))
 <div class="alert alert-success w-50 m-auto text-center"> {{session()->get('new')}}  </div> <br>
@endif    

<main id="profil" class="form-signin m-auto">


  <div id="donnees"> 


    <div class="h3 m-auto"> {{__('Hi')}} {{ $fan->name }},</div>
    <br>
    <a href="{{route('profilpublic', "$fan->id")}}" class="btn btn-outline-secondary btn-sm">{{__('My public profile')}} <i class="bi bi-person-badge"></i></a>
    <br>
    <br>
    
      <a href="{{route('messagerie')}}"type="button"   class="btn btn-outline-secondary btn-sm position-relative">{{__('Mailbox')}} <i class="bi bi-envelope"></i> 
      @if ($newmessage > 0)
      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
        {{$newmessage}}+    
      </span>    
      @endif
      </a>  
    <br>  
    <br>  
    <a href="{{route('modificationprofil')}}" class="btn btn-outline-secondary btn-sm">{{__('Manage my data')}} <i class="bi bi-file-earmark-medical"></i></a>
 

    
    

  </div>
  <div id="profilclub">
    <div > <img id="logo" src="{{Storage::url('logos/'.$fan->club->nom.'.png')}}" alt=""></div>
    <div class="h3 m-3">{{ $fan->club->nom}}</div>
    <div id="linkclub" style="border-radius:10px;border:2px solid {{$fan->club->couleur_survol}}"> 
      <div> <a href="http://dooze.test:8089/{{ $fan->club->url}}">{{__('Go to page')}}<i
            class="bi bi-arrow-right-short"></i></a> </div>
      <div> <a href="{{ $fan->club->site_officiel}}" target="_blank">{{__('Official website')}} <i class="bi bi-arrow-right-short"></i></a> </div>
      
    </div>
  </div>



  <div id="profilactu">Bientôt ici aussi l'actualité de ton club</div>



</main>





@endsection