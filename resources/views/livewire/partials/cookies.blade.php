<div x-data="{ open: true }" x-cloak>
    @if($show)
        <div id="cookies" x-bind:class="open ? 'animate__animated animate__fadeInUp' : 'animate__animated animate__fadeOutDown'" >
            <div >
                Pour vous offrir la meilleure expérience possible, nous utilisons des cookies et des technologies similaires. Certains cookies sont nécessaires au fonctionnement de notre site Internet et ne peuvent être refusés. <br>
                <ul>
                    <li>Vous pouvez accepter ou refuser l'utilisation de cookies supplémentaires, que nous utilisons uniquement à des fins statistiques.</li>
                    <li>Dooze ne vend pas et n'utilise pas ces données à des fins de marketing et de publicité.</li>
                    <li>Vous pouvez à tout moment modifier vos choix </li>
                </ul>
              
            </div>
            <div>
                <button type="button" class="btn btn-primary" x-on:click="$wire.close('consentement'); open = ! open">Accepter</button>
                <button type="button" class="btn btn-primary" x-on:click="$wire.close('refus'); open = ! open">Refuser</button>
            </div>       
        
        </div>
    @endif

</div>
