var Sede = null;

$(function () {
    try {
        var _PAGE_ = $('#sede');
        Sede = {
            pp: {
                grid: null
            },
            init: function () {
                this.load();
                this.events();
                this.finish();
            },
            load: function () {
                $(_PAGE_).find('#frmSede').validationEngine({validationEventTrigger: 'submit', useBootstrapStyleValidation: true});
                $(_PAGE_).find('[data-toggle="tooltip"]').tooltip();

                this.pp.grid = $(_PAGE_).find('#datagrid-sede table').bootgrid({
                    ajax: true,
                    url: Define.BASE_DIR_HANDLERS + 'Sede.php?action=Filter',
                    formatters: this.behaviors.gridFormatters
                });
            },
            events: function () {
                $(_PAGE_).delegate('#btnSubmit', 'click', this.behaviors.actualizar.call);
                $(_PAGE_).delegate('#btnReset', 'click', this.behaviors.resetForm);
                $(_PAGE_).delegate('#slDepartamento', 'change', this.behaviors.loadCiudadesByDepartamentos.call);

                this.pp.grid.on("loaded.rs.jquery.bootgrid", function () {
                    $(_PAGE_).find('[data-toggle="tooltip"]').tooltip();
                    $(_PAGE_).find(':button[data-action="edit"]').on('click', Sede.behaviors.editar.call);
                    $(_PAGE_).find(':button[data-action="delete"]').on('click', Sede.behaviors.eliminar.call);
                })
            },
            finish: function () {
                $(_PAGE_).find('#slSede').focus();
                $(_PAGE_).show().animate({opacity: 1}, 250);
            },
            behaviors: {
                actualizar: {
                    call: function () {
                        if ($(_PAGE_).find('#frmSede').validationEngine('validate')) {
                            $.xToast({
                                msg: 'Guardando Sede, por favor espere'
                            });
                            
                            var nuCodigo = $(_PAGE_).find('#txtCodigo').val();
                            var sbNombreSede = $(_PAGE_).find('#txtNombre').val();
                            var sbDireccion = $(_PAGE_).find('#txtDireccion').val();
                            var sbTelefono = $(_PAGE_).find('#txtTelefono').val();
                            var sbCelular = $(_PAGE_).find('#txtCelular').val();
                            //var sbBarrio = $(_PAGE_).find('#txtBarrio').val();
                            var nuCodigoCiudad  = $(_PAGE_).find('#slCiudad').val(); 
                            var sbEstado = $(_PAGE_).find('#slEstado').val();
                            var sbEmpresa = $(_PAGE_).find('#slEmpresa').val();

                            $.post(Define.BASE_DIR_HANDLERS + 'Sede.php', {
                                action: 'Actualizar',
                                Codigo: nuCodigo,
                                sbNombreSede: sbNombreSede,
                                sbDireccion: sbDireccion,
                                sbTelefono: sbTelefono,
                                sbCelular: sbCelular,
                                //sbBarrio: sbBarrio,
                                nuCodigoCiudad: nuCodigoCiudad,
                                sbEstado: sbEstado,
                                sbEmpresa: sbEmpresa
                            }, Sede.behaviors.actualizar.response, 'json').always(function () {
                                $.xToast('hide');
                            });
                            
                            
                        }
                    },
                    response: function (data) {
                        $.xToast('hide', function () {
                            $.xPop({
                                msg: 'Proceso exitoso',
                                align: 'center-horizontal top out',
                                autoHide: 1500
                            });

                            Sede.behaviors.resetForm();
                            Sede.pp.grid.bootgrid('reload');
                        });
                    }
                },
                eliminar: {
                    call: function () {
                        var id = $(this).data('row-id');

                        if (!$.isEmpty(id)) {
                            var row = Sede.pp.grid.bootgrid('getRow', id);

                            if (!$.isEmpty(row) && !$.isEmptyObject(row)) {
                                $.xBModal({
                                    title: 'Confirmaci&oacute;n',
                                    content: 'Desea eliminar la Sede <strong>' + (row.nombre) + '</strong>?',
                                    closeOnEscape: false,
                                    closeThick: false,
                                    buttons: {
                                        yes: {
                                            label: 'Si',
                                            type: 'btn-warning',
                                            closer: true,
                                            fn: function () {
                                                $.xToast({
                                                    msg: 'Eliminando Sede'
                                                });

                                                $.post(Define.BASE_DIR_HANDLERS + 'Sede.php', {
                                                    action: 'Eliminar',
                                                    Codigo: row.id
                                                }, function (data) {
                                                    Sede.behaviors.eliminar.response(data, id);
                                                }, 'json').always(function () {
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
                    response: function (data, id) {
                        $.xToast('hide', function () {
                            Sede.pp.grid.bootgrid('reload');

                            $.xPop({
                                msg: 'Sede eliminado',
                                align: 'center-horizontal top out',
                                autoHide: 1500
                            });
                        });
                    }
                },
                editar: {
                    call: function () {
                        var id = $(this).data('row-id');

                        if (!$.isEmpty(id)) {
                            var row = Sede.pp.grid.bootgrid('getRow', id);

                            if (!$.isEmpty(row) && !$.isEmptyObject(row)) {
                                for (var key in row) {                                  
                                    $(_PAGE_).find('[data-source="' + key + '"]').val(row[key]);
                                    if(key === "iddepartamento"){
                                        Sede.behaviors.loadCiudadesByDepartamentos.call();
                                    }
                                }
                            }
                        }
                    }
                },
                gridFormatters: {
                    commands: function (column, row) {
                        return '<button type="button" class="btn btn-primary btn-sm" data-action="edit" data-row-id="' + row.id + '" data-toggle="tooltip" data-placement="bottom" title="Modificar"><i class="fa fa-edit"></i></button>' +
                                '<button type="button" class="btn btn-danger btn-sm" data-action="delete" data-row-id="' + row.id + '" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="fa fa-trash"></i></button>';
                    }
                },
                resetForm: function () {
                    $(_PAGE_).find('#frmSede')[0].reset();
                    $(_PAGE_).find('#frmSede').validationEngine('hideAll');
                    $(_PAGE_).find('#slSede').focus();
                },
                loadCiudadesByDepartamentos: {
                    call: function () { 
                        var nuCodigoDepartamento = $(_PAGE_).find('#slDepartamento').val();
                        $.post(Define.BASE_DIR_HANDLERS + 'Sede.php', {
                            action: 'LoadCiduadByDepartamento',
                            nuCodigoDepartamento: nuCodigoDepartamento
                        }, function (data) {
                            Sede.behaviors.loadCiudadesByDepartamentos.response(data);
                        });
                    },
                    response: function (data) {
                       $(_PAGE_).find('#slCiudad').html("");
                       data = $.parseJSON(data);
                       $.each(data, function (i, item) {
                            $.each(item, function (key, ciudad) {
                               $(_PAGE_).find('#slCiudad').append("<option value='"+ciudad.id+"'>"+ciudad.nombre+"</option>");
                            });
                        });
                    }
                }
            }
        };

        /*
         * Start logic
         */
        Sede.init();
    }
    catch (Exception) {
        alert(Exception);
    }
});