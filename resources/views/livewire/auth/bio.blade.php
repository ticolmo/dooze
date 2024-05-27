<div>
    <x-partials.diagram-register etape="bio"/>
    <br>
    <br>

    <div> Bravo, tu es bien un vrai supporter de ton club !</div>
    <div> Pour remplir  ta bio sur ton profil, complète les informations ci-dessous </div>
    <div> Réponds au moins à 2 des questions.</div>
    <br>
 
    <div>Ton vécu avec ton club ou en football:</div>
    <form wire:submit="save">
        <div> Ton meilleur souvenir</div>
        <textarea type="text" wire:model="bestmemory"></textarea>
        <div>
            @error('bestmemory') <span class="error">{{ $message }}</span> @enderror 
        </div>
        <div>Ton pire souvenir</div>
        <textarea type="text" wire:model="worsememory"></textarea>
        <div>
            @error('worsememory') <span class="error">{{ $message }}</span> @enderror 
        </div>
        <div>Ton joueur emblématique</div>
        <textarea type="text" wire:model="bestplayer"></textarea>
        <div>
            @error('bestplayer') <span class="error">{{ $message }}</span> @enderror 
        </div>
        <div> Bio</div>
        <textarea type="text" wire:model="bio"></textarea>
        <div>
            @error('bio') <span class="error">{{ $message }}</span> @enderror 
        </div>
        <div>
            @error('minimum') <span class="error">Réponds </span> @enderror 
        </div>

        <button type="submit" class="btn btn-primary">
            <span class="spinner-border text-light" role="status" wire:loading wire:target="save">
                <span class="visually-hidden">Loading...</span>
            </span>
            Suivant</button>

    </form>
   
</div>
