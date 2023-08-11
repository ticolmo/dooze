@extends('layouts.club')

@section('content')


<div class="commentaireunique">
    @if ($commentaire->post_type == "App\Models\Reponseclub" || $commentaire->post_type == "App\Models\Reponsevisiteur")

    @endif
    <div class="entete fontsize16"> 
      <a href="{{route('profilpublic', $commentaire->post->user->id)}}">{{$commentaire->post->user->name}}</a> - 
      <span class="timecomment">{{$commentaire->post->created_at->diffForHumans(null,[ 'short' => true])}}</span> 
    </div>
    {{-- texte --}}
    <div >{{$commentaire->post->contenu}} </div>
    {{-- media --}}
    @if ($commentaire->post->fichier_media != null && Storage::disk('public')->exists("users/{$commentaire->post->user_id}/{$commentaire->post->fichier_media}") )            
        @php
        $fileExtension = pathinfo($commentaire->post->fichier_media, PATHINFO_EXTENSION);
        @endphp
        
        @if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
          {{-- le fichier est une image --}}
          <div style="text-align:center;"><img  style="width:450px; height:auto" src='{{ Storage::url("users/{$commentaire->post->user_id}/{$commentaire->post->fichier_media}") }}' alt="">
          </div>
        @elseif(in_array($fileExtension, ['mp4', 'avi', 'mov']))
          {{-- le fichier est une vidéo --}}   
          <div style="text-align:center;"> <video style="width:450px; height:auto" src='{{ Storage::url("users/{$commentaire->post->user_id}/{$commentaire->post->fichier_media}") }}'></video>
            </div>         
        @endif
    
        
      @endif 
      
    <div class="interaction">
      <span class="commentaires" data-id="{{$commentaire->post->id}}"> 
        @if ($commentaire->post->reponse_count == 1)
         {{$commentaire->post->reponse_count}} commentaire
         @elseif ($commentaire->post->reponse_count > 1)
         {{$commentaire->post->reponse_count}} commentaires                     
         @endif </span>
     
      @auth 
        @if (auth()->user()->club_id == $commentaire->post->club->club_id) 
          <span class="commentaires" data-id="{{$commentaire->post->id}}">Commenter</span> 
        @endif 
      @endauth 
    </div>
  </div>
<div >       
          
      <div>
        @if ($commentaire->post_type == "App\Models\Commentaireclub" || $commentaire->post_type == "App\Models\Commentairevisiteur")
            {{-- affichage des réponses aux commentaires des fans du club --}}
            @foreach ($commentaire->post->reponse as $reponse)
              <div class="commentaireuniquereponse">
                <div id="{{$reponse->id}}" class="entete fontsize16"> 
                <a href="{{route('profilpublic', $reponse->user->id)}}">{{$reponse->user->name}}</a> - {{$reponse->created_at->diffForHumans(null,[ 'short' => true])}} </div>
                <div>{{$reponse->contenu}}</div>
              </div>
                                        
            @endforeach
        @endif
            
      </div>
  </div>

@endsection
