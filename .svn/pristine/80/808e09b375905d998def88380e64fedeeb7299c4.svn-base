/*
 * SNavia
 * Playtech
 * 2015
 */

/*
 * Depends:
 * - jQuery.X.js
 */
(function($){
    $.xPop = function(opts){
        if(typeof opts === 'string'){
            return $.xPop.events.hasOwnProperty(opts) ? $.xPop.events[opts].apply(this, [$('#xPop')]) : null;
        }

        var options = $.extend({}, $.xPop.defaults, opts);

        var xPop = ($('<div></div>'))
            .addClass('pop fade ' + options.align + ' ' + (typeof options.classes === 'object' && options.classes.hasOwnProperty('pop') ? options.classes.pop : ''))
            .attr({
                id: 'xPop',
                role: 'pop',
                'aria-hidden': 'true',
                'tabindex': -1
            })
            .keydown(function(e){e.preventDefault();})
            .appendTo(document.body),
        xPopMsg = ($('<span></span>'))
            .html(options.msg)
            .addClass((typeof options.classes === 'object' && options.classes.hasOwnProperty('msg') ? options.classes.msg : ''))
            .appendTo(xPop);

        
        xPop.xPop('show');
        
        if(options.hasOwnProperty('autoHide') && typeof options.autoHide === 'number'){
            window.setTimeout(function(){
                xPop.removeClass('in');
                window.setTimeout(function(){
                    xPop.remove();
                }, 100);
            }, options.autoHide);
        }

        return '';
    };
    
    $.xPop.events = {
        hide: function(pop){
            pop.removeClass('in').delay(200).hide(function(){
                $(this).remove();
            });
        },
        show: function(pop){
            pop.show(100, function(){
                $(this).addClass('in');
            });
        }
    };
    
    $.fn.xPop = function(arg) {
        if(typeof arg === 'string'){
            return $.xPop.events.hasOwnProperty(arg) ? $.xPop.events[arg].apply(null, [$(this)]) : null;
        }
    };
    
    $.xPop.defaults = {
        classes: {
            pop: '',
            msg: ''
        },
        align: 'center out',
        msg: '',
        autoHide: false
    };
}(jQuery));
