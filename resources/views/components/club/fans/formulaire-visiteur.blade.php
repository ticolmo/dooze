<div>
   <form action="" id="commentaireclub">
      <div>
        <input type="text" id="commentaireInput" class="mart form-control" placeholder="Quoi de neuf ?" name="contenu"  />
        <div id="previewCommentaire" role="textbox" contenteditable="true"></div>
      </div> 
  
      <input type="file" id="fileInput" name="media"/>
      <div class="close">
        <i class="bi bi-x-circle-fill"></i>
      </div>    

  
    <div class="text-center submit">
       
        <label class="image"for="fileInput"><img src="{{Storage::url('divers/media-icon.png')}}" alt="" style="width:auto;height:25px"></label>      
        <label for="" id="gif"> <img src="{{Storage::url('divers/gif.png')}}" alt="" style="width:auto;height:27.5px"></label>
        <label for="" id="emoji" > <img src="{{Storage::url('divers/emoji-icon.png')}}" alt="" style="width:auto;height:25px"></label>
        <label><img src="{{Storage::url('divers/localisation.png')}}" alt="" style="width:auto;height:25px"></label>

        <span class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#visiteur{{$slot}}"> Publier </span>
    </div>


   </form>
</div>