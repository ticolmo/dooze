{{-- SECTION FAN --}}
<div class="cachesectionv1">
  <div></div>
  <div class="cachesectionv2"> <span class="cachesectionv3">{{ __("hide visitor's section") }}</span> </div>
</div>
<div class="fans" style="min-height:50vh">
  <div class="supporters">

    
      {{-- La possibilité de laisser un COMMENTAIRE seulement pour les fans du club --}}
      <form action="{{route('post.commentaireclub')}}" method="post" enctype='multipart/form-data'>
        @csrf
        <div>
          <input type="text" id="floatingInput" class="example3 form-control" placeholder="Quoi de neuf ?" name="contenu">
        </div>    

        
        <input type="file" id="fileInput" name="media">
        <div class="close"><i class="bi bi-x-circle-fill"></i></div>
        <div id="previewContainer"><div id="telechargement"></div> </div>  
          
        <div class="text-center submit">
          <label class="image"for="fileInput"><i class="bi bi-image" style="font-size: 20px!important"></i></label>
          
          @auth
            @if (auth()->user()->club_id == $idclub)
              <button class="btn btn-outline-secondary" id="emoji-button" type="submit">{{ __('Post') }}</button>
            </div>     
          
            @else
            {{-- si fan autre club --}}
            <div class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#fanautreclub">{{ __('Post') }}</div>
              </div> 
              <x-modals.fanautreclub />
            @endif   
          @endauth
      </form>

      @guest
        <div class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#connet">{{ __('Post') }}</div>
        <x-modals.connexion />
      @endguest

     @auth
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          
        @endif
        @if ((session()->has('signalement')))
          <div class="alert alert-success w-50 m-auto text-center"> Merci pour le signalement de ce commentaire ! Il sera traité dans les meilleurs délais.</div>
        @endif
      @endauth
   

    {{-- affichage des commentaire des fans du club --}}
    @foreach ($commentaireclub as $commentaire)
      <div class="comments principcomments pagi">

        <div> 
          <img class="photoprofil"src="{{Storage::url('users/'.$commentaire->user->id.'/avatar\/'.$commentaire->user->photoprofil)}}" alt="">
        </div>
        <div> 
          <div class="commenttitle fontsize16">                  
            <a class="entete" href="{{route('profilpublic', $commentaire->user->id)}}">{{$commentaire->user->name}} {{$commentaire->user->hashtag}} </a> 
            <span class="timecomment"> - {{$commentaire->created_at->diffForHumans(null,[ 'short' => true])}}</span>
            @auth            
            <i class="bi bi-three-dots options" data-id="{{$commentaire->publication->id_publication}}"></i>
            @endauth
                          
            {{-- options --}}
            <x-options-commentaire :commentaire="$commentaire"/>

          </div>
          {{-- modals Bootstrap des options --}}
            <x-modals.options-commentaire :commentaire="$commentaire"/>
        

          {{-- contenu --}}
          <a href="{{route('commentaire.pleinepage', $commentaire->publication->id_publication)}}">
            {{-- texte --}}
            <div class="commentairecontenu">{{$commentaire->contenu}} </div>
            {{-- media --}}        
                
            @if ($commentaire->fichier_media != null && Storage::disk('public')->exists("users/$commentaire->user_id/$commentaire->fichier_media") )            
              @php
              $fileExtension = pathinfo($commentaire->fichier_media, PATHINFO_EXTENSION);
              @endphp
              
              @if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                {{-- le fichier est une image --}}
                <div style="text-align:center;"><img  style="width:300px; height:auto" src='{{ Storage::url("users/$commentaire->user_id/$commentaire->fichier_media") }}' alt="">
                </div>
              @elseif(in_array($fileExtension, ['mp4', 'avi', 'mov']))
                {{-- le fichier est une vidéo --}}  
                <div style="text-align:center;"> <video controls style="width:300px; height:auto" src='{{ Storage::url("users/$commentaire->user_id/$commentaire->fichier_media") }}'></video>
                </div>             
              @endif       
              
            @endif                
            
          </a>

          {{-- REPONSES --}}
          <div class="interaction">
            <span class="commentaires" data-id="{{$commentaire->id}}"> 
            @if ($commentaire->reponse_count == 1)
              {{$commentaire->reponse_count}} commentaire
              @elseif ($commentaire->reponse_count > 1)
              {{$commentaire->reponse_count}} commentaires                     
              @endif </span>

            @auth
              @if (auth()->user()->club_id == $idclub)
              <span class="commentaires" data-id="{{$commentaire->id}}">Commenter</span>
              @endif
            @endauth
          </div>
      </div>

      </div>
      <div id="reponses{{$commentaire->id}}" style="display: none;">
        @auth
          @if (auth()->user()->club_id == $idclub)
            {{-- La possibilité de laisser une REPONSE seulement pour les fans du club --}}
            <form action="{{route('post.reponseclub')}}" method="post">
              @csrf
              <div>
                <input type="text"  class="example3" placeholder="Commentaire" name="contenu">
                <input type="hidden" name="comment" value="{{$commentaire->id}}">
                
              </div>
              <div class="text-center submit">
                <button class="btn btn-outline-secondary" id="emoji-button" type="submit">Commenter</button>
              </div>
            </form>
          @endif
        @endauth
        
        <div>
          {{-- affichage des réponses du commentaire des fans du club --}}
          @foreach ($commentaire->reponse as $reponse)
          {{-- pour redirection après post --}}
          <div id="{{$reponse->id}}" class="answers">
            <div class="commenttitle entete"> 
            <span class="fontsize16"> <a href="{{route('profilpublic', $reponse->user->id)}}" class="entete fontsize16">{{$reponse->user->name}} {{$commentaire->user->hashtag}}</a> -
            {{$reponse->created_at->diffForHumans(null,[ 'short' => true])}}</span>
            @auth                            
            <i class="bi bi-three-dots options" data-id="{{$reponse->publication->id_publication}}"></i>
            @endauth
            {{-- options --}}
            <x-options-commentaire :commentaire="$reponse"/>
            </div>
            {{-- modals Bootstrap des options --}}
            <x-modals.options-commentaire :commentaire="$reponse"/>

            <div class="commentairecontenu">{{$reponse->contenu}}</div>
          </div>
          @endforeach
        </div>
      </div>
      
    @endforeach

    
    
    
  </div>

  {{-- SECTION VISITEURS --}}

  <div class="secteurvisiteurs">
    <img src="{{Storage::url('divers/secteurvisiteurs.jpg')}}" alt="">
   
 
    <form action="{{route('post.commentairevisiteur')}}" method="post" enctype='multipart/form-data'>
      @csrf
      <div> 
        <input type="text" id="floatingInput" class="example3 form-control" placeholder="Quoi de neuf ?" name="contenu">
      </div>
      <input type="hidden" name="idclub" value="{{$idclub}}">
      <label for="fileInput1"><i class="bi bi-image"></i></label>
      <input type="file" id="fileInput1" name="media">
      <div class="close1"><i class="bi bi-x-circle-fill"></i></div>
      <div id="previewContainer1"><div id="telechargement1"></div> </div>
      @auth
        <button class="btn btn-outline-secondary" type="submit" type="button">{{ __('Post') }}</button>
      @endauth

      @guest
        <div class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#connet">{{ __('Post') }}</div>
        <x-modals.connexion />
      @endguest
    </form>
    
    {{-- affichage des commentaires --}}
    @foreach ($commentairevisiteur as $commentaire)
    <div class="comments">
      <div class="commenttitle entete fontsize16">
        <a href="{{route('profilpublic', $commentaire->user->id)}}">{{$commentaire->user->name}} {{$commentaire->user->hashtag}}</a> -
        <span class="timecomment">{{$commentaire->created_at->diffForHumans(null,[ 'short' => true])}}</span>
        @auth           
         <i class="bi bi-three-dots options" data-id="{{$commentaire->publication->id_publication}}"></i>
        @endauth
        {{-- options --}}
        <x-options-commentaire :commentaire="$commentaire"/>

      </div>
      {{-- modals Bootstrap des options --}}
      <x-modals.options-commentaire :commentaire="$commentaire"/>

      {{-- contenu --}}
      <a href="{{route('commentaire.pleinepage', $commentaire->publication->id_publication)}}">
        <div> club: {{$commentaire->user->club->nom}}</div>
        {{-- texte --}}
        <div class="commentairecontenu">{{$commentaire->contenu}} </div>
        {{-- media --}}
        @if ($commentaire->fichier_media != null && Storage::disk('public')->exists("users/$commentaire->user_id/$commentaire->fichier_media") )            
            @php
            $fileExtension = pathinfo($commentaire->fichier_media, PATHINFO_EXTENSION);
            @endphp
            
            @if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
              {{-- le fichier est une image --}}
              <div style="text-align:center;"><img  style="width:150px; height:auto" src='{{ Storage::url("users/$commentaire->user_id/$commentaire->fichier_media") }}' alt="">
              </div>
            @elseif(in_array($fileExtension, ['mp4', 'avi', 'mov']))
              {{-- le fichier est une vidéo --}}   
              <div style="text-align:center;"> <video style="width:150px; height:auto" src='{{ Storage::url("users/$commentaire->user_id/$commentaire->fichier_media") }}'></video>
                </div>         
            @endif
        
            
        @endif 

      </a>
      <div class="interaction">
        <span class="commentairesvisiteur" data-id="{{$commentaire->id}}"> 
          @if ($commentaire->reponse_count == 1)
           {{$commentaire->reponse_count}} {{ __('comment') }}
           @elseif ($commentaire->reponse_count > 1)
           {{$commentaire->reponse_count}} {{ __('comments') }}                     
           @endif </span>
        
        @auth

        <span class="commentairesvisiteur" data-id="{{$commentaire->id}}">{{ __('Comment') }}</span>

        @endauth
      </div>
    </div>
    <div id="reponsesvisiteur{{$commentaire->id}}" style="display: none">
      @auth

      {{-- La possibilité de laisser une REPONSE pour tous les utilisateurs connectés du club --}}
      <form action="{{route('post.reponsevisiteur')}}" method="post">
        @csrf
        <div>
          <input type="text" id="floatingInput" class="example3 form-control" placeholder="Commentaire" name="contenu">
          <input type="hidden" name="comment" value="{{$commentaire->id}}">
          <input type="hidden" name="idclub" value="{{$idclub}}">
        </div>
        <button class="btn btn-outline-secondary" id="emoji-button" type="submit">Commenter</button>
      </form>

      @endauth
      <div>
        {{-- affichage des réponses du commentaire des utilisateurs --}}
        @foreach ($commentaire->reponse as $reponse)
        {{-- pour redirection après post --}}
        <div class="answers"> 
          <div id="{{$reponse->id}}" class="commenttitle entete fontsize16">
            <a class="" href="{{route('profilpublic', $reponse->user->id)}}">{{$reponse->user->name}} {{$commentaire->user->hashtag}}</a> -
            {{$reponse->created_at->diffForHumans(null,[ 'short' => true])}}
            @auth               
            <i class="bi bi-three-dots options" data-id="{{$reponse->publication->id_publication}}"></i>
            @endauth
            {{-- options --}}
            <x-options-commentaire :commentaire="$reponse"/>        
          </div>
            {{-- modals Bootstrap des options --}}
            <x-modals.options-commentaire :commentaire="$reponse"/>
            <div> club: {{$reponse->user->club->nom}}</div>
          <div class="commentairecontenu">{{$reponse->contenu}}</div>
        </div>
        @endforeach
      </div>
    </div>

    @endforeach



  </div>
</div>