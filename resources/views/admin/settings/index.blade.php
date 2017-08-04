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
                        <label>Центр карты широта</label>
                        <input type="text" name="setting[map_center_lat]" class="form-control" value="<?php echo (isset($items['map_center_lat'])) ? $items['map_center_lat'] : ''; ?>" placeholder="Введите широту" />
                    </div>
                    <div class="form-group">
                        <label>Центр карты догота</label>
                        <input type="text" name="setting[map_center_lng]" class="form-control" value="<?php echo (isset($items['map_center_lng'])) ? $items['map_center_lng'] : ''; ?>" placeholder="Введите доготу" />
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
