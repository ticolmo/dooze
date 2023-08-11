@php


use Vedmant\FeedReader\Facades\FeedReader;

/* lecteur de flux RSS */
$items = FeedReader::read($flux);

/* dd($items)  */  
@endphp

@foreach ($items->get_items(0, $items->get_item_quantity()) as $item)

    <a href="{{ $item->get_link() }}" class="blog" target="_blank">
        <img src="{{ $item->get_enclosure()->get_link()}}" onerror="this.onerror=null;this.src='{{Storage::url('logos/'.$nom.'.png')}}';this.style.width='50%'; this.style.height='auto';" alt="">
        <div class="article">
            <span>{{ ($item->get_title()) }}</span>
            <br>
            <span class="creator"> {{ ($item->get_author()->get_name())." ".$item->get_date("d.m.Y H:i") }} </span>
        </div>


    </a>

@endforeach

