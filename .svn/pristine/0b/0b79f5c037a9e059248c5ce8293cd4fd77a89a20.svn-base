/*
 * SNavia
 * Playtech
 * 2013
 */

/*
 * Depends:
 * - jQuery.X.js
 * - Bootstrap.js
 */
(function($){
    $.xBModal = function(opts){
        var options = $.extend({}, $.xBModal.defaults, opts);
        //Create
        var title = options.title || '&#160;',
        xBModal = ($('<div></div>'))
            .appendTo(document.body)
            .addClass('modal fade' + (typeof options.classes === 'object' && options.classes.hasOwnProperty('modal') ? options.classes.modal : ''))
            .attr('tabIndex', -1).keydown(function(event) {
                if (options.closeOnEscape && event.keyCode &&  event.keyCode === $.xBModal.keyCode.ESCAPE) {
                    fnClose(event);
                    event.preventDefault();
                }
            })
            .attr({
                id: options.id,
                role: 'dialog',
                'aria-labelledby': 'xBootstrapModalLabel',
                'aria-hidden': 'true'
            }),
        xBModalDialog = ($('<div></div>'))
            .addClass('modal-dialog')
            .appendTo(xBModal),
        xBModalContent = ($('<div></div>'))
            .addClass('modal-content')
            .appendTo(xBModalDialog),
        xBModalHeaderCloseThick = ($('<button></button>'))
            .html('<span aria-hidden="true">&times;</span></button>')
            .addClass('close')
            .attr({
                type: 'button',
                'data-dismiss': 'modal',
                'aria-hidden': 'true'
            }),
        xBModalHeaderTitle = ($('<h4></h4>'))
            .addClass('modal-title')
            .html(options.title),
        xBModalHeader = ($('<div></div>'))
            .addClass('modal-header ' + (typeof options.classes === 'object' && options.classes.hasOwnProperty('header') ? options.classes.header : ''))
            .append(options.closeThick ? xBModalHeaderCloseThick : $(xBModalHeaderCloseThick).hide())
            .append(xBModalHeaderTitle)
            .appendTo(xBModalContent),
        xBModalBody = ($('<div></div>'))
            .addClass('modal-body')
            .append(
                $('<p></p>')
                    [options.content  instanceof jQuery ? 'append' : 'html'](options.content)
            )
            .css({
                height: options.height
            })
            .appendTo(xBModalContent),
        xBModalFooterButtons = ($('<div></div>')),
        _fnCreateButtons = function(buttons){
            if(typeof buttons === 'object' && buttons !== null){
                return $.each(buttons, function(name, pp) {
                    var opts = $.extend({}, {
                        fn: function(){},
                        label: name,
                        closer: false,
                        type: 'btn-primary'
                    }, pp);
                    var button = $('<button></button>')
                        .text(opts.label)
                        .addClass('btn material btn-raised ' + (opts.type != null && opts.type != '' ? ' ' + opts.type : ''))
                        .attr({
                            'id': 'btn_' + name,
                            type: 'button'
                        })
                        .on('click', function() {
                            if(opts.closer)
                                $(xBModalHeaderCloseThick).trigger('click');
                            opts.fn.apply(this, arguments);
                        })
                        .appendTo(xBModalFooterButtons);
                });
            }
            return '';
        },
        xBModalFooter = ($(xBModalFooterButtons))
            .addClass('modal-footer')
            .append(_fnCreateButtons(options.buttons))
            .appendTo(xBModalContent),
        fnClose = function(event){

        };

        $(xBModal).on('shown.bs.modal', function(event){
            if($.isFunction(options.hasOwnProperty('onShow') ? options.onShow : null)){
                options.onShow.apply(xBModal, [event]);
            }
        });
        
        $(xBModal).on('hide.bs.modal', function(event){
            $(xBModal).remove();
        });

        if(options.autoOpen){
            return $(xBModal).modal({
                backdrop: options.backdrop
            });
        }
        
        return $(xBModal);
    };

    $.xBModal.defaults = {
        id: 'xBootstrapModal_' + (parseInt((Math.random() + 9) / 3)),
        autoOpen: true,
        buttons: {},
        classes: {},
        closeOnEscape: true,
        closeThick: true,
        backdrop: 'static',
        height: 'auto',
        maxHeight: false,
        maxWidth: false,
        minHeight: 150,
        minWidth: 150,
        title: '',
        width: '100%',
        content: '',
        onShow: null
    };

    $.xBModal.keyCode = {
        ESCAPE: 27
    }
}(jQuery));