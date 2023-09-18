<div>
    @auth
    <a href="{{route('live.create')}}" class="w-20 btn btn-lg btn-primary" style="margin-bottom: 16px">Crée un live</a> 
    @endauth
    
    @guest
        @php
            $modalid = uniqid();
        @endphp        
        
        <div class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#connex{{$modalid}}">Crée un live</div>
        <x-modals.connexion>           
            {{$modalid}}           
        </x-modals.connexion>
    @endguest

    <div style="min-height: 50vh">
        Liste des salons
        <br>
        <br>
    @foreach ($lives as $live)
    <div>
        <div> {{$live->name}} </div>
        <div> {{$live->description}} </div>
        <div> Créé le {{ $live->created_at}} par {{$live->user->name}}  </div>

        <a href="{{route('live.connexion', $live->id)}}" class="w-20 btn btn-lg btn-primary" style="">Rejoindre le live</a>
    </div>
    <hr>
        
    @endforeach
        

    </div>
</div>