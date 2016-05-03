var TipoVehiculo = null;

$(function () {
    try {
        var _PAGE_ = $('#tipoVehiculo');
        TipoVehiculo = {
            pp: {
                grid: null
            },
            init: function () {
                this.load();
                this.events();
                this.finish();
            },
            load: function () {
                $(_PAGE_).find('#frmTipoVehiculo').validationEngine({validationEventTrigger: 'submit', useBootstrapStyleValidation: true});
                $(_PAGE_).find('[data-toggle="tooltip"]').tooltip();

                this.pp.grid = $(_PAGE_).find('#datagrid-tipovehiculo table').bootgrid({
                    ajax: true,
                    url: Define.BASE_DIR_HANDLERS + 'TipoVehiculo.php?action=Filter',
                    formatters: this.behaviors.gridFormatters
                });
            },
            events: function () {
                $(_PAGE_).delegate('#btnSubmit', 'click', this.behaviors.actualizar.call);
                $(_PAGE_).delegate('#btnReset', 'click', this.behaviors.resetForm);

                this.pp.grid.on("loaded.rs.jquery.bootgrid", function () {
                    $(_PAGE_).find('[data-toggle="tooltip"]').tooltip();
                    $(_PAGE_).find(':button[data-action="edit"]').on('click', TipoVehiculo.behaviors.editar.call);
                    $(_PAGE_).find(':button[data-action="delete"]').on('click', TipoVehiculo.behaviors.eliminar.call);
                })
            },
            finish: function () {
                $(_PAGE_).find('#txtNombre').focus();
                $(_PAGE_).show().animate({opacity: 1}, 250);
            },
            behaviors: {
                actualizar: {
                    call: function () {
                        if ($(_PAGE_).find('#frmTipoVehiculo').validationEngine('validate')) {
                            $.xToast({
                                msg: 'Guardando Tipo Vehiculo, por favor espere'
                            });

                            var nuCodigo = $(_PAGE_).find('#txtCodigo').val();
                            var nuTipoVehiculoGeneral = $(_PAGE_).find('#slTipoVehiculoGeneral').val();
                            var nuIdempresa = $(_PAGE_).find('#slEmpresa').val();
                            var sbEstado = $(_PAGE_).find('#slEstado').val();

                            $.post(Define.BASE_DIR_HANDLERS + 'TipoVehiculo.php', {
                                action: 'Actualizar',
                                Codigo: nuCodigo,
                                nuTipoVehiculoGeneral: nuTipoVehiculoGeneral,
                                nuIdempresa: nuIdempresa,
                                sbEstado: sbEstado
                            }, TipoVehiculo.behaviors.actualizar.response, 'json').always(function () {
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
                            
                            $("#slTipoVehiculoGeneral").html("");
                            $.post(Define.BASE_DIR_HANDLERS + 'TipoVehiculo.php', {action: "ActulizarTiposVehiculos"}, function (data) {
                                $("#slTipoVehiculoGeneral").append("<option value=''>--Seleccione Tipo Veh&iacute;culo--</option>");
                                $.each(data, function (i, item) {
                                    $("#slTipoVehiculoGeneral").append("<option value='"+item.id+"'>"+item.nombre+"</option>");
                                });
                            }, "json");

                            TipoVehiculo.behaviors.resetForm();
                            TipoVehiculo.pp.grid.bootgrid('reload');
                        });
                    }
                },
                eliminar: {
                    call: function () {
                        var id = $(this).data('row-id');

                        if (!$.isEmpty(id)) {
                            var row = TipoVehiculo.pp.grid.bootgrid('getRow', id);

                            if (!$.isEmpty(row) && !$.isEmptyObject(row)) {
                                $.xBModal({
                                    title: 'Confirmaci&oacute;n',
                                    content: 'Desea eliminar la TipoVehiculo <strong>' + (row.nombre) + '</strong>?',
                                    closeOnEscape: false,
                                    closeThick: false,
                                    buttons: {
                                        yes: {
                                            label: 'Si',
                                            type: 'btn-warning',
                                            closer: true,
                                            fn: function () {
                                                $.xToast({
                                                    msg: 'Eliminando TipoVehiculo'
                                                });

                                                $.post(Define.BASE_DIR_HANDLERS + 'TipoVehiculo.php', {
                                                    action: 'Eliminar',
                                                    Codigo: row.id
                                                }, function (data) {
                                                    TipoVehiculo.behaviors.eliminar.response(data, id);
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
                            TipoVehiculo.pp.grid.bootgrid('reload');
                            
                            $("#slTipoVehiculoGeneral").html("");
                            $.post(Define.BASE_DIR_HANDLERS + 'TipoVehiculo.php', {action: "ActulizarTiposVehiculos"}, function (data) {
                                $("#slTipoVehiculoGeneral").append("<option value=''>--Seleccione Tipo Veh&iacute;culo--</option>");
                                $.each(data, function (i, item) {
                                    $("#slTipoVehiculoGeneral").append("<option value='"+item.id+"'>"+item.nombre+"</option>");
                                });
                            }, "json");
                            
                            $.xPop({
                                msg: 'TipoVehiculo eliminada',
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
                            var row = TipoVehiculo.pp.grid.bootgrid('getRow', id);

                            if (!$.isEmpty(row) && !$.isEmptyObject(row)) {
                                for (var key in row) {
                                    $(_PAGE_).find('[data-source="' + key + '"]').val(row[key]);
                                }
                            }
                        }
                    }
                },
                gridFormatters: {
                    commands: function (column, row) {
                        return '<button type="button" class="btn btn-danger btn-sm" data-action="delete" data-row-id="' + row.id + '" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="fa fa-trash"></i></button>';
                    }
                },
                resetForm: function () {
                    $(_PAGE_).find('#frmTipoVehiculo')[0].reset();
                    $(_PAGE_).find('#frmTipoVehiculo').validationEngine('hideAll');
                    $(_PAGE_).find('#slTipoVehiculo').focus();
                }
            }
        };

        /*
         * Start logic
         */
        TipoVehiculo.init();
    }
    catch (Exception) {
        alert(Exception);
    }
});