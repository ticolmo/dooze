<div class="actublog">
    @foreach ( $xml->channel as $channel )
        @foreach ( $channel->item as $item )
        <a href="{{ $item->link }}"target="_blank">
            <div class="creatorMobile">{{($item->children('dc', true)->creator)}}</div>
            <div class="blog" 
                {{-- style="background-image:url('{{$item->enclosure['url']}}');background-size: cover;background-position: center bottom;" --}}
                >
                    <div class="imageArticle">
                        <img referrerpolicy="no-referrer" loading="lazy" draggable="false"
                            onerror="this.src.indexOf('https://') === 0 ? this.src=this.src.replace('https://', 'http://') : this.style.display='none'"
                            src="{{$item->enclosure['url']}}">
                    </div>

                    
                    <div class="article">
                        <span class="creatorDesktop">{{($item->children('dc', true)->creator)}}</span>
                        <br class="firstBr">
                        <span class="titre">{{ ($item->title) }}</span>
                        <br>
                        <span class="creator"> {{ $item->pubDate }} </span>
                    </div>


            

            </div> 
        </a>
        <hr>
        @endforeach
    @endforeach

</div>