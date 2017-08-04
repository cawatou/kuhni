@extends($basepanel)
@section('content')
<section class="panel">
    <header class="panel-heading head-border">
        Заказ обратных звонков
    </header>
    <table class="table table-striped custom-table table-hover">
        <thead>
            <tr>
                <th><i class="fa fa-bookmark-o"></i> Тип</th>
                <th><i class="fa fa-bookmark-o"></i> Имя</th>
                <th class="hidden-xs"><i class="fa fa-building-o"></i> Телефон</th>
                <th class="hidden-xs"><i class="fa fa-building-o"></i> Email</th>
                <th class="hidden-xs"><i class="fa fa-building-o"></i> Комментарий</th>
                <th class="hidden-xs"><i class="fa fa-building-o"></i> Дата</th>
                <th class="hidden-xs" style="width: 150px;"><i class="fa fa-cogs"></i> Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($callbacks as $item)
            <tr>
                <td><strong>@if($item->type == 0) обратный звонок @elseif($item->type == 1) отзыв @elseif($item->type == 2) письмо @endif</strong></td>
                <td><strong>{{$item->name}}</strong></td>
                <td>{{$item->phone}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->comment}}</td>
                <td>{{$item->created_at}}</td>
                <td class="hidden-xs">
                    <a class="btn btn-danger btn-xs" title="Удалить" href="/administrator/items/{{$type}}/callbacks/delete/{{$item->id}}"><i class="fa fa-list"></i> Удалить</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@stop
