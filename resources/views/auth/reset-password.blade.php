@extends('layouts.home')

@section('content')

  <main id="connect2" class="form-signin w-50 m-auto">

    {{-- RESET MOT DE PASSE OUBLIE --}}
    @if ((session()->has('status')))
            <div class="alert alert-success"> {{session()->get('status')}} </div>
    @endif

    <form action="{{route('reset-password')}}" method="post">
      @csrf
      <h1 class="h3 mb-3 fw-normal m-auto">Dooze</h1>

      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" placeholder="Email" name="email">
        <label for="floatingInput">Email</label>
      </div> 

      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
        <label for="floatingPassword">Nouveau mot de passe</label>
      </div>

      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password_confirmation">
        <label for="floatingPassword">Confirmer le mot de passe</label>
      </div>

      <input type="hidden" name="token" value="{{request()->route('token')}}">
  

      {{-- MESSAGE D'ERREUR --}}
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif
      <button class="w-100 btn btn-lg btn-primary" type="submit">Valider</button>
      

    </form>
  </main>


@endsection