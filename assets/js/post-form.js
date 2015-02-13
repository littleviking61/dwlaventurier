jQuery(function($) {
    "use strict";
    // Front-end Post Form
    // ------------------------
    var type = 'standard'; // Post Format Default

    // Timeline layout
    // -------------------------------------
    function dwtl_layout() {
        var dwtl = $('.timeline');
        var dwtl_width = dwtl.outerWidth();
        var dwlt_half = dwtl.find('.dwtl');
        if (dwtl_width >= 800) {
            dwtl.removeClass('one-col').addClass('two-col');

            var left_Col = 0,
                right_Col = 0;
            dwlt_half.each(function(index, el) {
                if ($(el).hasClass('normal')) {
                    if (left_Col <= right_Col) {
                        $(el).removeClass('dwtl-right').addClass('dwtl-left');
                        left_Col += $(el).outerHeight();
                    } else {
                        $(el).removeClass('dwtl-left').addClass('dwtl-right');
                        right_Col += $(el).outerHeight();
                    }
                } else if ($(el).hasClass('full')) {
                    left_Col = 0;
                    right_Col = 0;
                }
            });
            $('.dwtl').css({
                'opacity': 1
            });
        } else {
            dwtl.removeClass('two-col').addClass('one-col');
            dwlt_half.each(function(index, el) {
                $(el).removeClass('dwtl-left dwtl-right');
            });
        }
    }

    function reset_post_form() {
        if ($('.wp-editor-wrap').hasClass('tmce-active')) {
            tinyMCE.get('dwtl-post-editor').setContent('');
        } else {
            $('#dwtl-post-editor').val('');
        }
        jQuery('#dwtl-post-form-content').find('input:not([type="button"],[type="submit"],#dwtl-post-form-nonce,[name="_wp_http_referer"]),textarea:not(#dwtl-post-editor)').val('');
        jQuery('#tab-image .image-preview, #tab-standard .thumbnail-preview,#tab-video .video-preview, #tab-link .link-preview').html('');
    }

    $('#dwtl-post-form-holder-text, #dwtl-post-form-holder .post-formats button').on('click', function(event) {
        event.preventDefault();
        var holder = $('#dwtl-post-form-holder');
        var t = $(this);
        var container = holder.closest('.dwtl');
        container.removeClass('normal dwtl-left').addClass('active');
        $('.wrap').addClass('post-form-active');
        $('.dwtl-post-editor-box').removeClass('hide');
        if (t.is('button')) {
            var new_type = t.attr('id').replace('option-', '');
            if (new_type != type) {
                reset_post_form();
                type = new_type;
            }
        } else {
            type = 'standard';
        }

        $('.dwtl-post-editor-box .tab-content').addClass('hide');
        $('.dwtl-post-editor-box #tab-' + type).removeClass('hide');

        if ('standard' == type && $('.wp-editor-wrap').hasClass('tmce-active')) {
            tinymce.EditorManager.execCommand('mceRemoveControl', true, 'dwtl-post-editor');
            tinymce.EditorManager.execCommand('mceAddControl', true, 'dwtl-post-editor');
        }

        holder.hide();
        dwtl_layout();
    });

    // $(document).on('click', function(event) {
    //     if (!$(event.target).is('.dwtl-post-form, .dwtl-post-form *, .media-modal, .media-modal *')) {
    //         var post_form = $('.dwtl-post-form');
    //         if (post_form.length > 0) {
    //             post_form.find('.dwtl-post-editor-box').addClass('hide');
    //             post_form.find('#dwtl-post-form-holder').show();
    //             post_form.removeClass('active').addClass('normal dwtl-left');
    //             $('.wrap').removeClass('post-form-active');
    //             dwtl_layout();
    //         }
    //     }
    // });

    $('.dwtl-post-form-cancel').on('click', function(event) {
        event.preventDefault();
        var post_form = $('.dwtl-post-form');
        $('.dwtl-post-form .loading').removeClass('loading');
        $('.dwtl-post-form-submit').removeAttr('disabled','disabled');
        $('#tab-link .alert').remove();
        if (post_form.length > 0) {
            post_form.find('.dwtl-post-editor-box').addClass('hide');
            post_form.find('#dwtl-post-form-holder').show();
            post_form.removeClass('active').addClass('normal dwtl-left');
            $('.wrap').removeClass('post-form-active');
            dwtl_layout();
            reset_post_form();
        }
        return false;
    });
    jQuery(document).ready(function($) {

        //Bind Media upload
        var custom_uploader, media_button, attachment;
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });

        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();
            var image_preview = '<img src="' + attachment.sizes.full.url + '" alt="' + attachment.alt + '" class="img-thumbnail" >';
            if (media_button.is('#dwtl-add-media')) {
                $('#tab-image .image-preview').html(image_preview);
                if ($('#dwtl-image-caption').val().length <= 0) {
                    $('#dwtl-image-caption').val(attachment.caption);
                }
            } else if (media_button.is('#dwtl-add-thumbnail')) {
                $('#tab-standard .thumbnail-preview').html(image_preview);
            }

            $('#dwtl-post-thumbnail').val(attachment.id);
        });

        $('#dwtl-add-media, #dwtl-add-thumbnail').on('click', function(e) {

            e.preventDefault();
            media_button = $(this);

            //If the uploader object has already been created, reopen the dialog
            if (custom_uploader) {
                custom_uploader.open();
                return;
            }

            //Open the uploader dialog
            custom_uploader.open();

        });
        $('#dwtl-video-url, #dwtl-link').on('keypress', function(event) {
            var key = event.which || event.keyCode;
            if (key == 13) {
                event.preventDefault();
                return false;
            }
        });
        //Bind Parse Link
        var link = '';
        $("#dwtl-link").on('change', function() {
            var findUrls = function(text) {
                var source = (text || '').toString();
                var urlArray = [];
                var url;
                var matchArray;

                // Regular expression to find FTP, HTTP(S) and email URLs.
                var regexToken = /(((ftp|https?):\/\/)[\-\w@:%_\+.~#?,&\/\/=]+)|((mailto:)?[_.\w-]+@([\w][\w\-]+\.)+[a-zA-Z]{2,3})/g;

                // Iterate through any URLs in the text.
                while ((matchArray = regexToken.exec(source)) !== null) {
                    var token = matchArray[0];
                    urlArray.push(token);
                }

                return urlArray[0];
            }
            var t = $(this);
            var url = findUrls(t.val());
            var nonce = t.data('nonce');

            $('#dwtl-post-title').html('');
            $('#dwtl-post-title').val('');

            if (url) {
                $(this).parent().addClass('loading');
                $('.dwtl-post-form-submit').attr('disabled','disabled');
                $.ajax({
                    url: dwtl.ajax_url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        action: 'dwtl-parse-url',
                        url: url,
                        nonce: nonce
                    }
                })
                    .done(function(resp) {
                        if (resp.success) {
                            $('#dwtl-post-title').val(resp.data.title);
                            $('#tab-link .link-preview').html(resp.data.preview).data({
                                'title': resp.data.title,
                                'description': resp.data.description,
                                'url': resp.data.url
                            });
                            $('#tab-link .loading').removeClass('loading');
                            $('.dwtl-post-form-submit').removeAttr('disabled','disabled');
                            $('#tab-link .alert').remove();
                        } else {
                            var html = '<div class="col-sm-12 col-md-12"><strong><a href="' + url + '">' + url + '</a></strong><p>'+resp.data.message+'</p></div>';
                            $('#tab-link .link-preview').html(html).data({
                                'title': '',
                                'description': resp.data.message,
                                'url': url
                            });
                            $('#tab-link .loading').removeClass('loading');
                            $('.dwtl-post-form-submit').removeAttr('disabled','disabled');
                            $('#tab-link').append('<div class="alert alert-warning fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong>Error!</strong> Please try other link</div>');
                        }
                    })
                    .fail(function(jqXHR,textStatus){
                        $('#tab-link .loading').removeClass('loading');
                        $('.dwtl-post-form-submit').removeAttr('disabled','disabled');
                        $('#tab-link').append('<div class="alert alert-warning fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><strong>Error!</strong> Please try other link</div>');
                    });
            }

        });
        //Bind Parse Video Link
        $("#dwtl-video-url").on('change', function() {
            var findUrls = function(text) {
                var source = (text || '').toString();
                var urlArray = [];
                var url;
                var matchArray;

                // Regular expression to find FTP, HTTP(S) and email URLs.
                var regexToken = /(((ftp|https?):\/\/)[\-\w@:%_\+.~#?,&\/\/=]+)|((mailto:)?[_.\w-]+@([\w][\w\-]+\.)+[a-zA-Z]{2,3})/g;

                // Iterate through any URLs in the text.
                while ((matchArray = regexToken.exec(source)) !== null) {
                    var token = matchArray[0];
                    urlArray.push(token);
                }

                return urlArray[0];
            }
            var t = $(this);
            var url = findUrls(t.val());
            var nonce = t.data('nonce');
            if (url) {
                $(this).parent().addClass('loading');
                $('.dwtl-post-form-submit').attr('disabled','disabled');
                $.ajax({
                    url: dwtl.ajax_url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        action: 'dwtl-parse-video-link',
                        url: url,
                        nonce: nonce
                    }
                })
                    .done(function(resp) {
                        if (resp.success) {
                            $('#tab-video .video-preview').html(resp.data.html);
                        }
                        $('#tab-video .loading').removeClass('loading');
                        $('.dwtl-post-form-submit').removeAttr('disabled','disabled');
                    })
                    .fail(function(jqXHR,textStatus){
                        $('#tab-video .loading').removeClass('loading');
                        $('.dwtl-post-form-submit').removeAttr('disabled','disabled');
                    });;
            }

        })
        // Front Post From Submit Event
        var postingAjax = false;
        $('#dwtl-post-form-content').on('submit', function(event) {
            event.preventDefault();
            $('#tab-link .alert').remove();
            var link = $('#tab-link #dwtl-link').val();
            if (postingAjax) {
                return false;
            }
            var t = $(this);
            var content = '';
            t.addClass('loading');
            if ('image' == type) {
                content = t.find('.img-thumbnail').attr('src');
            } else if ('link' == type) {
                content = t.find('#dwtl-link-caption').val();
                var link_preview = t.find('#tab-link .link-preview');

                if (link_preview.length) {
                    var link_image = link_preview.find('.carousel .item.active img').attr('src');
                    var link_content_class = 'col-sm-7 col-md-8';
                    if ( !link_image ) {
                        link_content_class = 'col-sm-12 col-md-12';
                    };
                    content += '<br>';
                    content += '<div class="link-preview row">'
                    

                    if (link_image) {
                    content += '<div class="col-sm-5 col-md-4"><img style="width:100%" src="' + link_preview.find('.carousel .item.active img').attr('src') + '"></div>';
                    };
                    content += '<div class="' + link_content_class + '"><strong><a href="' + link_preview.data('url') + '">' + link_preview.data('title') + '</a></strong>' + link_preview.data('description') + '</div>';
                    content += '</div>';
                } else {
                    content += '<div class="col-sm-12 col-md-12"><strong><a href="' + $('#tab-link #dwtl-link').val() + '">' + $('#tab-link #dwtl-link').val() + '</a></strong></div>';
                }        
            } else if ('video' == type) {
                content = t.find('#dwtl-video-caption').val();
                if ($('#tab-video #dwtl-video-url').val()) {
                    content = $('#tab-video #dwtl-video-url').val() + "\n" + content;
                }
            } else {
                content = $('#dwtl-post-editor').val();
                if ($('.wp-editor-wrap').hasClass('tmce-active')) {
                    content = tinyMCE.get('dwtl-post-editor').getContent();
                }
            }

            if (content.length <= 0) {
                return false;
            }
            // return false;
            postingAjax = true;
            //Send ajax request
            $.ajax({
                url: dwtl.ajax_url,
                type: 'POST',
                dataType: 'json',
                data: {
                    action: 'dwtl-front-submit-post',
                    content: content,
                    post_format: type,
                    thumbnail: t.find('#dwtl-post-thumbnail').val(),
                    title: t.find('#dwtl-post-title').val(),
                    tags: t.find('#dwtl-post-tags').val(),
                    categories: t.find('[name="dwtl-post-categories"]').val(),
                    referer: t.find('[name="_wp_http_referer"]').val(),
                    nonce: t.find('[name="dwtl-post-form-nonce"]').val()
                }
            })
                .done(function(resp) {
                    reset_post_form();
                    $('.dwtl-post-editor-box').addClass('hide');
                    t.closest('.dwtl-post-form').removeClass('full').addClass('normal dwtl-left').find('#dwtl-post-form-holder').show();
                    if (resp.success) {
                        t.closest('.dwtl-post-form').after(resp.data.html);
                        dwtl_layout();
                    }
                })
                .always(function() {
                    postingAjax = false;
                    t.removeClass('loading');
                });

            return false;
        });
    });
});