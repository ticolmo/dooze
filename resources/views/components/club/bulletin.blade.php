<div>
      <div class="logo">        
        <a href="{{$siteofficiel}}" target="_blank">
          <img class="logo1" src="{{Storage::url('logos/'.$nom.'.png')}}" alt="">
        </a>
      </div>
      <div id="infoclub">
        <span id="clickSite"> 
          <a href="{{$siteofficiel}}" target="_blank"> Site du club </a>
          <div id="site_officiel">
            <a href="{{$siteofficiel}}" target="_blank">
              {{(substr($siteofficiel,8))}}
            </a>
          </div>
        </span>
        <span> Billeterie officiel</span>
        <audio id="chant" src="{{Storage::url('audio/'.$nom.' Audio.mp3')}}" autoplay controls></audio>
      </div>
      
      <div class="infot">
        {{-- composant tableau des scores --}} 
        <livewire:scores.tableau-scores-club :$scoreshomme :$scoresfemme lazy="on-load" /> 
      </div>
     
</div>