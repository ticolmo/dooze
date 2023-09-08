<div>
    @auth
    <a href="{{route('live.create')}}" class="w-20 btn btn-lg btn-primary" style="margin-bottom: 16px">Crée un live</a> 
    @endauth
    
    @guest

    <a href="{{route('live.create')}}" class="w-20 btn btn-lg btn-primary" style="margin-bottom: 16px">Crée un live</a>
        <div class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#connet">Crée un live</div>
        <x-modals.connexion />
    @endguest

    <div style="min-height: 50vh">
        Liste des salons
    </div>
</div>