<div>
   <div>
    <div> 
        <span> <i class="bi bi-x-circle-fill"></i>
        </span><input type="text" wire:model='search'>
    </div>
    <div>
        @foreach ($gifs as $gif)
        <span> 
            <img src="" alt="">
        </span>
            
        @endforeach
    </div>

   </div>
</div>
