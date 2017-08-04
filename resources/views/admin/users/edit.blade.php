@extends($basepanel)
@section('content')
<section class="panel">
    <header class="panel-heading tab-dark ">
        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#main-data">Основные данные</a>
            </li>
            <li>
                <a data-toggle="tab" href="#perms-data">Права</a>
            </li>
        </ul>
    </header>
    <div class="panel-body">
        <form method="post">
            <div class="tab-content">
                <div id="main-data" class="tab-pane active">
                    <div class="form-group">
                        <label for="user-name">Имя</label>
                        <input type="text" name="name" class="form-control" id="user-name" placeholder="Введите Имя" value="{{$item->name}}" />
                    </div>
                    <div class="form-group">
                        <label for="product-city">Email</label>
                        <input type="email" name="email" class="form-control" id="user-email" placeholder="Введите Email" value="{{$item->email}}" />
                    </div>
                    <div class="form-group">
                        <label for="product-address">Пароль</label>
                        <input type="text" name="password" class="form-control" id="user-password" placeholder="Оставьте поле пустым чтобы не менять пароль" />
                    </div>
                    <div class="form-group">
                        <label for="product-address">Дизайнер или студия</label>
                        <select name="item_id" class="form-control">
                            <option value="0">Все сайты</option>
                            @foreach($ditems as $ditem)
                            <option @if($item->item_id == $ditem->id) selected="selected" @endif value="{{$ditem->id}}">{{$ditem->name}} - {{$ditem->url}}.{{config('app.url')}}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="checkbox-custom check-success">
                        <input type="checkbox" name="is_admin" value="1" id="up-is_admin"@if($item->is_admin) checked="checked" @endif /> <label for="up-is_admin">Права администратора</label>
                    </label>
                </div>
                <div id="perms-data" class="tab-pane">
                    <label class="checkbox-custom check-success">
                        <input @if(in_array('view', $perms)) checked="checked" @endif type="checkbox" name="perms[]" value="view" id="up-view" /> <label for="up-view">Просмотр</label>
                    </label>
                    <label class="checkbox-custom check-success">
                        <input @if(in_array('edit', $perms)) checked="checked" @endif type="checkbox" name="perms[]" value="edit" id="up-edit" /> <label for="up-edit">Редактирование данных</label>
                    </label>
                    <label class="checkbox-custom check-success">
                        <input @if(in_array('slides', $perms)) checked="checked" @endif type="checkbox" name="perms[]" value="slides" id="up-slides" /> <label for="up-slides">Слайды</label>
                    </label>
                    <label class="checkbox-custom check-success">
                        <input @if(in_array('collections', $perms)) checked="checked" @endif type="checkbox" name="perms[]" value="collections" id="up-collections" /> <label for="up-collections">Коллекции</label>
                    </label>
                    <label class="checkbox-custom check-success">
                        <input @if(in_array('examples', $perms)) checked="checked" @endif type="checkbox" name="perms[]" value="examples" id="up-examples" /> <label for="up-examples">Выставочные образцы</label>
                    </label>
                    <label class="checkbox-custom check-success">
                        <input @if(in_array('reviews', $perms)) checked="checked" @endif type="checkbox" name="perms[]" value="reviews" id="up-reviews" /> <label for="up-reviews">Отзывы</label>
                    </label>
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
