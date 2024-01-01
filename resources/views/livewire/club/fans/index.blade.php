<div x-data="index">
   
    <div id="selectSection">
      @if ($section == "visitors")
      <span wire:click="selectSection('')"><i class="bi bi-box-arrow-left"></i></span>
      @endif
      <span wire:click="selectSection('visitors')">Secteur Visiteurs</span>
    </div>
      
      <div class="fans" style="min-height:50vh">
        {{-- SECTION FAN --}}
        @if ($section == "")
          <div class="supporters formulaire">  
            {{--   @php
                $foo = true;
            @endphp
            <livewire:club.fans.formulaire :$idclub :visiteur="$foo" />  --}}
            
              @auth
                {{-- les fans du club --}}
                @if (auth()->user()->club_id == $idclub)   
                 
                @php
                  $foo = 0;
                @endphp              
                <livewire:club.fans.formulaire :$idclub :visiteur="$foo" /> 
                
                
                @else
                  {{-- si fan autre club  --}}           
                      @php
                          $modalid = uniqid();
                      @endphp
                      <x-club.fans.formulaire-visiteur> {{$modalid}} </x-club.fans.formulaire-visiteur>
                      <x-modals.fanautreclub> {{$modalid}} </x-modals.fanautreclub> 

                  @endif  

                  
              @endauth
                  
              @guest
                  {{-- si visiteurs --}}
                  @php
                      $modalid = uniqid();
                  @endphp        
                  <x-club.fans.formulaire-visiteur> {{$modalid}} </x-club.fans.formulaire-visiteur>
                  <x-modals.connexion> {{$modalid}}  </x-modals.connexion>
                  <livewire:club.fans.commentaires :$idclub :visiteur="0"/>

              @endguest
              
              
              
              {{-- <x-modals.bouton-visiteur :idclub :$idclub submit>            
                Publier
                <x-slot:form>
                  commentaireclub
                </x-slot>
              </x-modals.bouton-visiteur> --}}
             
            
            

        
            {{-- affichage des commentaire des fans du club --}}
            

            {{-- <div wire:loading wire:target="pagination"> 
              <div class="spinner-border text-secondary" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>          
            </div> --}}
        
            
            
            
          </div>  
        @endif
        
      
        {{-- SECTION VISITEURS --}}
        @if ($section == "visitors")
        <div class="secteurvisiteurs">
          <img src="{{Storage::url('divers/secteurvisiteurs.jpg')}}" alt="">
         
       
          <form action="{{route('post.commentairevisiteur')}}" id="commentairevisiteur" method="post" enctype='multipart/form-data'>
            @csrf
            <div> 
              <input type="text" id="floatingInput" class="example3 form-control" placeholder="Quoi de neuf ?" name="contenu"/>
            </div>
            <input type="hidden" name="idclub" value="{{$idclub}}"/>
            <label for="fileInput1">
              <i class="bi bi-image"></i>
            </label>
            <input type="file" id="fileInput1" name="media"/>
            <div class="close1">
              <i class="bi bi-x-circle-fill"></i>
            </div>
            <div id="previewContainer1">
              <div id="telechargement1"></div> 
            </div>   
            
          </form>
          
          <x-modals.bouton-visiteur :idclub :$idclub submit>            
            Publier
              <x-slot:form>
                commentairevisiteur
              </x-slot>
          </x-modals.bouton-visiteur>
          
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
        @endif
      </div>

</div>