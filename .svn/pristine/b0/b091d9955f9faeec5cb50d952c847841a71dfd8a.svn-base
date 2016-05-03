var Producto = null;

$(function() {
    try {
        var _PAGE_ = $('#producto');
        Producto = {
            pp: {
                grid: null
            },
            init: function() {
                this.load();
                this.events();
                this.finish();
            },
            load: function() {
                $(_PAGE_).find('#frmProducto').validationEngine({validationEventTrigger: 'submit', useBootstrapStyleValidation: true});
                $(_PAGE_).find('[data-toggle="tooltip"]').tooltip();
                
                this.pp.grid = $(_PAGE_).find('#datagrid-producto table').bootgrid({
                    ajax: true,
                    url: Define.BASE_DIR_HANDLERS + 'Producto.php?action=Filter',
                    formatters: this.behaviors.gridFormatters
                });
            },
            events: function() {
                $(_PAGE_).delegate('#btnSubmit', 'click', this.behaviors.actualizar.call);
                $(_PAGE_).delegate('#btnReset', 'click', this.behaviors.resetForm);
                $(_PAGE_).delegate('#slItemOrigen option', 'dblclick', this.behaviors.moveItems.origenDestino);
                $(_PAGE_).delegate('#slItemDestino option', 'dblclick', this.behaviors.moveItems.destinoOrigen);
                this.pp.grid.on("loaded.rs.jquery.bootgrid", function(){
                    $(_PAGE_).find('[data-toggle="tooltip"]').tooltip();
                    $(_PAGE_).find('[data-toggle="popover"]').popover();
                    $(_PAGE_).find(':button[data-action="edit"]').on('click', Producto.behaviors.editar.call);
                    $(_PAGE_).find(':button[data-action="delete"]').on('click', Producto.behaviors.eliminar.call);
                });
            },
            finish: function() {
                $(_PAGE_).find('#txtNombre').focus();
                $(_PAGE_).show().animate({opacity: 1}, 250);
            },
            behaviors: {
                actualizar: {
                    call: function() {          
                        if ($(_PAGE_).find('#frmProducto').validationEngine('validate')) {
                            $.xToast({
                                msg: 'Guardando producto, por favor espere'
                            });
                            
                            var nuCodigo = $(_PAGE_).find('#txtCodigo').val();
                            var sbNombre = $(_PAGE_).find('#txtNombre').val();
                            var sbDesc = $(_PAGE_).find('#txtDescripcion').val();
                            var nuCategoria = $(_PAGE_).find('#slCategoria').val();
                            var nuTipoVehiculo = $(_PAGE_).find('#slTipoVehiculo').val();
                            var dbValor = $(_PAGE_).find('#txtValor').val();
                            var rcItems = $.map($(_PAGE_).find('#slItemDestino option'), function(item){
                                return $.toInt($(item).val(), 0);
                            });
                            
                            $.post(Define.BASE_DIR_HANDLERS + 'Producto.php', {
                                action: 'Actualizar',
                                Codigo: nuCodigo,
                                Nombre: sbNombre,
                                Descripcion: sbDesc,
                                Categoria: nuCategoria,
                                TipoVehiculo: nuTipoVehiculo,
                                Valor: dbValor,
                                Items: rcItems.join(',')
                            }, Producto.behaviors.actualizar.response, 'json').always(function(){
                                $.xToast('hide');
                            });
                        }
                    },
                    response: function(data) {
                        $.xToast('hide', function(){
                            $.xPop({
                                msg: 'Proceso exitoso',
                                align: 'center-horizontal top out',
                                autoHide: 1500
                            });
                            
                            Producto.behaviors.resetForm();
                            Producto.pp.grid.bootgrid('reload');
                        });
                    }
                },
                eliminar: {
                    call: function(){
                        var id = $(this).data('row-id');
                        
                        if(!$.isEmpty(id)){
                            var row = Producto.pp.grid.bootgrid('getRow', id);
                            
                            if(!$.isEmpty(row) && !$.isEmptyObject(row)){
                                $.xBModal({
                                    title: 'Confirmaci&oacute;n',
                                    content: 'Desea eliminar el producto <strong>' + (row.nombre) + '</strong>?',
                                    closeOnEscape: false,
                                    closeThick: false,
                                    buttons: {
                                        yes: {
                                            label: 'Si',
                                            type: 'btn-warning',
                                            closer: true,
                                            fn: function(){
                                                $.xToast({
                                                    msg: 'Eliminando producto'
                                                });

                                                $.post(Define.BASE_DIR_HANDLERS + 'Producto.php', {
                                                    action: 'Eliminar',
                                                    Codigo: row.id
                                                }, function(data){
                                                    Producto.behaviors.eliminar.response(data, id);
                                                }, 'json').always(function(){
                                                    $.xToast('hide');
                                                });
                                            }
                                        },
                                        no: {
                                            label: 'No',
                                            type: 'btn-primary',
                                            closer: true
                                        }
                                    }
                                });
                            }
                        }
                    },
                    response: function(data, id){
                        $.xToast('hide', function(){
                            Producto.pp.grid.bootgrid('reload');
                            
                            $.xPop({
                                msg: 'Producto eliminado',
                                align: 'center-horizontal top out',
                                autoHide: 1500
                            });
                        });
                    }
                },
                editar: {
                    call: function(){
                        var id = $(this).data('row-id');
                        
                        if(!$.isEmpty(id)){
                            Producto.behaviors.resetForm();
                            
                            var row = Producto.pp.grid.bootgrid('getRow', id);
                            
                            if(!$.isEmpty(row) && !$.isEmptyObject(row)){
                                for(var key in row){
                                    $(_PAGE_).find('[data-source="' + key + '"]').val(row[key]);
                                }
                                
                                $.each(row.items, function(i, item){
                                    var id = Object.keys(item)[0];
                                    var option = $(_PAGE_).find('#slItemOrigen option[data-id="' + id + '"]');
                                    
                                    if(option.length){
                                        option.trigger('dblclick');
                                    }
                                });
                            }
                        }
                    }
                },
                moveItems: {
                    origenDestino: function(){
                        var option = $(this);
                        $(_PAGE_).find('#slItemDestino').append(option.clone());
                        option.remove();
                        Producto.behaviors.moveItems.actualizarCantidad();
                    },
                    destinoOrigen: function(){
                        var option = $(this);
                        $(_PAGE_).find('#slItemOrigen').append(option.clone());
                        option.remove();
                        Producto.behaviors.moveItems.actualizarCantidad();
                    },
                    actualizarCantidad: function(){
                        $(_PAGE_).find('#spItemDestino').html($(_PAGE_).find('#slItemDestino option').length);
                        $(_PAGE_).find('#spItemOrigen').html($(_PAGE_).find('#slItemOrigen option').length);
                    }
                },
                gridFormatters: {
                    commands: function(column, row){
                        return '<button type="button" class="btn btn-primary btn-sm" data-action="edit" data-row-id="' + row.id + '" data-toggle="tooltip" data-placement="bottom" title="Modificar"><i class="fa fa-edit"></i></button>' +
                                '<button type="button" class="btn btn-danger btn-sm" data-action="delete" data-row-id="' + row.id + '" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="fa fa-trash"></i></button>';
                    },
                    valor: function(column, row){
                        return row.valor.format();
                    },
                    items: function(column, row){
                        var rcItems = $.map(row.items, function(item){
                            return item[Object.keys(item)[0]];
                        });

                        return '<button type="button" class="btn btn-primary btn-sm" data-toggle="popover" data-placement="top" title="Items asociados" data-content="' + rcItems.join(',') + '"><i class="fa fa-eye"></i>&nbsp;Ver items(' + rcItems.length + ')</button>';
                    }
                },
                resetForm: function(){
                    $(_PAGE_).find('#slItemDestino option').remove();
                    $(_PAGE_).find('#slItemOrigen').html($(_PAGE_).find('#slItems').html());
                                        
                    Producto.behaviors.moveItems.actualizarCantidad();
                    
                    $(_PAGE_).find('#frmProducto')[0].reset();
                    $(_PAGE_).find('#frmProducto').validationEngine('hideAll');
                    $(_PAGE_).find('#txtNombre').focus();
                }
            }
        };

        /*
         * Start logic
         */
        Producto.init();
    }
    catch (Exception) {
        alert(Exception);
    }
});