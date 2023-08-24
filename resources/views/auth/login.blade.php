@extends('layouts.home')

@section('content')

    <main id="connect2" class="form-signin w-50 m-auto">

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
      
      <!-- AUTHENTIFICATION -->
      <form action="{{route('login')}}" method="post">
        @csrf
        <h1 class="h3 mb-3 fw-normal m-auto">Connexion</h1>

        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" placeholder="Email" name="email">
          <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
          <label for="floatingPassword">Password</label>
        </div>
        <div class="checkbox mb-3">
          <input type="checkbox" name="remember">
          <label for="remember" id="remember">
             Remember me
          </label>
        </div>

        
        <button class="w-100 btn btn-lg btn-primary" style="margin-bottom: 16px" type="submit">Connexion</button>
        <div> <a href="{{route('forgot-password')}}">Mot de passe oublié ?</a></div>

      </form>
    </main>
  </div>
</div>

@endsection