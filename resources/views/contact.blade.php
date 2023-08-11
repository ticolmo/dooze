@extends('layouts.home')

@section('content')


<div class="contacteznous"> 
<div style="text-align: center; font-size:18px; margin:20px"> Contactez-nous</div>
  @if ((session()->has('messagesent')))
      <div class="alert alert-success w-50 m-auto text-center"> Merci beaucoup pour votre message ! Nous vous répondrons dans les meilleurs délais.</div> <br>
  @endif
  <form action="{{route('submitcontact')}}" method="post" class="formcontact">
    @csrf
      {{-- Email --}}
      <div class="form-floating @error('email') is-invalid @enderror">
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" name="email" value="{{ old('email') }}">
        <label for="floatingInput">Votre adresse email </label>
        @error('email')
          <div class="invalid-feedback"> {{$message}} </div>
        @enderror
      </div>
      <br>

      {{-- Prénom --}}
      <div class="form-floating @error('prenom') is-invalid @enderror ">
        <input type="text" class="form-control @error('prenom')is-invalid @enderror" id="floatingInput" placeholder="prenom" name="prenom" value="{{ old('prenom') }}">
        <label for="floatingInput"> Prénom (facultatif)</label>
         @error('prenom')
          <div class="invalid-feedback"> {{$message}} </div>
        @enderror
      </div>
      {{-- Nom --}}
      <div class="form-floating @error('nom') is-invalid @enderror ">
        <input type="text" class="form-control @error('name')is-invalid @enderror" id="floatingInput" placeholder="nom" name="nom" value="{{ old('nom') }}">
        <label for="floatingInput"> Nom </label>
         @error('nom')
          <div class="invalid-feedback"> {{$message}} </div>
        @enderror
      </div>
      <br>
      {{-- Objet --}}
        <div class="form-floating @error('objet') is-invalid @enderror ">
          <input type="text" class="form-control @error('objet')is-invalid @enderror" id="floatingInput" placeholder="objet" name="objet" value="{{ old('objet') }}">
          <label for="floatingInput">Objet </label>
          @error('objet')
            <div class="invalid-feedback"> {{$message}} </div>
          @enderror
      </div>
      <br>
      {{-- Message --}}
      <div class="form-floating @error('contenu') is-invalid @enderror ">
          <textarea class="form-control @error('contenu')is-invalid @enderror" id="floatingTextarea2" placeholder="contenu" name="contenu" value="{{ old('contenu') }}" style="height: 150px"></textarea>
          <label for="floatingTextarea2">Votre message </label>
          @error('contenu')
            <div class="invalid-feedback"> {{$message}} </div>
          @enderror
      </div>

      <button class="w-100 btn btn-lg btn-primary" type="submit">Envoyer</button>
  </form>

</div>
</div>
</div>


@endsection