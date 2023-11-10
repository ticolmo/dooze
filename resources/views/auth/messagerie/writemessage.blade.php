@extends('layouts.home')

@section('content')

<main id="" class="form-signin m-auto">



    <div><a href="{{route('profil')}}">Profil</a> / <a href="{{route('messagerie')}}">Messagerie</a> </div>
    
    <br>

    

    <div> {{$message->objet}} </div>
    <br>
    <div> <a href="{{route('profilpublic', $message->expediteur->id)}}"> {{$message->expediteur->name}} </a> <span> {{date_format($message->created_at,'d M Y H:i:s')}}</span> </div>

    <div> {{$message->contenu}}</div>

      
    
    
    



</main>





@endsection