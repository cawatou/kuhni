@extends($basepanel)
@section('content')
<section class="panel">
    <header class="panel-heading head-border">
        Статистика
    </header>
    <table class="table table-striped custom-table table-hover">
        <thead>
            <tr>
                <th><i class="fa fa-bookmark-o"></i> Дата</th>
                <th><i class="fa fa-bookmark-o"></i> Уникальные посетители</th>
                <th><i class="fa fa-bookmark-o"></i> Вернувшиеся посетители</th>
                <th><i class="fa fa-bookmark-o"></i> Заявки</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $d)
            <tr>
                <td><strong>{{$d->date}}</strong></td>
                <td>{{$d->cnt_unic}}</td>
                <td>{{$d->cnt_all}}</td>
                <td>{{$d->cnt_calls}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@stop