(function ($) {
    'use strict';

    $('.login-form').on('submit', function (e) {
        e.preventDefault();

        let form = $(this),
            submit_button = form.find('button[type="submit"]');
        $.ajax({
            type: 'POST',
            url: umag_object.ajax_url,
            data: form.serialize() + '&action=umag_do_login_form',
            dataType: 'json',
            beforeSend: function () {
                submit_button.attr('disabled', true);
                form.find('.alert').remove();
            },
            success: function (response) {
                if(response.success){
                    form.prepend('<div class="alert alert-success">'+response.data.message+'</div>');
                    setTimeout(function(){
                        window.location.href =umag_object.home_url;
                    },2000);
                }else{
                    form.prepend('<div class="alert alert-danger">'+response.data.message+'</div>');
                }
            },
            complete: function () {
                submit_button.attr('disabled', false);
            }
        });
    });

    $('.register-form').on('submit', function (e) {
        e.preventDefault();
        let form=$(this),
        submit_button=form.find('button[type="submit"]');

        $.ajax({
            type: 'POST',
            url: umag_object.ajax_url,
            data: form.serialize() + '&action=umag_do_register_form',
            dataType: 'json',
            beforeSend:function(){
                submit_button.attr('disabled',true);
                form.find(".alert").remove();
            },
            success:function (response){
             if(response.success){
                 form.prepend('<div class="alert alert-success">'+response.data.message+'</div>');
                 setTimeout(function(){
                     window.location.href=umag_object.home_url;
                 },2000);
             }else{
                 form.prepend('<div class="alert alert-warning">'+response.data.message+'</div>');
             }
            },
            complete: function(){
                submit_button.attr("disabled",false);
            },
        })
    });

    $('.post-submits').on('submit', function (e) {
        e.preventDefault();
    
        let data = new FormData(),
            form = $(this),
            button = form.find('button[type="submit"]');
    
        data.append('action', 'umag_do_post_submit');
        data.append('security', $('#field-post').val());
        data.append('thumbnail', $('#upload-file').prop('files')[0]);
        data.append('title', $('#video-name').val());
    
        let editor = tinyMCE.get('umag-content'),
            content = editor.getContent();
    
        data.append('content', content);
        data.append('tags', $('#video-tags').val());
        data.append('category', $('#umag-catagory').val());
    
        $.ajax({
            type: 'POST',
            url: umag_object.ajax_url,
            data: data,
            contentType: false,
            processData: false,
            cache: false,
            dataType: 'json',
            beforeSend() {
                button.attr('disabled', true);
            },
            success(response) {
                if (response.success) {
                    form.append('<div class="alert alert-success mb-0 mt-4" role="alert">' + response.data.message + '</div>');
                }
            },
            complete() {
                button.attr('disabled', false);
            }
        });
    });

 
})(jQuery);
