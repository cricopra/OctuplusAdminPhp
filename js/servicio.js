var Servicio = null;

$(function () {
    try {
        var _PAGE_ = $('#servicio');
        Servicio = {
            pp: {
                grid: null
            },
            init: function () {
                this.load();
                this.events();
                this.finish();
            },
            load: function () {
                $(_PAGE_).find('#frmServicio').validationEngine({validationEventTrigger: 'submit', useBootstrapStyleValidation: true});
                $(_PAGE_).find('[data-toggle="tooltip"]').tooltip();
                $(_PAGE_).find('[data-type="datepicker"]').datepicker();
                $('#frmRegistrarServicio').validationEngine({validationEventTrigger: 'submit', useBootstrapStyleValidation: true});
                this.behaviors.buscar.call();

                this.pp.grid = $(_PAGE_).find('#datagrid-servicio table').bootgrid({
                    //ajax: true,
                    url: Define.BASE_DIR_HANDLERS + 'Servicio.php?action=Filtrar',
                    // navigation: 0,
                    formatters: this.behaviors.gridFormatters
                });
            },
            events: function () {
                $(_PAGE_).delegate('#btnSubmit', 'click', this.behaviors.buscar.call);
                $(_PAGE_).delegate('#btnReset', 'click', this.behaviors.resetForm);
                $('#slTipoVehiculo').on('change', this.behaviors.cargarProductosByVehiculo.call);
                $('#btnRegistrarServicio').on('click', this.behaviors.ValidarReingresoVehiculo.call);
                $('#txtRegistroPlaca').on('blur', this.behaviors.GetClienteByPlaca.call);
                this.pp.grid.on("loaded.rs.jquery.bootgrid", function () {
                    $(_PAGE_).find('[data-toggle="tooltip"]').tooltip();
                    $(_PAGE_).find('[data-toggle="popover"]').popover();
                    $(_PAGE_).find('[data-toggle="popoverAcciones"]').popover({
                        content: Servicio.behaviors.events.onPopoverAcciones
                    }).on('shown.bs.popover', function () {
                        $(_PAGE_).find('button[data-action="actEstado"]').off('click').on('click', Servicio.behaviors.actualizarEstado.call);
                        $(_PAGE_).find('button[data-action="reasignar"]').off('click').on('click', Servicio.behaviors.reasignarTrabajador.call);
                    });
                });
            },
            finish: function () {
                $(_PAGE_).find('#slTrabajador').focus();
                $(_PAGE_).show().animate({opacity: 1}, 250);
            },
            behaviors: {
                buscar: {
                    call: function () {
                        if ($(_PAGE_).find('#frmServicio').validationEngine('validate')) {
                            $.xToast({
                                msg: 'Buscando servicios, por favor espere'
                            });

                            var dtFechaInicial = $(_PAGE_).find('#txtFechaCreacionIni').val();
                            var dtFechaFinal = $(_PAGE_).find('#txtFechaCreacionFin').val();
                            var nuIdTrabajador = $(_PAGE_).find('#slTrabajador').val();
                            var sbEstado = $(_PAGE_).find('#slEstado').val();
                            var sbPlaca = $(_PAGE_).find('#txtPlaca').val();
                            var sbDocumento = $(_PAGE_).find('#txtDocumento').val();

                            $.post(Define.BASE_DIR_HANDLERS + 'Servicio.php', {
                                action: 'Filtrar',
                                FechaInicial: dtFechaInicial,
                                FechaFinal: dtFechaFinal,
                                Trabajador: nuIdTrabajador,
                                Estado: sbEstado,
                                Placa: sbPlaca,
                                Documento: sbDocumento
                            }, Servicio.behaviors.buscar.response, 'json').always(function () {
                                $.xToast('hide');
                            });
                        }
                    },
                    response: function (data) {
                        $.xToast('hide', function () {
                            Servicio.pp.grid.bootgrid('clear');
                            Servicio.pp.grid.bootgrid('append', data.servicios);
                        });
                    }
                },
                actualizarEstado: {
                    call: function () {
                        var sbEstado = $(this).data('estado'),
                                nuId = $(this).data('id'),
                                blConfirm = $(this).data('confirm');

                        var fnPost = function () {
                            $.post(Define.BASE_DIR_HANDLERS + 'Servicio.php', {
                                action: 'ActualizarEstado',
                                Codigo: nuId,
                                Estado: sbEstado
                            }, Servicio.behaviors.actualizarEstado.response, 'json').always(function () {
                                $.xToast('hide');
                            });
                        };

                        if (!$.isEmpty(sbEstado, nuId)) {
                            if (blConfirm) {
                                $.xBModal({
                                    title: 'Confirmaci&oacute;n',
                                    content: 'Desea cambiar el estado del servicio?',
                                    closeOnEscape: false,
                                    closeThick: false,
                                    buttons: {
                                        yes: {
                                            label: 'Si',
                                            type: 'btn-warning',
                                            closer: true,
                                            fn: function () {
                                                fnPost.apply(this, []);
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
                            else {
                                fnPost.apply(this, []);
                            }
                        }
                    },
                    response: function (data) {
                        Servicio.behaviors.buscar.call();
                    }
                },
                reasignarTrabajador: {
                    call: function () {
                        $(_PAGE_).find('[data-toggle="popoverAcciones"],[data-toggle="popover"]').popover('hide');

                        var nuId = $(this).data('id'),
                                row = Servicio.pp.grid.bootgrid('getRow', nuId);

                        if (!$.isEmpty(nuId, row) && !$.isEmptyObject(row)) {
                            var slTrabajadorDestino = $(_PAGE_).find('#slTrabajador').clone().attr('id', 'slTrabajadorDestino');
                            var sbTrabajadorOrigen = $.isEmpty(row.idtrabajador) ? 'Sin asignar' : row.trabajador;

                            if (slTrabajadorDestino.children('option:eq(0)').attr('value') === '') {
                                slTrabajadorDestino.children('option:eq(0)').remove();
                            }
                            if (slTrabajadorDestino.children('option[value="' + row.idtrabajador + '"]').length) {
                                slTrabajadorDestino.children('option[value="' + row.idtrabajador + '"]').remove();
                            }

                            var content = $('<div></div>')
                                    .append('<label>Trabajador actual</label>: ' + sbTrabajadorOrigen + '<br/>')
                                    .append('<label>Trabajador nuevo</label>')
                                    .append(slTrabajadorDestino)
                                    .append('<br/><div class="alert alert-danger hidden" role="alert"></div>');

                            var confirm = $.xBModal({
                                title: 'Reasignar trabajador',
                                content: content,
                                closeOnEscape: false,
                                closeThick: false,
                                buttons: {
                                    yes: {
                                        label: 'Aceptar',
                                        type: 'btn-warning',
                                        closer: false,
                                        fn: function () {
                                            content.find('.alert').addClass('hidden').empty();

                                            var nuIdTrabajadorNuevo = $(content).find('#slTrabajadorDestino').val();

                                            if (!$.isEmpty(nuIdTrabajadorNuevo)) {
                                                $.xToast({
                                                    msg: 'Reasignando servicio, por favor espere'
                                                });

                                                $.post(Define.BASE_DIR_HANDLERS + 'Servicio.php', {
                                                    action: 'Reasignar',
                                                    Codigo: row.id,
                                                    Trabajador: nuIdTrabajadorNuevo
                                                }, function () {
                                                    Servicio.behaviors.actualizarEstado.response(confirm);
                                                }, 'json').always(function () {
                                                    confirm.modal('hide');
                                                    $.xToast('hide');
                                                });
                                            }
                                            else {
                                                content.find('.alert').html('Seleccione un trabajador destino v&aacute;lido').removeClass('hidden');
                                            }
                                        }
                                    },
                                    no: {
                                        label: 'Cancelar',
                                        type: 'btn-primary',
                                        closer: true
                                    }
                                }
                            });
                        }
                    },
                    response: function (confirm) {
                        Servicio.behaviors.buscar.call();
                    }
                },
                cargarProductosByVehiculo: {
                    call: function () {
                        var nuIdTipoVehiculo = $('#slTipoVehiculo').val();
                        $.post(Define.BASE_DIR_HANDLERS + 'Producto.php', {
                            action: 'GetProductosByUsuarioTipoVehiculo',
                            nuIdTipoVehiculo: nuIdTipoVehiculo
                        }, function (data) {
                            Servicio.behaviors.cargarProductosByVehiculo.response(data);
                        });
                    },
                    response: function (data) {
                        $('#slProductos').html("");
                        data = $.parseJSON(data);
                        $.each(data, function (i, item) {
                            console.log(item);
                            $.each(item, function (key, producto) {
                                $('#slProductos').append("<option value='" + producto.id + "'>" + producto.nombre + "</option>");
                            });
                        });
                    }
                },
                ValidarReingresoVehiculo: {
                    call: function () {
                        if ($('#frmRegistrarServicio').validationEngine('validate')) {
                            $('#myModal').modal('hide');
                            $.xToast({
                                msg: 'Validaando Placa, por favor espere'
                            });

                            var sbPlaca = $('#txtRegistroPlaca').val();


                            $.post(Define.BASE_DIR_HANDLERS + 'Servicio.php', {
                                action: 'ValidarReingresoVehiculo',
                                sbPlaca: sbPlaca

                            }, Servicio.behaviors.ValidarReingresoVehiculo.response, 'json').always(function () {
                                $.xToast('hide');
                            });


                        }
                    },
                    response: function (data) {
                        $.xToast('hide', function () {
                            if (data.validar_ingreso !== 'false') {
                                Servicio.behaviors.RegitrarServicio.call();
                            }
                            else {
                                Servicio.behaviors.resetForm();
                                Servicio.pp.grid.bootgrid('reload');
                                $.xBAlert({
                                    title: 'Reingreso de Vehículo',
                                    content: 'El carro de placas ' + $('#txtRegistroPlaca').val() + " ya está en el lavadero!"
                                });
                            }
                        });
                    }
                },
                RegitrarServicio: {
                    call: function () {
                        if ($('#frmRegistrarServicio').validationEngine('validate')) {
                            $('#myModal').modal('hide');
                            $.xToast({
                                msg: 'Registrando Servicio, por favor espere'
                            });

                            var nuCodigo = $('#txtCodigoServicio').val();
                            var nuIdTipoVehiculo = $('#slTipoVehiculo').val();
                            var productos = $('#slProductos').val();
                            var sbPlaca = $('#txtRegistroPlaca').val();
                            var sbDocumento = $('#txtRegistroDocumento').val();
                            var sbCliente = $('#txtRegistroCliente').val();
                            var sbCelular = $('#txtRegistroCelular').val();
                            var nuIdTrabajador = $('#slRegistroTrabajador').val();

                            $.post(Define.BASE_DIR_HANDLERS + 'Servicio.php', {
                                action: 'RegistrarServicio',
                                nuCodigo: nuCodigo,
                                nuIdTipoVehiculo: nuIdTipoVehiculo,
                                productos: productos,
                                sbPlaca: sbPlaca,
                                sbDocumento: sbDocumento,
                                sbCliente: sbCliente,
                                sbCelular: sbCelular,
                                nuIdTrabajador: nuIdTrabajador
                            }, Servicio.behaviors.RegitrarServicio.response, 'json').always(function () {
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

                            Servicio.behaviors.resetForm();
                            Servicio.pp.grid.bootgrid('reload');
                            Servicio.behaviors.buscar.call();
                        });
                    }
                },
                GetClienteByPlaca: {
                    call: function () {
                        var sbPlaca = $('#txtRegistroPlaca').val();
                        if (sbPlaca.length > 0) {
                            $.post(Define.BASE_DIR_HANDLERS + 'Servicio.php', {
                                action: 'GetClienteByPlaca',
                                sbPlaca: sbPlaca,
                            }, Servicio.behaviors.GetClienteByPlaca.response, 'json').always(function () {
                                $.xToast('hide');
                            });
                        }

                    },
                    response: function (data) {
                        if (data.exists) {
                            $("#txtRegistroCliente").val(data.cliente.nombre);
                            $("#txtRegistroDocumento").val(data.cliente.documento);
                            $("#txtRegistroCelular").val(data.cliente.celular);
                        }
                    }
                },
                events: {
                    onPopoverAcciones: function () {
                        var id = $(this).data('id');
                        var row = Servicio.pp.grid.bootgrid('getRow', id);

                        if (!$.isEmpty(row) && !$.isEmptyObject(row)) {
                            var blActivar = row.estado === Define.SERVICIO.Cancelado,
                                    blEntregar = row.estado === Define.SERVICIO.Terminado,
                                    blCancelar = row.estado === Define.SERVICIO.Activo || row.estado === Define.SERVICIO.Iniciado,
                                    blIniciar = row.estado === Define.SERVICIO.Activo,
                                    blTerminar = row.estado === Define.SERVICIO.Iniciado,
                                    blReasignar = row.estado === Define.SERVICIO.Activo || row.estado === Define.SERVICIO.Iniciado;

                            return '<table class="table-acciones">' +
                                    '<tbody>' +
                                    '<tr>' +
                                    '<td><button type="button" data-action="actEstado" data-confirm="false" data-id="' + row.id + '" data-estado="' + Define.SERVICIO.Activo + '" class="btn btn-xs btn-success" ' + (!blActivar ? 'disabled' : '') + '>Activar</button></td>' +
                                    '<td><button type="button" data-action="actEstado" data-confirm="true" data-id="' + row.id + '" data-estado="' + Define.SERVICIO.Cancelado + '" class="btn btn-xs btn-danger" ' + (!blCancelar ? 'disabled' : '') + '>Cancelar</button></td>' +
                                    '</tr>' +
                                    '<tr>' +
                                    '<td><button type="button" data-action="actEstado" data-confirm="false" data-id="' + row.id + '" data-estado="' + Define.SERVICIO.Iniciado + '" class="btn btn-xs btn-primary" ' + (!blIniciar ? 'disabled' : '') + '>Iniciar</button></td>' +
                                    '<td><button type="button" data-action="reasignar" data-id="' + row.id + '" class="btn btn-xs btn-warning" ' + (!blReasignar ? 'disabled' : '') + '>Reasignar</button></td>' +
                                    '</tr>' +
                                    '<tr>' +
                                    '<td><button type="button" data-action="actEstado" data-confirm="true" data-id="' + row.id + '" data-estado="' + Define.SERVICIO.Terminado + '" class="btn btn-xs btn-primary" ' + (!blTerminar ? 'disabled' : '') + '>Terminar</button></td>' +
                                    '<td><button type="button" data-action="actEstado" data-confirm="true" data-id="' + row.id + '" data-estado="' + Define.SERVICIO.Entregado + '" class="btn btn-xs btn-primary" ' + (!blEntregar ? 'disabled' : '') + '>Entregar</button></td>' +
                                    '</tr>' +
                                    '</tbody>' +
                                    '</table>';
                        }

                        return 'No hay acciones';
                    }
                },
                gridFormatters: {
                    commands: function (column, row) {
                        var row = Servicio.pp.grid.bootgrid('getRow', row.id),
                                content = ['No hay informaci&oacute;n'];

                        /*
                         * Datos extras
                         */
                        if (!$.isEmpty(row) && !$.isEmptyObject(row)) {
                            content = [
                                '<strong>Fecha inicio: </strong>' + ($.isEmpty(row.fechainicio, row.horainicio) ? 'Sin datos' : $.clear(row.fechainicio) + ' ' + $.clear(row.horainicio)),
                                '<strong>Fecha fin: </strong>' + ($.isEmpty(row.fechafin, row.horafin) ? 'Sin datos' : $.clear(row.fechafin) + ' ' + $.clear(row.horafin)),
                                '<strong>Fecha entrega: </strong>' + ($.isEmpty(row.fechaentregavehiculo, row.horaentregavehiculo) ? 'Sin datos' : $.clear(row.fechaentregavehiculo) + ' ' + $.clear(row.horaentregavehiculo))
                            ];
                        }

                        return '<button type="button" class="btn btn-primary btn-sm" data-html="true" data-id="' + row.id + '" data-toggle="popover" data-content="' + content.join('<br/>') + '" data-placement="top" title="Detalles"><i class="fa fa-eye"></i></button>' +
                                '&nbsp;<button type="button" class="btn btn-primary btn-sm" data-html="true" data-id="' + row.id + '" data-toggle="popoverAcciones" data-placement="top" title="Acciones"><i class="fa fa-wrench"></i></button>';
                    },
                    productos: function (column, row) {
                        var rcProds = $.map(row.productos, function (producto) {
                            return producto.nombre + '(' + producto.valor.format() + ')';
                        });

                        return '<button type="button" class="btn btn-primary btn-sm" data-toggle="popover" data-html="true" data-placement="top" title="Productos asociados" data-content="' + rcProds.join('<br/>') + '"><i class="fa fa-eye"></i>&nbsp;Ver(' + rcProds.length + ')</button>';
                    },
                    valor: function (column, row) {
                        return row.valor.format();
                    },
                    estado: function (column, row) {
                        return Define.SERVICIO_LBL.hasOwnProperty(row.estado) ? Define.SERVICIO_LBL[row.estado] : row.estado;
                    }
                },
                resetForm: function () {
                    $(_PAGE_).find('#frmServicio')[0].reset();
                    $(_PAGE_).find('#frmServicio').validationEngine('hideAll');
                    $('#frmRegistrarServicio')[0].reset();
                    $('#frmRegistrarServicio').validationEngine('hideAll');
                    $('#slProductos').html("");
                    $(_PAGE_).find('#slTrabajador').focus();
                }
            }
        };

        /*
         * Start logic
         */
        Servicio.init();
    }
    catch (Exception) {
        alert(Exception);
    }
});