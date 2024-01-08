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
                @php
                    $lien = $item->link;
                    $info = $embed->get($item->link);
                    $height = $info->code->height;          
                    // Extraction des entiers
                    preg_match_all('/\b\d+\b/', $lien, $matches);
                    // Affichage des entiers extraits
                    foreach ($matches[0] as $value) {
                    $idtweet = $value;
                    };
                    $url= "http://dooze.test:8089/club/servettefc/?page=socialmedia";
                    $string = htmlentities($url);
                    $bar = mb_convert_encoding($string, "ASCII");
                    $ido = uniqid();

                @endphp
                <div class="cadreTweet">
                   {{--  {!!$item->description!!} --}}
                    <iframe id="twitter-widget-{{$ido}}" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true"
                    class="iframe"
                    style="position: static; visibility: visible; width: 550px; display: block; flex-grow: 1;"
                    title="X Post"
                    src="https://platform.twitter.com/embed/Tweet.html?dnt=false&amp;embedId=twitter-widget-0&amp;features=eyJ0ZndfdGltZWxpbmVfbGlzdCI6eyJidWNrZXQiOltdLCJ2ZXJzaW9uIjpudWxsfSwidGZ3X2ZvbGxvd2VyX2NvdW50X3N1bnNldCI6eyJidWNrZXQiOnRydWUsInZlcnNpb24iOm51bGx9LCJ0ZndfdHdlZXRfZWRpdF9iYWNrZW5kIjp7ImJ1Y2tldCI6Im9uIiwidmVyc2lvbiI6bnVsbH0sInRmd19yZWZzcmNfc2Vzc2lvbiI6eyJidWNrZXQiOiJvbiIsInZlcnNpb24iOm51bGx9LCJ0ZndfZm9zbnJfc29mdF9pbnRlcnZlbnRpb25zX2VuYWJsZWQiOnsiYnVja2V0Ijoib24iLCJ2ZXJzaW9uIjpudWxsfSwidGZ3X21peGVkX21lZGlhXzE1ODk3Ijp7ImJ1Y2tldCI6InRyZWF0bWVudCIsInZlcnNpb24iOm51bGx9LCJ0ZndfZXhwZXJpbWVudHNfY29va2llX2V4cGlyYXRpb24iOnsiYnVja2V0IjoxMjA5NjAwLCJ2ZXJzaW9uIjpudWxsfSwidGZ3X3Nob3dfYmlyZHdhdGNoX3Bpdm90c19lbmFibGVkIjp7ImJ1Y2tldCI6Im9uIiwidmVyc2lvbiI6bnVsbH0sInRmd19kdXBsaWNhdGVfc2NyaWJlc190b19zZXR0aW5ncyI6eyJidWNrZXQiOiJvbiIsInZlcnNpb24iOm51bGx9LCJ0ZndfdXNlX3Byb2ZpbGVfaW1hZ2Vfc2hhcGVfZW5hYmxlZCI6eyJidWNrZXQiOiJvbiIsInZlcnNpb24iOm51bGx9LCJ0ZndfdmlkZW9faGxzX2R5bmFtaWNfbWFuaWZlc3RzXzE1MDgyIjp7ImJ1Y2tldCI6InRydWVfYml0cmF0ZSIsInZlcnNpb24iOm51bGx9LCJ0ZndfbGVnYWN5X3RpbWVsaW5lX3N1bnNldCI6eyJidWNrZXQiOnRydWUsInZlcnNpb24iOm51bGx9LCJ0ZndfdHdlZXRfZWRpdF9mcm9udGVuZCI6eyJidWNrZXQiOiJvbiIsInZlcnNpb24iOm51bGx9fQ%3D%3D&amp;frame=false&amp;hideCard=false&amp;hideThread=false&amp;id={{$idtweet}}&amp;lang=en&amp;origin=https%3A%2F%2Fpublish.twitter.com%2F%23&amp;sessionId=f62726386d512733ea0f47da7e04f9b110a16f79&amp;theme=light&amp;widgetsVersion=2615f7e52b7e0%3A1702314776716&amp;width=550px"
                    data-tweet-id="{{$idtweet}}"></iframe>
                   
                </div>

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