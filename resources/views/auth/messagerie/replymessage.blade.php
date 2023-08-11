@extends('layouts.home')

@section('content')

<main id="" class="form-signin m-auto">



    <div><a href="{{route('profil')}}">Profil</a> / <a href="{{route('messagerie')}}">Messagerie</a> /        
        @if ($reponse->destinataire_id == auth()->user()->id)
            Boite de réception
        @elseif($reponse->expediteur_id == auth()->user()->id)
            Messages envoyés
        @endif
        
    </div>
    
    <br>
    @if ((session()->has('messagesent')))
    <div class="alert alert-success w-50 m-auto text-center"> Message envoyé</div>

    <div><a href="{{route('messagerie')}}"> Retour à la messagerie</a> </div>
    @else
    <form action="{{route('submitmessageprive', $reponse->expediteur->id)}}" method="post">
        @csrf
        <div>Répondre à <span> {{$reponse->expediteur->name}}</span> </div>
        <div class="form-floating @error('objet') is-invalid @enderror ">
            <input type="text" class="form-control @error('objet')is-invalid @enderror" id="floatingInput" placeholder="objet" name="objet" value="{{ old('objet')}} RE: {{$reponse->objet}}">
            <label for="floatingInput">Objet</label>
             @error('objet')
              <div class="invalid-feedback"> {{$message}} </div>
            @enderror
        </div>
        <br>
        <div class="form-floating @error('contenu') is-invalid @enderror ">
            <textarea class="form-control @error('contenu')is-invalid @enderror" id="floatingTextarea2" placeholder="contenu" name="contenu" value="{{ old('contenu') }}" style="height: 150px"> 
                
            ------------Réponse à 
            {{$reponse->expediteur->name}}
            {{$reponse->created_at}}
            {{$reponse->contenu }}
            </textarea>
            <label for="floatingTextarea2">Votre réponse</label>
             @error('contenu')
              <div class="invalid-feedback"> {{$message}} </div>
            @enderror
        </div>

        <input type="hidden" name="refmessage" value="{{$reponse->id}}">
        

        <button class="w-100 btn btn-lg btn-primary" type="submit">Envoyer</button>


    </form>
    @endif

    {{-- <div> {{$message->objet}} </div>
    <br>
    <div> <a href="{{route('profilpublic', $message->expediteur->id)}}"> {{$message->expediteur->name}} </a> <span> {{date_format($message->created_at,'d M Y H:i:s')}}</span> </div>

    <div> {{$message->contenu}}</div> --}}

      
    
    
    



</main>
</div>
</div>




@endsection