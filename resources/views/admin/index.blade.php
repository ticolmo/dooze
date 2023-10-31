@extends('admin.layouts.admin')

@section('content')
<div id="modificationprofil"> <a href="{{route('modificationprofil')}}" class="btn btn-outline-secondary btn-sm">Modifier mes données</a></div>
<div id="salut"> Salut {{$admin->name}} </div>
<div style="margin-top:10px;text-align:center"> Dernière connexion: {{ date('d M Y H:i:s', strtotime("$admin->derniere_connexion")) }}</div>
<div id="taches"> 
    <a href="{{route('admin.comments')}}">Commentaires</a>
    <a href="{{route('admin.mailbox')}}">Messagerie Dooze</a>
    <a href="{{route('admin.email')}}"> Envoi d'email</a>
    
</div>
    
@endsection