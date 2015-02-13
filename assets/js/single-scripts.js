//Single Post Comment Paragraph
(function($, undefined) {
    "use strict";
    $.widget("ab.tips", {

        _create: function() {

            this._super();

            this._on({
                mouseup: this._tip
            });
            var t = this;
            $('#btn-tweet-quote').on('click', function() {
                var text = '"' + t._selectedText() + '"';
                window.open('http://twitter.com/home?status=' + text, "Twitter", "width=500,height=300");
            });
        },

        _destroy: function() {
            this._super();
            this._destroyTooltip();
        },

        _tip: function(e) {
            if ($(e.target).is('#btn-tweet-quote') || $(e.target).is('#btn-comment-quote')) {
                this._destroyTooltip();
                return;
            }
            var text = this._selectedText();
            if (text === undefined || text.length <= 0) {
                this._destroyTooltip();
                return;
            }
            // Return If the text is not from one paragraph
            if (text.indexOf("\n") >= 0) {
                this._destroyTooltip();
                return;
            }
            var p = $(e.target).is('p') ? $(e.target) : $(e.target).closest('p');

            this._createTooltip(e, p);
        },

        _selectedText: function() {

            var text = "";
            if (window.getSelection) {
                text = window.getSelection().toString();
            } else if (document.selection && document.selection.type != "Control") {
                text = document.selection.createRange().text;
            }
            return text;
        },

        _createTooltip: function(e, p) {
            if (p.length <= 0) {
                return false;
            }
            var range = window.getSelection().getRangeAt(0);

            var dummy = document.createElement("span");
            range.insertNode(dummy);
            var rect = dummy.getBoundingClientRect();
            var x = $(dummy).offset().left,
                y = $(dummy).offset().top;
            dummy.parentNode.removeChild(dummy);
            var pos = p.offset(),
                lineHeight = parseInt(p.css('line-height').replace('px', '')),
                height = $('.quote-box').outerHeight(),
                width = $('.quote-box').outerWidth();
            p.append($('.quote-box'));

            $('.quote-box').css({
                left: x - pos.left - (width / 2),
                top: y - pos.top - lineHeight - (height / 2) + 1
            }).show();
        },

        _destroyTooltip: function() {
            $('.quote-box').hide();
        }

    });

    // Single post
    jQuery(document).ready(function($) {
        $(".single .post .entry-content").tips();
        $(document).on('mouseup', function(event) {
            if (!$(event.target).is(".single .post .entry-content, .single .post .entry-content *")) {
                $(".single .post .entry-content").data('abTips')._destroyTooltip();
                return;
            }
        });
    });
})(jQuery);