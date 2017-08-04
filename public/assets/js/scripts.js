tinymce.init({
    selector: "textarea.tmce",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste filemanager"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});

function setconfirm(message, yesCallback, noCallback, el)
{

    $('#ModalSetConfirm .confirm-message').html(message);
    $('#ModalSetConfirm .confirm-title').html(message);
    
    $('#ModalSetConfirm').modal('show');
    
    $('#ModalSetConfirm .confirm-no').off('click');
    $('#ModalSetConfirm .confirm-no').click(function() {
        $('#ModalSetConfirm').modal('hide');
        if(typeof(noCallback) != 'undefined' && noCallback != false)
            noCallback(el);
    });
    $('#ModalSetConfirm .confirm-yes').off('click');
    $('#ModalSetConfirm .confirm-yes').click(function() {
        $('#ModalSetConfirm').modal('hide');
        if(typeof(yesCallback) != 'undefined' && yesCallback != false)
            yesCallback(el);
    });
    
    return false;
}

function toTranslit(text) {
    return text.replace(/([а-яё])|([\s_-])|([^a-z\d])/gi,
        function (all, ch, space, words, i) {
            if (space || words) {
                return space ? '-' : '';
            }
            var code = ch.charCodeAt(0),
                index = code == 1025 || code == 1105 ? 0 :
                    code > 1071 ? code - 1071 : code - 1039,
                t = ['yo', 'a', 'b', 'v', 'g', 'd', 'e', 'zh',
                    'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p',
                    'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh',
                    'shch', '', 'y', '', 'e', 'yu', 'ya'
                ];
            return t[index];
        });
}


jQuery(document).ready(function()
{
    $('#product-name').on('input', function(){
        var title = $(this).val();
        var url = toTranslit(title.trim()).toLowerCase();
        //var url = title.split(' ').join('-').toLowerCase();
        $('#product-url').val(url);
    });
    
    $('#add-ch-value').click(function()
    {
        var htm = '<div class="item">\
                        <div class="row">\
                            <div class="col-md-5">\
                                <input name="valuename[]" value="" class="form-control" placeholder="Название" />\
                            </div>\
                            <div class="col-md-5">\
                                <input name="valueslug[]" value="" class="form-control" placeholder="Slug" />\
                            </div>\
                            <div class="col-md-2">\
                                <span class="btn btn-danger del"><i class="fa fa-trash"></i></span>\
                                <input type="hidden" name="valueid[]" value="0" />\
                            </div>\
                        </div>\
                    </div>';
        
        $(htm).appendTo('#characteristics-container');
    })
    
    $('#characteristics-container').on('click', '.del', function()
    {
        return setconfirm('Вы уверены?', function(el)
        {
            el.closest('.item').remove();
        }, false, $(this));
    })
    
    
    $('#add-var-value').click(function()
    {
        var htm = '<li class="item dd-item dd3-item">\
                        <div class="dd-handle dd3-handle"></div>\
                        <div class="dd3-content">\
                            <div class="row">\
                                <div class="col-md-5">\
                                    <input type="text" name="variantname[]" value="" class="form-control" placeholder="Название" />\
                                </div>\
                                <div class="col-md-5">\
                                    <input type="text" name="varianturl[]" value="" class="form-control" placeholder="URL" />\
                                </div>\
                                <div class="col-md-2">\
                                    <span class="btn btn-danger del"><i class="fa fa-trash"></i></span>\
                                    <input type="hidden" name="variantid[]" value="0" />\
                                </div>\
                            </div>\
                            <div class="row">\
                                <div class="col-md-5">\
                                    <input type="text" name="variantprice[]" value="" class="form-control" placeholder="Цена" />\
                                </div>\
                                <div class="col-md-5">\
                                    <input type="text" name="variantpricedisc[]" value="" class="form-control" placeholder="Цена по скидке" />\
                                </div>\
                            </div>\
                            <div class="row">\
                                <div class="col-md-5">\
                                    <select name="variantstatus[]" class="form-control">\
                                        <option value="0">Есть в наличии</option>\
                                        <option value="1">Нет в наличии</option>\
                                        <option value="2">Под заказ</option>\
                                    </select>\
                                </div>\
                                <div class="col-md-5">\
                                    <input type="text" name="varianthow[]" value="" class="form-control" placeholder="Количество" />\
                                </div>\
                            </div>\
                        </div>\
                    </li>';
        
        $(htm).appendTo('#variants-container');
    })
    
    $('#variants-container').on('click', '.del', function()
    {
        return setconfirm('Вы уверены?', function(el)
        {
            el.closest('.item').remove();
        }, false, $(this));
    })
    
    
    $('#add-img-value').click(function()
    {
        var htm = '<li class="item dd-item dd3-item">\
                        <div class="dd-handle dd3-handle"></div>\
                        <div class="dd3-content">\
                            <div class="row">\
                                <div class="col-md-3">\
                                    <img src="/assets/img/default.png" alt="" />\
                                </div>\
                                <div class="col-md-7">\
                                    <input type="file" name="image[]" value="" class="form-control" />\
                                </div>\
                                <div class="col-md-2">\
                                    <span class="btn btn-danger del"><i class="fa fa-trash"></i></span>\
                                    <input type="hidden" name="imageid[]" value="0" />\
                                </div>\
                            </div>\
                        </div>\
                    </li>';
        
        $(htm).appendTo('#images-container');
    })
    
    $('#images-container').on('click', '.del', function()
    {
        return setconfirm('Вы уверены?', function(el)
        {
            el.closest('.item').remove();
        }, false, $(this));
    })
    
    
    
    $('#add-counter-value').click(function()
    {
        var htm = '<li class="item dd-item dd3-item">\
                        <div class="dd-handle dd3-handle"></div>\
                        <div class="dd3-content">\
                            <div class="row">\
                                <div class="col-md-4">\
                                    <div class="form-group">\
                                        <label>Название</label>\
                                        <input type="text" name="countername[]" class="form-control" placeholder="Введите Название" value="" />\
                                    </div>\
                                </div>\
                                <div class="col-md-4">\
                                    <div class="form-group">\
                                        <label>Значение</label>\
                                        <input type="text" name="countervalue[]" class="form-control" placeholder="Введите Значение" value="" />\
                                    </div>\
                                </div>\
                                <div class="col-md-2">\
                                    <div class="form-group">\
                                        <label>На главной</label>\
                                        <select name="counter_type[]" class="form-control">\
                                            <option value="4">Нет</option>\
                                            <option value="0">Студий</option>\
                                            <option value="1">Сотрудников</option>\
                                            <option value="2">Реализованных проектов</option>\
                                            <option value="3">Проектов в работе</option>\
                                        </select>\
                                    </div>\
                                </div>\
                                <div class="col-md-2">\
                                    <span class="btn btn-danger del"><i class="fa fa-trash"></i></span>\
                                    <input type="hidden" name="counterid[]" value="0" />\
                                </div>\
                            </div>\
                        </div>\
                    </li>';
        
        $(htm).appendTo('#counter-container');
    })
    
    $('#counter-container').on('click', '.del', function()
    {
        return setconfirm('Вы уверены?', function(el)
        {
            el.closest('.item').remove();
        }, false, $(this));
    })
    
    
    $('.confirmation-link').on('click', function()
    {
        return setconfirm('Вы уверены?', function(el)
        {
            document.location.href = el.attr('href')
        }, false, $(this));
    })
    
    $('body').on('click', '.approve-review', function()
    {
        var id = $(this).data('id');
        var stat = $(this).data('stat');
        var el = $(this);
        $.get(
            "/admin/reviews/approve/"+id+'/',
            {},
            function(data)
            {
                if(data.result == 'success')
                {
                    if(stat == 0)
                    {
                        el.replaceWith('<span class="btn btn-xs btn-success approve-review" data-stat="1" data-id="'+id+'"><i class="fa fa-check"></i></span>');
                    }
                    else
                    {
                        el.replaceWith('<span class="btn btn-xs btn-danger approve-review" data-stat="0" data-id="'+id+'"><i class="fa fa-times"></i></span>')
                    }
                }
            },
            'json'
        );
    })
    
    $('#delete_main_img').click(function()
    {
        $('#input-delete_main_img').val(1);
        $('#main_img').remove();
        $('#delete_main_img').remove();
    })
    
    $('#delete_bg_img').click(function()
    {
        $('#input-delete_bg_img').val(1);
        $('#bg_img').remove();
        $('#delete_bg_img').remove();
    })
})

var Nestable = function () {
    
    
    var updateOutput = function (e) {
        var list = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };
    
    if($('#nestable_list_3').length > 0)
    {
        $('#add-menu-item-btn').click(function()
        {
            var htm = '<li class="dd-item dd3-item" data-id="0" data-link="" data-name="">\
                <div class="dd-handle dd3-handle"></div>\
                <div class="dd3-content">\
                    <div class="row">\
                        <div class="col-md-5">\
                            <div class="form-group">\
                                <label>Название</label>\
                                <input type="text" name="name" class="form-control" placeholder="Введите название" />\
                            </div>\
                        </div>\
                        <div class="col-md-5">\
                            <div class="form-group">\
                                <label>Ссылка</label>\
                                <input type="text" name="link" class="form-control" placeholder="Введите ссылку" />\
                            </div>\
                        </div>\
                        <div class="col-md-2" style="padding-top: 10px;">\
                            <span class="btn btn-danger del"><i class="fa fa-trash"></i></span>\
                        </div>\
                    </div>\
                </div>\
            </li>';
            
            $(htm).appendTo('#nestable_list_3 > ol');
            updateOutput($('#nestable_list_3').data('output', $('#nestable_list_3_output')));
        })
        
        $('#nestable_list_3').nestable({maxDepth:2}).on('change', updateOutput);
        
        updateOutput($('#nestable_list_3').data('output', $('#nestable_list_3_output')));
        
        
        $('#nestable_list_3').on('input', 'input[type=text]', function()
        {
            var nm = $(this).attr('name');
            
            $(this).closest('.dd-item').data(nm, $(this).val());
            updateOutput($('#nestable_list_3').data('output', $('#nestable_list_3_output')));
        })
        
        $('#nestable_list_3').on('click', '.del', function()
        {
            return setconfirm('Вы уверены?', function(el)
            {
                el.closest('.dd-item').remove();
                updateOutput($('#nestable_list_3').data('output', $('#nestable_list_3_output')));
            }, false, $(this))
        })
    }
    else if($('#nestable_list_2').length > 0)
    {
        $('#add-recipient-item-btn').click(function()
        {
            var htm = '<li class="dd-item dd3-item" data-id="0" data-name="" data-email="">\
                <div class="dd-handle dd3-handle"></div>\
                <div class="dd3-content">\
                    <div class="row">\
                        <div class="col-md-5">\
                            <div class="form-group">\
                                <label>Название</label>\
                                <input type="text" name="name" class="form-control" placeholder="Введите название" />\
                            </div>\
                        </div>\
                        <div class="col-md-5">\
                            <div class="form-group">\
                                <label>Email</label>\
                                <input type="text" name="email" class="form-control" placeholder="Введите email" />\
                            </div>\
                        </div>\
                        <div class="col-md-2" style="padding-top: 10px;">\
                            <span class="btn btn-danger del"><i class="fa fa-trash"></i></span>\
                        </div>\
                    </div>\
                </div>\
            </li>';
            
            $(htm).appendTo('#nestable_list_2 > ol');
            updateOutput($('#nestable_list_2').data('output', $('#nestable_list_2_output')));
        })
        
        $('#nestable_list_2').nestable({maxDepth:1}).on('change', updateOutput);
        
        updateOutput($('#nestable_list_2').data('output', $('#nestable_list_2_output')));
        
        
        
        $('#nestable_list_2').on('input', 'input[type=text]', function()
        {
            var nm = $(this).attr('name');
            
            $(this).closest('.dd-item').data(nm, $(this).val());
            updateOutput($('#nestable_list_2').data('output', $('#nestable_list_2_output')));
        })
        
        $('#nestable_list_2').on('click', '.del', function()
        {
            return setconfirm('Вы уверены?', function(el)
            {
                el.closest('.dd-item').remove();
                updateOutput($('#nestable_list_2').data('output', $('#nestable_list_2_output')));
            }, false, $(this))
        })
    }
}();