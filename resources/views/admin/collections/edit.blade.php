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
                        <input type="text" name="name" class="form-control" id="user-name" placeholder="Введите Название" value="{{$item->name}}" />
                    </div>
                    <div class="form-group">
                        <label for="product-city">Дата создания</label>
                        <input type="text" name="publish_date" class="form-control" id="user-publish_date" placeholder="Введите Дату создания" value="{{$item->publish_date}}" />
                    </div>
                    <div class="form-group">
                        <label for="product-address">Описание</label>
                        <textarea rows="8" class="form-control" name="description" id="user-description" placeholder="Введите Описание">{{$item->description}}</textarea>
                    </div>
                </div>
                <div id="images-data" class="tab-pane">
                    <div class="dd" id="nestable_list_3">
                        <ol class="dd-list" id="images-container">
                            @foreach($images as $image)
                            <li class="item dd-item dd3-item">
                                <div class="dd-handle dd3-handle"></div>
                                <div class="dd3-content">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="/files/collections/{{$image->value}}" alt="" />
                                        </div>
                                        <div class="col-md-7">
                                            <input type="file" name="image[]" value="" class="form-control" />
                                        </div>
                                        <div class="col-md-2">
                                            <span class="btn btn-danger del"><i class="fa fa-trash"></i></span>
                                            <input type="hidden" name="imageid[]" value="{{$image->id}}" />
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
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
