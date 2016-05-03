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
    $.xToast = function(opts){
        if(typeof opts === 'string'){
            return $.xToast.events.hasOwnProperty(opts) ? $.xToast.events[opts].apply($('#xToast'), Array.prototype.slice.call(arguments, 1)) : null;
        }
        
        var options = $.extend({}, $.xToast.defaults, opts);
        //Create
        var xToast = ($('<div></div>'))
            .addClass('toast fade' + (typeof options.classes === 'object' && options.classes.hasOwnProperty('toast') ? options.classes.toast : ''))
            .attr({
                id: 'xToast',
                role: 'toast',
                'aria-hidden': 'true',
                'tabindex': -1
            })
            .keydown(function(e){e.preventDefault();})
            .appendTo(document.body),
        xToastOverlay = ($('<div></div>'))
            .addClass('modal-backdrop fade in ' + (typeof options.classes === 'object' && options.classes.hasOwnProperty('overlay') ? options.classes.overlay : ''))
            .appendTo(options.overlay ? xToast : null),
        xToastModalDialog = ($('<div></div>'))
            .addClass('modal-dialog ' + (typeof options.classes === 'object' && options.classes.hasOwnProperty('modal') ? options.classes.modal : ''))
            .appendTo(xToast),
        xToastMsg = ($('<span></span>'))
            .html(options.msg)
            .addClass('msg ' + (typeof options.classes === 'object' && options.classes.hasOwnProperty('msg') ? options.classes.msg : ''))
            .appendTo(xToastModalDialog);
    
        if(options.autoShow){
            xToast.show(100, function(){
                $(this).addClass('in');
            });
        }
        
        return '';
    };
    
    $.xToast.events = {
        hide: function(onHide){
            $(this).removeClass('in').find('modal-backdrop').removeClass('in');
            if($.isFunction(onHide)){
                onHide.apply(null, [this]);
            }
            window.setTimeout(function(){
                $('#xToast').remove();
            }, 100);
        }
    };
    
    $.xToast.defaults = {
        classes: {
            toast: '',
            overlay: '',
            modal: '',
            msg: ''
        },
        msg: 'Cargando, por favor espere',
        overlay: true,
        autoShow: true
    };
}(jQuery));