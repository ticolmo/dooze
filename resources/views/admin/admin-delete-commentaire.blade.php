@extends('admin.layouts.admin')

@section('content')
<div style="text-align:center; margin-bottom:30px">
  <a href="{{route('admin.index')}}">Accueil</a> /
  <a href="{{route('admin.comments')}}">Gestion des commentaires</a> 
</div>


<div style="text-align:center"> Suppression du commentaire</div>

<form id="suppression" action="{{route('admin.comment.delete')}}" method="POST">
  @csrf

  <div style="text-align:center; margin-top:15px; margin-bottom:15px"> {{$publication->post->contenu}} </div>
  <div class="form-floating @error('motif') is-invalid @enderror ">
    <input type="text" class="form-control @error('motif')is-invalid @enderror" id="floatingInput" placeholder="motif" name="motif" value="{{ old('motif') }}">
    <label for="floatingInput">Motif</label>
    @error('motif')
      <div class="invalid-feedback"> {{$message}} </div>
    @enderror
  </div>
  <br>
  <br>
  
  <div> Message à l'auteur du commentaire pour l'informer de la suppression</div>
  
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
    <label for="floatingTextarea2">Message </label>
    @error('contenu')
      <div class="invalid-feedback"> {{$message}} </div>
    @enderror
</div>
<br>

<input type="hidden" name="idpub" value="{{$publication->id_publication}}">
<div> Le commentaire ne sera plus visible sur le site. Il sera placé dans le dossier des commentaires supprimés (corbeille).</div>
<br>
<div class="text-center">
  <button class="btn btn-primary btn-sm" type="submit">Lancer la suppression</button>
</div>
</form>
  
    
@endsection