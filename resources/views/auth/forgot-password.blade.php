@extends('layouts.home')

@section('content')

    <main id="connect2" class="form-signin w-50 m-auto">

      {{-- DEMANDE DE LIEN POUR MOT DE PASSE OUBLIE --}}
      @if ((session()->has('status')))
             <div class="alert alert-success"> {{session()->get('status')}} </div>
      @endif

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
      
      <form action="{{route('forgot-password')}}" method="post">
        @csrf
        <h1 class="h3 mb-3 fw-normal m-auto">Dooze</h1>

        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" placeholder="Email" name="email">
          <label for="floatingInput">Email</label>
        </div> 
    

        
        <button class="w-100 btn btn-lg btn-primary" type="submit">Connexion</button>
        

      </form>
    </main>


@endsection