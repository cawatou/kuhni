@extends($basepanel)
@section('content')
<section class="panel">
    <header class="panel-heading tab-dark ">
        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#main-data">Основные данные</a>
            </li>
        </ul>
    </header>
    <div class="panel-body">
        <form method="post" enctype="multipart/form-data">
            <div class="tab-content">
                <div id="main-data" class="tab-pane active">
                    <div class="form-group">
                        <label for="user-name">Имя</label>
                        <input type="text" name="name" class="form-control" id="user-name" placeholder="Введите Имя" value="{{$item->name}}" />
                    </div>
                    <div class="form-group">
                        <label for="product-address">Описание</label>
                        <textarea rows="8" class="form-control" name="content" id="user-description" placeholder="Введите Описание">{{$item->content}}</textarea>
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
