@extends('layouts.home')

@section('content')

<main id="messagerie" class="form-signin m-auto">



    <div><a href="{{route('profil')}}">Profil</a> / <a href="{{route('messagerie')}}">Messagerie</a> /
        @if ($message->deleted_at != null)
        <a href="{{route('corbeillemessagerie')}}">Corbeille</a> / Message supprimé            
        @else
            @if ($message->destinataire_id == auth()->user()->id)
                Boite de réception
            @elseif($message->expediteur_id == auth()->user()->id)
                Messages envoyés
            @endif
        @endif
    </div>
    
    <br>

    
    <br>
    <div class="mail"> 
        <div> De:<a href="{{route('profilpublic', $message->expediteur->id)}}"> {{$message->expediteur->name}} </a> 
            @if($message->expediteur_id == auth()->user()->id)
            Envoyé à <a href="{{route('profilpublic', $message->destinataire->id)}}">  {{$message->destinataire->name}}</a>
            @endif
            <span> {{date_format($message->created_at,'d M Y H:i:s')}}</span> </div>
        <div> Objet :{{$message->objet}} </div>
        <div class="mailcontenu"> {{$message->contenu}}</div>
    
        {{-- si message dans la corbeille --}}
        @if ($message->deleted_at != null)        

            <form id="boitereception" action="{{route('forcedeletemessage')}}" method="POST">
                @csrf
                <a class="btn btn-primary" href="{{route('restoredeletedmessage', "$message->id")}}">Restaurer le message</a>
                <input type="hidden" name="{{$message->id}}" value="{{now();}}">
                <button type="submit" class="btn btn-outline-danger" >Supprimer définitvement le commentaire</button>
            </form>
            
        {{-- sinon c'est un message pas supprimé --}}
        @else        

            <form id="" action="{{route('deletemessage')}}" method="POST">
                @csrf
                <a class="btn btn-primary" href="{{route('replymessage', "$message->id")}}">Répondre</a>
                <input type="hidden" name="{{$message->id}}" value="{{now();}}">
                <button type="submit" class="btn btn-outline-danger">Supprimer le commentaire</button>
            </form>
        @endif

    </div>
    
    



</main>
</div>
</div>




@endsection