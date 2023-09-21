        @auth
            @if (auth()->user()->club_id == $idclub)
                @if ($attributes->has('submit'))
                <div class="btn btn-outline-secondary" id="soumettre" data-id="{{$form}}" type="submit">{{$slot}}</div>
                @else
                    <a {{$href}} class="w-20 btn btn-lg btn-primary" style="margin-bottom: 16px"> {{$slot}} </a> 
                @endif
            @else
                {{-- si fan autre club --}}
                @if ($attributes->has('submit'))
                <div class="btn btn-outline-secondary" id="soumettre" data-id="{{$form}}" type="submit">{{$slot}}</div>
                @else
                    @php
                        $modalid = uniqid();
                    @endphp
                    
                    <div class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#fanautreclub{{$modalid}}"> {{$slot}} </div>
                    
                    <x-modals.fanautreclub>
                        {{$modalid}}  
                    </x-modals.fanautreclub>
                @endif
                
                
            @endif  
        @endauth
                
        @guest
            {{-- si visiteurs --}}
            @php
                $modalid = uniqid();
            @endphp        
            
            <div class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#connex{{$modalid}}"> {{$slot}} </div>
            <x-modals.connexion>           
                {{$modalid}}           
            </x-modals.connexion>
        @endguest