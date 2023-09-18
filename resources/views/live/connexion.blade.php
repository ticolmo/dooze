@extends('layouts.live')

@section('content')

<div class="w-50 m-auto text-center"> Rejoindre au live</div>


<div style="padding:100px">

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

  

  <form action="{{route('live.login')}}" method="post">
    @csrf
      
    {{-- MOT DE PASSE --}}
    <div class="form-floating @error('password') is-invalid @enderror">
      <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword"
        placeholder="Password" name="password">
     
      <label for="floatingPassword">Mot de passe</label>
      @error('password')
      <div class="invalid-feedback"> {{$message}} </div>
      @enderror
    </div>

    <div class="form-floating @error('idlive') is-invalid @enderror">      
      <input type="hidden" name="idlive" value="{{$live->id}}" class="form-control @error('idlive') is-invalid @enderror">     
      @error('idlive')
      <div class="invalid-feedback"> {{$message}} </div>
      @enderror
    </div>
    <br>

    <button class="w-20 btn btn-lg btn-primary" type="submit">Rejoindre</button>
  </form>



</div>

@endsection