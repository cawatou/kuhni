@extends($basepanel)
@section('content')
<section class="panel">
    <header class="panel-heading head-border">
        Пользователи
    </header>
    <div class="panel-body">
        <a href="/administrator/users/add" class="btn btn-success"><i class="fa fa-plus"></i> Добавить </a>
    </div>
    <table class="table table-striped custom-table table-hover">
        <thead>
            <tr>
                <th><i class="fa fa-bookmark-o"></i> ID</th>
                <th class="hidden-xs"><i class="fa fa-building-o"></i> Имя</th>
                <th class="hidden-xs"><i class="fa fa-building-o"></i> Email</th>
                <th class="hidden-xs" style="width: 120px;"><i class="fa fa-cogs"></i> Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td><strong>{{$item->name}}</strong></td>
                <td>{{$item->email}}</td>
                <td class="hidden-xs">
                    <a class="btn btn-primary btn-xs" href="/administrator/users/edit/{{$item->id}}"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-danger btn-xs confirmation-link" href="/administrator/users/delete/{{$item->id}}"><i class="fa fa-trash-o "></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@stop
