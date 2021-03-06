var UnidadNegocio = null;

$(function () {
    try {
        var _PAGE_ = $('#unidadNegocio');
        UnidadNegocio = {
            pp: {
                grid: null
            },
            init: function () {
                this.load();
                this.events();
                this.finish();
            },
            load: function () {
                $(_PAGE_).find('#frmUnidadNegocio').validationEngine({validationEventTrigger: 'submit', useBootstrapStyleValidation: true});
                $(_PAGE_).find('[data-toggle="tooltip"]').tooltip();

                this.pp.grid = $(_PAGE_).find('#datagrid-unidadNegocio table').bootgrid({
                    ajax: true,
                    url: Define.BASE_DIR_HANDLERS + 'UnidadNegocio.php?action=Filter',
                    formatters: this.behaviors.gridFormatters
                });
            },
            events: function () {
                $(_PAGE_).delegate('#btnSubmit', 'click', this.behaviors.actualizar.call);
                $(_PAGE_).delegate('#btnReset', 'click', this.behaviors.resetForm);
                $(_PAGE_).delegate('#slDepartamento', 'change', this.behaviors.loadCiudadesByDepartamentos.call);

                this.pp.grid.on("loaded.rs.jquery.bootgrid", function () {
                    $(_PAGE_).find('[data-toggle="tooltip"]').tooltip();
                    $(_PAGE_).find(':button[data-action="edit"]').on('click', UnidadNegocio.behaviors.editar.call);
                    $(_PAGE_).find(':button[data-action="delete"]').on('click', UnidadNegocio.behaviors.eliminar.call);
                })
            },
            finish: function () {
                $(_PAGE_).find('#slUnidadNegocio').focus();
                $(_PAGE_).show().animate({opacity: 1}, 250);
            },
            behaviors: {
                actualizar: {
                    call: function () {
                        if ($(_PAGE_).find('#frmUnidadNegocio').validationEngine('validate')) {
                            $.xToast({
                                msg: 'Guardando unidad de negocio, por favor espere'
                            });

                            var nuCodigo = $(_PAGE_).find('#txtCodigo').val();
                            var nuIdUnidadNegocioGeneral = $(_PAGE_).find('#slUnidadNegocio').val();
                            var nuIdSede = $(_PAGE_).find('#slSede').val();
                            var sbEstado = $(_PAGE_).find('#slEstado').val();

                            $.post(Define.BASE_DIR_HANDLERS + 'UnidadNegocio.php', {
                                action: 'Actualizar',
                                Codigo: nuCodigo,
                                nuIdUnidadNegocioGeneral: nuIdUnidadNegocioGeneral,
                                nuIdSede: nuIdSede,
                                sbEstado: sbEstado
                            }, UnidadNegocio.behaviors.actualizar.response, 'json').always(function () {
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
                            $("#slUnidadNegocio").html("");
                            $.post(Define.BASE_DIR_HANDLERS + 'UnidadNegocio.php', {action: "ActulizarUnidadNegocio"}, function (data) {
                                $("#slUnidadNegocio").append("<option value=''>--Seleccione Unidad de Negocio--</option>");
                                $.each(data, function (i, item) {
                                    $("#slUnidadNegocio").append("<option value='" + item.id + "'>" + item.nombre + "</option>");
                                });
                            }, "json");
                            UnidadNegocio.behaviors.resetForm();
                            UnidadNegocio.pp.grid.bootgrid('reload');
                        });
                    }
                },
                eliminar: {
                    call: function () {
                        var id = $(this).data('row-id');

                        if (!$.isEmpty(id)) {
                            var row = UnidadNegocio.pp.grid.bootgrid('getRow', id);

                            if (!$.isEmpty(row) && !$.isEmptyObject(row)) {
                                $.xBModal({
                                    title: 'Confirmaci&oacute;n',
                                    content: 'Desea eliminar la Unidad de Negocio <strong>' + (row.nombre) + '</strong>?',
                                    closeOnEscape: false,
                                    closeThick: false,
                                    buttons: {
                                        yes: {
                                            label: 'Si',
                                            type: 'btn-warning',
                                            closer: true,
                                            fn: function () {
                                                $.xToast({
                                                    msg: 'Eliminando Unidad de Negocio'
                                                });

                                                $.post(Define.BASE_DIR_HANDLERS + 'UnidadNegocio.php', {
                                                    action: 'Eliminar',
                                                    Codigo: row.id
                                                }, function (data) {
                                                    UnidadNegocio.behaviors.eliminar.response(data, id);
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
                            UnidadNegocio.pp.grid.bootgrid('reload');
                            $("#slUnidadNegocio").html("");
                            $.post(Define.BASE_DIR_HANDLERS + 'UnidadNegocio.php', {action: "ActulizarUnidadNegocio"}, function (data) {
                                $("#slUnidadNegocio").append("<option value=''>--Seleccione Unidad de Negocio--</option>");
                                $.each(data, function (i, item) {
                                    $("#slUnidadNegocio").append("<option value='" + item.id + "'>" + item.nombre + "</option>");
                                });
                            }, "json");
                            
                            $.xPop({
                                msg: 'UnidadNegocio eliminado',
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
                            var row = UnidadNegocio.pp.grid.bootgrid('getRow', id);

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
                        return '<button type="button" class="btn btn-primary btn-sm" data-action="edit" data-row-id="' + row.id + '" data-toggle="tooltip" data-placement="bottom" title="Modificar"><i class="fa fa-edit"></i></button>' +
                                '<button type="button" class="btn btn-danger btn-sm" data-action="delete" data-row-id="' + row.id + '" data-toggle="tooltip" data-placement="bottom" title="Eliminar"><i class="fa fa-trash"></i></button>';
                    }
                },
                resetForm: function () {
                    $(_PAGE_).find('#frmUnidadNegocio')[0].reset();
                    $(_PAGE_).find('#frmUnidadNegocio').validationEngine('hideAll');
                    $(_PAGE_).find('#slUnidadNegocio').focus();
                },
                loadCiudadesByDepartamentos: {
                    call: function () {
                        var nuCodigoDepartamento = $(_PAGE_).find('#slDepartamento').val();

                        $.post(Define.BASE_DIR_HANDLERS + 'UnidadNegocio.php', {
                            action: 'LoadCiduadByDepartamento',
                            nuCodigoDepartamento: nuCodigoDepartamento
                        }, function (data) {
                            UnidadNegocio.behaviors.loadCiudadesByDepartamentos.response(data);
                        });
                    },
                    response: function (data) {
                        $(_PAGE_).find('#slCiudad').html("");
                        data = $.parseJSON(data);
                        $.each(data, function (i, item) {
                            $.each(item, function (key, ciudad) {
                                $(_PAGE_).find('#slCiudad').append("<option value='" + ciudad.id + "'>" + ciudad.nombre + "</option>");
                            });
                        });
                    }
                }
            }
        };

        /*
         * Start logic
         */
        UnidadNegocio.init();
    }
    catch (Exception) {
        alert(Exception);
    }
});