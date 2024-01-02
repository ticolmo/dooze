<div id="reseaux">

    @php
        $xml = simplexml_load_file($fluxrs);
    @endphp

    @foreach ( $xml->channel as $channel )
        @foreach ( $channel->item as $item )
         <iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true" class="" style="position: static; visibility: visible; width: 550px; height: 274px; display: block; flex-grow: 1;" title="X Post" src="https://platform.twitter.com/embed/Tweet.html?dnt=false&amp;embedId=twitter-widget-0&amp;features=eyJ0ZndfdGltZWxpbmVfbGlzdCI6eyJidWNrZXQiOltdLCJ2ZXJzaW9uIjpudWxsfSwidGZ3X2ZvbGxvd2VyX2NvdW50X3N1bnNldCI6eyJidWNrZXQiOnRydWUsInZlcnNpb24iOm51bGx9LCJ0ZndfdHdlZXRfZWRpdF9iYWNrZW5kIjp7ImJ1Y2tldCI6Im9uIiwidmVyc2lvbiI6bnVsbH0sInRmd19yZWZzcmNfc2Vzc2lvbiI6eyJidWNrZXQiOiJvbiIsInZlcnNpb24iOm51bGx9LCJ0ZndfZm9zbnJfc29mdF9pbnRlcnZlbnRpb25zX2VuYWJsZWQiOnsiYnVja2V0Ijoib24iLCJ2ZXJzaW9uIjpudWxsfSwidGZ3X21peGVkX21lZGlhXzE1ODk3Ijp7ImJ1Y2tldCI6InRyZWF0bWVudCIsInZlcnNpb24iOm51bGx9LCJ0ZndfZXhwZXJpbWVudHNfY29va2llX2V4cGlyYXRpb24iOnsiYnVja2V0IjoxMjA5NjAwLCJ2ZXJzaW9uIjpudWxsfSwidGZ3X3Nob3dfYmlyZHdhdGNoX3Bpdm90c19lbmFibGVkIjp7ImJ1Y2tldCI6Im9uIiwidmVyc2lvbiI6bnVsbH0sInRmd19kdXBsaWNhdGVfc2NyaWJlc190b19zZXR0aW5ncyI6eyJidWNrZXQiOiJvbiIsInZlcnNpb24iOm51bGx9LCJ0ZndfdXNlX3Byb2ZpbGVfaW1hZ2Vfc2hhcGVfZW5hYmxlZCI6eyJidWNrZXQiOiJvbiIsInZlcnNpb24iOm51bGx9LCJ0ZndfdmlkZW9faGxzX2R5bmFtaWNfbWFuaWZlc3RzXzE1MDgyIjp7ImJ1Y2tldCI6InRydWVfYml0cmF0ZSIsInZlcnNpb24iOm51bGx9LCJ0ZndfbGVnYWN5X3RpbWVsaW5lX3N1bnNldCI6eyJidWNrZXQiOnRydWUsInZlcnNpb24iOm51bGx9LCJ0ZndfdHdlZXRfZWRpdF9mcm9udGVuZCI6eyJidWNrZXQiOiJvbiIsInZlcnNpb24iOm51bGx9fQ%3D%3D&amp;frame=false&amp;hideCard=false&amp;hideThread=false&amp;id=1742053284825669864&amp;lang=en&amp;origin=https%3A%2F%2Fpublish.twitter.com%2F%23&amp;sessionId=a81a157cf2c306451c93ccbaeb88d2621ea900f5&amp;theme=light&amp;widgetsVersion=2615f7e52b7e0%3A1702314776716&amp;width=550px" data-tweet-id="1742053284825669864"></iframe>

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