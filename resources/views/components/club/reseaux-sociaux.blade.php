<div id="reseaux">
    @foreach ( $xml->channel as $channel )
        @foreach ( $channel->item as $item )

            <div class=""></div>

            @if( strstr($item->link,"twitter") !== false)
           <div class="cadreTweet"> {!!$item->description!!}</div> 
            
            @elseif( strstr($item->link,"instagram") !== false)
            <div class="cadreInsta">
                <div class="enteteInsta">
                    <div class="cadreLogoInsta"> <img class="logoInsta" src="{{Storage::url('divers/instagram.png')}}" alt=""> </div>
                    <span class="creatorDesktop">{{($item->children('dc', true)->creator)}}</span>
                </div>        
                <div class="imageInsta">            
                    <img referrerpolicy="no-referrer" loading="lazy" draggable="false" src="{{$item->enclosure['url']}}">
                </div>
                
                <div class="detailInsta">
                    <span class="titre">{{ ($item->title) }}</span>
                    <br>
                    <span class="creator"> {{ $item->pubDate }} </span>
                </div>   
                </div>
                      
            @endif
           

        @endforeach
    @endforeach
</div>