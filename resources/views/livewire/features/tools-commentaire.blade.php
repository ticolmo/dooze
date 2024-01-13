<div class="tools">
    <div>
        <span class="iconNav parentIcon">
            <i class="bi bi-chat"></i>
            <span class="explicatifIcon"> <span>Répondre </span> </span>
        </span>
        <x-club.fans.formatage-chifre :chiffre="$reponse" />
    </div>
    <div class="jaime">
        <span class="iconNav parentIcon ">
            <i wire:click="like({{$jaime}}, {{$id}})">
                <img src="{{Storage::url('divers/ballon.png')}}" alt=""></i>
            <span class="explicatifIcon"> <span>Goal! </span> </span>
        </span>
        <x-club.fans.formatage-chifre :chiffre="$jaime" />                  
    </div>
    <div>
        <span class="iconNav parentIcon">
            <i class="bi bi-upload"></i>
            <span class="explicatifIcon"> <span>Partager </span> </span>
        </span>
        <x-club.fans.formatage-chifre :chiffre="$partage" />
    </div>



</div>