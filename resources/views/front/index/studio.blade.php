@extends('front.panel')
@section('meta_tags')
<title>{{$item->meta_title}}</title>
<meta name="keywords" content="{{$item->meta_keywords}}" />
<meta name="description" content="{{$item->meta_description}}" />
<meta name="robots" content="index,follow" />
@stop
@section('content')
    <div class="row main_slider_block">
        <div class="main_slider">
            <ul class="slides">
                @foreach($slides as $slide)
                <li>
                    <img src="/files/slides/{{$slide->image}}" alt="">
                    <div class="flex-caption">
                        <div class="h1">{{$slide->name}}</div>
                        <hr>
                        <p>{{$slide->description}}</p>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    @if(count($examples) > 0)
    <div id="collection" class="collection">
        <div class="container">
            <div class="row head_block">
                <div class="col-md-12">
                    <div class="number_block">01</div>
                    <div class="name_modal">
                        <div class="h2">{{$item->h1_tag}}</div>
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
                    @foreach($examples as $example)
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
                                                        <img class="img_slide" src="/files/collections/{{$image->value}}" alt="">
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
    {{--*/ $designers = $item->designers /*--}}
    @if(count($designers) > 0)
    <div id="design" class="design">
        @if($count_designers > 0)
            <div class="container">
                <div class="row head_block">
                    <div class="col-md-12">
                        <div class="number_block">02</div>
                        <div class="name_modal">
                            <div class="h2">Дизайнеры кухонь</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide_block_user">

            </div>

            <div class="container design_user">
                <div class="row active" data-id="1">
                    {{--*/ $rid = 1 /*--}}
                    {{--*/ $i = 0 /*--}}
                    @foreach($designers as $des)
                    @if($i == 3)
                    {{--*/ $i = 0 /*--}}
                    {{--*/ $rid++ /*--}}
                    </div><div class="row" data-id="{{$rid}}">
                    @endif
                    <div class="col-md-4">
                        <div class="design_author_main">
                            <div class="design_img">
                                <?if($des->bg_img):
                                    $size = getimagesize('files/designers/'.$des->bg_img);
                                    $class='max_width';
                                    if($size[0]<$size[1]){
                                        $class='min_width';
                                    }?>
                                    <img class="{{$class}}" src="/files/designers/{{$des->bg_img}}" alt="">
                                <?endif?>
                            </div>
                            <div class="design_author">
                                <div class="author_img">
                                    <img src="/files/designers/{{$des->main_img}}" alt="">
                                </div>
                                <div class="author_name">{{$des->name}}</div>
                            </div>
                            <div class="append_content">
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
                                    </div>
                                </div>
                                <div class="container">
                                    <button type="button" class="close">
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                             viewBox="0 0 45 45" enable-background="new 0 0 45 45" xml:space="preserve">
                                            <g id="cross">
                                                <g>
                                                    <polygon fill-rule="evenodd" clip-rule="evenodd" fill="#BD8669" points="45,1.4 43.6,0 22.5,21.1 1.4,0 0,1.4 21.1,22.5 0,43.6
                                                        1.4,45 22.5,23.9 43.6,45 45,43.6 23.9,22.5 		"/>
                                                </g>
                                            </g>
                                        </svg>
                                    </button>
                                    <div class="user_info">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="img_block">
                                                    <img src="/files/designers/{{$des->main_img}}" alt="">
                                                </div>
                                                <div class="interer_author_name">
                                                    <a class="h3" href="http://{{$des->url}}.{{config('app.url')}}">{{$des->name}}</a>
                                                    <p>{{$des->position}}</p>
                                                    <p class="phone_author">{{$des->phones}}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="count_number row">
                                                    {{--*/ $f = 0 /*--}}
                                                    @foreach($des->counters()->orderBy('pos', 'ASC')->get() AS $dcnt)
                                                    <div class="col-md-3 @if($f == 0) col-md-offset-3 @endif "><span data-speed="2000" data-to="{{$dcnt->value}}" data-from="0" class="number">{{$dcnt->value}}</span><span class="count_text">{{$dcnt->name}}</span></div>
                                                    {{--*/ $f++ /*--}}
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="user_text">
                                                    <div>
                                                        <p>{{$des->description}}</p>
                                                        <div class="gallery_user">
                                                            <ul class="slides">
                                                                <?$desprojects = $des->collections()->where('published', 1)->get()?>
                                                                @foreach($desprojects as $dcoll)
                                                                <?$dcolimages = $dcoll->images?>
                                                                <li class="design_author_block1">
                                                                    <a>
                                                                        @if(isset($dcolimages[0]))
                                                                        <img src="/files/collections/{{$dcolimages[0]->value}}" alt="" class="preview_img">
                                                                        @endif
                                                                    </a>
                                                                    <div class="slider_design">
                                                                        <ul class="thumbnails">
                                                                            {{--*/ $dikey = 1 /*--}}
                                                                            @foreach($dcolimages as $cim)
                                                                            <li>
                                                                                <a href="#slide{{$dikey}}">
                                                                                    <img src="/files/collections/{{$cim->value}}" alt="">
                                                                                </a>
                                                                            </li>
                                                                            {{--*/ $dikey++ /*--}}
                                                                            @endforeach
                                                                        </ul>
                                                                        <div class="thumb-box">
                                                                            <ul class="thumbs">
                                                                                {{--*/ $dikey = 1 /*--}}
                                                                                @foreach($dcolimages as $cim)
                                                                                <li><a href="#{{$dikey}}"  data-slide="{{$dikey}}"><img src="/files/collections/{{$cim->value}}" alt=""></a></li>
                                                                                {{--*/ $dikey++ /*--}}
                                                                                @endforeach
                                                                            </ul>
                                                                            <div class="slideControl">
                                                                                <ul>
                                                                                    <li>
                                                                                        <a class="prev">
                                                                                            <svg version="1.1" fill="#e7e7e8" x="0px" y="0px"
                                                                                                     viewBox="0 0 10 19" enable-background="new 0 0 10 19" xml:space="preserve">
                                                                                                <path d="M9.5,19c0.1,0,0.3,0,0.4-0.1c0.2-0.2,0.2-0.5,0-0.7L1.2,9.5l8.6-8.6c0.2-0.2,0.2-0.5,0-0.7C9.7,0,9.3,0,9.1,0.1l-9,9
                                                                                                    C0,9.3,0,9.7,0.1,9.9l9,9C9.2,19,9.4,19,9.5,19L9.5,19z"/>
                                                                                             </svg>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a class="next">
                                                                                            <svg version="1.1" fill="#e7e7e8" x="0px" y="0px"
                                                                                                 viewBox="0 0 10 19" enable-background="new 0 0 10 19" xml:space="preserve">
                                                                                                <path d="M9.5,19c0.1,0,0.3,0,0.4-0.1c0.2-0.2,0.2-0.5,0-0.7L1.2,9.5l8.6-8.6c0.2-0.2,0.2-0.5,0-0.7C9.7,0,9.3,0,9.1,0.1l-9,9
                                                                                                C0,9.3,0,9.7,0.1,9.9l9,9C9.2,19,9.4,19,9.5,19L9.5,19z"/>
                                                                                            </svg>
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="link_progect">
                                                    <div class="map_icon">
                                                        <svg x="0px" y="0px" viewBox="0 0 34 48" enable-background="new 0 0 34 48" xml:space="preserve">
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
                                                    <div class="address_progect">
                                                        <a href="#">{{$item->name}}</a>, <span class="bold">{{$item->city}}</span><br>
                                                        {{$item->address}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
        @endif
    </div>
    @endif
    @if(count($counters) > 0)
    {{--*/ $colclass = 12 /*--}}    
    @if(count($counters) == 2)
    {{--*/ $colclass = 6 /*--}}   
    @elseif(count($counters) == 3)
    {{--*/ $colclass = 4 /*--}}   
    @elseif(count($counters) == 4)
    {{--*/ $colclass = 3 /*--}}   
    @elseif(count($counters) == 5 || count($counters) == 6)
    {{--*/ $colclass = 2 /*--}}   
    @endif
    <div class="count_number">
        <div class="container">
            <div class="row">
                @foreach($counters as $ct)
                {{--*/ $cntvalue = $ct->value /*--}}
                @if($ct->counter_type == 3)    
                {{--*/ $cntvalue = ($ct->value + $count_ondoing_project) /*--}}
                @elseif($ct->counter_type == 2)
                {{--*/ $cntvalue = ($ct->value + $count_done_project) /*--}}
                @elseif($ct->counter_type == 1)
                {{--*/ $cntvalue = $count_designers /*--}}
                @endif
                <div class="col-md-{{$colclass}}"><span class="number" data-from="0" data-to="{{$cntvalue}}" data-speed="2000">{{$cntvalue}}</span><span class="count_text">{{$ct->name}}</span></div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    @if(count($projects) > 0)
    <div id="ready_progect" class="ready_progect">
        <div class="container">
            <div class="row head_block">
                <div class="col-md-12">
                    <div class="number_block">03</div>
                    <div class="name_modal">
                        <div class="h2">Реализованные ПРОЕКТЫ</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide_block_user">
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
                </div>
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
                                <img src="/files/collections/{{$images[0]->value}}" alt="">
                                @endif
                                <div class="gallery_photo_text"><span>{{$example->name}}<br>{{date('Y-m-d', strtotime($example->publish_date))}}</span></div>
                            </a>
                            <div class="slider_design">
                                <ul class="thumbnails">
                                    {{--*/ $dikey = 1 /*--}}
                                    @foreach($images as $cim)
                                    <li>
                                        <a rel="group{{$example->id}}" href="/files/collections/{{$cim->value}}">
                                            <img src="/files/collections/{{$cim->value}}" alt="">
                                        </a>
                                    </li>
                                    {{--*/ $dikey++ /*--}}
                                    @endforeach
                                </ul>
                                <div class="thumb-box">
                                    <ul class="thumbs">
                                        {{--*/ $dikey = 1 /*--}}
                                        @foreach($images as $cim)
                                        <li><a href="#{{$dikey}}"  data-slide="{{$dikey}}"><img src="/files/collections/{{$cim->value}}" alt=""></a></li>
                                        {{--*/ $dikey++ /*--}}
                                        @endforeach
                                    </ul>
                                    <div class="slideControl">
                                        <ul>
                                            <li>
                                                <a class="prev">
                                                    <svg version="1.1" fill="#e7e7e8" x="0px" y="0px"
	 viewBox="0 0 10 19" enable-background="new 0 0 10 19" xml:space="preserve">
<path d="M9.5,19c0.1,0,0.3,0,0.4-0.1c0.2-0.2,0.2-0.5,0-0.7L1.2,9.5l8.6-8.6c0.2-0.2,0.2-0.5,0-0.7C9.7,0,9.3,0,9.1,0.1l-9,9
	C0,9.3,0,9.7,0.1,9.9l9,9C9.2,19,9.4,19,9.5,19L9.5,19z"/>
</svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="next">
                                                    <svg version="1.1" fill="#e7e7e8" x="0px" y="0px"
	 viewBox="0 0 10 19" enable-background="new 0 0 10 19" xml:space="preserve">
<path d="M9.5,19c0.1,0,0.3,0,0.4-0.1c0.2-0.2,0.2-0.5,0-0.7L1.2,9.5l8.6-8.6c0.2-0.2,0.2-0.5,0-0.7C9.7,0,9.3,0,9.1,0.1l-9,9
	C0,9.3,0,9.7,0.1,9.9l9,9C9.2,19,9.4,19,9.5,19L9.5,19z"/>
</svg>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--div class="col-md-4">
                            {{--*/ $images = $example->images()->orderBy('is_default', 'DESC')->orderBy('pos', 'ASC')->get(); /*--}}
                                                                                    
                            <a href="#" class="gallery_photo">
                                @if(isset($images[0]))
                                <img src="/files/collections/{{$images[0]->value}}" alt="">
                                @endif
                                <div class="gallery_photo_text"><span>{{$example->name}}<br>{{date('Y-m-d', strtotime($example->publish_date))}}</span></div>
                            </a>
                                                            <div class="slider_design">
                                                                <ul class="thumbnails">
                                                                    {{--*/ $dikey = 1 /*--}}
                                                                    @foreach($images as $cim)
                                                                    <li>
                                                                        <a href="#slide{{$dikey}}">
                                                                            <img src="/files/collections/{{$cim->value}}" alt="">
                                                                        </a>
                                                                    </li>
                                                                    {{--*/ $dikey++ /*--}}
                                                                    @endforeach
                                                                </ul>
                                                                <div class="thumb-box">
                                                                    <ul class="thumbs">
                                                                        {{--*/ $dikey = 1 /*--}}
                                                                        @foreach($images as $cim)
                                                                        <li><a href="#{{$dikey}}"  data-slide="{{$dikey}}"><img src="/files/collections/{{$cim->value}}" alt=""></a></li>
                                                                        {{--*/ $dikey++ /*--}}
                                                                        @endforeach
                                                                    </ul>
                                                                    <div class="slideControl">
                                                                        <ul>
                                                                            <li>
                                                                                <a class="prev">
                                                                                    <svg version="1.1" fill="#e7e7e8" x="0px" y="0px"
	 viewBox="0 0 10 19" enable-background="new 0 0 10 19" xml:space="preserve">
<path d="M9.5,19c0.1,0,0.3,0,0.4-0.1c0.2-0.2,0.2-0.5,0-0.7L1.2,9.5l8.6-8.6c0.2-0.2,0.2-0.5,0-0.7C9.7,0,9.3,0,9.1,0.1l-9,9
	C0,9.3,0,9.7,0.1,9.9l9,9C9.2,19,9.4,19,9.5,19L9.5,19z"/>
</svg>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a class="next">
                                                                                    <svg version="1.1" fill="#e7e7e8" x="0px" y="0px"
	 viewBox="0 0 10 19" enable-background="new 0 0 10 19" xml:space="preserve">
<path d="M9.5,19c0.1,0,0.3,0,0.4-0.1c0.2-0.2,0.2-0.5,0-0.7L1.2,9.5l8.6-8.6c0.2-0.2,0.2-0.5,0-0.7C9.7,0,9.3,0,9.1,0.1l-9,9
	C0,9.3,0,9.7,0.1,9.9l9,9C9.2,19,9.4,19,9.5,19L9.5,19z"/>
</svg>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                        </div-->
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
    
    
    
    <!--div id="ready_progect" class="ready_progect">
        <div class="container">
            <div class="row head_block">
                <div class="col-md-12">
                    <div class="number_block">01</div>
                    <div class="name_modal">
                        <div class="h2">Реализованные ПРОЕКТЫ</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide_block_user">
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
                                                                                    
                            <a href="#" class="gallery_photo">
                                @if(isset($images[0]))
                                <img src="/files/collections/{{$images[0]->value}}" alt="">
                                @endif
                                <div class="gallery_photo_text"><span>{{$example->name}}<br>{{date('Y-m-d', strtotime($example->publish_date))}}</span></div>
                            </a>
                                                            <div class="slider_design">
                                                                <ul class="thumbnails">
                                                                    {{--*/ $dikey = 1 /*--}}
                                                                    @foreach($images as $cim)
                                                                    <li>
                                                                        <a href="#slide{{$dikey}}">
                                                                            <img src="/files/collections/{{$cim->value}}" alt="">
                                                                        </a>
                                                                    </li>
                                                                    {{--*/ $dikey++ /*--}}
                                                                    @endforeach
                                                                </ul>
                                                                <div class="thumb-box">
                                                                    <ul class="thumbs">
                                                                        {{--*/ $dikey = 1 /*--}}
                                                                        @foreach($images as $cim)
                                                                        <li><a href="#{{$dikey}}"  data-slide="{{$dikey}}"><img src="/files/collections/{{$cim->value}}" alt=""></a></li>
                                                                        {{--*/ $dikey++ /*--}}
                                                                        @endforeach
                                                                    </ul>
                                                                    <div class="slideControl">
                                                                        <ul>
                                                                            <li>
                                                                                <a class="prev">
                                                                                    <svg version="1.1" fill="#e7e7e8" x="0px" y="0px"
	 viewBox="0 0 10 19" enable-background="new 0 0 10 19" xml:space="preserve">
<path d="M9.5,19c0.1,0,0.3,0,0.4-0.1c0.2-0.2,0.2-0.5,0-0.7L1.2,9.5l8.6-8.6c0.2-0.2,0.2-0.5,0-0.7C9.7,0,9.3,0,9.1,0.1l-9,9
	C0,9.3,0,9.7,0.1,9.9l9,9C9.2,19,9.4,19,9.5,19L9.5,19z"/>
</svg>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a class="next">
                                                                                    <svg version="1.1" fill="#e7e7e8" x="0px" y="0px"
	 viewBox="0 0 10 19" enable-background="new 0 0 10 19" xml:space="preserve">
<path d="M9.5,19c0.1,0,0.3,0,0.4-0.1c0.2-0.2,0.2-0.5,0-0.7L1.2,9.5l8.6-8.6c0.2-0.2,0.2-0.5,0-0.7C9.7,0,9.3,0,9.1,0.1l-9,9
	C0,9.3,0,9.7,0.1,9.9l9,9C9.2,19,9.4,19,9.5,19L9.5,19z"/>
</svg>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
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
    </div-->
    @endif
    @if($reviews)
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
@stop