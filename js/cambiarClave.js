var CambiarClave = null;

$(function() {
    try {
        var _PAGE_ = $('#cambiarClave');
        CambiarClave = {
            pp: {
                grid: null
            },
            init: function() {
                this.load();
                this.events();
                this.finish();
            },
            load: function() {
                $(_PAGE_).find('#frmCambiarClave').validationEngine({validationEventTrigger: 'submit', useBootstrapStyleValidation: true});
                $(_PAGE_).find('[data-toggle="tooltip"]').tooltip();
            },
            events: function() {
                $(_PAGE_).delegate('#btnSubmit', 'click', this.behaviors.actualizar.call);
                $(_PAGE_).delegate('#btnReset', 'click', this.behaviors.resetForm);
            },
            finish: function() {
                $(_PAGE_).find('#txtPwdUsuario').focus();
                $(_PAGE_).show().animate({opacity: 1}, 250);
            },
            behaviors: {
                actualizar: {
                    call: function() {
                        if ($(_PAGE_).find('#frmCambiarClave').validationEngine('validate')) {
                            var sbPwdActual = $(_PAGE_).find('#txtPwdUsuario').val();
                            var sbNuevaPwd = $(_PAGE_).find('#txtPwd').val();

                            $.xBModal({
                                title: 'Confirmaci&oacute;n',
                                content: 'Desea cambiar su clave de inicio?',
                                closeOnEscape: false,
                                closeThick: false,
                                buttons: {
                                    yes: {
                                        label: 'Si',
                                        type: 'btn-warning',
                                        closer: true,
                                        fn: function(){
                                            $.xToast({
                                                msg: 'Aplicando cambios, por favor espere'
                                            });

                                            $.post(Define.BASE_DIR_HANDLERS + 'CambiarClave.php', {
                                                action: 'Actualizar',
                                                PwdActual: sbPwdActual,
                                                PwdNueva: sbNuevaPwd
                                            }, CambiarClave.behaviors.actualizar.response, 'json').always(function(){
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
                    },
                    response: function(data) {
                        $.xToast('hide', function(){
                            $.xPop({
                                msg: 'Proceso exitoso',
                                align: 'center-horizontal top out',
                                autoHide: 1500
                            });
                            
                            CambiarClave.behaviors.resetForm();
                        });
                    }
                },
                resetForm: function(){
                    $(_PAGE_).find('#frmCambiarClave')[0].reset();
                    $(_PAGE_).find('#frmCambiarClave').validationEngine('hideAll');
                    $(_PAGE_).find('#txtPwdUsuario').focus();
                }
            }
        };

        /*
         * Start logic
         */
        CambiarClave.init();
    }
    catch (Exception) {
        alert(Exception);
    }
});