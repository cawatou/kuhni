@extends($basepanel)
@section('content')
<section class="panel">
    <header class="panel-heading tab-dark ">
        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#main-data">Основные данные</a>
            </li>
            <li>
                <a data-toggle="tab" href="#images-data">Изображения</a>
            </li>
        </ul>
    </header>
    <div class="panel-body">
        <form method="post" enctype="multipart/form-data">
            <div class="tab-content">
                <div id="main-data" class="tab-pane active">
                    <div class="form-group">
                        <label for="user-name">Название</label>
                        <input type="text" name="name" class="form-control" id="user-name" placeholder="Введите Название" />
                    </div>
                    <div class="form-group">
                        <label for="product-city">Дата создания</label>
                        <input type="text" name="publish_date" class="form-control" id="user-publish_date" placeholder="Введите Дату создания" />
                    </div>
                    <div class="form-group">
                        <label for="product-address">Описание</label>
                        <textarea rows="8" class="form-control" name="description" id="user-description" placeholder="Введите Описание"></textarea>
                    </div>
                </div>
                <div id="images-data" class="tab-pane">
                    <div class="dd" id="nestable_list_3">
                        <ol class="dd-list" id="images-container">
                            
                        </ol>
                    </div>
                    <span id="add-img-value" class="btn btn-primary">Добавить изображение</span>
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
