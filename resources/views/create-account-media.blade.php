@extends('layouts.home')

@section('navbar')
  <livewire:partials.navbar />
@endsection

@section('content')

<div class="w-75 m-auto">
    <h1 class="titre"> Créer un compte <span> Media</span></h1>
    <ul class="avantages">
        <li>Compte gratuit</li>
        <li>Postez des commentaires sur toutes les pages de club avec le sigle media</li>
        <li>Accès gratuitement à l'API Dooze</li>
      </ul>
    <div>
        Vous êtes un media, une organisation active dans le monde du football. N'hésitez pas à ouvrir un compte !
    </div>

    <a href="{{route('register.media')}}" wire:navigate class="btn btn-primary" role="button" data-bs-toggle="button">Suivant</a>

</div>



@endsection