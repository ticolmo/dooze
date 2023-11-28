<div class="listeDeroulante" x-data="{ open: false}">
    <div style="position: relative">
      <div id="selectionListe" @click="open = ! open" style="text-align:right;">{{$selection}} <i class="bi bi-chevron-down"></i></div>
      <div id="timezoneListe" x-show="open"  @click.outside="open = false">
        @foreach ($tableau as $key => $item)
            <div class="propositionListe"              
              key="{{$key}}" 
              data-id="{{$item}}"
              @click="$wire.change($event.target.getAttribute('data-id')); open = ! open" > {{$item}} </div>  
        @endforeach
      </div>
          
     
      
      
    </div>     
</div>