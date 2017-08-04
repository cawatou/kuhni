@extends('front.panel')
@section('meta_tags')
<title>{{$item->meta_title}}</title>
<meta name="keywords" content="{{$item->meta_keywords}}" />
<meta name="description" content="{{$item->meta_description}}" />
<meta name="robots" content="index,follow" />
<script>
    function load(){
        var body = document.getElementsByTagName('body')[0];
        body.className = 'specialist';
        body.id = 'main';
    }
    window.onload = function () {
        load();
    }
</script>
@stop
@section('content')
    <div class="row main_slider_block">
        <div class="col-md-8 main_slider">
            <ul class="slides">
                @foreach($item->slides()->orderBy('pos', 'ASC')->get() as $slide)
                <li>
                    <img src="/files/slides/{{$slide->image}}" alt="">
                </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-4 user_info">
            <div class="row">
                <div class="col-md-12">
                    <div class="img_block">
                        <img src="/files/designers/{{$item->main_img}}" alt="">
                    </div>
                    <div class="interer_author_name">
                        <a class="h3" href="">{{$item->name}}</a>
                        <p>{{$item->position}}</p>
                        <p class="phone_author">{{$item->phones}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="user_text">
                        <div>
                            <p>{{$item->description}}</p>
                        </div>
                    </div>
                    <div class="link_progect">
                        <div class="map_icon">
                            <svg x="0px" y="0px"
	 viewBox="0 0 34 48" enable-background="new 0 0 34 48" xml:space="preserve">
<g id="pin">
	<g>
		<path fill-rule="evenodd" clip-rule="evenodd" fill="#BD8669" d="M17,0C8.2,0,0,7.2,0,16c0,14,12,32,17,32c5.9,0,17-19,17-32
			C34,7.2,25.8,0,17,0z M17,46c-1,0-4.6-2.9-8.6-9.8C4.4,29.4,2,21.8,2,16C2,8.5,9,2,17,2s15,6.5,15,14c0,5.6-2.3,13-6,19.9
			C21.9,43.3,18.3,46,17,46z M17,10c-3.3,0-6,2.7-6,6c0,3.3,2.7,6,6,6c3.3,0,6-2.7,6-6C23,12.7,20.3,10,17,10z M17,20
			c-2.2,0-4-1.8-4-4c0-2.2,1.8-4,4-4s4,1.8,4,4C21,18.2,19.2,20,17,20z"/>
	</g>
</g>
</svg>
                        </div>
                        @if($item->studio)
                        <div class="address_progect">
                            <a href="http://{{$item->studio->url}}.{{config('app.url')}}">{{$item->studio->name}}</a>, <span class="bold">{{$item->studio->city}}</span><br>
                            {{$item->studio->address}}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="text_block" class="text_block">
        <div class="container">
            <div class="row">
                <div class="dot">
                    <svg x="0px" y="0px"
         viewBox="0 0 533.9 351.4" enable-background="new 0 0 533.9 351.4" xml:space="preserve">
    <g>
        <path d="M176.4,0v27.9c-40,20.9-68.6,42.7-85.8,65.4s-25.9,47.4-25.9,74.2c0,15.9,2.3,26.8,6.8,32.7
            c4.1,6.4,9.1,9.5,15,9.5s13.8-1.7,23.8-5.1s19.1-5.1,27.2-5.1c18.6,0,34.8,6.9,48.7,20.8c13.8,13.8,20.8,30.8,20.8,50.7
            c0,21.8-8.4,40.5-25.2,56.2s-37.7,23.5-62.7,23.5c-30.4,0-57.9-13.2-82.4-39.5C12.3,284.9,0,252.4,0,213.8
            c0-45.4,15.1-87.7,45.3-127S119.2,18.6,176.4,0z M501.2,2v25.9c-45.9,26.3-76,49.9-90.6,70.8s-21.8,45.4-21.8,73.5
            c0,12.7,2.5,22.2,7.5,28.6s10.2,9.5,15.7,9.5c5,0,12.5-1.8,22.5-5.4c10-3.6,20-5.4,30-5.4c18.6,0,34.8,6.7,48.7,20.1
            c13.8,13.4,20.8,29.8,20.8,49.4c0,22.2-8.7,41.5-26.2,57.9c-17.5,16.3-38.9,24.5-64.4,24.5c-30,0-57-12.9-81-38.8
            c-24.1-25.9-36.1-58.1-36.1-96.7c0-47.7,15.2-91.1,45.6-130.4S445.4,18.4,501.2,2z"/>
    </g>
    </svg>
                </div>
                <div class="text_block_text">
                    <div class="h3">Дизайн интерьера - это совокупность эстетики и эргономики</div>
                    <p>Дизайнер управляет всем процессом оформления интерьера, начиная планировкой помещения,
                        освещения, систем вентиляции, акустикой; отделкой стен; и заканчивая размещением мебели
                        и установкой навигационных знаков.</p>
                    <button class="button"  data-toggle="modal" data-target="#write_to_us">Написать дизайнеру</button>
                </div>
            </div>
        </div>
    </div>
    <div class="count_number">
        <div class="container">
            <div class="row">
                @foreach($item->counters as $cnt)
                <div class="col-md-4"><span class="number" data-from="0" data-to="{{$cnt->value}}" data-speed="2000">{{$cnt->value}}</span><span class="count_text">{{$cnt->name}}</span></div>
                @endforeach
            </div>
        </div>
    </div>
    {{--*/ $desstudio = $item->studio /*--}}
    @if($desstudio)
    {{--*/ $projects = $item->collections()->where('published', 1)->get() /*--}}
    @endif
    @if(isset($projects) && count($projects) > 0)
    <div id="collection" class="collection">
        <div class="container">
            <div class="row head_block">
                <div class="col-md-12">
                    <div class="number_block">01</div>
                    <div class="name_modal">
                        <div class="h2">{{$item->h1_tag}}</div>
                        <a href="http://{{$item->studio->url}}.{{config('app.url')}}">Смотреть все проекты студии</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide_block">
            <div class="container">
                <button type="button" class="close">
                    <svg x="0px" y="0px"
	 viewBox="0 0 45 45" enable-background="new 0 0 45 45" xml:space="preserve">
<g id="cross">
	<g>
		<polygon fill-rule="evenodd" clip-rule="evenodd" fill="#BD8669" points="45,1.4 43.6,0 22.5,21.1 1.4,0 0,1.4 21.1,22.5 0,43.6
			1.4,45 22.5,23.9 43.6,45 45,43.6 23.9,22.5 		"/>
	</g>
</g>
</svg>
                </button>
                <div class="row append_gallery"></div>
            </div>
        </div>
        <div class="gallery_block">
            <div class="container">
                <div class="row active" data-id="1">
                    <div>
                    {{--*/ $rid = 1 /*--}}
                    {{--*/ $i = 0 /*--}}
                    {{--*/ $p = 0 /*--}}
                    @foreach($projects as $example)
                    @if($i == 6)
                    {{--*/ $i = 1 /*--}}
                    {{--*/ $rid++ /*--}}
                    <div class="clear"></div></div></div><div class="row" data-id="{{$rid}}"><div>
                    @endif
                    @if($p == 3)
                    {{--*/ $p = 0 /*--}}
                    <div class="clear"></div></div><div>
                    @endif
                        <div class="col-md-4">
                            {{--*/ $images = $example->images()->orderBy('is_default', 'DESC')->orderBy('pos', 'ASC')->get(); /*--}}
                            <a href="" class="gallery_photo">
                                @if(isset($images[0]))
                                    <?php
                                    $size = getimagesize('files/collections/'.$images[0]->value);
                                    $class='max_width';
                                    if($size[0]<$size[1]){
                                        $class='min_width';
                                    }
                                    ?>
                                <img class="{{$class}}" src="/files/collections/{{$images[0]->value}}" alt="">
                                @endif
                                <div class="gallery_photo_text"><span>{{$example->name}}<br>{{date('Y-m-d', strtotime($example->publish_date))}}</span></div>
                            </a>
                            <div class="gallery_content">
                                <div class="col-md-8">
                                    <div class="gallery_slider">
                                        <ul class="slides">
                                            @foreach($images as $image)
                                                <li>
                                                    <a rel="group1" href="/files/collections/{{$image->value}}">
                                                        <img src="/files/collections/{{$image->value}}" alt="">
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="thumbnail_slide">
                                        <ul class="slides">
                                            @foreach($images as $image)
                                            <li><img src="/files/collections/{{$image->value}}" alt=""></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4 gallery_text_block">
                                    <div class="h3">{{$example->name}}</div>
                                    <div class="gallery_text">{!!$example->description!!}</div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    {{--*/ $i++ /*--}}
                    {{--*/ $p++ /*--}}
                    @endforeach
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="paginate">
                    <ul>
                        @for($i = 1; $i <= $rid; $i++)
                        <li><a @if($i == 1) class="active" @endif data-id="{{$i}}">{{$i}}</a></li>
                        @endfor
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif
    {{--*/ $reviews = $item->reviews()->orderBy('created_at', 'DESC')->get() /*--}}
    @if(count($reviews) > 0)
    <div id="news" class="news">
        <div class="container">
            <div class="row head_block">
                <div class="col-md-12">
                    <div class="number_block">04</div>
                    <div class="h2">ОТЗЫВЫ</div>
                    <button class="button pull-right" data-toggle="modal" data-target="#review">Оставить отзыв</button>
                </div>
            </div>
        </div>
        <div class="container news_inner">
            <div class="row active" data-id="1">
                {{--*/ $rid = 1 /*--}}
                {{--*/ $i = 0 /*--}}
                {{--*/ $p = 0 /*--}}
                @foreach($reviews as $review)
                @if($i == 4)
                {{--*/ $i = 1 /*--}}
                {{--*/ $rid++ /*--}}
                </div><div class="row" data-id="{{$rid}}">
                @endif
                <div class="row news_block">
                    <div class="col-md-12">
                        <div class="date">
                           <!-- {{date('Y/m/d', strtotime($review->created_at))}} -->
                        </div>
                        <div class="news_head">
                            <svg x="0px" y="0px"
	 viewBox="0 0 44 48" enable-background="new 0 0 44 48" xml:space="preserve">
<g id="user">
	<g>
		<path fill-rule="evenodd" clip-rule="evenodd" fill="#BD8669" d="M28.5,28.7c3.9-4,6.5-10.9,6.5-15.7c0-7.2-5.8-13-13-13
			S9,5.8,9,13c0,4.8,2.6,11.6,6.5,15.7C5.9,30.6,0,37.1,0,48h44C44,37.1,38.1,30.6,28.5,28.7z M11,13c0-6.1,4.9-11,11-11
			s11,4.9,11,11c0,4.8-3,12-7,15.3c-1.3,1.1-2.7,1.7-4,1.7s-2.8-0.6-4-1.7C14,25,11,17.8,11,13z M17.4,30.4c1.4,1,3,1.6,4.6,1.6
			c1.6,0,3.2-0.6,4.6-1.6c8.3,1.2,14.6,5.9,15.3,15.7H2.1C2.8,36.2,9.1,31.6,17.4,30.4z"/>
	</g>
</g>
</svg>
                            <div class="h4">
                                {{$review->name}}
                            </div>
                            <span>+</span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="news_text">
                            <p>{{$review->content}}</p>
                        </div>
                    </div>
                </div>
                {{--*/ $i++ /*--}}
                @endforeach
            </div>
            <div class="paginate">
                <ul>
                    @for($i = 1; $i <= $rid; $i++)
                    <li><a @if($i == 1) class="active" @endif data-id="{{$i}}">{{$i}}</a></li>
                    @endfor
                </ul>
            </div>
        </div>
    </div>
    @endif
    <input type="hidden" id="studio_url" value="{{$item->studio->url}}">
@stop