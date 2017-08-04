$(function(){
    $.ajaxSetup(
    {
        headers:
        {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        }
    });

    /**
     * Пагинация
     */
    $(document).on('click', '.paginate a:not(".active")', function(){
        var _this = $(this);
        var parent = $(this).closest('.container');
        _this.parent().parent().find('a').removeClass('active');
        _this.addClass('active');
        parent.find('>.row').hide();

        parent.find('>.row').each(function () {
            console.log($(this).data('id'));
            if($(this).data('id')==_this.data('id')){
                $(this).fadeIn('1000',function () {
                    if(parent.hasClass('news_inner')){
                        console.log($(this));
                        news_height($(this));
                    }
                });
            }
        });
    });

    /*------------*/

    
    function numberHead() {
        var count = 1;
        $('body>div .container .head_block .number_block').each(function () {
            $(this).text('0'+count);
            count++;
        });
    }
    numberHead();
    

    /**
     * Галлерея
     */
    $('.collection .gallery_photo').click(function(){
        if($(this).hasClass('gallery_photo')){
            var _this = $(this);
        }else{
            var _this = $(this).parent();
        }

        var append_block = _this.closest('.collection').find('.append_gallery');
        var gallery = _this.parent().find('.gallery_content');
        append_block.parent().parent().fadeOut('300');

        setTimeout(function(){
            append_block.empty();
            gallery.clone().appendTo(append_block);
            flex_init();

            append_block.find(".slides a").fancybox();
            append_block.parent().parent().fadeIn('300');
            append_block.parent().parent().find('.gallery_text').perfectScrollbar();
            $('body, html').animate({
                scrollTop: append_block.offset().top-$('header').height()-70
            }, 1000);
        },300);
        return false;
    });

    $('.slide_block .close').click(function(){
        $(this).parent().parent().slideUp(300);
    });

    /**
     * Дизайн галлерея
     */
    $(document).on('click', '.design_author_block1', function(){
        //$('.design .close').trigger('click');
        var append_block = $('.design .slide_block_user .slide_block');
        append_block.find('.slider_design').remove();
        append_block.show('300');
        append_block.find('.container').append($(this).find('.slider_design').clone());
        flex_design_init(append_block);
        design_slider_init(append_block);
        navigate(append_block);
        $('body, html').animate({
            scrollTop: append_block.offset().top-$('header').height()-25
        }, 1000);
        return false;
    });
    $(document).on('click', '.ready_progect .gallery_photo', function(){
        //$('.design .close').trigger('click');
        var append_block = $('.ready_progect .slide_block_user .slide_block');
        append_block.find('.slider_design').remove();
        append_block.show('300');
        append_block.find('.container').append($(this).parent().find('.slider_design').clone());
        flex_design_init(append_block);
        design_slider_init(append_block);
        navigate(append_block);
        append_block.find(".thumbnails a").fancybox();
        $('body, html').animate({
            scrollTop: append_block.offset().top-$('header').height()-25
        }, 1000);
        return false;
    });
    $(document).on('click', '.design_author_main', function () {
        var marker_key = $(this).data('maps');
        var append_block = $('.design .slide_block_user');
        append_block.fadeOut();
        append_block.find('.append_content').remove();
        append_block.fadeIn();
        append_block.append($(this).find('.append_content').clone());
        flex_designer_init(append_block.find('.gallery_user'));
        append_block.find('.thumbnails a').fancybox();

        $('body, html').animate({
            scrollTop: append_block.offset().top-$('header').height()-25
        }, 1000);

        reset_icon(markers);//Р РµСЃРµС‚РёРј РјР°СЂРєРµСЂС‹
        markers[marker_key].setIcon(active);//Р”РµР»Р°РµРј РјР°СЂРєРµСЂ Р°РєС‚РёРІРЅС‹Рј
        add_active_maps(marker_key);
    });


    /**
     * Клик на крестик
     */
    $(document).on('click', '.design .close', function () {
        $(this).parent().find('.slider_design').remove();
        $('.design .slide_block').hide(300);
    });
    $(document).on('click', '.append_content .close', function () {
        $(this).parent().parent().fadeOut('300');
        setTimeout(function(){
            $(this).parent().parent().remove();
        },300);
    });



    $(document).on('click', '.bootstrap-select .dropdown-menu a', function () {
        $('#select_val').val($(this).find('.text').text());
    });

    /**
     * Валидации форм
     */
    $('#write_form').validate({
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            phone: {
                required: true,
                minlength: 6
            },
            email: {
                required: true,
                email: true
            },
            select_val: {
                required: true
            },
            comment:{
                required: true,
                minlength: 6
            }
        },
        messages:{
            name:{
                required: false,
                minlength: false
            },
            phone:{
                required: false,
                minlength: false
            },
            email:{
                required: false,
                email: false
            },
            select_val:{
                required: false
            },
            comment:{
                required: false,
                minlength: false
            }
        },
        errorPlacement: function(error, element) {

        },
        submitHandler: function(form) {
            var formdata = $('#write_form').serialize();
            $.post(
                "/add_callback",
                formdata,
                function(data)
                {
                    if(data.result == 'success')
                    {
                        $('#write_to_us').modal('hide');
                        $('#form_sucess').modal();
                        $(form).find('input').removeClass('valid').val('');
                        $(form).find('textarea').removeClass('valid').val('');
                    }
                },
                'json'
            );
            return false;
        }
    });
    $('#feedback_form').validate({
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            phone: {
                required: true,
                minlength: 6
            },
            email: {
                email: true,
                required: true
            }
        },
        messages:{
            name:{
                required: false,
                minlength: false
            },
            phone:{
                required: false,
                minlength: false
            },
            email:{
                email: false,
                required: false
            }
        },
        errorPlacement: function(error, element) {

        },
        submitHandler: function(form) {
            var formdata = $('#feedback_form').serialize();
            $.post(
                "/add_callback",
                formdata,
                function(data)
                {
                    if(data.result == 'success')
                    {
                        $('#feedback').modal('hide');
                        $('#form_sucess').modal();
                        $(form).find('input').removeClass('valid').val('');
                        $(form).find('textarea').removeClass('valid').val('');
                    }
                },
                'json'
            );
            
            return false;
        }
    });
    $('#review_form').validate({
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            phone: {
                required: true,
                minlength: 6
            },
            email: {
                email: true,
                required: true
            },
            comment: {
                required: true
            }
        },
        messages:{
            name:{
                required: false,
                minlength: false
            },
            phone:{
                required: false,
                minlength: false
            },
            email:{
                email: false,
                required: false
            },
            comment: {
                required: false
            }
        },
        errorPlacement: function(error, element) {

        },
        submitHandler: function(form) {
            var formdata = $('#review_form').serialize();
            $.post(
                "/add_callback",
                formdata,
                function(data)
                {
                    if(data.result == 'success')
                    {
                        $('#review').modal('hide');
                        $('#form_sucess_review').modal();
                        $(form).find('input').removeClass('valid').val('');
                        $(form).find('textarea').removeClass('valid').val('');
                    }
                },
                'json'
            );
            return false;
        }
    });
    $('#registration_form').validate({
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            password: {
                required: true
            },
            password_confirmation: {
                required: true
            },
            email: {
                email: true,
                required: true
            }
        },
        messages:{
            name:{
                required: false,
                minlength: false
            },
            password:{
                required: false
            },
            password_confirmation:{
                required: false
            },
            email: {
                email: false,
                required: false
            }
        },
        errorPlacement: function(error, element) {

        },
        submitHandler: function(form) {
            $('#login').modal('hide');
            //$(form).find('input').removeClass('valid').val('');
            return true;
        }
    });
    $('.open_login_form').click(function(){
        $('#login_form').removeAttr('style');
        $('#registration_form').removeAttr('style');
        $('#login_form input[type=text], #login_form input[type=password]').val('');
        $('#registration_form input').val('');
    });
    $('#login_form').validate({
        rules: {
            email: {
                required: true,
                minlength: 2
            },
            password: {
                required: true
            }
        },
        messages:{
            email:{
                required: false,
                minlength: false
            },
            password:{
                required: false
            }
        },
        errorPlacement: function(error, element) {
            console.log(error)
        },
        submitHandler: function(form) {
            $('#login').modal('hide');
            return true;
        }
    });
    /*-----------------*/

    $('.selectpicker').selectpicker({ });

    $("input[type='tel']").mask("+7(999) 999-99-99");

    $('.registration').click(function(){
        $('#login_form').hide();
        $('#registration_form').show();
    });
    specialist_height();

     $("nav a").click(function () {
         var elementClick = $(this).attr("href")
         var destination = $(elementClick).offset().top;
         jQuery("html:not(:animated),body:not(:animated)").animate({scrollTop: destination-$('header').height()}, 800);
         return false;
     });

    $('body').css('padding-top',$('header').height()+25);

    news_height($('.news_inner>.active'));

    $('.news_head span').click(function () {
        var height_last = $(this).closest('.news_block').find('>div:last').data('height');
        if($(this).hasClass('open')){
            $(this).text('+').removeClass('open');
            $(this).closest('.news_block').find('>div:last').removeClass('no_after').height(height_last);
        }else{
            $(this).text('-').addClass('open');
            $(this).closest('.news_block').find('>div:last').addClass('no_after').css('height', "auto");
        }
    });

    top_menu();

    $('.open_menu').click(function(){
        $(this).siblings('ul').slideToggle();
    });

    $('.logo a').click(function () { // При клике по кнопке "Наверх" попадаем в эту функцию
        /* Плавная прокрутка наверх */
        $('body, html').animate({
            scrollTop: 0
        }, 1000);
        return false;
    });

    /*main_slider();*/

});
function specialist_height(){
    $('.main_slider').flexslider({
        animation: "slide",
        controlNav: false,
        start: function () {
            $('.main_slider_block .user_info').height($('.main_slider .flex-viewport').height()-25);
            $('.main_slider_block .user_text>div').height($('.main_slider .flex-viewport').height()-25-$('.main_slider_block .user_info>.row:first').height()-$('.link_progect').height()-100);
            $('.main_slider_block .user_text>div').perfectScrollbar();
        }
    });
}
var count=0;
$(window).scroll(function () {
    var statistic_pos = $('.count_number').offset();
    if(count==0 && $(window).scrollTop()+$(window).height()>=statistic_pos.top){
        $('.number').countTo();
        count++;
    }
});
$(window).resize(function(){
    /*main_slider();*/
    $('body').css('padding-top',$('header').height()+25);
    $('.main_slider_block .user_info').height($('.main_slider .flex-viewport').height()-25);
    $('.main_slider_block .user_text>div').height($('.main_slider .flex-viewport').height()-25-$('.main_slider_block .user_info>.row:first').height()-$('.link_progect').height()-100);
    $('.main_slider_block .user_text>div').perfectScrollbar();
    specialist_height();
});
function flex_init() {
    $('.append_gallery .thumbnail_slide').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 160,
        itemMargin: 30,
        asNavFor: '.append_gallery .gallery_slider'
    });

    $('.append_gallery .gallery_slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: ".append_gallery .thumbnail_slide",
        start : function () {
            height_slider($('.gallery_slider'));
        }
    });
}

function flex_designer_init(element) {
    element.flexslider({
        animation: "slide",
        animationLoop: false,
        itemWidth: 162,
        itemMargin: 30,
        minItems: 2,
        maxItems: 6,
        start : function () {
            height_slider($('.gallery_user'));
            var elem = $('.append_content .user_info .user_text p');
            var height = elem.height();
            if(height>260){
                elem.addClass('overflow_add');
            }
        }
    });
}


function flex_design_init(parent) {
    /*Слайдер в дизайне*/
    var slides = parent.find('.thumb-box .thumbs li');
    var thumbs = [];
    var result = [];
    for(var i = 0; i<slides.length;i++){
        if(i % 5 == 0){
            result.push(thumbs);
            thumbs=[];
        }
        thumbs.push(slides[i]);
    }
    result.push(thumbs);
    parent.find('.thumb-box>ul').remove();

    var html_ready ='';
    var count = 0;
    for(var i=0;i<result.length;i++){
        if(result[i].length!=0){
            if(count==0){
                var class_active = 'active';
            }else{
                var class_active = '';
            }
            count++;
            html_ready +='<ul class="thumbs '+class_active+'">';
            for(var j=0; j<result[i].length;j++){
                html_ready += '<li>'+result[i][j].innerHTML+'</li>';
            }
            html_ready += '</ul>';
        }
    }
    parent.find('.thumb-box').prepend(html_ready);
    /*-----------------*/
}

function navigate(){
    var active_index = '';
    $(document).on('click', '.slideControl .prev', function () {
        $('.sy-prev a').click();

        var thumbs = $('.design .slide_block .thumb-box>ul');
        var j= 0;
        thumbs.each(function () {
            var class_name = $(this).attr('class');
            if(class_name.indexOf('active')!=-1){
                active_index = j;
            }
            j++;
        });
        if(active_index!=0){
            thumbs.removeClass('active');
            $(thumbs[+active_index-1]).addClass('active');
        }else{
            return false;
        }
        //console.log(active_index);
    });

    $(document).on('click', '.slideControl .next', function () {
        $('.sy-next a').click();

        var thumbs = $('.design .slide_block .thumb-box>ul');
        var j= 0;
        thumbs.each(function () {
            var class_name = $(this).attr('class');
            if(class_name.indexOf('active')!=-1){
                active_index = j;
            }
            j++;
        });
        if(active_index!=thumbs.length-1){
            thumbs.removeClass('active');
            $(thumbs[+active_index+1]).addClass('active');
        }else{
            return false;
        }
        //console.log(active_index)
    });

}

function design_slider_init(parent) {
    var thumbs = parent.find('.thumbnails').slippry({
        // general elements & wrapper
        slippryWrapper: '<div class="slippry_box thumbnails" />',
        // options
        transition: 'horizontal',
        pager: false,
        auto: false,
        onSlideBefore: function (el, index_old, index_new) {
            parent.find('.thumbs a img').removeClass('active');
            jQuery('img', parent.find('.thumbs a')[index_new]).addClass('active');
        }
    });

    parent.find('.thumbs a').click(function () {
        thumbs.goToSlide($(this).data('slide'));
        return false;
    });
}

/**
 * Размер новостей и отзывов
 */
function news_height(news_block){
    var news = $('.news');
    var paginate = news.find('.paginate');
    var height_news = $(window).height()-$('header').height();
    var height_paginate = parseInt(paginate.height())+parseInt(paginate.css('margin-top'))+parseInt(paginate.css('margin-bottom'));
    var area = height_news - parseInt(news.find('>.container:not(.news_inner)').height())-parseInt(height_paginate);
    var height_head = 0;
    var count_news = news_block.find('.news_block').length;
    area -= 60*count_news;
    var height_elem = area/count_news;

    news_block.find('.news_block>div:last-child').each(function () {
        $(this).removeClass('no_after');
        if(+$(this).find('.news_text').height()+30>height_elem){
            $(this).animate({height: height_elem}, 500).attr('data-height',height_elem);
        }else{
            $(this).addClass('no_after').parent().find('>div:first span').remove();
            $(this).animate({height : $(this).find('.news_text').height()+30}, 500);
        }
        $(this).find('.news_text').css('opacity','1');
    });
}

function top_menu(){
    $('.top_menu>a').click(function(){
        $(this).siblings().slideToggle();
    });
    $(document).click( function(event){
        if( $(event.target).closest(".top_menu").length )
            return;
        $(".top_menu .dropdown-menu").slideUp();
        event.stopPropagation();
    });

}

function main_slider(){
    var windowH = $(window).height();
    var headerH = $('header').height();
    if($('.main_slider_block .main_slider').length){
        $('.main_slider_block .main_slider').height(windowH-headerH);
    }

}

function height_slider(elem)
{
    var height = elem.find('li:first').height();

    elem.find('.slides>li>a>img').height(height).css('width', 'auto');
}