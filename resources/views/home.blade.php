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
{{--  <div id="wg-api-football-games"
     data-host="v3.football.api-sports.io"
     data-key="dd8bf5fada55f6377910ef4ee79f7916"
     data-date="2023-05-03"
     data-league="39"
     data-season="2022"
     data-theme="false"
     data-refresh="15"
     data-show-toolbar="true"
     data-show-errors="false"
     data-show-logos="true"
     data-modal-game="true"
     data-modal-standings="true"
     data-modal-show-logos="false">
</div>  --}}
<br>
{{-- <div id="wg-api-football-standings"
    data-host="v3.football.api-sports.io"
    data-key="dd8bf5fada55f6377910ef4ee79f7916"
    data-league="39"
    data-team=""
    data-season="2022"
    data-theme="false"
    data-show-errors="false"
    data-show-logos="false"
    class="wg_loader">
</div> --}}
{{-- <div id="wg-api-football-game"
    data-host="v3.football.api-sports.io"
    data-key="dd8bf5fada55f6377910ef4ee79f7916"
    data-id="718243"
    data-theme="gray"
    data-refresh="15"
    data-show-errors="false"
    data-show-logos="true">
</div> --}}
<div id="resultats">
  <h1>Résultats</h1>

  <x-scores.scoreshome />
 

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

