@extends('layouts.home')

@section('content')
<div>
    Vous êtes un media, une organisation active dans le monde du football. N'hésitez pas à ouvrir un compte
</div>
<div> Votre compte vous permettra de créer des posts visibles dans votre profil et la section "media" des pages des clubs. Vous pourrez choisir les pages de clubs dans lesquelles vos posts seront visibles.  </div>
<a href="{{route('register.media')}}" wire:navigate class="btn btn-primary" role="button" data-bs-toggle="button">Suivant</a>


@endsection