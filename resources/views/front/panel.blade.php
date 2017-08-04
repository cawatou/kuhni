<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('front/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/flexslider.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/slippry.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/bootstrap-select.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/jquery.fancybox.css')}}">
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
    <meta name="_token" content="{{ csrf_token() }}" />
    @yield('meta_tags')
</head>
<body>
    <header>
        <div class="col-md-12 top_head">
            <div class="head_row">
                <?php if(count($current_menu)){ ?>
                <div class="top_menu">
                    <a>Меню</a>
                    <ul class="dropdown-menu">
                        @foreach($current_menu as $cm)
                        {{--*/ $subs = $cm->subitems()->orderBy('pos', 'ASC')->get(); /*--}}
                        <li>
                            <a @if(count($subs) == 0) href="{{$cm->link}}"@endif @if(count($subs) > 0) class="open_menu"@endif >{{$cm->name}}@if(count($subs) > 0)<span class="caret"></span> @endif</a>
                            @if(count($subs) > 0)
                            <ul class="drop-menu">
                                @foreach($subs as $scm)
                                <li><a href="{{$scm->link}}">{{$scm->name}}</a></li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
                    <?php } ?>
                @if(Auth::user())
                <a class="open_login_form" href="/auth/logout">
                    <svg x="0px" y="0px" width="512px" height="512px" viewBox="0 0 612 612" style="enable-background:new 0 0 612 612;" xml:space="preserve">
<g>
	<g id="_x36__30_">
		<g>
			<path d="M331.685,425.378c-7.478,7.479-7.478,19.584,0,27.043c7.479,7.478,19.584,7.478,27.043,0l131.943-131.962     c3.979-3.979,5.681-9.276,5.412-14.479c0.269-5.221-1.434-10.499-5.412-14.477L358.728,159.56     c-7.459-7.478-19.584-7.478-27.043,0c-7.478,7.478-7.478,19.584,0,27.042l100.272,100.272H19.125C8.568,286.875,0,295.443,0,306     c0,10.557,8.568,19.125,19.125,19.125h412.832L331.685,425.378z M535.5,38.25H153c-42.247,0-76.5,34.253-76.5,76.5v76.5h38.25     v-76.5c0-21.114,17.117-38.25,38.25-38.25h382.5c21.133,0,38.25,17.136,38.25,38.25v382.5c0,21.114-17.117,38.25-38.25,38.25H153     c-21.133,0-38.25-17.117-38.25-38.25v-76.5H76.5v76.5c0,42.247,34.253,76.5,76.5,76.5h382.5c42.247,0,76.5-34.253,76.5-76.5     v-382.5C612,72.503,577.747,38.25,535.5,38.25z"/>
		</g>
	</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg><span>Выйти</span></a>
@else
                <a class="open_login_form" data-toggle="modal" data-target="#login">
                    <svg x="0px" y="0px" width="512px" height="512px" viewBox="0 0 612 612" style="enable-background:new 0 0 612 612;" xml:space="preserve">
                        <g>
                            <g id="_x36__30_">
                                <g>
                                    <path d="M331.685,425.378c-7.478,7.479-7.478,19.584,0,27.043c7.479,7.478,19.584,7.478,27.043,0l131.943-131.962     c3.979-3.979,5.681-9.276,5.412-14.479c0.269-5.221-1.434-10.499-5.412-14.477L358.728,159.56     c-7.459-7.478-19.584-7.478-27.043,0c-7.478,7.478-7.478,19.584,0,27.042l100.272,100.272H19.125C8.568,286.875,0,295.443,0,306     c0,10.557,8.568,19.125,19.125,19.125h412.832L331.685,425.378z M535.5,38.25H153c-42.247,0-76.5,34.253-76.5,76.5v76.5h38.25     v-76.5c0-21.114,17.117-38.25,38.25-38.25h382.5c21.133,0,38.25,17.136,38.25,38.25v382.5c0,21.114-17.117,38.25-38.25,38.25H153     c-21.133,0-38.25-17.117-38.25-38.25v-76.5H76.5v76.5c0,42.247,34.253,76.5,76.5,76.5h382.5c42.247,0,76.5-34.253,76.5-76.5     v-382.5C612,72.503,577.747,38.25,535.5,38.25z"/>
                                </g>
                            </g>
                                            </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                        <g>
                        </g>
                    </svg>
                    <span>Войти</span></a>
@endif
            </div>
        </div>
        <div class="col-md-2 col-sm-2 col-xs-2 logo">
            <a href="#">
                <img src="/front/images/svg/logo.svg" alt="Logo">
            </a>
        </div>
        <div class="col-md-7 col-sm-7 col-xs-7 menu">
            @if($current_item->type == 0)
            <nav>
                <a href="#collection">выставочные образцы</a>
                <a href="#design">дизайнеры Кухонь</a>
                <a href="#ready_progect">Реализованные Проекты</a>
                <a href="#news">отзывы</a>
                <a href="#maps">контакты</a>
            </nav>
            @elseif($current_item->type == 1)
            <nav>
                <a href="#main">о дизайнере</a>
                <a href="#collection">Реализованные проекты</a>
                <a href="#news">Отзывы</a>
                <a href="#maps">контакты</a>
            </nav>
            @elseif($current_item->type == 2)
            <nav>
                <a href="#collection">Коллекции</a>
                <a href="#design">дизайнеры кухонь</a>
                <a href="#interer">дизайнеры интерьера</a>
                <a href="#news">новости</a>
                <a href="#maps">Студии</a>
            </nav>
            @endif
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3 phone">
            <a>
                <svg x="0px" y="0px" viewBox="0 0 204.94 204.94" style="enable-background:new 0 0 204.94 204.94;" xml:space="preserve" width="512px" height="512px">
                    <g>
                        <g>
                            <path d="M138.871,144.657c-2.079-2.069-4.971-3.21-8.138-3.21c-3.346,0-6.567,1.306-8.843,3.586    l-14.408,14.398l-3.89-2.154c-8.561-4.749-20.285-11.259-32.671-23.656c-12.433-12.419-18.943-24.172-23.71-32.768l-2.122-3.783    L59.51,82.647c4.771-4.785,4.935-12.404,0.361-16.989L33.223,39.013c-2.072-2.072-4.964-3.214-8.131-3.214    c-3.343,0-6.56,1.306-8.843,3.59l-6.546,6.582l-0.608,1.002c-2.437,3.124-4.431,6.635-5.919,10.465    c-1.385,3.647-2.248,7.111-2.648,10.586c-3.436,28.556,9.734,54.778,45.462,90.498c42.334,42.327,77.715,45.623,87.553,45.623    c1.689,0,2.706-0.097,2.992-0.125c3.636-0.44,7.111-1.317,10.622-2.67c3.786-1.482,7.29-3.461,10.404-5.891l1.489-1.174    l6.123-6.009c4.763-4.767,4.917-12.379,0.344-16.953L138.871,144.657z M161.858,184.98l-4.713,4.663    c-2.23,2.144-6.063,5.161-11.678,7.355c-3.167,1.22-6.267,2.001-9.47,2.384c-0.175,0.018-0.898,0.068-2.065,0.068    c-9.477,0-43.594-3.192-84.643-44.224C8.876,114.799,2.42,91.358,5.165,68.575c0.358-3.11,1.131-6.206,2.355-9.455    c2.226-5.669,5.243-9.502,7.376-11.71l4.642-4.71c1.432-1.432,3.461-2.258,5.554-2.258c1.904,0,3.618,0.669,4.828,1.882    l26.655,26.637c2.749,2.759,2.591,7.423-0.365,10.386L39.572,95.974l-0.336,0.34l0.923,1.564c0.931,1.568,1.911,3.332,2.97,5.254    c4.903,8.829,11.613,20.922,24.486,33.795c12.902,12.898,24.948,19.569,33.752,24.451c2.001,1.106,3.736,2.076,5.282,2.999    l1.568,0.934l16.967-16.975c1.428-1.421,3.446-2.24,5.544-2.24c1.908,0,3.629,0.666,4.839,1.882l26.641,26.623    C164.957,177.379,164.796,182.028,161.858,184.98z" />
                            <path d="M86.201,90.978l-0.469,1.002l1.081,0.279c6.521,1.643,12.483,5.01,17.218,9.752    c4.52,4.517,7.823,10.175,9.548,16.337l0.183,0.655l1.041,0.032c0.265,0.007,0.533,0.018,0.805,0.039    c0.644,0.057,1.278,0.122,1.911,0.2c0.565,0.072,1.127,0.136,1.693,0.186l1.278,0.115l-0.297-1.253    c-1.879-7.931-5.898-15.142-11.613-20.861c-5.418-5.418-12.233-9.323-19.709-11.281l-0.87-0.229l-0.251,0.859    C87.307,88.291,86.791,89.693,86.201,90.978z" />
                            <path d="M88.699,65.118l0.082,0.669l0.673,0.136c12.751,2.355,24.25,8.371,33.269,17.386    c10.357,10.361,16.674,23.57,18.281,38.222l0.075,0.691l2.015,0.297c0.648,0.05,1.278,0.05,1.922,0.05    c0.48-0.011,0.956,0,1.428,0.018l1.052,0.039l-0.1-1.049c-1.618-16.477-8.579-31.272-20.124-42.821    C116.94,68.424,103.741,61.685,89.1,59.266l-1.26-0.211l0.197,1.26C88.294,61.922,88.516,63.525,88.699,65.118z" />
                            <path d="M147.592,58.439c-17.153-17.15-40.001-27.36-64.344-28.752l-1.152-0.075l0.193,1.138    c0.251,1.539,0.548,3.106,0.855,4.71l0.14,0.687l0.701,0.043c22.343,1.528,43.315,11.044,59.058,26.791    c15.5,15.5,24.977,36.232,26.673,58.371l0.068,0.913l0.909-0.057c1.013-0.061,2.015-0.143,3.024-0.229l2.512-0.204l-0.075-0.923    C174.344,97.209,164.198,75.045,147.592,58.439z" />
                            <path d="M204.865,118.138c-2.43-30.22-15.561-58.647-36.937-80.034    c-22.822-22.819-53.21-36.06-85.545-37.27l-0.895-0.039l-0.068,0.891c-0.068,1.024-0.104,2.044-0.143,3.071l-0.107,2.498    l0.923,0.036c30.739,1.138,59.602,13.707,81.272,35.377c20.306,20.306,32.768,47.295,35.091,76.011l0.075,0.941l0.945-0.093    c1.367-0.143,2.759-0.251,4.159-0.358l1.306-0.104L204.865,118.138z" />
                        </g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                    <g>
                    </g>
                </svg>
            </a>
            <div class="phone_number">
                <span>{{$phone_num}}</span>
                <a class="feedback" data-toggle="modal" data-target="#feedback">обратный звонок</a>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </header>
    @yield('content')
    <div id="maps" class="maps">
        <div class="container">
            <div class="row head_block">
                <div class="col-md-12">
                    <div class="number_block">05</div>
                    <div class="name_modal"><div class="h2">студии</div></div>
                </div>
            </div>
        </div>
        <div class="maps_block row">
            <div class="col-md-3 left_maps">
                <ul>
                    {{--*/ $i = 1 /*--}}
                    @foreach($studio as $one)
                    <li data-id="{{$i}}" data-url="{{$one->url}}">
                        <div class="text_maps">
                            <p>
                                <span class="bold city">«{{$one->city}}»</span>, <span class="name">{{$one->name}}</span>
                                <span class="address">{{$one->address}}</span>
                            </p>
                            <a href="http://{{$one->url}}.{{config('app.url')}}">перейти на сайт студии</a>
                        </div>
                        <div class="img_maps">
                            <img src="/files/designers/{{$one->main_img}}" alt="">
                        </div>
                        <div class="active_object">
                            <div class="row object_info">
                                <div>
                                    <div class="h4">{{$one->name}} </div>
                                    <p>
                                        {{$one->email}}<br>
                                        <span>skype:</span> {{$one->skype}}
                                    </p>
                                    <a href="http://{{$one->url}}.{{config('app.url')}}">{{$one->url}}.{{config('app.url')}}</a>
                                </div>
                                <div class="img_block">
                                    <img src="/files/designers/{{$one->main_img}}" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="object_contact">
                                    <ul>
                                        <li>
                                            <div class="icon">
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
                                            <p><span>{{$one->city}}</span>, {{$one->address}}</p>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <svg x="0px" y="0px"
                                                         viewBox="0 0 48 48" enable-background="new 0 0 48 48" xml:space="preserve">
                                                    <g id="clock">
                                                        <g>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" fill="#BD8669" d="M24,0C10.7,0,0,10.7,0,24c0,13.3,10.7,24,24,24
                                                                c13.3,0,24-10.7,24-24C48,10.7,37.3,0,24,0z M24,46C11.9,46,2,36.1,2,24C2,11.9,11.9,2,24,2c12.1,0,22,9.9,22,22
                                                                C46,36.1,36.1,46,24,46z M25,9h-2v16h9v-2h-7V9z"/>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <p>{{$one->worktime}}</p>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <svg x="0px" y="0px"
                                                     viewBox="0 0 20 20" enable-background="new 0 0 20 20" xml:space="preserve">
                                                <path fill="#BD8669" d="M16,20c-1.8,0-3.7-0.5-5.6-1.5c-1.8-0.9-3.6-2.2-5.1-3.8s-2.9-3.3-3.8-5.1C0.5,7.7,0,5.8,0,4
                                                    c0-1.1,1.1-2.3,1.5-2.7C2.2,0.7,3.2,0,4,0c0.4,0,0.8,0.2,1.4,0.8c0.4,0.4,0.9,0.9,1.4,1.5C7,2.7,8.5,4.6,8.5,5.5
                                                    c0,0.7-0.8,1.3-1.7,1.8C6.4,7.5,6,7.7,5.8,8C5.5,8.2,5.5,8.3,5.5,8.3c0.9,2.4,3.8,5.3,6.2,6.2c0,0,0.1-0.1,0.4-0.3
                                                    c0.2-0.3,0.4-0.6,0.6-1c0.6-0.9,1.1-1.7,1.8-1.7c0.9,0,2.8,1.4,3.2,1.7c0.6,0.5,1.1,1,1.5,1.4c0.5,0.6,0.8,1,0.8,1.4
                                                    c0,0.8-0.7,1.8-1.3,2.5C18.2,18.9,17.1,20,16,20L16,20z M4,1C3.7,1,3,1.3,2.2,2.1C1.5,2.7,1,3.5,1,4c0,6.7,8.3,15,15,15
                                                    c0.5,0,1.3-0.5,1.9-1.2C18.7,17,19,16.3,19,16c0-0.2-0.6-0.9-2-2c-1.2-1-2.2-1.5-2.5-1.5c0,0-0.1,0-0.4,0.3
                                                    c-0.2,0.3-0.4,0.6-0.6,0.9c-0.6,0.9-1.1,1.8-1.9,1.8c-0.1,0-0.2,0-0.4-0.1c-2.6-1.1-5.7-4.2-6.8-6.8C4.4,8.4,4.4,7.9,5,7.3
                                                    C5.3,7,5.8,6.7,6.2,6.5C6.6,6.3,6.9,6,7.2,5.8c0.3-0.2,0.3-0.3,0.3-0.4C7.5,5.2,7,4.2,6,3C4.9,1.6,4.2,1,4,1L4,1z"/>
                                                </svg>
                                            </div>
                                            <p>{{$one->phones}}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    {{--*/ $i++ /*--}}
                    @endforeach
                </ul>
            </div>
            <div class="col-md-9 right_maps">
                <div id="map"></div>
            </div>
        </div>
    </div>
    <footer>
        <div class="left_footer">
            <a href="mailto:{{$current_item->email}}">{{$current_item->email}}</a> | © Кухни Делия 2016. All Rights Reserved
        </div>
        <div class="right_footer">
            <a href="http://skipodev.ru/">Made by skipo</a>
        </div>
    </footer>


    <div class="modal fade" id="feedback" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
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
                    <div class="row head_block">
                        <div class="col-md-12">
                            <div class="number_block">
                                <svg x="0px" y="0px" viewBox="0 0 46 43" enable-background="new 0 0 46 43" xml:space="preserve">
                                    <g id="send">
                                        <g>
                                            <path fill-rule="evenodd" clip-rule="evenodd" fill="#fff" d="M10.7,31.5c-0.6-0.6-2.1-0.7-2.7-0.1v11.2
                                                c0.6,0.6,2.1,0.5,2.7-0.1l4.8-3.8c0.6-0.6,0.6-1.5,0-2.1L10.7,31.5z M13.8,37.7l-2.5,2c-0.3,0.3-1,0.3-1.3,0v-5.7
                                                c0.3-0.3,1,0.4,1.3,0.6l2.5,2.6C14,37.6,14,37.5,13.8,37.7z M44.9,0c-0.2,0-0.3,0.1-0.5,0.1L1.2,12.9c-0.7,0.4-1.1,1.1-1.2,1.8
                                                l0,0l0,0c0,0.5,0,1,0.3,1.4l10.9,8.7L37.3,7.6L15.2,26.6c-0.9,0.9-0.9,2.4,0,3.3l10.1,11.4c0.9,0.9,2.4,0.9,3.3,0L45.6,1.9
                                                C45.9,1.7,46,1.5,46,1.1C46,0.5,45.5,0,44.9,0z M42.9,4.3l-15.2,34c-1.4,1.9-1,1.3-2.3,0.1l-7.2-8.1c-1.5-1.5-1.3-2-0.3-2.8
                                                L40.6,5.2L10.8,21.9l-7.5-5.6c-1.7-1.5-0.5-1.5,0.6-2.2L41.7,2.7C43.8,2.1,43.4,3.4,42.9,4.3z"></path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="name_modal">
                                <div class="h2 modal-title" id="myModalLabel">Заказать звонок</div>
                                <p>Мы свяжемся с Вами в ближайшее время</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <form method="post" action="/add_callback/" id="feedback_form">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="item_id" value="{{ $current_item->id }}">
                        <input type="hidden" name="type" value="0" />
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Имя">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="tel" name="phone" class="form-control" placeholder="Телефон">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="comment" id="" class="form-control" cols="30" placeholder="Комментарий"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-6">
                                <button type="submit" class="button">Отправить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="write_to_us" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
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
                    <div class="row head_block">
                        <div class="col-md-12">
                            <div class="number_block">
                                <svg x="0px" y="0px" viewBox="0 0 46 43" enable-background="new 0 0 46 43" xml:space="preserve">
                                <g id="send">
                                    <g>
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#fff" d="M10.7,31.5c-0.6-0.6-2.1-0.7-2.7-0.1v11.2
                                            c0.6,0.6,2.1,0.5,2.7-0.1l4.8-3.8c0.6-0.6,0.6-1.5,0-2.1L10.7,31.5z M13.8,37.7l-2.5,2c-0.3,0.3-1,0.3-1.3,0v-5.7
                                            c0.3-0.3,1,0.4,1.3,0.6l2.5,2.6C14,37.6,14,37.5,13.8,37.7z M44.9,0c-0.2,0-0.3,0.1-0.5,0.1L1.2,12.9c-0.7,0.4-1.1,1.1-1.2,1.8
                                            l0,0l0,0c0,0.5,0,1,0.3,1.4l10.9,8.7L37.3,7.6L15.2,26.6c-0.9,0.9-0.9,2.4,0,3.3l10.1,11.4c0.9,0.9,2.4,0.9,3.3,0L45.6,1.9
                                            C45.9,1.7,46,1.5,46,1.1C46,0.5,45.5,0,44.9,0z M42.9,4.3l-15.2,34c-1.4,1.9-1,1.3-2.3,0.1l-7.2-8.1c-1.5-1.5-1.3-2-0.3-2.8
                                            L40.6,5.2L10.8,21.9l-7.5-5.6c-1.7-1.5-0.5-1.5,0.6-2.2L41.7,2.7C43.8,2.1,43.4,3.4,42.9,4.3z"/>
                                    </g>
                                </g>
                                </svg>
                            </div>
                            <div class="name_modal">
                                <div class="h2 modal-title" id="myModalLabel2">написать нам</div>
                                <p>Мы свяжемся с Вами в ближайшее время</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <form method="post" action="/add_callback" id="write_form">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="item_id" value="{{ $current_item->id }}">
                        <input type="hidden" name="type" value="2" />
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" id="write_name" name="name" class="form-control" placeholder="Имя">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="tel" id="write_tel" name="phone" class="form-control" placeholder="Телефон">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" id="write_email" name="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="select_val" id="select_val"><!--для нижнего селекта, для валидации-->
                                    <select class="selectpicker" name="send_to" id="who" form="write_form" title="Кому">
                                        @if(isset($recipients))
                                        @foreach($recipients as $rc)
                                        <option value="{{$rc->id}}">{{$rc->name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="comment" id="write_text" class="form-control" cols="30" placeholder="Комментарий"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-6">
                                <button type="submit" class="button">Отправить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="form_sucess" tabindex="-1" role="dialog" aria-labelledby="myModalLabe3" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
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
                    <div class="row head_block">
                        <div class="col-md-12">
                            <div class="number_block">05</div>
                            <div class="name_modal">
                                <div class="h2 modal-title" id="myModalLabel3">Письмо отправлено</div>
                                <p>Мы свяжемся с Вами в ближайшее время</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="form_sucess_review" tabindex="-1" role="dialog" aria-labelledby="myModalLabe11" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
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
                    <div class="row head_block">
                        <div class="col-md-12">
                            <div class="number_block">05</div>
                            <div class="name_modal">
                                <div class="h2 modal-title" id="myModalLabe11">Отзыв отправлен</div>
                                <p>Спасибо за Ваше мнение</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabe4" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
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
                    <div class="row head_block">
                        <div class="col-md-12">
                            <div class="number_block">05</div>
                            <div class="name_modal">
                                <div class="h2 modal-title" id="myModalLabe3">Войти</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ url('/auth/login') }}" id="login_form">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" placeholder="Логин">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Пароль">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-center">
                                <a class="registration">Регистрация</a>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="button">Войти</button>
                            </div>
                        </div>
                    </form>
                    <form method="post" action="/auth/register" id="registration_form">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Имя">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Пароль">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Повторите пароль">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-6">
                                <button type="submit" class="button">Зарегистрироваться</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="review" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
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
                    <div class="row head_block">
                        <div class="col-md-12">
                            <div class="number_block">05</div>
                            <div class="name_modal">
                                <div class="h2 modal-title" id="myModalLabel5">Оставить отзыв</div>
                                <p>Спасибо за Ваше мнение</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <form method="post" action="/add_callback" id="review_form">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="item_id" value="{{ $current_item->id }}">
                        <input type="hidden" name="type" value="1" />
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Имя">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="tel" name="phone" class="form-control" placeholder="Телефон">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="comment" id="text_review" class="form-control" cols="30" placeholder="Отзыв"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-6">
                                <button type="submit" class="button">Отправить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?//php echo $item_settings['code_google-'.$item->id]; ?>
    <?//php echo $item_settings['code_yandex-'.$item->id]; ?>
    <?//php echo $item_settings['code_chat-'.$item->id]; ?>
    <script src="{{ asset('front/js/jquery-2.2.2.min.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.flexslider.js') }}"></script>
    <script src="{{ asset('front/js/perfect-scrollbar.jquery.js') }}"></script>
    <script src="{{ asset('front/js/jquery.countTo.js') }}"></script>
    <script src="{{ asset('front/js/slippry.min.js') }}"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script src="{{ asset('front/js/bootstrap-select.js') }}"></script>
    <script src="{{ asset('front/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.maskedinput.js') }}"></script>
    <script src="{{ asset('front/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('front/js/script.js') }}"></script>
    
    <script>
	$(document).ready(function(){
	    var url = window.location.href;
	    url = url.slice(7); // обрезаем "http://"
	    url = url.split('.')[0];
	    $('.left_maps>ul>li').each(function(){
                if($(this).data('url')==url || $(this).data('url')==$('#studio_url').val()){
                    $('.left_maps>.active_object').fadeOut('300');
                    var _this_li = $(this);
                    setTimeout(function(){
                        $('.left_maps>.active_object').remove();
                        var clone = _this_li.find('.active_object').clone();
                        $('.left_maps').prepend($(clone));
                        $('.left_maps>.active_object').fadeIn('300');
                    }, 300);
                }
            });
	})
        var markers = [];
        var image = new google.maps.MarkerImage('/front/images/maps_icon.png',
                new google.maps.Size(32, 45),
                new google.maps.Point(0,0),
                new google.maps.Point(0, 32));
        var active = new google.maps.MarkerImage('/front/images/maps_icon_active.png',
                new google.maps.Size(32, 45),
                new google.maps.Point(0,0),
                new google.maps.Point(0, 32));

        function reset_icon(markers){
            for(var i=0;i<markers.length;i++){
                markers[i].setIcon(image);
            }
        }
        /**
         * Выпад информации о дизайнере
         * @param _this - номер маркера
         */
        function add_active_maps(_this){
            $('.left_maps>ul>li').each(function(){
                if($(this).data('id')==_this){
                    $('.left_maps>.active_object').fadeOut('300');
                    var _this_li = $(this);
                    setTimeout(function(){
                        $('.left_maps>.active_object').remove();
                        var clone = _this_li.find('.active_object').clone();
                        $('.left_maps').prepend($(clone));
                        $('.left_maps>.active_object').fadeIn('300');
                    }, 300);

                }
            });
        }

        $(function(){
            google_maps();
        });

        $('.left_maps>ul').perfectScrollbar();
        function google_maps(){
            google.maps.event.addDomListener(window, 'load', init);

            function init() {
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 10,

                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(<?php echo (isset($settings['map_center_lat'])) ? $settings['map_center_lat'] : '0'; ?>, <?php echo (isset($settings['map_center_lat'])) ? $settings['map_center_lng'] : '0'; ?>), // New York

                    scrollwheel: false,

                    // How you would like to style the map.
                    // This is where you would paste any style found on Snazzy Maps.
                    styles: [{"featureType":"landscape","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"stylers":[{"hue":"#00aaff"},{"saturation":-100},{"gamma":2.15},{"lightness":12}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"visibility":"on"},{"lightness":24}]},{"featureType":"road","elementType":"geometry","stylers":[{"lightness":57}]}]
                };

                // Get the HTML DOM element that will contain your map
                // We are using a div with id="map" seen below in the <body>
                var mapElement = document.getElementById('map');

                // Create the Google Map using our element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);

                // Let's also add a marker while we're at it

                {{--*/ $i = 1 /*--}}
                @foreach($studio as $one)
                markers.push(new google.maps.Marker({
                    position: new google.maps.LatLng({{$one->lat}}, {{$one->lng}}),
                    map: map,
                    icon: image,
                    title: 'Snazzy!',
                    value : '{{$i}}'
                }));
                {{--*/ $i++ /*--}}
                @endforeach

                for(var i=0;i<markers.length;i++){
                    google.maps.event.addListener(markers[i], 'click', function() {
                        reset_icon(markers);
                        this.setIcon(active);
                        var _this = this.value;
                        add_active_maps(_this);
                    });
                }
            }
        }
    </script>
</body>
</html>