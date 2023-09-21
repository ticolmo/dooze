<div >
    <div id="livecreate">        
        <x-modals.bouton-visiteur :idclub :$idclub>
            <x-slot:href>
                href="{{route('live.create')}}"
            </x-slot>
            Crée un live
        </x-modals.bouton-visiteur>

    </div>
   
    <div >
        <div>Liste des salons </div>
        
        <br>
        <br>
        @foreach ($lives as $live)
            <div>
                <div> {{$live->name}} </div>
                <div> {{$live->description}} </div>
                <div> Créé le {{ $live->created_at}} par {{$live->user->name}}  </div>

                
                <x-modals.bouton-visiteur :idclub :$idclub>
                    <x-slot:href>
                        href="{{route('live.connexion', $live->id)}}"
                    </x-slot>
                    Rejoindre le live
                </x-modals.bouton-visiteur>
                ugjh
            </div>
            <hr>
            
        @endforeach
        

    </div>
</div>