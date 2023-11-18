<div class="listeDeroulante" x-data="{ open: false}">
    <div>
      <div id="selectionListe" @click="open = ! open" > Fuseau horaire: {{$selection}} </div>
      <div style="display:none" x-show="open" @click.outside="open = false">
        @foreach ($tableau as $key => $item)
            <div class="propositionListe" 
              key="{{$key}}" 
              data-id="{{$item}}"
              @click="$wire.change($event.target.getAttribute('data-id')); open = ! open" > {{$item}} </div>  
        @endforeach
      </div>
          
     
      
      
    </div>     
</div>