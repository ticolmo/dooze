@extends('layouts.home')

@section('content')
  

    <main id="" class="form-signin w-50 m-auto" >
      <div style="margin-bottom:30px"><a href="{{route('profil')}}">Retour à ton profil</a></div>
      
       <h1 class="h4 mb-3 fw-normal">Modification de ton compte</h1>
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
        
   
        <!-- CATEGORIE -->
        <div class="form-floating">
          <select class="form-select" id="floatingSelect1" aria-label="Floating label select example">    
            <option selected disabled>{{old('categorie') ?? auth()->user()->categorie}}</option>        
            <option value="Fan">Fan</option>
            <option value="Media">Media, société, organisation..</option>  
          </select>
          <label for="floatingSelect1">Sélectionne ta catégorie</label>
          <input id="categorie" type="hidden" name="categorie" value="{{old('categorie') ?? auth()->user()->categorie}}">
        </div>
        

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
        
          
          <button class="w-100 btn btn-lg btn-primary" type="submit">Valider</button>

      </form>
      <br><br>

      <h1 class="h4 mb-3 fw-normal">Modification du mot de passe</h1>
      @if (session()->get('status') == 'password-updated')
       <div class="alert alert-success"> Mot de passe modifié</div>
      @endif

      <form action="{{route('user-password.update')}}" style="margin-bottom:20px" method="post">
        @csrf
        @method('PUT')
          <!-- MOT DE PASSE -->
          <div class="form-floating @error('current_password', 'updatePassword') is-invalid @enderror">
            <input type="password" class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="current_password">
            <label for="floatingPassword">Mot de passe actuel</label>
            @error('current_password', 'updatePassword')
              <div class="invalid-feedback"> {{$message}} </div>
            @enderror
          </div>
            <div class="form-floating @error('password', 'updatePassword') is-invalid @enderror">
              <input type="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password">
              <label for="floatingPassword">Nouveau mot de passe</label>
              @error('password', 'updatePassword')
                <div class="invalid-feedback"> {{$message}} </div>
              @enderror
            </div>
            <div  style="margin-bottom:30px" class="form-floating @error('password_confirmation', 'updatePassword') is-invalid @enderror">
              <input type="password" class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password_confirmation">
              <label for="floatingPassword">Confirmer le nouveau mot de passe</label>
              @error('password_confirmation', 'updatePassword')
                <div class="invalid-feedback"> {{$message}} </div>
              @enderror
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Valider</button>
      </form>
      <br><br>

      <h1 class="h4 mb-3 fw-normal">Suppression de votre compte</h1>

      <form action="{{route('suppressioncompte')}}" method="post">
      @csrf
      <div> Si vous souhaitez annuler votre compte définitivement, cliquez ci-dessous.</div>
      <div> Après l'annulation, vos données personnelles seront détruites et non répertoriées par Dooze.</div>
      <div style="margin-bottom:20px"> Utilisez ce procédé pour changer de club. </div>
      <button class="w-100 btn btn-lg btn-danger" type="submit">Valider</button>
      
      </form>



    </main>
  </div>
</div>

@endsection