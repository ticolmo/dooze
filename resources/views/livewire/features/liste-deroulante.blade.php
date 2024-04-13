<div class="listeDeroulante" x-data="{ open: false}" >
    <div style="position: relative">
      <div id="selectionListe" @click="open = ! open" > {{$selection}} <i class="bi bi-chevron-down"></i></div>
      <div 
        id="timezoneListe" 
        style="
        position:absolute;
        z-index:10;
        background-color:white;
        height: 350px;
        overflow-y: scroll;
        scrollbar-width: auto;"

        x-show="open"  @click.outside="open = false">
        @foreach ($tableau as $key => $item)
            <div class="propositionListe"              
              key="{{$key}}" 
              data-id="{{$item}}"
              @if ($item == $selection)
                 style="background-color: gray;color:white" 
              @endif
              @click="$wire.change($event.target.getAttribute('data-id')); open = ! open" > {{$item}} </div>  
        @endforeach
      </div>
          
     
      
      
    </div>     
</div>