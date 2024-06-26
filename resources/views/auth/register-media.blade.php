@extends('layouts.home')

@section('content')

<div>
    L'ouverture du compte est vérifié. La vérification dure 1 à 2 jours ouvrables.
</div>

<form action="{{route('register')}}" method="post" class="needs-validation" >
    @csrf
    <h1 class="h3 mb-3 fw-normal">Création de ton compte</h1> 

    @if ($errors->any())
        <div class="alert alert-danger">
          Veuillez compléter le(s) champ(s) manquant(s)
        </div>
    @endif
    
    {{-- CATEGORIE --}}
    <input type="hidden" value="fan" name="categorie"> 

    {{-- NOM DU MEDIA --}}
    <div class="form-floating @error('name') is-invalid @enderror ">
      <input type="text" class="form-control @error('name')is-invalid @enderror" id="floatingInput" placeholder="prenom" name="name" value="{{ old('name') }}">
      <label for="floatingInput">Nom</label>
       @error('name')
        <div class="invalid-feedback"> {{$message}} </div>
      @enderror
    </div>  

    {{-- SITE INTERNET --}}
    <div class="form-floating @error('name') is-invalid @enderror ">
      <input type="text" class="form-control @error('name')is-invalid @enderror" id="floatingInput" placeholder="prenom" name="site_internet" value="{{ old('site_internet') }}">
      <label for="floatingInput">Site internet</label>
       @error('name')
        <div class="invalid-feedback"> {{$message}} </div>
      @enderror
    </div>  


    {{-- CLUB --}}
    <div> Vous avez un club préférez ? </div>
    <div class="form-floating @error('langue_id') is-invalid @enderror">
        <select class="form-select @error('langue_id') is-invalid @enderror" id="floatingSelect" aria-label="Floating label select example" name="club" value="{{ old('id_club') }}">
            <option selected disabled>Club</option>
            @foreach ($clubs as $club)
            <option value="{{$club->id_club}}">{{$club->nom}}</option>   
            @endforeach          
            
        </select>
        <label for="floatingSelect">Sélectionnez votre club</label>
        @error('langue_id')
            <div class="invalid-feedback"> {{$message}} </div>
        @enderror
        </div>

    {{-- LANGUE --}}
    <div class="form-floating @error('langue_id') is-invalid @enderror">
      <select class="form-select @error('langue_id') is-invalid @enderror" id="floatingSelect" aria-label="Floating label select example" name="langue_id" value="{{ old('langue_id') }}">
        <option selected disabled>{{ old('langue_id') ?? "Langue"}}</option>
        @foreach ($langues as $langue)
         <option value="{{$langue->id_langue}}">{{$langue->intitule}}</option>   
        @endforeach          
        
      </select>
      <label for="floatingSelect">Sélectionnez votre langue</label>
      @error('langue_id')
        <div class="invalid-feedback"> {{$message}} </div>
      @enderror
    </div>

    {{-- PAYS DE DOMICILE --}}
    <div class="form-floating @error('pays') is-invalid @enderror">
      <select class="form-select @error('pays') is-invalid @enderror" id="floatingSelect" aria-label="Floating label select example" name="pays" value="{{ old('pays') }}">
        <option selected disabled>{{ old('pays') ?? "Pays"}}</option>
        @foreach ($listepays as $pays)
            <option value="{{$pays['name']}}"> {{$pays['name']}} </option>
        @endforeach
      </select>
      <label for="floatingSelect">Sélectionnez votre pays de domicile</label>
      @error('pays')
        <div class="invalid-feedback"> {{$message}} </div>
      @enderror
    </div>

    {{-- EMAIL --}}
    <div class="form-floating @error('email') is-invalid @enderror">
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" name="email" value="{{ old('email') }}">
        <label for="floatingInput">Ton adresse email</label>
        @error('email')
            <div class="invalid-feedback"> {{$message}} </div>
        @enderror
        </div>
        {{-- MOT DE PASSE --}}
        <div> Choisis un mot de passe avec au moins une majuscule, un chiffre et un caractère spécial.</div>
        <div class="form-floating @error('password') is-invalid @enderror">
        <input :type="password ? 'text' : 'password'" wire:model.live.debounce.800ms="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password">
        <label for="floatingPassword">Mot de passe</label>
        @error('password')
            <div class="invalid-feedback"> {{$message}} </div>
        @enderror
        <div @click="password = ! password"> 
            <span x-show="!password"> Afficher</span>  
            <span x-show="password"> Masquer</span>                
            le mot de passe</div>
        </div>
    
        <div class="form-floating @error('password_confirmation') is-invalid @enderror">
        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password_confirmation">
        <label for="floatingPassword">Confirme le mot de passe</label>
        @error('password_confirmation')
            <div class="invalid-feedback"> {{$message}} </div>
        @enderror
        </div>
   

    {{-- CONDITIONS GENERALES --}}
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
      <label class="form-check-label" for="flexCheckDefault"> J'accepte les <a href="">Conditions générales de Dooze</a> </label>
    </div> 

      
      <button class="w-100 btn btn-lg btn-primary" type="submit">Valider</button>

  </form>

@endsection