<div>
    <div> Date de naissance</div>
    <select name="day" wire:model.live="day">
        @php
            $count = 32;
        @endphp
        @for ($i = 1; $i < $count; $i++)
            @php
                if ($i >= 1 && $i <= 9) {
                    $i = 0 . $i;
                    
                }
            @endphp
         <option value="{{$i}}">{{$i}}</option>   
        @endfor
        
    </select>
    <select id="month" wire:model.live="month" >
        <option value="">Sélectionnez un mois</option>
        <option value="01">Janvier</option>
        <option value="02">Février</option>
        <option value="03">Mars</option>
        <option value="04">Avril</option>
        <option value="05">Mai</option>
        <option value="06">Juin</option>
        <option value="07">Juillet</option>
        <option value="08">Août</option>
        <option value="09">Septembre</option>
        <option value="10">Octobre</option>
        <option value="11">Novembre</option>
        <option value="12">Décembre</option>
    </select>
    <select name="" wire:model.live="year">
        @php
            $count = 1912;
        @endphp
        @for ($i = 2023; $i > $count; $i--)
         <option value="{{$i}}">{{$i}}</option>   
        @endfor
        
    </select>
    <input type="hidden" name="birthday" type="date" value="{{$year}}-{{$month}}-{{$day}}">
</div>