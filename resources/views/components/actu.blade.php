<div>  
@foreach ( $xml->channel as $channel )   
    @foreach  ( $channel->item as $item )
        <a href="{{ $item->link }}" class="blog" target="_blank">              
        
        <img referrerpolicy="no-referrer" loading="lazy" onerror="this.src.indexOf('https://') === 0 ? this.src=this.src.replace('https://', 'http://') : this.style.display='none'" src="{{$item->enclosure['url']}}" >          
        <div class="article">
            <span>{{ ($item->title) }}</span>
            <br>
            <span class="creator"> {{ ($item->children('dc', true)->creator)." ".$item->pubDate }} </span>
        </div>


    </a>

    @endforeach
@endforeach

</div>