/*
 * SNavia
 * Playtech
 * 2013
 */
try{
    $(document).ajaxSend(function(event, jqXHR, ajaxOptions) {
        $.info(ajaxOptions);
    });

    $(document).ajaxError(function(event, xhr, settings, exception) {
        $.warn('Ajax Error', arguments);
        
        console.log(arguments);

        if(xhr.status == 0 && xhr.readyState == 0)
            return;

        var JSONError = {};
        try{
            JSONError = JSON.parse(xhr.responseText);
        }
        catch(E){
            JSONError.msg = E;
        }
        
        $.xBAlert({
            title: 'Error ' + (JSONError != null && JSONError.code ? JSONError.code : '10'),
            classes: {
                header: 'error'
            },
            content: (JSONError != null && JSONError.msg ? JSONError.msg : 'Desconocido'),
            onClose: function(){
                $.hideLoading();
                $(document).find('#pContent .loading').animate({
                    opacity:0
                }, 250);
                if(xhr.status && xhr.status == 401){
                    window.parent.location = JSONError.redirect;
                }
            }
        });
    });

    jQuery.log = function(){
        if(Define.DEBUG)
            console.log(arguments);
    }

    jQuery.warn = function(){
        if(Define.DEBUG)
            console.warn(arguments);
    }

    jQuery.info = function(){
        if(Define.DEBUG)
            console.info(arguments);
    }

    jQuery.xhrPool = [];
    jQuery.abortAll = function() {
        $(jQuery.xhrPool).each(function(idx, jqXHR) {
            jqXHR.abort();
        });
        $.xhrPool = [];
    };

    $.ajaxSetup({
        beforeSend: function(jqXHR) {
            $.xhrPool.push(jqXHR);
        },
        complete: function(jqXHR) {
            var index = $.xhrPool.indexOf(jqXHR);
            if (index > -1)
                $.xhrPool.splice(index, 1);
        }
    });
}
catch(Exception){
    console.error(Exception);
}