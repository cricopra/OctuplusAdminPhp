var Perfil = null;

$(function() {
    try {
        var _PAGE_ = $('#perfil');
        Perfil = {
            pp: {
                grid: null
            },
            init: function() {
                this.load();
                this.events();
                this.finish();
            },
            load: function() {
                $(_PAGE_).find('#frmPerfil').validationEngine({validationEventTrigger: 'submit', useBootstrapStyleValidation: true});
                $(_PAGE_).find('[data-toggle="tooltip"]').tooltip();
            },
            events: function() {
                $(_PAGE_).delegate('#btnSubmit', 'click', this.behaviors.actualizar.call);
                $(_PAGE_).delegate('#btnReset', 'click', this.behaviors.resetForm);
                $(_PAGE_).delegate('#slUsuario', 'change', this.behaviors.cargarOpcionesUsuario.call);
                $(_PAGE_).delegate('#tb-opciones tbody :checkbox', 'change', this.behaviors.events.countChecheckOptions);
                $(_PAGE_).delegate('#ckCheckAll', 'change', this.behaviors.events.onSelectAll);
            },
            finish: function() {
                $(_PAGE_).find('#slUsuario').focus();
                $(_PAGE_).show().animate({opacity: 1}, 250);
            },
            behaviors: {
                actualizar: {
                    call: function() {
                        if ($(_PAGE_).find('#frmPerfil').validationEngine('validate')) {
                            var nuCodigo = $(_PAGE_).find('#slUsuario').val();
                            var rcOpciones = $.map($(_PAGE_).find('#tb-opciones tbody :checkbox:checked'), function(opt){
                                return $.toInt($(opt).attr('id'));
                            });

                            $.xBModal({
                                title: 'Confirmaci&oacute;n',
                                content: 'Desea aplicar los cambios de perfil para el usuario?',
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

                                            $.post(Define.BASE_DIR_HANDLERS + 'Perfil.php', {
                                                action: 'ActualizarOpcionesUsuario',
                                                Codigo: nuCodigo,
                                                Opciones: rcOpciones.join(',')
                                            }, Perfil.behaviors.actualizar.response, 'json').always(function(){
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
                            
                            Perfil.behaviors.resetForm();
                        });
                    }
                },
                cargarOpcionesUsuario: {
                    call: function(){
                        var nuIdUsuario = $(this).val();
                        
                        $(_PAGE_).find('#tb-opciones tbody :checkbox').prop('checked', false);
                        $(_PAGE_).find('#ckCheckAll').prop('checked', false);
                        Perfil.behaviors.events.countChecheckOptions();
                        
                        if(!$.isEmpty(nuIdUsuario)){
                            $.xToast({
                                msg: 'Consultando perfil, por favor espere'
                            });
                            
                            $.post(Define.BASE_DIR_HANDLERS + 'Perfil.php', {
                                action: 'GetOpcionesUsuario',
                                Codigo: nuIdUsuario
                            }, Perfil.behaviors.cargarOpcionesUsuario.response, 'json').always(function(){
                                $.xToast('hide');
                            });
                        }
                        else{
                            $(_PAGE_).find('#tb-opciones tbody :checkbox').prop('checked', false);
                            $(_PAGE_).find('#ckCheckAll').prop('checked', false);
                        }
                    },
                    response: function(data){
                        $.each(data.opciones, function(i, opc){
                            $(_PAGE_).find('#' + opc).prop('checked', true);
                        });
                        
                        Perfil.behaviors.events.countChecheckOptions();
                    }
                },
                events: {
                    countChecheckOptions: function(){
                        $(_PAGE_).find('#spOpciones').html($(_PAGE_).find('#tb-opciones tbody :checkbox:checked').length);
                    },
                    onSelectAll: function(){
                        $(_PAGE_).find('#tb-opciones tbody :checkbox').prop('checked', $(this).is(':checked'));
                        Perfil.behaviors.events.countChecheckOptions();
                    }
                },
                resetForm: function(){
                    $(_PAGE_).find('#frmPerfil')[0].reset();
                    $(_PAGE_).find('#frmPerfil').validationEngine('hideAll');
                    $(_PAGE_).find('#slUsuario').trigger('change').focus();
                }
            }
        };

        /*
         * Start logic
         */
        Perfil.init();
    }
    catch (Exception) {
        alert(Exception);
    }
});