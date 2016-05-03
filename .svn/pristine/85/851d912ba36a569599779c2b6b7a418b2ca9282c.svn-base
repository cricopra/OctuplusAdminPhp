/*
 * SNavia
 * Playtech
 * 2013
 */

jQuery.isEmpty = function(){
    var count = 0;
    $.each(arguments, function(i, data){
        if(data != null && data != undefined && data != '' && typeof(data) != 'undefined')
            count ++;
        else
            return false
    });
    return (arguments).length == count ? false : true;
};

jQuery.clear = function(){
    if(arguments.length > 0){
        var param = arguments[0];
        return $.isEmpty(param) ? '' : param;
    }
    return '';
};

jQuery.rangeDatepicker = function(){
    if(arguments.length > 0){
        var els = arguments[0];
        if(els.length > 0){
            $(els[0]).datepicker({
                onClose: function(selectedDate) {
                    $(els[1]).datepicker("option", "minDate", selectedDate );
                }
            });
            $(els[1]).datepicker({
                onClose: function(selectedDate) {
                    $(els[0]).datepicker("option", "maxDate", selectedDate );
                }
            });
        }
    }
};

jQuery.startLoading = function(params){
    var o = $.extend({}, {
        page: $(document),
        disabledToolbar: true,
        hideToolbar: true
    }, params);
    if(!$.isEmpty(o.page)){
        if(o.disabledToolbar)
            $(o.page).find('.toolbar a').attr('disabled', true);
        if(o.hideToolbar)
            $(o.page).find('.toolbar').animate({opacity: 0}, {duration: 250, queue: false});
        $(o.page).parent().find('.loading').animate({opacity: 1}, {duration: 250, queue: false});
    }
};

jQuery.hideLoading = function(params){
    var o = $.extend({}, {
        page: $(document)
    }, params);
    if(!$.isEmpty(o.page)){
        $(o.page).find('.toolbar').animate({opacity: 1}, {duration: 250, queue: false, complete: function(){
            $(o.page).find('.toolbar a').removeAttr('disabled').removeClass('disabled');
        }});
        $(o.page).parent().find('.loading').animate({opacity: 0}, {duration: 250, queue: false});
    }
};

jQuery.hasInvalidChar = function(params){
    var o = $.extend({}, {
        str: '',
        rule: /\||\!|\"|\·|\$|\%|\&|\/|\(|\)|\=|\ª|\º|\°|\#|\?|\¿|\'|\¡|\^|\[|\*|\+|\]|\{|\}|\ç|\;|\:|\,/gi
    }, params);
    
    return o.hasOwnProperty('rule') && o.rule.test(o.hasOwnProperty('str') ? o.str : '');
};

jQuery.toInt = function(str, def){
    str = str || '';
    def = def || 0;
    
    return isNaN(parseInt(str)) ? def : parseInt(str);
};

jQuery.rules = {
    address: /\||\!|\"|\·|\$|\%|\&|\/|\(|\)|\=|\ª|\º|\°|\?|\¿|\'|\¡|\^|\[|\*|\+|\]|\{|\}|\ç|\;|\:/gi
};

jQuery.invalidChar = function(field, rules, i, options){
    var rule = rules.length > (i + 2) ? eval(rules[(i + 2)]) : null;
    if($.hasInvalidChar(($.isEmpty(rule) ? {str: field.val()} : {str: field.val(), rule: rule}))){
        return 'Caracteres inv&aacute;lidos';
    }
};

jQuery.invalidLatLong = function(field, rules, i, options){
    if(!$.hasInvalidChar({str: field.val(), rule: /-?\d{1,3}\.\d+/})){
        return 'Georeferencia inv&aacute;lida';
    }
};

jQuery.requireMultiSelect = function(field, rules, i, options){
    if(field.find('option').length <= 0){
        rules.push('required');
    }
};