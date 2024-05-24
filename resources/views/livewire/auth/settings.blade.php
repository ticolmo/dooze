<div id="settings" x-data="{ 
            account: '{{ __("My Account") }}',
            notifications: 'Notifications',
            info: 'Informations du compte',
            password: 'Modification de mot de passe',
            annulation: 'Suppression de compte',
         }" style="position:fixed;top:0;width:55%;height:100%;z-index:9;">

    <div id="menuSettings">
        @if (!empty($section))
            <div > 
                <a wire:navigate.hover class="bar" href="{{route('profil', 'settings').$precedentNiveau}}">
                    <i class="bi bi-arrow-left"></i>
                    <span>
                        @if (in_array($section, $niveauAccount))
                            <i class="bi bi-person"></i>
                        @elseif(in_array($section, $niveauNotif))
                            <i class="bi bi-bell"></i>
                        @endif
                        <span x-text="{{$section}}"></span>   
                    </span>                    
                </a>      
            </div>
        @else
            Paramètres 
        @endif
        <a wire:navigate.hover class="bar " href="{{route('profil')}}" >
            <button type="button" class="btn-close closeSettings" aria-label="Close" style=""></button>
        </a>            
    </div>  

    {{-- niveau 1 --}}
    @if($section == '')
        <div class="choiceSection" wire:click="changeSection('account')"> 
            <i class="bi bi-person"></i>
            <div x-text="account"></div>
            <i class="bi bi-chevron-right"></i>
        </div>            
        <div class="choiceSection" wire:click="changeSection('notifications')"> 
            <i class="bi bi-bell"></i>
            <div x-text="notifications"></div>
            <i class="bi bi-chevron-right"></i>
        </div>   

    {{-- niveau 2.1 --}}       
    @elseif ($section == 'account')
        <div class="choiceSection" wire:click="changeSection('info')"> 
            <div x-text="info"></div>
            <i class="bi bi-chevron-right"></i>
        </div>    
        <div class="choiceSection" wire:click="changeSection('password')"> 
            <div x-text="password"></div>
            <i class="bi bi-chevron-right"></i>
        </div>    
        <div class="choiceSection" wire:click="changeSection('annulation')"> 
            <div x-text="annulation"></div>
            <i class="bi bi-chevron-right"></i>
        </div>   

        {{-- niveau 2.1.1 --}} 
        @elseif ($section == 'info')
            <x-auth.settings part="info" /> {{-- <x-auth.settings.info />--}}
        {{-- niveau 2.1.2 --}} 
        @elseif ($section == 'password')
            <x-auth.settings part="password" /> {{-- <x-auth.settings.password />--}}
        {{-- niveau 2.1.3 --}} 
        @elseif ($section == 'annulation')
            <x-auth.settings part="annulation" /> {{-- <x-auth.settings.annulation />--}}

    
    {{-- niveau 2.2 --}}  
    @elseif ($section == 'notifications')
        <div>
            notifications
        </div>

    
    
    @endif
    
    <div>
        <div></div>
        <div></div>
    </div>
</div>
