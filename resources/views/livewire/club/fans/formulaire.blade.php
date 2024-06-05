<div x-data="formulaire" >

<form action="{{route('commentaire.store')}}" id="commentaireclub" method="post" enctype='multipart/form-data'>
    @csrf

    {{-- utilisateur et lieu --}}
    <div>
        <span>Utilisateur</span> <span> à</span> <input type="text" wire:model="lieu" x-show="lieu" name="lieu"  />
    </div>

    {{-- commentaire --}}
    
    <div>
      <input type="hidden" id="commentaireInput" class="mart form-control" name="contenu" value=""/>
      <div id="previewCommentaire" class="foo" role="textbox" contenteditable="true" aria-multiline="true" wire:ignore> </div>
    </div> 
    

    {{-- fichier media --}}
    <input type="file" id="fileInput" />
   
 
    <input type="file" id="gin" wire:model="photo" name="media">
    <div class="close">
      <i class="bi bi-x-circle-fill"></i>
    </div>

    {{-- preview Gif --}}
    @if ($preview)
        <img src="{{$giphy}}" draggable="false" style="width:auto; height: 200px!important"/>
      @endif

    {{-- preview fichier media --}}
    @if ($photo) 
      <img src="{{ $photo->temporaryUrl() }}">
    @endif
    <div id="previewContainer">       
      <div id="telechargement"></div> 
    </div>  
    {{-- <img class="emoji" draggable="false" alt="😀" src="https://twemoji.maxcdn.com/v/14.0.2/72x72/1f600.png"/> --}}

    {{-- paramètres commentaire --}}
    <input type="hidden" name="secteur_visiteur" value= "{{$visiteur}}">
    {{-- boutons --}}
    <div class="text-center submit">      
      <label class="iconNav parentIcon" for="gin">
        
        <i class="bi bi-image"></i>
      <div class="explicatifIcon"><span>Image</span></div>  
      </label>      
      <label class="iconNav parentIcon" for="" id="gif" @click="$wire.getGif()" >
        <i><img src="{{Storage::url('divers/gif.png')}}" alt="" /> </i>       
      <div class="explicatifIcon"><span>GIF</span></div>
      </label>
      <label class="iconNav parentIcon" for="" id="emoji" @click="emoji()"> 
        <i class="bi bi-emoji-smile"></i>
      <div class="explicatifIcon"><span>Emoji</span></div>
      </label>
      <label class="iconNav parentIcon" @click="lieu = ! lieu">
        <i class="bi bi-geo-alt" ></i>
      <div class="explicatifIcon"><span>Lieu</span></div>
      </label>

      <div class="btn btn-outline-secondary soumettre" @click="soumission()">Publier</div>     
          

    {{-- Sélection Emoji --}}
    <div id="selectEmoji" style="display: none" ></div>

    {{-- Sélection Gif --}}
    @if ($gif)
      <livewire:club.fans.gif>
    @endif

  </form>  


    @if ((session()->has('signalement')))
      <div class="alert alert-success w-50 m-auto text-center"> Merci pour le signalement de ce commentaire ! Il sera traité dans les meilleurs délais.</div>
    @endif
    
</div>
<livewire:club.fans.commentaires :$idclub :visiteur="0"/>
