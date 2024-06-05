<div id="bulletinClub" class="noMobile">
      <div class="logo">        
        <a href="{{$siteofficiel}}" target="_blank">
          <img class="logo1" src="{{Storage::url('logos/'.$nom.'.png')}}" alt="">
        </a>
      </div>
      <div id="infoclub">
        <div id="nomClub">
          {{$nom}}
        </div>
        <div id="clickSite"> 
          <a href="{{$siteofficiel}}" target="_blank"> Site web </a>
          <div id="site_officiel">
            <a href="{{$siteofficiel}}" target="_blank">
              {{(substr($siteofficiel,8))}}
            </a>
          </div>
        </div>
        <div> Billeterie officiel</div>
        
        
      </div>
      
      <div class="infot">
        {{-- composant tableau des scores --}} 
        {{-- <livewire:scores.tableau-scores-club :$scoreshomme :$scoresfemme lazy="on-load" />  --}}
      </div>
      <br>
      @if($chant)
       <div id="chant" class="essential_audio" data-url="{{Storage::url('audio/'.$nom.' Audio.mp3')}}" ></div>   
      @endif
      
     
</div>