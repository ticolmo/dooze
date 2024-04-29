
<div x-data="{ open: true }" x-cloak >

    <div id="don" x-bind:class="open ? 'animate__animated animate__fadeInDown animate__delay-20s' : 'animate__animated animate__fadeOutUp'" >
        <a href="{{route('don')}}" class="">
            Vous appréciez Dooze ! Faites un don ! Dooze fonctionne uniquement par don.
            <button class="btn btn-primary rounded-pill"> PayPal</button>
        </a>

        <div>
            <button type="button" id="closeDon" class="btn-close" aria-label="Close" x-on:click="open = ! open"></button>
        </div>     
    
    </div>


</div>
