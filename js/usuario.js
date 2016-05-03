var Usuario = null;

$(function() {
    try {
        var _PAGE_ = $('#usuario');
        Usuario = {
            pp: {
                grid: null
            },
            init: function() {
                this.load();
                this.events();
                this.finish();
            },
            load: function() {
                $(_PAGE_).find('#frmUsuario').validationEngine({validationEventTrigger: 'submit', useBootstrapStyleValidation: true});
                $(_PAGE_).find('[data-toggle="tooltip"]').tooltip();
                
                this.pp.grid = $(_PAGE_).find('#datagrid-usuario table').bootgrid({
                    ajax: true,
                    url: Define.BASE_DIR_HANDLERS + 'Usuario.php?action=Filter',
                    formatters: this.behaviors.gridFormatters
                });
            },
            events: function() {
                $(_PAGE_).delegate('#btnSubmit', 'click', this.behaviors.actualizar.call);
                $(_PAGE_).delegate('#btnReset', 'click', this.behaviors.resetForm);
                $(_PAGE_).delegate('#slTipo', 'change', this.behaviors.events.onChangeTipo);
                $(_PAGE_).delegate('#slSedeOrigen option', 'dblclick', this.behaviors.moveSedes.origenDestino);
                $(_PAGE_).delegate('#slSedeDestino option', 'dblclick', this.behaviors.moveSedes.destinoOrigen);
                this.pp.grid.on("loaded.rs.jquery.bootgrid", function(){
                    $(_PAGE_).find('[data-toggle="tooltip"]').tooltip();
                    $(_PAGE_).find('[data-toggle="popover"]').popover();
                    $(_PAGE_).find(':button[data-action="edit"]').on('click', Usuario.behaviors.editar.call);
                    $(_PAGE_).find(':button[data-action="delete"]').on('click', Usuario.behaviors.eliminar.call);
                });
            },
            finish: function() {
                $(_PAGE_).find('#txtLogin').focus();
                $(_PAGE_).show().animate({opacity: 1}, 250);
            },
            behaviors: {
                actualizar: {
                    call: function() {
                        if ($(_PAGE_).find('#frmUsuario').validationEngine('validate')) {
                            $.xToast({
                                msg: 'Guardando usuario, por favor espere'
                            });
                            
                            var nuCodigo = $(_PAGE_).find('#txtCodigo').val();
                            var sbLogin = $(_PAGE_).find('#txtLogin').val();
                            var sbDominio = $(_PAGE_).find('#txtDominio').val();
                            var sbNombre = $(_PAGE_).find('#txtNombre').val();
                            var sbClave = $(_PAGE_).find('#txtPwd').val();
                            var sbTipo = $(_PAGE_).find('#slTipo').val();
                            var rcSedes = $.map($(_PAGE_).find('#slSedeDestino option'), function(item){
                                return $.toInt($(item).val(), 0);
                            });
                            
                            $.post(Define.BASE_DIR_HANDLERS + 'Usuario.php', {
                                action: 'Actualizar',
                                Codigo: nuCodigo,
                                Login: sbLogin + sbDominio,
                                Nombre: sbNombre,
                                Clave: sbClave,
                                Tipo: sbTipo,
                                Sedes: rcSedes.join(','),
                            }, Usuario.behaviors.actualizar.response, 'json').always(function(){
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
                            
                            Usuario.behaviors.resetForm();
                            Usuario.pp.grid.bootgrid('reload');
                        });
                    }
                },
                eliminar: {
                    call: function(){
                        var id = $(this).data('row-id');
                        
                        if(!$.isEmpty(id)){
                            var row = Usuario.pp.grid.bootgrid('getRow', id);
                            
                            if(!$.isEmpty(row) && !$.isEmptyObject(row)){
                                $.xBModal({
                                    title: 'Confirmaci&oacute;n',
                                    content: 'Desea eliminar el usuario <strong>' + (row.nombre) + '</strong>?',
                                    closeOnEscape: false,
                                    closeThick: false,
                                    buttons: {
                                        yes: {
                                            label: 'Si',
                                            type: 'btn-warning',
                                            closer: true,
                                            fn: function(){
                                                $.xToast({
                                                    msg: 'Eliminando usuario'
                                                });

                                                $.post(Define.BASE_DIR_HANDLERS + 'Usuario.php', {
                                                    action: 'Eliminar',
                                                    Codigo: row.id
                                                }, function(data){
                                                    Usuario.behaviors.eliminar.response(data, id);
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
                            Usuario.pp.grid.bootgrid('reload');
                            
                            $.xPop({
                                msg: 'Usuario eliminado',
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
                            var row = Usuario.pp.grid.bootgrid('getRow', id);
                            
                            if(!$.isEmpty(row) && !$.isEmptyObject(row)){
                                for(var key in row){
                                    $(_PAGE_).find('[data-source="' + key + '"]').val(row[key]);
                                }
                                
                                $.each(row.sedes, function(i, sede){
                                    var id = Object.keys(sede)[0];
                                    
                                    var option = $(_PAGE_).find('#slSedeOrigen option[data-id="' + id + '"]');
                                    
                                    if(option.length){
                                        option.trigger('dblclick');
                                    }
                                });
                                
                                /**
                                 * Cancelar la validacion de la clave
                                 */
                                $(_PAGE_).find('#txtCheckPwd').val('');
                            }
                        }
                    }
                },
                events: {
                    onChangeTipo: function(){
                        var sbTipo = $(this).val();
                        var options = $(_PAGE_).find('#slSedeDestino').find('option').length;
                        
                        if(sbTipo === Define.TIPO_USUARIO.Movil && options > 0){
                            $(_PAGE_).find('#slSedeDestino option:gt(0)').each(function(i, opt){
                                $(opt).trigger('dblclick');
                            });
                        }
                    }
                },
                moveSedes: {
                    origenDestino: function(){
                        var sbTipo = $(_PAGE_).find('#slTipo').val();
                        var option = $(this);
                        var options = $(_PAGE_).find('#slSedeDestino').find('option').length;
                        
                        if(sbTipo === Define.TIPO_USUARIO.Movil && options > 0){
                            $.xBAlert({
                                title: 'Informaci&oacute;n',
                                content: 'No se puede asingar mas de una(1) sede a un usuario Movil'
                            })
                        }
                        else{
                            $(_PAGE_).find('#slSedeDestino').append(option.clone());
                            option.remove();
                            Usuario.behaviors.moveSedes.actualizarCantidad();
                        }
                    },
                    destinoOrigen: function(){
                        var option = $(this);
                        $(_PAGE_).find('#slSedeOrigen').append(option.clone());
                        option.remove();
                        Usuario.behaviors.moveSedes.actualizarCantidad();
                    },
                    actualizarCantidad: function(){
                        $(_PAGE_).find('#spSedeDestino').html($(_PAGE_).find('#slSedeDestino option').length);
                        $(_PAGE_).find('#spSedeOrigen').html($(_PAGE_).find('#slSedeOrigen option').length);
                    }
                },
                gridFormatters: {
                    commands: function(column, row){
                        return '<button type="button" class="btn btn-primary btn-sm" data-action="edit" data-row-id="' + row.id + '" data-toggle="tooltip" data-placement="bottom" title="Modificar"><i class="fa fa-edit"></i></button>' +
                                '<button type="button" class="btn btn-danger btn-sm" data-action="delete" data-row-id="' + row.id + '" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="fa fa-trash"></i></button>';
                    },
                    tipo: function(column, row){
                        return row.tipo === Define.TIPO_USUARIO.Web ? Define.TIPO_USUARIO.WebLbl : Define.TIPO_USUARIO.MovilLbl;
                    },
                    sedes: function(column, row){
                        var rcSedes = $.map(row.sedes, function(sede){
                            return sede[Object.keys(sede)[0]];
                        });

                        return '<button type="button" class="btn btn-primary btn-sm" data-toggle="popover" data-placement="top" title="Items asociados" data-content="' + rcSedes.join(',') + '"><i class="fa fa-eye"></i>&nbsp;Ver sedes(' + rcSedes.length + ')</button>';
                    }
                },
                resetForm: function(){
                    $(_PAGE_).find('#slSedeDestino option').remove();
                    $(_PAGE_).find('#slSedeOrigen').html($(_PAGE_).find('#slSedes').html());
                                        
                    Usuario.behaviors.moveSedes.actualizarCantidad();
                    
                    $(_PAGE_).find('#frmUsuario')[0].reset();
                    $(_PAGE_).find('#frmUsuario').validationEngine('hideAll');
                    $(_PAGE_).find('#txtCheckPwd').val(Define.SI);
                    $(_PAGE_).find('#txtLogin').focus();
                }
            }
        };

        /*
         * Start logic
         */
        Usuario.init();
    }
    catch (Exception) {
        alert(Exception);
    }
});