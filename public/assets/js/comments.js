/**
 * Created by Романенко Ігор on 16.12.2015.
 */

$('document').ready(function(){

    //========================= если использовать для ответа на комментарии имеющуюся форму ========================
    $('.replyButton').on('click', function () {
        $('html, body').animate({ scrollTop: $('#title_comment-form').offset().top }, 500);
        var reply_title = 'Reply to ' + $(this).closest('.itemJS').children('p').children('span').children('.authorJS').text();
        $('#title_comment-form').text(reply_title);
        var par_id = $(this).parent().children('.comment_id').text();
        $('input.parent_id').val(parseInt(par_id));
        $('#cancel_reply').css('visibility', 'visible');
    });

    $('#cancel_reply').on('click', function (){
        $('#title_comment-form').text('Leave a comment');
        $('input.parent_id').val(0);
        $('#cancel_reply').css('visibility', 'hidden');
    });

});