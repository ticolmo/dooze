<!-- Modal -->
<div class="modal fade" id="connet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom:none!important">

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>Bienvenue sur Dooze !</div>
        <div> Identifiez-vous pour publier un post.</div>
        <br>
        <div type="button" class="btn btn-primary" data-bs-target="#identification" data-bs-toggle="modal">S'identifier</div>
        <br>  
        <hr>        
        <div> <a href="" class="btn btn-light"> S'inscrire</a></div>
      </div>
      <div class="modal-footer" style="border-top:none!important">
      </div>
    </div>
  </div>
</div>

{{-- 2ème Modal - Identification --}}

<div class="modal fade" id="identification" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom:none!important">
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Connexion</h1>
        <br>
        <form action="{{route('login')}}" method="post">
          @csrf        
  
          <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput" placeholder="Email" name="email">
            <label for="floatingInput">Email</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Password</label>
          </div>
          <div class="checkbox mb-3">
            <input type="checkbox" name="remember">
            <label for="remember" id="remember">
               Remember me
            </label>
          </div>
  
          
          <button class="w-100 btn btn-lg btn-primary" style="margin-bottom: 16px" type="submit">Connexion</button>
          <div> <a href="{{route('forgot-password')}}">Mot de passe oublié ?</a></div>
  
        </form>  
        
        <hr>        
        <div> <a href="{{route('createaccount')}}" class="btn btn-light"> S'inscrire</a></div>
      </div>
      <div class="modal-footer" style="border-top:none!important">
      </div>
    </div>
    </div>
  </div>
</div>