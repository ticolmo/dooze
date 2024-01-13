<div>
    @forelse ($commentaires as $commentaire)
     
      <div class="comments profilpublic" >
        <a href="{{route('commentaire.pleinepage', $commentaire->id)}}">
          <div> {{$commentaire->contenu}}</div>
          <div> page: {{$commentaire->club->nom}}</div>
          <div> {{$commentaire->created_at->diffForHumans(null,[         
              'short' => true,            
              ],)}} 
          </div>
          {{-- media --}}                
          @if ($commentaire->fichier_media != null && Storage::disk('public')->exists("users/{$commentaire->user_id}/{$commentaire->fichier_media}"))            
            @php
            $fileExtension = pathinfo($commentaire->fichier_media , PATHINFO_EXTENSION);
            @endphp
          
            @if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
              {{-- le fichier est une image --}}
              <div style="text-align:center; margin:20px"><img  style="width:300px; height:auto" src='{{ Storage::url("users/{$commentaire->user_id}/{$commentaire->fichier_media}") }}' alt="">
              </div>
            @elseif(in_array($fileExtension, ['mp4', 'avi', 'mov']))
              {{-- le fichier est une vidéo --}}       
              <div style="text-align:center;margin:20px"> <video controls style="width:300px; height:auto" src='{{ Storage::url("users/{$commentaire->user_id}/{$commentaire->fichier_media}") }}'></video>
              </div>        
            @endif         
          @endif 

          <div> 
            <livewire:features.tools-commentaire 
                :id="$commentaire->id"
                :reponse="$commentaire->nb_reponse"
                :jaime="$commentaire->nb_jaime" 
                :partage="$commentaire->nb_partage" />
          </div>
        </a>
        @auth
            @if (auth()->user()->id == $fan->id)
            
              <div class="optmodal">                
              <span class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop1{{$commentaire->id}}" >
                {{ __('Edit') }}</span> 
                {{-- Modal - modification de la publication --}}
                <div class="modal fade" id="staticBackdrop1{{$commentaire->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ __('Edit post') }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                     
                      <form action="{{route('post.update')}}" method="POST"> 
                        @csrf
                        <div class="modal-body">
                          <input type="text" id="floatingInput" class="example3 form-control" name="contenu" value="{{old('contenu') ?? $commentaire->contenu}}">  
                          <input type="hidden" name="id" value="{{$commentaire->id}}">
                          <input type="hidden" name="idcom" value="{{$commentaire->id}}">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                          
                          <button type="submit" id="emoji-button" class="btn btn-primary">{{ __('Edit') }}</button>
                          
                        </div>
                      </form>
                    </div>
                  </div>
                </div>


              <span class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop2{{$commentaire->id}}" >
                {{ __('Delete') }}</span> 
                {{-- Modal - message d'avertissement suppression --}}
                <div class="modal fade" id="staticBackdrop2{{$commentaire->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ __('Delete post') }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="{{route('post.delete')}}" method="POST"> 
                        @csrf
                          <div class="modal-body">
                            <div> {{ __('Are you sure you want to delete this post? After this operation, your post will be permanently deleted from your profile, the entire website and the Dooze database. It will no longer be possible to retrieve it.') }}</div>
                            <hr>
                            <div> {{$commentaire->contenu}}</div>
                          </div>
                          <input type="hidden" name="id" value="{{$commentaire->id}}">
                          <input type="hidden" name="idcom" value="{{$commentaire->id}}">
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                            <button type="submit" class="btn btn-danger">{{ __('Confirm deletion') }}</button>
                          </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
            
            @endif
        @endauth
          
        
      </div>
      <br>
        
      @empty
      <div> {{ __('No posts published') }}</div>
     @endforelse
 
</div>
