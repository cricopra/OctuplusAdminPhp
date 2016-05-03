/*
 * SNavia
 * Playtech
 * 2013
 */
$(function() {
    try {
        var _PAGE_ = $('#login');
        var Login = {
            pp: {},
            init: function() {
                this.load();
                this.events();
                this.finish();
            },
            load: function() {
                $(_PAGE_).find('#frmLogin').validationEngine();
            },
            events: function() {
                $(_PAGE_).delegate('#btnSubmit', 'click', this.behaviors.login.call);
            },
            finish: function() {
                $(_PAGE_).find('#txtUser').focus();
            },
            behaviors: {
                login: {
                    call: function() {
                        $(_PAGE_).find(':button').prop('disabled', true);
                        
                        if ($(_PAGE_).find('#frmLogin').validationEngine('validate')) {
                            var sbUser = $(_PAGE_).find('#txtUser').val();
                            var sbPwd = $(_PAGE_).find('#txtPwd').val();

                            $.post(Define.BASE_DIR_HANDLERS + 'Login.php', {
                                action: 'Login',
                                user: sbUser,
                                pwd: sbPwd
                            }, Login.behaviors.login.response, 'json').always(Login.behaviors.login.always);
                        }
                        else{
                            Login.behaviors.login.always();
                        }
                    },
                    response: function(data) {
                        if (data) {
                            window.parent.location.reload();
                        }
                    },
                    always: function(){
                        $(_PAGE_).find(':button').removeProp('disabled', true);
                    }
                }
            }
        }

        /*
         * Start logic
         */
        Login.init();
    }
    catch (Exception) {
        alert(Exception);
    }
});