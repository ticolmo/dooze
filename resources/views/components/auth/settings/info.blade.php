
<main id="" class="form-signin w-50 m-auto" >
        
    {{-- MESSAGE DE SUCCESS OU D'ERREUR  --}}
     @if (session()->get('status') == 'profile-information-updated')
     <div class="alert alert-success">Les modifications ont été effectuées. </div>
    @endif
    @if ((session()->has('modifemail')))
    <div class="alert alert-success"> {{session()->get('modifemail')}}  </div>
    @endif        

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif  
    
    <!-- FORMULAIRE -->
    <form action="{{route('user-profile-information.update')}}" style="margin-bottom:20px" method="post">
      @csrf
      @method('PUT')   
      
      

      <!-- PRENOM -->
      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" placeholder="prenom" name="name" value="{{old('name') ?? auth()->user()->name}}">
        <label for="floatingInput">Prénom</label>
      </div>
      <!-- PAYS DE DOMICILE -->
      <div class="form-floating">
        <select class="form-select" id="floatingSelect2" aria-label="Floating label select example" >
          <option selected disabled>{{old('pays') ?? auth()->user()->pays}}</option>
          @foreach ($listepays as $pays)
              <option value="{{$pays['name']}}"> {{$pays['name']}} </option>
          @endforeach
        </select>
        <label for="floatingSelect2">Sélectionnez votre pays de domicile</label>
        <input id="pays" type="hidden" name="pays" value="{{old('pays') ?? auth()->user()->pays}}" >
      </div>  
    

      <!-- EMAIL -->
      <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" value="{{old('email') ?? auth()->user()->email}}">
        <label for="floatingInput">Email address</label>
      </div>


      <!-- LANGUE -->
      <div class="form-floating" style="margin-bottom:30px">
        <select class="form-select" id="floatingSelect3" aria-label="Floating label select example"  >
          <option selected disabled>Langue</option>
          @foreach ($langues as $langue)
           <option value="{{$langue->id_langue}}">{{$langue->intitule}}</option>   
          @endforeach           
          
        </select>
        <label for="floatingSelect3">Sélectionnez votre langue</label>
        <input id="langue" type="hidden" name="langue_id" value="{{old('langue_id') ?? auth()->user()->langue_id}}">
      </div>
      
        
        <button class="w-100 btn btn-lg btn-primary" type="submit">Modifier</button>

    </form>

  </main>

