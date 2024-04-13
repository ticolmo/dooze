<div id="reseaux">
    @php
        use Embed\Embed;
        $xml = simplexml_load_file($fluxrs);
        $embed = new Embed();
        
    @endphp
    @foreach ( $xml->channel as $channel )
        @foreach ( $channel->item as $item )
           
            @if( strstr($item->link,"twitter") !== false)
                {{-- <div class="cadreTweet"> {!!$item->description!!}</div> --}}
                <div class="cadreTweet"> {!!$item->description!!}</div>
                <div>sadfsa</div>
                

            @elseif( strstr($item->link,"instagram") !== false)
                <div class="cadreInsta">
                    <div class="enteteInsta">
                        <div class="cadreLogoInsta"> <img class="logoInsta" src="{{Storage::url('divers/instagram.png')}}" alt="">
                        </div>
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

            @elseif( strstr($item->link,"facebook") !== false)
                <div class="cadreInsta">
                    
                </div>

            @endif


        @endforeach
    @endforeach

    <script>
        $(document).ready(function() {
            /* find all iframes with ids starting with "tweet_" */
            $("iframe[id^='twitter-widget']").load(function() {
                this.contentWindow.postMessage({ element: this.id, query: "height" },
                    "https://platform.twitter.com");
            });
        });

        /* listen for the return message once the tweet has been loaded */
        $(window).bind("message", function(e) {
            var oe = e.originalEvent;
            if (oe.origin != "https://platform.twitter.com")
                return;
            
            if (oe.data.height && oe.data.element.match(/^twitter-widget/))
                $("#" + oe.data.element).css("height", parseInt(oe.data.height) + "px");
        });
    </script>
    
</div>