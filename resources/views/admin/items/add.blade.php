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
        <form method="post">
            <div class="tab-content">
                <div id="main-data" class="tab-pane active">
                    <div class="form-group">
                        <label for="product-name">Название</label>
                        <input type="text" name="name" class="form-control" id="product-name" placeholder="Введите название" />
                    </div>
                    <div class="form-group">
                        <label for="product-city">Город</label>
                        <input type="text" name="city" class="form-control" id="product-city" placeholder="Введите город" />
                    </div>
                    <div class="form-group">
                        <label for="product-address">Адрес</label>
                        <input type="text" name="address" class="form-control" id="product-address" placeholder="Введите адрес" />
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product-name">Email</label>
                                <input type="text" name="email" class="form-control" id="product-email" value="" placeholder="Введите email" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product-skype">Skype</label>
                                <input type="text" name="skype" class="form-control" id="product-skype" value="" placeholder="Введите skype" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="product-name">График работы</label>
                        <input type="text" name="worktime" class="form-control" id="product-worktime" value="" placeholder="График работы" />
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product-lat">Должность</label>
                                <input type="text" name="position" class="form-control" id="product-position" placeholder="Введите Должность" value="" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product-lng">Телефоны</label>
                                <input type="text" name="phones" class="form-control" id="product-phones" placeholder="Введите Телефоны" value="" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product-lat">Широта</label>
                                <input type="text" name="lat" class="form-control" id="product-lat" placeholder="Введите широту" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product-lng">Долгота</label>
                                <input type="text" name="lng" class="form-control" id="product-lng" placeholder="Введите долготу" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="product-url">URL</label>
                        <input type="text" name="url" class="form-control" id="product-url" placeholder="Введите url" />
                    </div>
                    <div class="form-group">
                        <label class="checkbox-custom check-success">
                            <input id="site-is_active" type="checkbox" name="is_active" value="1" checked="" /> <label for="site-is_active">Активен</label>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="product-meta_title">Тег H1</label>
                        <input type="text" name="h1_tag" class="form-control" id="product-h1_tag" value="" placeholder="Введите Тег H1" />
                    </div>
                    <div class="form-group">
                        <label for="product-meta_title">Meta title</label>
                        <input type="text" name="meta_title" class="form-control" id="product-meta_title" placeholder="Введите Meta title" />
                    </div>
                    <div class="form-group">
                        <label for="product-meta_keywords">Meta keywords</label>
                        <textarea rows="8" class="form-control" name="meta_keywords" placeholder="Введите Meta keywords"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="product-meta_description">Meta description</label>
                        <textarea rows="8" class="form-control" name="meta_description" placeholder="Введите Meta description"></textarea>
                    </div>
                    @if($type == 'designers')
                    <div class="form-group">
                        <label>Описание</label>
                        <textarea rows="8" class="form-control" name="description" placeholder="Введите Описание"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="product-url">Студия</label>
                        <select name="parent" class="form-control">
                            <option value="0">Выбрать</option>
                            @foreach($studio as $s)
                            <option value="{{$s->id}}">{{$s->name}}</option>
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
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product-bg-img">Фон</label>
                                <input type="file" name="bg_img" id="product-bg-img" />
                            </div>
                        </div>
                    </div>
                </div>
                <div id="counters-data" class="tab-pane">
                    @if(!$subdomain)
                    <div class="dd" id="nestable_list_3">
                        <ol class="dd-list" id="counter-container"></ol>
                    </div>
                    <span id="add-counter-value" class="btn btn-primary">Добавить счетчик</span>
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
