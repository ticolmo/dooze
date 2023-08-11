@extends('layouts.home')

@section('content')

    <main id="connect2" class="form-signin w-50 m-auto">

      {{-- LIEN DE VERIFICATION D'EMAIL --}}
      @if ((session()->get('status') == 'verification-link-sent'))
             <div class="alert alert-success"> Un nouveau lien de vérification vous a été envoyé par email !</div>
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
      <form action="{{route('verification.send')}}" method="post">
        @csrf
        <h1 class="h3 mb-3 fw-normal m-auto">Dooze</h1>

       <div> Un lien de vérification de votre compte a été envoyé à votre email. Nous vous invitons à cliquer ci-dessous si vous ne l'avez pas reçu.</div>
    

       
        <button class="w-100 btn btn-lg btn-primary" type="submit">Renvoyer un lien</button>
        

      </form>
    </main>
  </div>
</div>

@endsection