<div x-data="{ 
            compte: '{{ __("My Account") }}',
            notif: 'Notifications',
         }">

    <div id="titre" style="background-color: blue"> {{$titre}} </div>
    @if($section == '')
        <div>
            <div @click="$wire.changeSection(compte, 'account')" x-text="compte"></div>
            <div @click="$wire.changeSection(notif, 'notif')" x-text="notif"></div>
        </div>  
    @endif
    
    
    @if ($section == 'account')
        <div>
            <div>Informations du compte</div>
            <div>Modification de mot de passe</div>
        </div>
    @endif
    @if ($section == 'notif')
        <div>
            notif
        </div>
    @endif
    
    <div>
        <div></div>
        <div></div>
    </div>
</div>
