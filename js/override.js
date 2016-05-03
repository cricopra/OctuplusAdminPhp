/*
 * SNavia
 * Playtech
 * 2013
 */


$(function(){
    /*
     * jQuery UI Datepicker
     */
    if($.datepicker){
        $.datepicker.setDefaults({
            dateFormat: 'yy-mm-dd',
            showOn: 'button',
            buttonImageOnly: true,
            buttonImage: Define.BASE_DIR_IMG + 'calendar.png',
            buttonText: 'Seleccionar'
        });
    }
    
    /*
     * jQuery UI Addon Timepicker
     */
    if($.timepicker){
        $.timepicker.setDefaults({
            timeFormat: 'HH:mm:ss',
            showSecond: true,
            showHeader: false,
            showTimeVal: false,
            buttonImageTimer: Define.BASE_DIR_IMG + 'timer.png'
        });
    }
    
    /*
     * Datagrid
     */
    if($.fn.bootgrid.Constructor){
        $.fn.bootgrid.Constructor.defaults.labels = {
            all: "Todos",
            infos: "Mostrando {{ctx.start}} a {{ctx.end}} de {{ctx.total}} registros",
            loading: "Cargando...",
            noResults: "No hay registros",
            refresh: "Refrescar",
            search: "Buscar"
        };
        $.fn.bootgrid.Constructor.defaults.rowCount = [10, 15, 20];
    }
});