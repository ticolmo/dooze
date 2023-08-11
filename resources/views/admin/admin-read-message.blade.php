@extends('admin.layouts.admin')

@section('content')

    <div>
        <a href="{{route('admin.index')}}">Accueil</a> / <a href="{{route('admin.mailbox')}}">Messagerie</a> /
        @if ($message->deleted_at != null)
        <a href="{{route('admin.corbeillemail')}}">Corbeille</a> / Message supprimé            
        @else                 
            @if ($message->destinataire_id == 12)
                Boite de réception
            @elseif($message->expediteur_id == 12)
                Messages envoyés
            @endif 
        @endif
    </div>
    
    <br>

    
    <br>
    <div> De:<a href="{{route('profilpublic', $message->expediteur->id)}}"> {{$message->expediteur->name}} </a> <span> {{date_format($message->created_at,'d M Y H:i:s')}}</span> </div>
    <div> Nom: {{$message->expFormContact_name}} </div>
    <div> Email: {{$message->expFormContact_email}}</div>
    <div> Objet :{{$message->objet}} </div>
    <br>
    <div> {{$message->contenu}}</div>
    <br>

    
    @if ($message->deleted_at != null)
    {{-- le message vient de la corbeille --}}
        

        <form id="boitereception" action="{{route('admin.forcedeletemail')}}" method="POST">
            @csrf
            <a class="btn btn-primary" href="{{route('admin.restoredeletedmail', "$message->id")}}">Restaurer le message</a>
            <input type="hidden" name="{{$message->id}}" value="{{now();}}">
            <button type="submit" class="btn btn-outline-danger"  >Supprimer définitvement le commentaire</button>
        </form>
    @else
    {{-- le message ne vient pas de la corbeille --}}
        <form id="boitereception" action="{{route('admin.deletemail')}}" method="POST">
            @csrf
            <input type="hidden" name="{{$message->id}}" value="{{now();}}">
            <button type="submit" class="btn btn-outline-danger">Supprimer le commentaire</button>
        </form>
    @endif

      




  
    
@endsection