<div x-data="{password: false}">
  <x-partials.diagram-register etape="compte"/>
  <br>
  <br>

    <main id="" class="form-signin w-50 m-auto ">
        {{-- FORMULAIRE --}}
        <form action="{{route('register')}}" method="post" class="needs-validation" >
          @csrf
  
          @if ($errors->any())
              <div class="alert alert-danger">
                Veuillez compléter le(s) champ(s) manquant(s)
              </div>
          @endif
          
          {{-- CONFIRMATION CLUB --}}
              
          <div>Ton club: 
            @foreach ($clubs as $club)
                {{$club->nom}}
            @endforeach
            <span><a href="{{route('createaccount.fan')}}" wire:navigate>Modifier</a></span></div>
  
          {{-- CLUB --}}
          <input type="hidden" value="{{$idclub}}" name="club_id">  
          {{-- BIO --}}
          <input type="hidden" value="{{session('bio.bestmemory')}}" name="bestmemory"> 
          <input type="hidden" value="{{session('bio.worsememory')}}" name="worsememory"> 
          <input type="hidden" value="{{session('bio.bestplayer')}}" name="bestplayer"> 
          <input type="hidden" value="{{session('bio.bio')}}" name="bio"> 
  
          {{-- PRENOM --}}
          <div class="form-floating @error('name') is-invalid @enderror ">
            <input type="text" class="form-control @error('name')is-invalid @enderror" id="floatingInput" placeholder="prenom" name="name" value="{{ old('name') }}">
            <label for="floatingInput">Prénom</label>
             @error('name')
              <div class="invalid-feedback"> {{$message}} </div>
            @enderror
          </div>  

          {{-- PSEUDO --}}
          <div class="form-floating @error('pseudo') is-invalid @enderror ">
            <input type="text" wire:model.live.debounce.500ms="pseudo" class="form-control @error('pseudo')is-invalid @enderror" id="floatingInput" placeholder="pseudo" name="pseudo" value="{{ old('pseudo') }}"> 
            <label for="floatingInput">Pseudo</label>
             @error('pseudo')
              <div class="invalid-feedback"> {{$message}} </div>
            @enderror
          </div>  

          {{-- DATE DE NAISSANCE --}}

          <x-auth.birthday />

          {{-- EMAIL --}}
          <div class="form-floating @error('email') is-invalid @enderror">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" name="email" value="{{ old('email') }}">
            <label for="floatingInput">Ton adresse email</label>
            @error('email')
              <div class="invalid-feedback"> {{$message}} </div>
            @enderror
          </div>
          {{-- MOT DE PASSE --}}
          <div> Choisis un mot de passe avec au moins une majuscule, un chiffre et un caractère spécial.</div>
          <div class="form-floating @error('password') is-invalid @enderror">
            <input :type="password ? 'text' : 'password'" wire:model.live.debounce.800ms="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Mot de passe</label>
            @error('password')
              <div class="invalid-feedback"> {{$message}} </div>
            @enderror
            <div @click="password = ! password"> 
              <span x-show="!password"> Afficher</span>  
              <span x-show="password"> Masquer</span>                
              le mot de passe</div>
          </div>

          <div class="form-floating @error('password_confirmation') is-invalid @enderror">
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password_confirmation">
            <label for="floatingPassword">Confirme le mot de passe</label>
            @error('password_confirmation')
              <div class="invalid-feedback"> {{$message}} </div>
            @enderror
          </div>
  
          {{-- LANGUE --}}
          <div class="form-floating @error('langue_id') is-invalid @enderror">
            <select class="form-select @error('langue_id') is-invalid @enderror" id="floatingSelect" aria-label="Floating label select example" name="langue_id" value="{{ old('langue_id') }}">
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

          {{-- PAYS DE DOMICILE --}}
          <div class="form-floating @error('pays') is-invalid @enderror">
            <select class="form-select @error('pays') is-invalid @enderror" id="floatingSelect" aria-label="Floating label select example" name="pays" value="{{ old('pays') }}">
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
         
  
          {{-- CONDITIONS GENERALES --}}
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
            <label class="form-check-label" for="flexCheckDefault"> J'accepte les <a href="">Conditions générales de Dooze</a> </label>
          </div> 
  
            
            <button class="w-100 btn btn-lg btn-primary" type="submit">Valider</button>
  
        </form>
      </main>
    
</div>
