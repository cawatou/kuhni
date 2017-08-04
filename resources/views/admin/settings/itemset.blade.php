@extends($basepanel)
@section('content')
<section class="panel">
    <header class="panel-heading tab-dark ">
        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#main-data">Основные настройки</a>
            </li>
        </ul>
    </header>
    <div class="panel-body">
        <form method="post" enctype="multipart/form-data">
            <div class="tab-content">
                <div id="main-data" class="tab-pane active">
                    <div class="form-group">
                        <label>Код счетчика google</label>
                        <textarea name="setting[code_google-{{$foritem->id}}]" class="form-control"><?php echo $items['code_google-'.$foritem->id]; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Код яндекс</label>
                        <textarea name="setting[code_yandex-{{$foritem->id}}]" class="form-control"><?php echo $items['code_yandex-'.$foritem->id]; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Код чата</label>
                        <textarea name="setting[code_chat-{{$foritem->id}}]" class="form-control"><?php echo $items['code_chat-'.$foritem->id]; ?></textarea>
                    </div>
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
