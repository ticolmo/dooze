<div id="dataprofil" x-data="{ form: @entangle('form') }">

    <div>
        <img class="photoprofil"
                src="{{Storage::url('users/'.auth()->user()->id.'/avatar\/'.auth()->user()->photoprofil)}}"
                alt="">
    </div>
    <div class="entete text-end">
        <span class="iconNav parentIcon">
            <i class="bi bi-pencil" x-on:click="form = ! form"></i>
            <div class="explicatifIcon"> <span>Modifier les données </span> </div>   
        </span>        
    </div>
    <form wire:submit="update" > 
 
    <div class="text-center">        
        <div> 
            <input :class="form ? '' : 'formDataInput'" type="text" wire:model="name" /> 
            <div>@error('name') {{ $message }} @enderror</div>
        </div>
        <div> 
            <input :class="form ? '' : 'formDataInput'" type="text" wire:model.live="pseudo" /> 
            <div>@error('pseudo') {{ $message }} @enderror</div>   
        </div>

        <div> 
            <input :class="form ? '' : 'formDataInput'" type="text" wire:model="categorie" /> 
            <div>@error('categorie') {{ $message }} @enderror</div>
        </div>
        <div> <textarea style="resize:none;" :class="form ? '' : 'formDataInput'" type="text" wire:model="bio" ></textarea> </div>
        
    </div>

    @if (!empty(auth()->user()->lien1))
        <div>
            <input :class="form ? '' : 'formDataInput'" type="text" wire:model="titrelienone" /> 
            <input :class="form ? '' : 'formDataInput'" type="text" wire:model="lienone" /> 
            <div>@error('titrelienone', 'lienone') {{ $message }} @enderror</div>
        </div>
    @endif

    @if (!empty(auth()->user()->lien2))
    <div>
        <input :class="form ? '' : 'formDataInput'" type="text" wire:model="titrelientwo" /> 
        <input :class="form ? '' : 'formDataInput'" type="text" wire:model="lientwo" /> 
        <div>@error('titrelientwo', 'lientwo') {{ $message }} @enderror</div>
    </div>
    @endif

    <div>
        <button class="btn btn-primary" type="submit" :class="form ? '' : 'formButton'" > 
            <span class="spinner-border text-light" role="status" wire:loading wire:target="update">
                <span class="visually-hidden">Loading...</span>
            </span>     
            Modifier
        </button>
    </div>
</form>
</div>