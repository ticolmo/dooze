
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





  </main>

