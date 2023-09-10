@extends('layouts.live')

@section('content')

<div class="w-50 m-auto text-center"> Rejoindre au live</div>

<form action="{{-- {{route('live.connexion')}} --}}" class="form-signin w-50 m-auto" method="post"> 
  @csrf
<div>
  @if (!empty($live->image))
     <img src="" alt=""> 
  @endif
  <div>
    {{$live->name}}
    
  </div>
  <div>
    Créé {{ $live->created_at}}
    Par {{ $live->user->name}} 
  </div>

  <div>
    {{$live->desription}}
  </div>
  <br>

  <form action="{{route('live.signin')}}" method="post">
    {{-- MOT DE PASSE --}}
      <div class="form-floating @error('password') is-invalid @enderror">
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password">
        <input type="hidden" name="idlive" value="{{$live->id}}">
        <label for="floatingPassword">Mot de passe</label>
        @error('password')
          <div class="invalid-feedback"> {{$message}} </div>
        @enderror
    </div> 
  </form>

  
  
</div>
</form>
@endsection