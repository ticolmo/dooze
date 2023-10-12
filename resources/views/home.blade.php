@extends('layouts.home')

@section('content')

@if ((session()->has('deconnexion')))
    <div class="alert alert-success w-50 m-auto text-center"> {{session()->get('deconnexion')}} </div>
@endif
@if ((session()->has('suppressioncompte')))
    <div class="alert alert-success w-50 m-auto text-center"> {{session()->get('suppressioncompte')}} </div>
@endif

@auth
   <div class="text-center"><a href="http://dooze.test:8089/{{ auth()->user()->club->url}}">{{__('Go to page')}} {{ auth()->user()->club->nom }} </a></div> 
@endauth

{{-- Résultats: hier, aujourd'hui, demain --}}

@php    
date_default_timezone_set($timezone);      
$dateyesterday = date("Y-m-d", strtotime("-1 day"));
$datetoday = date("Y-m-d");
$datetomorrow = date("Y-m-d", strtotime("+1 day"));
@endphp
 
<div id="resultats">
  <h4>Résultats</h4>
 <div id="timezone"></div>
 <div>{{ date("G:i")}} </div>
 {{--  <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
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
      <x-scores.scoreshome :choicedate="$dateyesterday" > {{$timezone}} </x-scores.scoreshome>        
    </div>
    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
       <x-scores.scoreshome :choicedate="$datetoday" >{{$timezone}} </x-scores.scoreshome> 
    </div>
    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
      <x-scores.scoreshome :choicedate="$datetomorrow" >{{$timezone}} </x-scores.scoreshome> 
    </div>
  </div> --}}

  
 

</div>


<div class="dropdown">
  <input id="choose1" class="btn btn-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
    aria-expanded="false" placeholder="Choose your club">
  <ul class="dropdown-menu">
    
      @foreach ($listeclub as $club)
      <li> <a class="dropdown-item" href="http://dooze.test:8089/{{$club->url}}">{{$club->nom}} </a></li>
      @endforeach
  </ul>
</div>
<a id="fleche" href="#middleresultats"> <i id="chevron" class="bi bi-chevron-down bounce-top"
    style="font-size: 3rem;"></i></a>


{{-- Choix du club --}}

<div class="essai89"> Choose your club : </div>
<div id="listeclub">
  
    <div class="swiper">
      <div class="swiper-wrapper">
        @foreach ($listeclub as $club)
        <div class="swiper-slide"><a href="http://dooze.test:8089/{{$club->url}}">{{$club->nom}}<img src="{{Storage::url('logos/'.$club->nom.'')}}.png" alt="{{$club->nom}}"></a></div>
        @endforeach
      
      </div>
      <!-- If we need pagination -->
      <div class="swiper-pagination"></div>

      <!-- If we need navigation buttons -->
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>
</div>

<br><br>




</div>
</div>


@endsection

