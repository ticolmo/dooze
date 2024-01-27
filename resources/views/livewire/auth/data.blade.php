<div id="dataprofil" x-data="{ open: false }">
    <div>
        <img class="photoprofil"
                src="{{Storage::url('users/'.$id.'/avatar\/'.$photo)}}"
                alt="">
    </div>
    <div class="entete text-end">
        <span class="iconNav parentIcon">
            <i class="bi bi-pencil" x-on:click="open = ! open"></i>
            <div class="explicatifIcon"> <span>Modifier les données </span> </div>   
        </span>        
    </div>
    <form action="{{route('user-profile-information.update')}}" method="post"> 
        @csrf
        @method('PUT') 
        
        @if ($errors->updateProfileInformation->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->updateProfileInformation->all()  as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif     
        
    <div class="text-center">        
        <div> <input :class="open ? '' : 'formDataInput'" type="text" name="name" value="{{$name}}"/> </div>
        <div> 
            <input :class="open ? '' : 'formDataInput'" type="text" name="pseudo" value="{{$pseudo}}"/> 
                
        </div>

        <div> <input :class="open ? '' : 'formDataInput'" type="text" name="categorie" value="{{$categorie}}"/> </div>
        <div> <input :class="open ? '' : 'formDataInput'" type="text" name="bio" value="{{$bio}}"/> </div>
        
    </div>
    
    <div>
        <input :class="open ? '' : 'formDataInput'" type="text" name="titrelienone" value="{{$titrelienone}}"/> 
        <input :class="open ? '' : 'formDataInput'" type="text" name="lienone" value="{{$lienone}}"/> 

    </div>
    <div>
        <input :class="open ? '' : 'formDataInput'" type="text" name="titrelientwo" value="{{$titrelientwo}}"/> 
        <input :class="open ? '' : 'formDataInput'" type="text" name="lientwo" value="{{$lientwo}}"/> 
    </div>
    <div>
        <button class="btn btn-primary" type="submit" :class="open ? '' : 'formButton'" > Modifier</button>
    </div>
</form>
</div>