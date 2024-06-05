


  <div class="w-75 m-auto">

    <h1 class="titre"> Créer un compte <span> Fan</span></h1>

    <ul class="avantages">
      <li>Postez des commentaires sur la page de ton club préféré et dans l'espace Visiteurs des autres clubs</li>
      <li>Navigation plus facile</li>
      <li>Information des dernières nouveautés de Dooze </li>
    </ul>

    <br>
    <div> Quand on aime un club, c'est pour la vie! Après avoir choisi ton club, tu ne pourras pas le changer. </div>
    <br>
    <div> Si malgré tout tu souhaites changer de club, il faudra supprimer ton compte et en ouvrir un nouveau avec ton nouveau club. Tu pourras faire cela en cliquant sur 'Modifier mes données' dans la page de ton Profil.</div>
    <br>
    <!-- CHOIX DU CLUB -->
    <form wire:submit="save"> 
      <div class="form-floating">
        <select class="form-select" id="floatingSelect" aria-label="Floating label select example"  wire:model="club">
          <option selected>Club</option>
          @foreach ($clubs as $club)
          <option value="{{$club->id_club}}"> {{$club->nom}} </option>
          @endforeach           

        </select>
        <label for="floatingSelect">Sélectionne ton club préféré</label>
      </div>

      
      <button class="w-100 btn btn-lg btn-primary" type="submit">Suivant</button>

    </form>
  </div>


