<div 
    {{-- affichage boite emoji --}}
    x-data="{emoji : false, lieu : false}">

<form  action="{{route('post.commentaireclub')}}" id="commentaireclub" method="post" enctype='multipart/form-data'>
    @csrf

    <div>
        <span>Utilisateur</span> <span> à</span> <input x-show="lieu" name="lieu"/>
    </div>

    <div>
      <input type="text" id="commentaireInput" class="mart form-control" placeholder="Quoi de neuf ?" name="contenu"  />
      <div id="previewCommentaire" role="textbox" contenteditable="true"></div>
    </div> 

    <input type="file" id="fileInput" name="media"/>
    <div class="close">
      <i class="bi bi-x-circle-fill"></i>
    </div>
    @if ($preview)
        <img src="{{$giphy}}" style="width:auto; height: 200px!important"/>
      @endif
      <div id="previewGif"></div>
    <div id="previewContainer"> 
      
      <div id="telechargement"></div> 
    </div>  
    {{-- <img class="emoji" draggable="false" alt="😀" src="https://twemoji.maxcdn.com/v/14.0.2/72x72/1f600.png"/> --}}

    <div class="text-center submit">
        {{-- Pièces jointes et ajout --}}
      <label class="image"for="fileInput"><img src="{{Storage::url('divers/media-icon.png')}}" alt="" style="width:auto;height:25px"></label>      
      <label for="" id="gif" @click="$wire.getGif()" > <img src="{{Storage::url('divers/gif.png')}}" alt="" style="width:auto;height:27.5px"></label>
      <label for="" id="emoji" @click="emoji = ! emoji" > <img src="{{Storage::url('divers/emoji-icon.png')}}" alt="" style="width:auto;height:25px"></label>
      <label><img @click="lieu = ! lieu" src="{{Storage::url('divers/localisation.png')}}" alt="" style="width:auto;height:25px"></label>

      <div class="btn btn-outline-secondary soumettre" @click="soumission">Publier</div>     
    

        {{-- Bouton de soumission --}}
        @auth
            @if (auth()->user()->club_id == $idclub)            
                <button class="btn btn-outline-secondary soumettre" @click="soumission">Publier</button>          
            @else
            {{-- si fan autre club --}}            
                @php
                    $modalid = uniqid();
                @endphp
                
                <span class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#fanautreclub{{$modalid}}"> Publier </span>
                
                <x-modals.fanautreclub>
                    {{$modalid}}  
                </x-modals.fanautreclub> 
            @endif  
        @endauth
                
        @guest
            {{-- si visiteurs --}}
            @php
                $modalid = uniqid();
            @endphp        
            
            <span class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#connex{{$modalid}}"> Publier </span>
            <x-modals.connexion>           
                {{$modalid}}           
            </x-modals.connexion>
        @endguest
    </div> 

    {{-- Sélection Emoji --}}
    <div id="selectEmoji" x-show="emoji" @click.outside="emoji = false"></div>

    {{-- Sélection Gif --}}
    @if ($gif)
      <livewire:club.fans.gif>
    @endif

  </form> 
  
  {{-- soumission du formulaire  --}}
  <script>
    
    function soumission() {
      var divContent = document.getElementById('previewCommentaire').innerHTML;

      // Ajouter le contenu de la div à un champ de formulaire invisible
      var hiddenInput = document.getElementById('commentaireInput');
      hiddenInput.setAttribute('value', divContent);

      console.log(hiddenInput)
  
      /*  $(form).submit(); */
    }

    
  </script>
  
</div>