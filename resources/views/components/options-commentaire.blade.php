{{-- Ces liens ouvrent les modals dans le fichier modals.options-commentaires --}}

<div class="fonctions alter{{$commentaire->publication->id_publication}}" style="display:none">
  
  @auth    
    {{-- si l'utilisateur est l'auteur de la publication --}}
    @if ($commentaire->user_id == auth()->user()->id)
      <div data-bs-toggle="modal" data-bs-target="#staticBackdrop1{{$commentaire->publication->id_publication}}">
        <span >Modifier le commentaire</span> 
      </div>
      <div data-bs-toggle="modal" data-bs-target="#staticBackdrop2{{$commentaire->publication->id_publication}}">
        <span>Supprimer le commentaire </span> 
      </div>
    @endif

      <div data-bs-toggle="modal" data-bs-target="#staticBackdrop3{{$commentaire->publication->id_publication}}"> 
        <span> Signaler le commentaire</span> 
      </div>
  @endauth

    
</div>