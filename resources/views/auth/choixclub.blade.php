@extends('layouts.home')

@section('content')

    <main id="" class="form-signin w-50 m-auto">

      <div> Avoir un compte te permettra:</div>
      <div> - poster des commentaires sur la page de ton club préféré et dans le secteur Visiteurs des autres clubs </div>
      <div> - d'avoir une navigation plus facile sur Dooze </div>
      <div> - d'être au courant des dernières nouveautés de Dooze</div>

      <br>
      <div> Après avoir choisi ton club, tu ne pourras pas le changer. Quand on aime un club, c'est pour la vie.</div>
      <br>
      <div> Si malgré tout tu souhaites changer de club, il faudra supprimer ton compte et en ouvrir un nouveau avec ton nouveau club. Tu pourras faire cela en cliquant sur 'Modifier mes données' dans la page de ton Profil.</div>
      <br>
      <!-- CHOIX DU CLUB -->
      <form action="{{ route('question') }}" method="post">      
        @csrf
        <div class="form-floating">
          <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="club">
            <option selected>Club</option>
            <?php foreach ($listeclub as $liste){?>
            <option value="<?php echo $liste->id_club; ?>"> <?php echo $liste->nom ?></option>
            
            <?php }?>

          </select>
          {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> --}}
          <label for="floatingSelect">Sélectionne ton club préféré</label>
        </div>

        
        <button class="w-50 btn btn-lg btn-primary" type="submit">Suivant</button>

      </form>
    </main>


@endsection