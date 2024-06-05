@extends('layouts.home')

@section('navbar')
  <livewire:partials.navbar />
@endsection

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

<div style="text-align: right"> Fuseau horaire: </div>
{{-- <livewire:home.resultats :$timezone/> --}}

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
        <div class="swiper-slide">
          <a href="{{route('club', $club->url)}}">{{$club->nom}}
            <img src="{{Storage::url('logos/'.$club->nom.'')}}.png" alt="{{$club->nom}}">
          </a>
        </div>
        @endforeach
      
      </div>
      <!-- Pagination swiper -->
      <div class="swiper-pagination"></div>

      <!-- If we need navigation buttons -->
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>
</div>

<br><br>






@endsection

