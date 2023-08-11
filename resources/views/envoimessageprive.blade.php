@extends('layouts.home')

@section('content')

<main id="messagerie" class="form-signin m-auto">



    <div><a href="{{route('profilpublic', $destinataire->id)}}">Retour au profil</a> </div>
    
    <br>
    @if ((session()->has('messagesent')))
    <div class="alert alert-success w-50 m-auto text-center"> Message envoyé</div>
    @endif
    <form action="{{route('submitmessageprive', $destinataire->id)}}" class="mail"method="post">
        @csrf
        <div style="margin-bottom:10px">Message privé à <span> {{$destinataire->name}}</span> </div>
        <div class="form-floating @error('objet') is-invalid @enderror ">
            <input type="text" class="form-control @error('objet')is-invalid @enderror" id="floatingInput" placeholder="objet" name="objet" value="{{ old('objet') }}">
            <label for="floatingInput">Objet</label>
             @error('objet')
              <div class="invalid-feedback"> {{$message}} </div>
            @enderror
        </div>
        <br>
        <div class="form-floating @error('contenu') is-invalid @enderror ">
            <textarea class="form-control @error('contenu')is-invalid @enderror" id="floatingTextarea2" placeholder="contenu" name="contenu" value="{{ old('contenu') }}" style="height: 150px"></textarea>
            <label for="floatingTextarea2">Votre message</label>
             @error('contenu')
              <div class="invalid-feedback"> {{$message}} </div>
            @enderror
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Envoyer</button>


    </form>
    

    {{-- <div> {{$message->objet}} </div>
    <br>
    <div> <a href="{{route('profilpublic', $message->expediteur->id)}}"> {{$message->expediteur->name}} </a> <span> {{date_format($message->created_at,'d M Y H:i:s')}}</span> </div>

    <div> {{$message->contenu}}</div> --}}

      
    
    
    



</main>
</div>
</div>




@endsection