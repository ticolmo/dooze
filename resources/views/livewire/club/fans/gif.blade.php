<div class="sectionGif">

   <div class="boxGif" @click.outside="$wire.close()">
        <div> 
            <span wire:click='close'> <i class="bi bi-x-circle-fill"></i>
            </span><input type="text" wire:model='search' id="barfoo">
        </div>
        <div class="gifs">
            @foreach ($gifs as $gif)
            <span> 
                <img class="gif" src="{{$gif['images']['fixed_height']['url']}}" wire:click="choixGif('{{$gif['images']['fixed_height']['url']}}')" wire:key="{{$gif['id']}}"  alt="" draggable="false">
            </span>
                
            @endforeach
        </div>

   </div>


</div>
