<div>
    @foreach ($commentaires as $commentaire)
        <div class="comments principcomments pagi">

        <div> 
            <img class="photoprofil"src="{{Storage::url('users/'.$commentaire->user->id.'/avatar\/'.$commentaire->user->photoprofil)}}" alt="">
        </div>
        <div> 
            <div class="commenttitle fontsize16">                  
            <a class="entete" href="{{route('profilpublic', $commentaire->user->id)}}">{{$commentaire->user->name}} {{$commentaire->user->hashtag}} </a> 
            <span class="timecomment"> - {{$commentaire->created_at->diffForHumans(null,[ 'short' => true])}}</span>
            @auth            
            <i class="bi bi-three-dots options" data-id="{{$commentaire->id}}"></i>
            @endauth
                            
            {{-- options --}}
            {{-- <x-options-commentaire :commentaire="$commentaire"/> --}}

            </div>
            {{-- modals Bootstrap des options --}}
            {{-- <x-modals.options-commentaire :commentaire="$commentaire"/> --}}
        

            {{-- contenu --}}
            <a href="{{route('commentaire.pleinepage', $commentaire->id)}}">
                {{-- texte --}}
                <div class="commentairecontenu">  {!!$commentaire->contenu!!} </div>
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

            
        </div>

        </div>
        
        
    @endforeach
</div>
