$(function(){

    /**
     * РџР°РіРёРЅР°С†РёСЏ
     */
    $(document).on('click', '.paginate a:not(".active")', function(){
        var _this = $(this);
        var parent = $(this).parent().parent().parent().parent();
        _this.parent().parent().find('a').removeClass('active');
        _this.addClass('active');
        parent.find('>.row').hide();

        parent.find('>.row').each(function () {
            if($(this).data('id')==_this.data('id')){
                $(this).fadeIn('100',function () {
                    if(parent.hasClass('news_inner')){
                        console.log($(this));
                        news_height($(this));
                    }
                });
            }
        });
    });

    /*------------*/


    /**
     * Р“Р°Р»Р»РµСЂРµСЏ
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
                scrollTop: append_block.offset().top-$('header').height()
            }, 1000);
        },300);
        return false;
    });

    $('.slide_block .close').click(function(){
        $(this).parent().parent().slideUp(300);
    });

    /**
     * Р”РёР·Р°Р№РЅ РіР°Р»Р»РµСЂРµСЏ
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
     * РљР»РёРє РЅР° РєСЂРµСЃС‚РёРє
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
     * Р’Р°Р»РёРґР°С†РёРё С„РѕСЂРј
     */
    $('#write_form').validate({
        rules: {
            write_name: {
                required: true,
                minlength: 2
            },
            write_tel: {
                required: true,
                minlength: 6
            },
            write_email: {
                required: true,
                email: true
            },
            select_val: {
                required: true
            },
            write_text:{
                required: true,
                minlength: 6
            }
        },
        messages:{
            write_name:{
                required: false,
                minlength: false
            },
            write_tel:{
                required: false,
                minlength: false
            },
            write_email:{
                required: false,
                email: false
            },
            select_val:{
                required: false
            },
            write_text:{
                required: false,
                minlength: false
            }
        },
        errorPlacement: function(error, element) {

        },
        submitHandler: function(form) {
            $('#write_to_us').modal('hide');
            $('#form_sucess').modal();
            $(form).find('input').removeClass('valid').val('');
            $(form).find('textarea').removeClass('valid').val('');
            return false;
        }
    });
    $('#feedback_form').validate({
        rules: {
            name: {
                required: true,
                minlength: 2
            },
            tel: {
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
            tel:{
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
            $('#feedback').modal('hide');
            $('#form_sucess').modal();
            $(form).find('input').removeClass('valid').val('');
            $(form).find('textarea').removeClass('valid').val('');
            return false;
        }
    });
    $('#review_form').validate({
        rules: {
            name_review: {
                required: true,
                minlength: 2
            },
            tel_review: {
                required: true,
                minlength: 6
            },
            email_review: {
                email: true,
                required: true
            },
            text_review: {
                required: true
            }
        },
        messages:{
            name_review:{
                required: false,
                minlength: false
            },
            tel_review:{
                required: false,
                minlength: false
            },
            email_review:{
                email: false,
                required: false
            },
            text_review: {
                required: false
            }
        },
        errorPlacement: function(error, element) {

        },
        submitHandler: function(form) {
            $('#review').modal('hide');
            $('#form_sucess').modal();
            $(form).find('input').removeClass('valid').val('');
            $(form).find('textarea').removeClass('valid').val('');
            return false;
        }
    });
    $('#registration_form').validate({
        rules: {
            login2: {
                required: true,
                minlength: 2
            },
            psswd_reg: {
                required: true
            },
            psswd_reg2: {
                required: true
            },
            email_reg: {
                email: true,
                required: true
            }
        },
        messages:{
            login2:{
                required: false,
                minlength: false
            },
            psswd_reg:{
                required: false
            },
            psswd_reg2:{
                required: false
            },
            email_reg: {
                email: false,
                required: false
            }
        },
        errorPlacement: function(error, element) {

        },
        submitHandler: function(form) {
            $('#login').modal('hide');
            $(form).find('input').removeClass('valid').val('');
            return false;
        }
    });
    $('.open_login_form').click(function(){
        $('#login_form').removeAttr('style');
        $('#registration_form').removeAttr('style');
        $('#login_form input').val('');
        $('#registration_form input').val('');
    });
    $('#login_form').validate({
        rules: {
            login: {
                required: true,
                minlength: 2
            },
            psswd: {
                required: true
            }
        },
        messages:{
            login:{
                required: false,
                minlength: false
            },
            psswd:{
                required: false
            }
        },
        errorPlacement: function(error, element) {

        },
        submitHandler: function(form) {
            $('#login').modal('hide');
            $(form).find('input').removeClass('valid').val('');
            return false;
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
         jQuery("html:not(:animated),body:not(:animated)").animate({scrollTop: destination-$('header').height()+25}, 800);
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

    $('.logo a').click(function () { // РџСЂРё РєР»РёРєРµ РїРѕ РєРЅРѕРїРєРµ "РќР°РІРµСЂС…" РїРѕРїР°РґР°РµРј РІ СЌС‚Сѓ С„СѓРЅРєС†РёСЋ
        /* РџР»Р°РІРЅР°СЏ РїСЂРѕРєСЂСѓС‚РєР° РЅР°РІРµСЂС… */
        $('body, html').animate({
            scrollTop: 0
        }, 1000);
        return false;
    });


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
        sync: ".append_gallery .thumbnail_slide"
    });
}

function flex_designer_init(element) {
    element.flexslider({
        animation: "slide",
        animationLoop: false,
        itemWidth: 162,
        itemMargin: 30,
        minItems: 2,
        maxItems: 6
    });
}

function flex_design_init(parent) {
    /*РЎР»Р°Р№РґРµСЂ РІ РґРёР·Р°Р№РЅРµ*/
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

function navigate(parent){
    var active_index = '';
    var prev = parent.find('.slideControl .prev');
    var next = parent.find('.slideControl .next');
    prev.click(function () {
        var thumbs = parent.find('.thumb-box>ul');
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
        console.log(active_index);
    });
    next.click(function () {
        var thumbs = parent.find('.thumb-box>ul');
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
        console.log(active_index)
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
 * Р Р°Р·РјРµСЂ РЅРѕРІРѕСЃС‚РµР№ Рё РѕС‚Р·С‹РІРѕРІ
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