<div 
    id="dataprofil" 
    x-data="{ 
        form: @entangle('form'), 
        updateTextareaHeight(input) {
        input.style.height = 'auto';
        input.style.height = input.scrollHeight+'px';
        }
   }">
   <div> {{$test}} </div>

    <div>
        <img class="photoprofil"
                src="{{Storage::url('users/'.auth()->user()->id.'/avatar\/'.auth()->user()->photoprofil)}}"
                alt="">
    </div>
    <div class="text-center"> {{auth()->user()->name}} </div>
    <div class="text-center"> <span>@</span> {{auth()->user()->pseudo}}  </div>
    <div class="text-center">
        <a href="">Voir le profil</a>
    </div>

    <div class="entete text-center">
        <span class="iconNav parentIcon">
            <i class="bi bi-pencil" x-on:click="form = ! form"></i>
            <div class="explicatifIcon"> <span>Modifier la bio </span> </div>   
        </span>  
        <a href="{{route('profil', 'settings' )}}" class="bar" wire:navigate >
            <span class="iconNav parentIcon">
            <i class="bi bi-gear"></i>
            <div class="explicatifIcon"> <span>Paramètres </span> </div>   
        </span>  
        
        </a>      
              
    </div>
    

    <form wire:submit="update" > 
 
    <div class="text-center">        
  {{--       <div> 
            <input :class="form ? '' : 'formDataInput'" type="text" wire:model="name" /> 
            <div>@error('name') {{ $message }} @enderror</div>
        </div>
        <div> 
            <input :class="form ? '' : 'formDataInput'" type="text" wire:model.live="pseudo" /> 
            <div>@error('pseudo') {{ $message }} @enderror</div>   
        </div> --}}

    
        <div> 
            <div x-show="!form">
                <div>{{auth()->user()->bio}}</div>
            </div>
            <div x-show="form">
                <textarea style="resize:none;"   type="text" wire:model="bio" ></textarea> 
            </div>
            
        </div>
        {{-- <textarea style="resize:none;" :class="form ? '' : 'formDataInput'" x-init="updateTextareaHeight( $el );" type="text" wire:model="bio" ></textarea> 
 --}}
        
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