@extends($basepanel)
@section('content')
<section class="panel">
    <header class="panel-heading head-border">
        @if($ctype == 0)
            Выставочные образцы
        @elseif($ctype == 1)
            Реализованные проекты
        @endif
        для {{$itemfor->name}}
    </header>
    @if($ctype == 0 || ($itemfor->type == 1 || $itemfor->type == 2))
    <div class="panel-body">
        <a href="/administrator/collections/{{$ctype}}/{{$itemfor->id}}/add" class="btn btn-success"><i class="fa fa-plus"></i> Добавить </a>
    </div>
    @endif
    <table class="table table-striped custom-table table-hover">
        <thead>
            <tr>
                <th><i class="fa fa-bookmark-o"></i> ID</th>
                <th class="hidden-xs"><i class="fa fa-building-o"></i> Название</th>
                <th class="hidden-xs" style="width: 120px;"><i class="fa fa-cogs"></i> Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td><strong>{{$item->name}}</strong></td>
                <td class="hidden-xs">
                    @if($itemfor->type != 2 && !$is_in_designer)
                        @if(!$item->published)
                        <a class="btn btn-success btn-xs" href="/administrator/collections/{{$ctype}}/{{$itemfor->id}}/publish/{{$item->id}}"><i class="fa fa-check"></i></a>
                        @else
                        <a class="btn btn-danger btn-xs" href="/administrator/collections/{{$ctype}}/{{$itemfor->id}}/publish/{{$item->id}}"><i class="fa fa-close"></i></a>
                        @endif
                    @endif
                    <a class="btn btn-primary btn-xs" href="/administrator/collections/{{$ctype}}/{{$itemfor->id}}/edit/{{$item->id}}"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-danger btn-xs confirmation-link" href="/administrator/collections/{{$itemfor->id}}/delete/{{$item->id}}"><i class="fa fa-trash-o "></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@stop
