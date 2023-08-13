@extends('layouts.club')


@section('title')
{{$club->nom }}
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


  
<div class="infot">

    {{-- composant tableau des scores --}}
 <x-tableau :apiscores="$club->api_scores" />




</div>


<audio id="chant" src="{{Storage::url('audio/'.$club->nom.' Audio.mp3')}}" autoplay controls></audio>



<div class="tribune">
  <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button 
      {{-- Session flash 'post' active lorsque commentaire est posté --}}
      @if ((session()->has('post'))) 
      class="nav-link"  
      @else
      class="nav-link active"
      @endif
      id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"><i class="bi bi-bell"></i> {{ __('News') }}</button>
    </li>
    <li class="nav-item" role="presentation">
      <button 
      @if ((session()->has('post'))) 
      class="nav-link active"  
      @else
      class="nav-link"
      @endif
      id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button"
        role="tab" aria-controls="profile-tab-pane" aria-selected="false"><i class="bi bi-fire"></i> {{ __('Fans') }}</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#lives" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Live</button>
    </li>
  
  


  </ul>

  <div class="tab-content" id="myTabContent">    
    @if ((session()->has('post'))) 
    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
    @else
    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
    @endif

      <!-- SECTION ACTU -->
      <div class="actublog">
        
        {{-- composant des flux rss d'actualité --}}        
        <x-actu :flux="$club->flux_rss_blogs" :nom="$club->nom"/>

      </div>

    </div>
    <!-- SECTION FANS -->
    @if ((session()->has('post'))) 
    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
    @else
    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
      @endif
    
      {{-- composant du mur des commentaires --}}
      <x-commentaires :idclub="$club->id_club" />
       
    </div>

    <!-- SECTION LIVES -->
    <div class="tab-pane fade" id="lives" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
      
      {{-- composant des lives --}}       
      <x-lives :idclub="$club->id_club" />
    </div>
  
  </div>


</div>

@endsection