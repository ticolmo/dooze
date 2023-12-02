<div 
    {{-- affichage boite emoji --}}
    x-data="{open : false }">

<form  action="{{route('post.commentaireclub')}}" id="commentaireclub" method="post" enctype='multipart/form-data'>
    @csrf

    <div>
      <input type="text" id="floatingInput" class="mart form-control" placeholder="Quoi de neuf ?" name="contenu" />
      <div id="previewCommentaire"contenteditable="true" role="textbox" ></div>
    </div> 

    <input type="file" id="fileInput" name="media"/>
    <div class="close">
      <i class="bi bi-x-circle-fill"></i>
    </div>
    <div id="previewContainer"> 
      <div id="telechargement"></div> 
    </div>  
    {{-- <img class="emoji" draggable="false" alt="😀" src="https://twemoji.maxcdn.com/v/14.0.2/72x72/1f600.png"/> --}}
      
    <div class="text-center submit">
        {{-- Pièces jointes --}}
      <label class="image"for="fileInput"><img src="{{Storage::url('divers/media-icon.png')}}" alt="" style="width:auto;height:25px"></label>      
      <label for=""> <img src="{{Storage::url('divers/gif.png')}}" alt="" style="width:auto;height:27.5px"></label>
      <label for="" id="emoji" > <img src="{{Storage::url('divers/emoji-icon.png')}}" alt="" style="width:auto;height:25px" @click="open = ! open" ></label>
      <label><img src="{{Storage::url('divers/localisation.png')}}" alt="" style="width:auto;height:25px"></label>

     
    

        {{-- Bouton de soumission --}}
        @auth
            @if (auth()->user()->club_id == $idclub)            
                <button class="btn btn-outline-secondary soumettre" type="submit">Publier</button>          
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
    {{-- Selection Emoji --}}
    <div id="selectEmoji" x-show="open" @click.outside="open = false"></div>
  </form> 

  
</div>