
<main id="" class="form-signin w-50 m-auto" >



    <form action="{{route('suppressioncompte')}}" method="post">
    @csrf
    <div> Si vous souhaitez annuler votre compte définitivement, cliquez ci-dessous.</div>
    <div> Après l'annulation, vos données personnelles seront détruites et non répertoriées par Dooze.</div>
    <div style="margin-bottom:20px"> Utilisez ce procédé pour changer de club. </div>
    <button class="w-100 btn btn-lg btn-danger" type="submit">Valider</button>
    
    </form>



  </main>

