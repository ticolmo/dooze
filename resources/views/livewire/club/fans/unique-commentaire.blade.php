<div id="commentaires" class="uniqueCommentaire" >
    <span wire:click="exit()"><i class="bi bi-box-arrow-left"></i></span>
    <div>
        <img class="photoprofil"
            src="{{Storage::url('users/'.$commentaire->user->id.'/avatar\/'.$commentaire->user->photoprofil)}}"
            alt="">
    </div>
    <div>
        <div class="commenttitle fontsize16">
            <a class="entete" href="{{route('profilpublic', $commentaire->user->id)}}">{{$commentaire->user->name}}
                {{$commentaire->user->hashtag}} </a>
            <span class="timecomment"> - {{$commentaire->created_at->diffForHumans(null,[ 'short' => true])}}</span>
            @auth
            <i class="bi bi-three-dots options" data-id="{{$commentaire->id}}"></i>
            @endauth

            {{-- options --}}
            {{--
            <x-options-commentaire :commentaire="$commentaire" /> --}}

        </div>
        {{-- modals Bootstrap des options --}}
        {{--
        <x-modals.options-commentaire :commentaire="$commentaire" /> --}}


        {{-- contenu --}}
        
            {{-- texte --}}
            <div class="commentairecontenu"> {!!$commentaire->contenu!!} </div>
            {{-- media --}}

            @if ($commentaire->fichier_media != null &&
            Storage::disk('public')->exists("users/$commentaire->user_id/$commentaire->fichier_media") )
            @php
            $fileExtension = pathinfo($commentaire->fichier_media, PATHINFO_EXTENSION);
            @endphp

            @if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
            {{-- le fichier est une image --}}
            <div style="text-align:center;"><img style="width:300px; height:auto"
                    src='{{ Storage::url("users/$commentaire->user_id/$commentaire->fichier_media") }}' alt="">
            </div>
            @elseif(in_array($fileExtension, ['mp4', 'avi', 'mov']))
            {{-- le fichier est une vidéo --}}
            <div style="text-align:center;"> <video controls style="width:300px; height:auto"
                    src='{{ Storage::url("users/$commentaire->user_id/$commentaire->fichier_media") }}'></video>
            </div>
            @endif

            @endif

        <hr style="width: 50%">
        <div class="tools">
            <div>
                <span class="iconNav parentIcon">
                    <i class="bi bi-chat"></i>
                    <span class="explicatifIcon"> <span>Répondre </span> </span>
                </span>
                <x-club.fans.formatage-chifre :chiffre="$commentaire->nb_reponse" />
            </div>
            <div class="jaime">
                <span class="iconNav parentIcon ">
                    <i wire:click="jaime({{$commentaire->nb_jaime}}, {{$commentaire->id}})"><img
                            src="{{Storage::url('divers/ballon.png')}}" alt=""></i>
                    <span class="explicatifIcon"> <span>Goal! </span> </span>
                </span>
                <x-club.fans.formatage-chifre :chiffre="$commentaire->nb_jaime" />                  
            </div>
            <div>
                <span class="iconNav parentIcon">
                    <i class="bi bi-upload"></i>
                    <span class="explicatifIcon"> <span>Partager </span> </span>
                </span>
                <x-club.fans.formatage-chifre :chiffre="$commentaire->nb_partage" />
            </div>
        </div>


    </div>
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
        

    @endguest

</div>
