var Item = null;

$(function() {
    try {
        var _PAGE_ = $('#item');
        Item = {
            pp: {
                grid: null
            },
            init: function() {
                this.load();
                this.events();
                this.finish();
            },
            load: function() {
                $(_PAGE_).find('#frmItem').validationEngine({validationEventTrigger: 'submit', useBootstrapStyleValidation: true});
                $(_PAGE_).find('[data-toggle="tooltip"]').tooltip();
                
                this.pp.grid = $(_PAGE_).find('#datagrid-item table').bootgrid({
                    ajax: true,
                    url: Define.BASE_DIR_HANDLERS + 'Item.php?action=Filter',
                    formatters: this.behaviors.gridFormatters
                });
            },
            events: function() {
                $(_PAGE_).delegate('#btnSubmit', 'click', this.behaviors.actualizar.call);
                $(_PAGE_).delegate('#btnReset', 'click', this.behaviors.resetForm);
                this.pp.grid.on("loaded.rs.jquery.bootgrid", function(){
                    $(_PAGE_).find('[data-toggle="tooltip"]').tooltip();
                    $(_PAGE_).find(':button[data-action="edit"]').on('click', Item.behaviors.editar.call);
                    $(_PAGE_).find(':button[data-action="delete"]').on('click', Item.behaviors.eliminar.call);
                });
            },
            finish: function() {
                $(_PAGE_).find('#slSede').focus();
                $(_PAGE_).show().animate({opacity: 1}, 250);
            },
            behaviors: {
                actualizar: {
                    call: function() {
                        if ($(_PAGE_).find('#frmItem').validationEngine('validate')) {
                            $.xToast({
                                msg: 'Guardando item, por favor espere'
                            });
                            
                            var nuCodigo = $(_PAGE_).find('#txtCodigo').val();
                            var nuSede = $(_PAGE_).find('#slSede').val();
                            var sbNombre = $(_PAGE_).find('#txtNombre').val();
                            
                            $.post(Define.BASE_DIR_HANDLERS + 'Item.php', {
                                action: 'Actualizar',
                                Codigo: nuCodigo,
                                Sede: nuSede,
                                Nombre: sbNombre
                            }, Item.behaviors.actualizar.response, 'json').always(function(){
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
                            
                            Item.behaviors.resetForm();
                            Item.pp.grid.bootgrid('reload');
                        });
                    }
                },
                eliminar: {
                    call: function(){
                        var id = $(this).data('row-id');
                        
                        if(!$.isEmpty(id)){
                            var row = Item.pp.grid.bootgrid('getRow', id);
                            
                            if(!$.isEmpty(row) && !$.isEmptyObject(row)){
                                $.xBModal({
                                    title: 'Confirmaci&oacute;n',
                                    content: 'Desea eliminar el item <strong>' + (row.nombre) + '</strong>?',
                                    closeOnEscape: false,
                                    closeThick: false,
                                    buttons: {
                                        yes: {
                                            label: 'Si',
                                            type: 'btn-warning',
                                            closer: true,
                                            fn: function(){
                                                $.xToast({
                                                    msg: 'Eliminando item'
                                                });

                                                $.post(Define.BASE_DIR_HANDLERS + 'Item.php', {
                                                    action: 'Eliminar',
                                                    Codigo: row.id
                                                }, function(data){
                                                    Item.behaviors.eliminar.response(data, id);
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
                            Item.pp.grid.bootgrid('reload');
                            
                            $.xPop({
                                msg: 'Item eliminado',
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
                            var row = Item.pp.grid.bootgrid('getRow', id);
                            
                            if(!$.isEmpty(row) && !$.isEmptyObject(row)){
                                for(var key in row){
                                    $(_PAGE_).find('[data-source="' + key + '"]').val(row[key]);
                                }
                            }
                        }
                    }
                },
                gridFormatters: {
                    commands: function(column, row){
                        return '<button type="button" class="btn btn-primary btn-sm" data-action="edit" data-row-id="' + row.id + '" data-toggle="tooltip" data-placement="bottom" title="Modificar"><i class="fa fa-edit"></i></button>' +
                                '<button type="button" class="btn btn-danger btn-sm" data-action="delete" data-row-id="' + row.id + '" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="fa fa-trash"></i></button>';
                    }
                },
                resetForm: function(){
                    $(_PAGE_).find('#frmItem')[0].reset();
                    $(_PAGE_).find('#frmItem').validationEngine('hideAll');
                    $(_PAGE_).find('#slSede').focus();
                }
            }
        };

        /*
         * Start logic
         */
        Item.init();
    }
    catch (Exception) {
        alert(Exception);
    }
});