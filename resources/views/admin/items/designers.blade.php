@extends($basepanel)
@section('content')
<form method="post">
    <div class="dd" id="nestable_list_3">
        <ol class="dd-list" id="designers-container">
            @foreach($assigned_items as $ai)
            <li class="item dd-item dd3-item">
                <div class="dd-handle dd3-handle"></div>
                <div class="dd3-content">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label>Дизайнер</label>
                                <select name="designer[]" class="form-control">
                                    @foreach($items as $item)
                                    <option value="{{$item->id}}"@if($item->id == $ai->designer_id) selected @endif>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <span class="btn btn-danger del"><i class="fa fa-trash"></i></span>
                            <input type="hidden" name="designerid[]" value="{{$ai->id}}" />
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ol>
    </div>
    <span id="add-designer-value" class="btn btn-primary">Добавить дизайнера @if($designer_type == 0) кухонь @elseif($designer_type == 1) интерьера @endif </span>
    <div style="margin-top: 10px;">
        <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Сохранить </button>
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
</form>
<script>
$('#add-designer-value').click(function()
{
    var htm = '<li class="item dd-item dd3-item">\
                <div class="dd-handle dd3-handle"></div>\
                <div class="dd3-content">\
                    <div class="row">\
                        <div class="col-md-10">\
                            <div class="form-group">\
                                <label>Дизайнер</label>\
                                <select name="designer[]" class="form-control">\
                                    @foreach($items as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>\
                                    @endforeach
                                </select>\
                            </div>\
                        </div>\
                        <div class="col-md-2">\
                            <span class="btn btn-danger del"><i class="fa fa-trash"></i></span>\
                            <input type="hidden" name="designerid[]" value="0" />\
                        </div>\
                    </div>\
                </div>\
            </li>';
    
    $(htm).appendTo('#designers-container');
})

$('#designers-container').on('click', '.del', function()
{
    return setconfirm('Вы уверены?', function(el)
    {
        el.closest('.item').remove();
    }, false, $(this));
})
</script>
@stop