<div class="sectionGif">

   <div class="boxGif" @click.outside="$wire.close()">
        <div> 
            <span wire:click='close'> <i class="bi bi-x-circle-fill"></i>
            </span><input type="text" wire:model='search' id="barfoo">
        </div>
        <div class="gifs">
            @foreach ($gifs as $gif)
            <span> 
                <img class="gif" src="{{$gif['images']['fixed_height']['url']}}" wire:click='close' alt="" draggable="false">
            </span>
                
            @endforeach
        </div>

   </div>

   <script>
    let gif = document.querySelector(".gif");

    gif.addEventListener("click", function (e){
    const giphy = e.currentTarget.value
    const img = document.createElement('img');
    img.innerHTML = giphy
    const selectgif = img.querySelector('img')
    const preview = document.getElementById('#previewCommentaire')
    preview.appendChild(selectgif)

    });
</script>

</div>
