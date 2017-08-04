@extends($basepanel)
@section('content')
<section class="panel">
    <header class="panel-heading tab-dark ">
        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#main-data">Основные данные</a>
            </li>
            <li class="">
                <a data-toggle="tab" href="#counters-data">Счетчик</a>
            </li>
        </ul>
    </header>
    <div class="panel-body">
        <form method="post" enctype="multipart/form-data">
            <div class="tab-content">
                <div id="main-data" class="tab-pane active">
                    <div class="form-group">
                        <label for="product-name">Название</label>
                        <input type="text" name="name" class="form-control" id="product-name" value="{{$item->name}}" placeholder="Введите название" />
                    </div>
                    <div class="form-group">
                        <label for="product-city">Город</label>
                        <input type="text" name="city" class="form-control" id="product-city" placeholder="Введите город" value="{{$item->city}}" />
                    </div>
                    <div class="form-group">
                        <label for="product-address">Адрес</label>
                        <input type="text" name="address" class="form-control" id="product-address" placeholder="Введите адрес" value="{{$item->address}}" />
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product-name">Email</label>
                                <input type="text" name="email" class="form-control" id="product-email" value="{{$item->email}}" placeholder="Введите email" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product-skype">Skype</label>
                                <input type="text" name="skype" class="form-control" id="product-skype" value="{{$item->skype}}" placeholder="Введите skype" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="product-name">График работы</label>
                        <input type="text" name="worktime" class="form-control" id="product-worktime" value="{{$item->worktime}}" placeholder="График работы" />
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product-lat">Должность</label>
                                <input type="text" name="position" class="form-control" id="product-position" placeholder="Введите Должность" value="{{$item->position}}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product-lng">Телефоны</label>
                                <input type="text" name="phones" class="form-control" id="product-phones" placeholder="Введите Телефоны" value="{{$item->phones}}" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product-lat">Широта</label>
                                <input type="text" name="lat" class="form-control" id="product-lat" placeholder="Введите широту" value="{{$item->lat}}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product-lng">Долгота</label>
                                <input type="text" name="lng" class="form-control" id="product-lng" placeholder="Введите долготу" value="{{$item->lng}}" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="product-url">URL</label>
                        <input type="text" name="url" class="form-control" id="product-url" value="{{$item->url}}" placeholder="Введите url" />
                    </div>
                    <div class="form-group">
                        <label class="checkbox-custom check-success">
                            <input id="site-is_active" type="checkbox" name="is_active" value="1"  @if($item->is_active)checked="checked"@endif /> <label for="site-is_active">Активен</label>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="product-meta_title">Тег H1</label>
                        <input type="text" name="h1_tag" class="form-control" id="product-h1_tag" value="{{$item->h1_tag}}" placeholder="Введите Тег H1" />
                    </div>
                    <div class="form-group">
                        <label for="product-meta_title">Meta title</label>
                        <input type="text" name="meta_title" class="form-control" id="product-meta_title" value="{{$item->meta_title}}" placeholder="Введите Meta title" />
                    </div>
                    <div class="form-group">
                        <label for="product-meta_keywords">Meta keywords</label>
                        <textarea rows="8" class="form-control" name="meta_keywords" placeholder="Введите Meta keywords">{{$item->meta_keywords}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="product-meta_description">Meta description</label>
                        <textarea rows="8" class="form-control" name="meta_description" placeholder="Введите Meta description">{{$item->meta_description}}</textarea>
                    </div>
                    @if($type == 'designers')
                    <div class="form-group">
                        <label>Описание</label>
                        <textarea rows="8" class="form-control" name="description" placeholder="Введите Описание">{{$item->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Студия</label>
                        <select name="parent" class="form-control">
                            <option value="0">Выбрать</option>
                            @foreach($studio as $s)
                            <option @if($s->id == $item->parent) selected @endif value="{{$s->id}}">{{$s->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product-main-img">Изображение</label>
                                <input type="file" name="main_img" id="product-main-img" />
                            </div>
                            @if($item->main_img != '')
                            <img id="main_img" width="200" src="/files/designers/{{$item->main_img}}" />
                            <input id="input-delete_main_img" type="hidden" name="delete_main_img" value="0" />
                            <span id="delete_main_img" class="btn btn-default btn-xs">Удалить</span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product-bg-img">Фон</label>
                                <input type="file" name="bg_img" id="product-bg-img" />
                            </div>
                            @if($item->bg_img != '')
                            <img id="bg_img" width="200" src="/files/designers/{{$item->bg_img}}" />
                            <input id="input-delete_bg_img" type="hidden" name="delete_bg_img" value="0" />
                            <span id="delete_bg_img" class="btn btn-default btn-xs">Удалить</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div id="counters-data" class="tab-pane">
                    @if(!$subdomain)
                    <div class="dd" id="nestable_list_3">
                        <ol class="dd-list" id="counter-container">
                            @foreach($counters as $counter)
                            <li class="item dd-item dd3-item">
                                <div class="dd-handle dd3-handle"></div>
                                <div class="dd3-content">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Название</label>
                                                <input type="text" name="countername[]" class="form-control" placeholder="Введите Название" value="{{$counter->name}}" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Значение</label>
                                                <input type="text" name="countervalue[]" class="form-control" placeholder="Введите Значение" value="{{$counter->value}}" />
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>На главной</label>
                                                <select name="counter_type[]" class="form-control">
                                                    <option value="4"@if($counter->counter_type == 4) selected="selected" @endif>Нет</option>
                                                    <option value="0"@if($counter->counter_type == 0) selected="selected" @endif>Студий</option>
                                                    <option value="1"@if($counter->counter_type == 1) selected="selected" @endif>Сотрудников</option>
                                                    <option value="2"@if($counter->counter_type == 2) selected="selected" @endif>Реализованных проектов</option>
                                                    <option value="3"@if($counter->counter_type == 3) selected="selected" @endif>Проектов в работе</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <span class="btn btn-danger del"><i class="fa fa-trash"></i></span>
                                            <input type="hidden" name="counterid[]" value="{{$counter->id}}" />
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ol>
                    </div>
                    <span id="add-counter-value" class="btn btn-primary">Добавить счетчик</span>
                    @else
                    <table class="table table-striped custom-table table-hover">
                        <tbody>
                            @foreach($counters as $counter)
                            <tr>
                                <td>{{$counter->name}}</td>
                                <td>
                                    @if($counter->counter_type == 4 && $type == 'studio' || $type == 'designers')
                                    <input type="hidden" name="counterid[]" value="{{$counter->id}}" />
                                    <input type="text" name="countervalue[]" class="form-control" placeholder="Введите Значение" value="{{$counter->value}}" />
                                    @else
                                        @if($counter->counter_type == 3)
                                        {{$count_ondoing_project}}
                                        @elseif($counter->counter_type == 2)
                                        {{$count_done_project}}
                                        @else
                                        {{$counter->value}}
                                        @endif
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
            <div style="margin-top: 10px;">
                <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Сохранить </button>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        </form>
    </div>
</section>
@stop
