@extends('layouts.home')

@section('content')

    <main id="messagerie">
      <div style="margin-bottom:30px;position:relative;"><a href="{{route('profil')}}" >{{ __('Return to your profile') }}</a>
      @auth
            @if (auth()->user()->id == $fan->id)
            <a href="{{route('completeprofilpublic', auth()->user()->id)}}" style="position: absolute;right:0;"class="btn btn-outline-secondary btn-sm text-end"> {{ __('Complete my public profile') }}</a>
            @endif
      @endauth
      </div>

      
      <div class="presentation"> 
      <div><i class="bi bi-person-circle text-secondary" style="font-size: 4rem"></i></div>
      <div style="font-weight: bolder;"> {{ $fan->name}}</div>
      <div> {{ $fan->hashtag}}</div>
      <div> {{ $fan->categorie}}</div>
      <div> {{ $fan->bio}}</div>
      <div>  <a href="{{ $fan->lien1}}" style="font-weight: bolder;text-decoration:underline;"> <i class="bi bi-link-45deg"></i>{{substr_replace($fan->lien1, '',0,7)}}</a> </div>
      <div> </div>
      <div> Club : {{ $fan->club->nom}}</div>
      
      <br>
      
      @auth
        @if (auth()->user()->id != $fan->id)
        <div style="text-align:right"> <a href="{{route('messageprive', $fan->id)}}" class="btn btn-outline-secondary btn-sm"> {{ __('Send a private message') }}</a></div> 
        @endif
      @endauth
      </div>
    <hr>
    <br>

    @if ((session()->has('update')))
    <div class="alert alert-success w-50 m-auto text-center"> {{ __('Post edited!') }} </div>
    @endif
    @if ((session()->has('delete')))
    <div class="alert alert-success w-50 m-auto text-center"> {{ __('Post deleted!') }} </div>
    @endif
   
     @forelse ($posts as $item)
     
      <div class="comments profilpublic" >
        <a href="{{route('commentaire.pleinepage', $item->id_publication)}}">
          <div> {{$item->post->contenu}}</div>
          <div> page: {{$item->post->club->nom}}</div>
          <div> {{$item->post->created_at->diffForHumans(null,[         
              'short' => true,            
              ],)}} 
          </div>
          {{-- media --}}                
          @if ($item->post->fichier_media != null && Storage::disk('public')->exists("users/{$item->post->user_id}/{$item->post->fichier_media}"))            
            @php
            $fileExtension = pathinfo($item->post->fichier_media , PATHINFO_EXTENSION);
            @endphp
          
            @if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
              {{-- le fichier est une image --}}
              <div style="text-align:center; margin:20px"><img  style="width:300px; height:auto" src='{{ Storage::url("users/{$item->post->user_id}/{$item->post->fichier_media}") }}' alt="">
              </div>
            @elseif(in_array($fileExtension, ['mp4', 'avi', 'mov']))
              {{-- le fichier est une vidéo --}}       
              <div style="text-align:center;margin:20px"> <video controls style="width:300px; height:auto" src='{{ Storage::url("users/{$item->post->user_id}/{$item->post->fichier_media}") }}'></video>
              </div>        
            @endif         
          @endif 

          <div> 
            {{-- le nombre de commentaires --}}
            @if ($item->post->reponse_count == 1)
            {{$item->post->reponse_count}} {{ __('comment') }}
            @elseif ($item->post->reponse_count > 1)
            {{$item->post->reponse_count}} {{ __('comments') }}                    
            @endif 
          </div>
        </a>
        @auth
            @if (auth()->user()->id == $fan->id)
            
              <div class="optmodal">                
              <span class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop1{{$item->id_publication}}" >
                {{ __('Edit') }}</span> 
                {{-- modification de la publication --}}
                <div class="modal fade" id="staticBackdrop1{{$item->id_publication}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ __('Edit post') }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                     
                      <form action="{{route('post.update')}}" method="POST"> 
                        @csrf
                        <div class="modal-body">
                          <input type="text" id="floatingInput" class="example3 form-control" name="contenu" value="{{old('contenu') ?? $item->post->contenu}}">  
                          <input type="hidden" name="id" value="{{$item->id_publication}}">
                          <input type="hidden" name="idcom" value="{{$item->post->id}}">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                          
                          <button type="submit" id="emoji-button" class="btn btn-primary">{{ __('Edit') }}</button>
                          
                        </div>
                      </form>
                    </div>
                  </div>
                </div>


              <span class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop2{{$item->id_publication}}" >
                {{ __('Delete') }}</span> 
                {{-- message d'avertissement suppression --}}
                <div class="modal fade" id="staticBackdrop2{{$item->id_publication}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                            <div> {{$item->post->contenu}}</div>
                          </div>
                          <input type="hidden" name="id" value="{{$item->id_publication}}">
                          <input type="hidden" name="idcom" value="{{$item->post->id}}">
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
 
      
    </main>
  </div>
</div>

@endsection