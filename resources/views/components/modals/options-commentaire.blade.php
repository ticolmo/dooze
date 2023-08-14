@auth                    
    {{-- modals de Bootstrap --}}
    {{-- modal modification de publication --}}
        <div class="modal fade" id="staticBackdrop1{{$commentaire->publication->id_publication}}"
        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modification de la publication</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{route('post.update')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                    <input type="text" id="floatingInput" class="example3 form-control" name="contenu"
                        value="{{$commentaire->contenu}}">
                    <input type="hidden" name="id" value="{{$commentaire->publication->id_publication}}">
                    <input type="hidden" name="idcom" value="{{$commentaire->id}}">
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>

                    <button type="submit" id="emoji-button" class="btn btn-primary">Modifier</button>

                    </div>
                </form>
                </div>
            </div>
        </div>

    {{-- modal de suppression de la publication --}}
    <div class="modal fade" id="staticBackdrop2{{$commentaire->publication->id_publication}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Suppression de la publication</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('post.delete')}}" method="POST"> 
              @csrf
                <div class="modal-body">
                  <div> Etes-vous sûr de vouloir supprimer cette publication ? Après cette opération, votre message sera définivement supprimé de votre profil, de l'ensemble du site internet et de la base données de Dooze. Il ne sera plus possible de la récupérer.</div>
                  <hr>
                  <div> {{$commentaire->contenu}}</div>
                </div>
                <input type="hidden" name="id" value="{{$commentaire->publication->id_publication}}">
                <input type="hidden" name="idcom" value="{{$commentaire->id}}">
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                  <button type="submit" class="btn btn-danger">Confirmer la suppression</button>
                </div>
              </form>
          </div>
        </div>
      </div>
    {{-- modal de signalement de publication --}}
        <div class="modal fade" id="staticBackdrop3{{$commentaire->publication->id_publication}}"
        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
        aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Signalement de la publication</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{route('post.signal')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                    <div>{{$commentaire->contenu}} </div>                  
                    <input type="hidden" name="id" value="{{$commentaire->publication->id_publication}}">
                    <input type="hidden" name="iduser" value="{{auth()->user()->id}}">
                    <div>La raison du signalement *:</div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif 
                    <textarea name="motif" id="" style="width:100%!important" rows="5"></textarea>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>

                    <button type="submit" id="emoji-button" class="btn btn-primary">Signaler</button>

                    </div>
                </form>
                </div>
            </div>
        </div>
@endauth