@extends('layouts.live')

@section('content')

<div class="w-50 m-auto text-center"> Crée ton live</div>

<form action="{{route('live.config')}}" class="form-signin w-50 m-auto" method="post"> 
  @csrf
{{-- NOM DU LIVE --}}
  <div class="form-floating @error('name') is-invalid @enderror ">
      <input type="text" class="form-control @error('name')is-invalid @enderror" id="floatingInput" placeholder="prenom" name="name" value="{{ old('name') }}">
      <label for="floatingInput">Nom du live</label>
      @error('name')
        <div class="invalid-feedback"> {{$message}} </div>
      @enderror
  </div>  
  {{-- DESCRIPTION --}}
  <div class="form-floating @error('description') is-invalid @enderror ">
    <input type="text" class="form-control @error('description')is-invalid @enderror" id="floatingInput" placeholder="prenom" name="description" value="{{ old('description') }}">
    <label for="floatingInput">Description</label>
    @error('description')
      <div class="invalid-feedback"> {{$message}} </div>
    @enderror
</div>  

  {{-- MOT DE PASSE --}}
  <div class="form-floating @error('password') is-invalid @enderror">
      <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password">
      <label for="floatingPassword">Mot de passe</label>
      @error('password')
        <div class="invalid-feedback"> {{$message}} </div>
      @enderror
  </div> 

  <div class="form-floating @error('password_confirmation') is-invalid @enderror">
      <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password_confirmation">
      <label for="floatingPassword">Confirmez le mot de passe</label>
      @error('password_confirmation')
        <div class="invalid-feedback"> {{$message}} </div>
      @enderror
  </div>

  <div class="form-check">
      <input class="form-check-input" type="radio" name="type" id="flexRadioDefault1" value="video">
      <label class="form-check-label" for="flexRadioDefault1">
        Video + chat
      </label>
  </div>
  <div class="form-check">
      <input class="form-check-input" type="radio" name="type" id="flexRadioDefault2" value="chat">
      <label class="form-check-label" for="flexRadioDefault2">
        Chat uniquement
      </label>
  </div>
    

  {{-- IMAGE --}}
  <input type="file" id="fileInput" name="media">
        <div class="close"><i class="bi bi-x-circle-fill"></i></div>
        <div id="previewContainer"><div id="telechargement"></div> </div>  
          
        
  <label class="image"for="fileInput"><i class="bi bi-image" style="font-size: 20px!important"></i>Ajouter une image d'en-tête</label>
  <br>

  <button class="w-50 btn btn-lg btn-primary" type="submit">Valider</button>
</form>
@endsection