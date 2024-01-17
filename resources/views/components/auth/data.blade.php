<div id="dataprofil">
    <div>
        <img class="photoprofil"
                src="{{Storage::url('users/'.$id.'/avatar\/'.$photo)}}"
                alt="">
    </div>
    <div class="entete text-end">
        <span class="iconNav parentIcon">
            <i class="bi bi-pencil"></i>
            <div class="explicatifIcon"> <span>Modifier les données </span> </div>   
        </span>        
    </div>
    <div class="text-center">
        <div> {{$name}} </div>
        <div> {{$hashtag}}</div>
        <div> {{$categorie}}</div>
        <div> {{$bio}}</div>
    </div>
    
    <div>
        <span> {{$titrelienone}} </span>
        <span> {{$lienone}} </span>
    </div>
    <div>
        <span> {{$titrelientwo}} </span>
        <span> {{$lientwo}} </span>
    </div>
</div>