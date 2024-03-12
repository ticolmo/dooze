<div>
    <main id="" class="form-signin w-50 m-auto ">
        {{-- FORMULAIRE --}}
        <form action="{{route('register')}}" method="post" class="needs-validation"  wire:submit="save" >
          @csrf
          <h1 class="h3 mb-3 fw-normal">Création de votre compte</h1>  
  
          @if ($errors->any())
              <div class="alert alert-danger">
                Veuillez compléter le(s) champ(s) manquant(s)
              </div>
          @endif
          
          {{-- CONFIRMATION CLUB --}}
              
          <div>Ton club: {{$club->nom}}  <span><a href="{{route('createaccount')}}" wire:navigate>Modifier</a></span></div>
  
          {{-- CLUB --}}
          <input type="hidden" value="{{$idclub}}" name="club_id">  
  
          {{-- CATEGORIE --}}
          <div class="form-floating @error('categorie') is-invalid @enderror">
            <select class="form-select @error('categorie') is-invalid @enderror" id="floatingSelect" aria-label="Floating label select example" name="categorie">    
              <option selected disabled>{{ old('categorie') ?? "Catégorie"}}</option>        
              <option value="Fan">Fan</option>
              <option value="Media">Media, société, organisation..</option>  
            </select>
            <label for="floatingSelect">Sélectionne ta catégorie</label>
            @error('categorie')
              <div class="invalid-feedback"> {{$message}} </div>
            @enderror
          </div>
  
          {{-- PRENOM --}}
          <div class="form-floating @error('name') is-invalid @enderror ">
            <input type="text" class="form-control @error('name')is-invalid @enderror" id="floatingInput" placeholder="prenom" name="name" value="{{ old('name') }}">
            <label for="floatingInput">Prénom</label>
             @error('name')
              <div class="invalid-feedback"> {{$message}} </div>
            @enderror
          </div>  
          
        
          
          {{-- PAYS DE DOMICILE --}}
          <div class="form-floating @error('pays') is-invalid @enderror">
            <select class="form-select @error('pays') is-invalid @enderror" id="floatingSelect" aria-label="Floating label select example" name="pays">
              <option selected disabled>{{ old('pays') ?? "Pays"}}</option>
              @foreach ($listepays as $pays)
                  <option value="{{$pays['name']}}"> {{$pays['name']}} </option>
              @endforeach
            </select>
            <label for="floatingSelect">Sélectionnez votre pays de domicile</label>
            @error('pays')
              <div class="invalid-feedback"> {{$message}} </div>
            @enderror
          </div>
  
    
           
  
          {{-- EMAIL --}}
          <div class="form-floating @error('email') is-invalid @enderror">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" name="email" value="{{ old('email') }}">
            <label for="floatingInput">Votre adresse email</label>
            @error('email')
              <div class="invalid-feedback"> {{$message}} </div>
            @enderror
          </div>
          {{-- MOT DE PASSE --}}
          <div class="form-floating @error('password') is-invalid @enderror">
            <input type="password" wire:model.live="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Mot de passe</label>
            @error('password')
              <div class="invalid-feedback"> {{$message}} </div>
            @enderror
          </div>
          <div class="form-floating @error('password_confirmation') is-invalid @enderror">
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password_confirmation">
            <label for="floatingPassword">Confirmez le mot de passe</label>
            @error('password_confirmation')
              <div class="invalid-feedback"> {{$message}} </div>
            @enderror
          </div>
  
          {{-- LANGUE --}}
          <div class="form-floating @error('langue_id') is-invalid @enderror">
            <select class="form-select @error('langue_id') is-invalid @enderror" id="floatingSelect" aria-label="Floating label select example" name="langue_id">
              <option selected disabled>{{ old('langue_id') ?? "Langue"}}</option>
              @foreach ($langues as $langue)
               <option value="{{$langue->id_langue}}">{{$langue->intitule}}</option>   
              @endforeach          
              
            </select>
            <label for="floatingSelect">Sélectionnez votre langue</label>
            @error('langue_id')
              <div class="invalid-feedback"> {{$message}} </div>
            @enderror
          </div>
         
  
          {{-- CONDITIONS GENERALES --}}
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"{{--  name="conditions" --}} required>
            <label class="form-check-label" for="flexCheckDefault"> J'accepte les <a href="">Conditions générales de Dooze</a> </label>
          </div> 
  
          
          
          
          
           
            
            <button class="w-100 btn btn-lg btn-primary" type="submit">Valider</button>
  
        </form>
      </main>
    
</div>
