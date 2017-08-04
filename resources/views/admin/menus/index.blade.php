@extends($basepanel)
@section('content')
<div class="dd" id="nestable_list_3">
    <ol class="dd-list">
        @foreach($items as $item)
        <li class="dd-item dd3-item" data-id="{{$item->id}}" data-link="{{$item->link}}" data-name="{{$item->name}}">
            <div class="dd-handle dd3-handle"></div>
            <div class="dd3-content">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Название</label>
                            <input type="text" name="name" class="form-control" value="{{$item->name}}" placeholder="Введите название" />
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Ссылка</label>
                            <input type="text" name="link" class="form-control" value="{{$item->link}}" placeholder="Введите ссылку" />
                        </div>
                    </div>
                    <div class="col-md-2" style="padding-top: 10px;">
                        <span class="btn btn-danger del"><i class="fa fa-trash"></i></span>
                    </div>
                </div>
            </div>
            {{--*/ $subs = $item->subitems()->orderBy('pos', 'ASC')->get(); /*--}}
            @if(count($subs) > 0)
            <ol class="dd-list">
                @foreach($subs as $sub)
                <li class="dd-item dd3-item" data-id="{{$sub->id}}" data-link="{{$sub->link}}" data-name="{{$sub->name}}">
                    <div class="dd-handle dd3-handle"></div>
                    <div class="dd3-content">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Название</label>
                                    <input type="text" name="name" class="form-control" value="{{$sub->name}}" placeholder="Введите название" />
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Ссылка</label>
                                    <input type="text" name="link" class="form-control" value="{{$sub->link}}" placeholder="Введите ссылку" />
                                </div>
                            </div>
                            <div class="col-md-2" style="padding-top: 10px;">
                                <span class="btn btn-danger del"><i class="fa fa-trash"></i></span>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ol>
            @endif
        </li>
        @endforeach
    </ol>
</div>
<div style="margin: 20px; 0">
    <span class="btn btn-primary" id="add-menu-item-btn">Добавить пункт</span>
</div>

<form method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="nestable_list_3_output" id="nestable_list_3_output" value="" />
    <button type="submit" class="btn btn-success">Сохранить</button>
</form>
@stop