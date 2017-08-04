@extends($basepanel)
@section('content')
<section class="panel">
    @if($type != 'homeset')
    <header class="panel-heading head-border">
        Субдомены
    </header>
    <div class="panel-body">
        <a href="/administrator/items/{{$type}}/add" class="btn btn-success"><i class="fa fa-plus"></i> Добавить </a>
    </div>
    @endif
    <table class="table table-striped custom-table table-hover">
        <thead>
            <tr>
                <th><i class="fa fa-bookmark-o"></i> ID</th>
                <th class="hidden-xs"><i class="fa fa-building-o"></i> Название</th>
                <th class="hidden-xs"><i class="fa fa-building-o"></i> URL</th>
                <th class="hidden-xs"><i class="fa fa-building-o"></i> Активен</th>
                <th class="hidden-xs" style="width: 400px;"><i class="fa fa-cogs"></i> Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td><strong>{{$item->name}}</strong></td>
                <td>{{$item->url}}</td>
                <td>
                    @if($item->is_active == 0)
                        <span class="badge bg-danger tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Not active"><i class="fa fa-times-circle-o"></i></span>
                    @elseif($item->is_active == 1)
                        <span class="badge bg-success tooltips" data-placement="top" data-toggle="tooltip" data-original-title="Active"><i class="fa fa-check-circle-o"></i></span>
                    @endif
                </td>
                <td class="hidden-xs">
                    <a class="btn btn-success btn-xs" title="Просмотр" target="_blank" href="http://{{$item->url}}.{{config('app.url')}}"><i class="fa fa-list"></i> Просмотреть</a>
                    <a class="btn btn-primary btn-xs" href="/administrator/items/{{$type}}/edit/{{$item->id}}"><i class="fa fa-pencil"></i> Редактировать</a>
                    <a class="btn btn-success btn-xs" title="Слайды" href="/administrator/slider/{{$item->id}}"><i class="fa fa-list"></i> Слайды</a>
                    @if($type == 'studio' || $type == 'homeset')
                    <a class="btn btn-success btn-xs" title="Выставочные образцы" href="/administrator/collections/0/{{$item->id}}"><i class="fa fa-list"></i> Выставочные образцы</a>
                    @endif
                    @if($type == 'designers' || $type == 'studio')
                    <a class="btn btn-success btn-xs" title="Реализованные проекты" href="/administrator/collections/1/{{$item->id}}"><i class="fa fa-list"></i> Реализованные проекты</a>
                    @endif
                    <a class="btn btn-success btn-xs" title="Отзывы" href="/administrator/reviews/{{$item->id}}"><i class="fa fa-list"></i>@if($type == 'homeset') Новости @else Отзывы @endif</a>
                    @if($type != 'homeset')
                    <a class="btn btn-danger btn-xs confirmation-link" href="/administrator/items/{{$type}}/delete/{{$item->id}}"><i class="fa fa-trash-o"></i> Удалить</a>
                    @endif
                    @if($type == 'homeset')
                    <a class="btn btn-success btn-xs" title="Дизайнеры кухонь" href="/administrator/items/{{$type}}/designers/0/{{$item->id}}"><i class="fa fa-list"></i> Дизайнеры кухонь</a>
                    <a class="btn btn-success btn-xs" title="Дизайнеры интерьера" href="/administrator/items/{{$type}}/designers/1/{{$item->id}}"><i class="fa fa-list"></i> Дизайнеры интерьера</a>
                    @endif
                    @if($type == 'homeset' || $type == 'designers')
                    <a class="btn btn-success btn-xs" title="Дизайнеры интерьера" href="/administrator/items/recipients/{{$item->id}}"><i class="fa fa-list"></i> Список получателей</a>
                    @endif
                    <a class="btn btn-success btn-xs" title="Обратные звонки" href="/administrator/items/{{$type}}/callbacks/{{$item->id}}"><i class="fa fa-list"></i> Обратные звонки и отзывы</a>
                    <a class="btn btn-success btn-xs" title="Меню" href="/administrator/menu/{{$item->id}}"><i class="fa fa-list"></i> Меню</a>
                    <a class="btn btn-success btn-xs" title="Настройки" href="/administrator/items/settings/{{$item->id}}"><i class="fa fa-list"></i> Настройки</a>
                    <a class="btn btn-success btn-xs" title="Статистика" href="/administrator/items/statistic/{{$item->id}}"><i class="fa fa-list"></i> Статистика</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@stop
