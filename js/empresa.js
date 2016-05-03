var Empresa = null;

$(function () {
    try {
        var _PAGE_ = $('#empresa');
        Empresa = {
            pp: {
                grid: null
            },
            init: function () {
                this.load();
                this.events();
                this.finish();
            },
            load: function () {
                $(_PAGE_).find('#frmEmpresa').validationEngine({validationEventTrigger: 'submit', useBootstrapStyleValidation: true});
                $(_PAGE_).find('[data-toggle="tooltip"]').tooltip();

                this.pp.grid = $(_PAGE_).find('#datagrid-empresa table').bootgrid({
                    ajax: true,
                    url: Define.BASE_DIR_HANDLERS + 'Empresa.php?action=Filter',
                    formatters: this.behaviors.gridFormatters
                });
            },
            events: function () {
                $(_PAGE_).delegate('#btnSubmit', 'click', this.behaviors.actualizar.call);
                $(_PAGE_).delegate('#btnReset', 'click', this.behaviors.resetForm);

                this.pp.grid.on("loaded.rs.jquery.bootgrid", function () {
                    $(_PAGE_).find('[data-toggle="tooltip"]').tooltip();
                    $(_PAGE_).find(':button[data-action="edit"]').on('click', Empresa.behaviors.editar.call);
                    $(_PAGE_).find(':button[data-action="delete"]').on('click', Empresa.behaviors.eliminar.call);
                })
            },
            finish: function () {
                $(_PAGE_).find('#txtNombre').focus();
                $(_PAGE_).show().animate({opacity: 1}, 250);
            },
            behaviors: {
                actualizar: {
                    call: function () {
                        if ($(_PAGE_).find('#frmEmpresa').validationEngine('validate')) {
                            $.xToast({
                                msg: 'Guardando Empresa, por favor espere'
                            });

                            var nuCodigo = $(_PAGE_).find('#txtCodigo').val();
                            var sbNombre = $(_PAGE_).find('#txtNombre').val();
                            var sbNit = $(_PAGE_).find('#txtNit').val();
                            var sbDominio = $(_PAGE_).find('#txtDominio').val();

                            $.post(Define.BASE_DIR_HANDLERS + 'Empresa.php', {
                                action: 'Actualizar',
                                Codigo: nuCodigo,
                                sbNombre: sbNombre,
                                sbNit: sbNit,
                                sbDominio: sbDominio
                            }, Empresa.behaviors.actualizar.response, 'json').always(function () {
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

                            Empresa.behaviors.resetForm();
                            Empresa.pp.grid.bootgrid('reload');
                        });
                    }
                },
                eliminar: {
                    call: function () {
                        var id = $(this).data('row-id');

                        if (!$.isEmpty(id)) {
                            var row = Empresa.pp.grid.bootgrid('getRow', id);

                            if (!$.isEmpty(row) && !$.isEmptyObject(row)) {
                                $.xBModal({
                                    title: 'Confirmaci&oacute;n',
                                    content: 'Desea eliminar la Empresa <strong>' + (row.nombre) + '</strong>?',
                                    closeOnEscape: false,
                                    closeThick: false,
                                    buttons: {
                                        yes: {
                                            label: 'Si',
                                            type: 'btn-warning',
                                            closer: true,
                                            fn: function () {
                                                $.xToast({
                                                    msg: 'Eliminando Empresa'
                                                });

                                                $.post(Define.BASE_DIR_HANDLERS + 'Empresa.php', {
                                                    action: 'Eliminar',
                                                    Codigo: row.id
                                                }, function (data) {
                                                    Empresa.behaviors.eliminar.response(data, id);
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
                            Empresa.pp.grid.bootgrid('reload');

                            $.xPop({
                                msg: 'Empresa eliminada',
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
                            var row = Empresa.pp.grid.bootgrid('getRow', id);

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
                    $(_PAGE_).find('#frmEmpresa')[0].reset();
                    $(_PAGE_).find('#frmEmpresa').validationEngine('hideAll');
                    $(_PAGE_).find('#slEmpresa').focus();
                }
            }
        };

        /*
         * Start logic
         */
        Empresa.init();
    }
    catch (Exception) {
        alert(Exception);
    }
});