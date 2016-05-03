$(function(){
    try{
        var _PAGE_ = $('#app');
        var Menu = {
            pp:{
                POST: null
            },
            init: function(){
                this.load();
                this.events();
                this.finish();
            },
            load: function(){                
                $(_PAGE_).find('[data-toggle="tooltip"]').tooltip();
            },
            events: function(){
                $(_PAGE_).delegate('.app-menu a:not(.dropdown-toggle), .app-menu :button.link', 'click', this.behaviors.menu.open);
            },
            finish: function(){},
            behaviors: {
                menu: {
                    open: function(){
                        $.abortAll();
                        if(!$.isEmpty(Menu.pp.POST))
                            Menu.pp.POST.abort();
                        
                        var _self_ = $(this);
                        var handler = _self_.data('handler');
                        var subHandler = _self_.data('sub-handler');
                        var module = _self_.data('module');
                        var fnc = _self_.data('function');
                        var json_args = _self_.data('args');
                        
                        if(!$.isEmpty(module) && !$.isEmpty(fnc)){
                            if($.isFunction(Menu.behaviors.executable[module][fnc])){
                                Menu.behaviors.executable[module][fnc].apply(this, [json_args]);
                            }
                        }
                        
                        if(!$.isEmpty(handler)){
                            $.xToast({msg: 'Cargando'});
                            
                            Menu.pp.POST = $.post(Define.BASE_DIR_HANDLERS + handler + '.php', {
                                action: $.clear(subHandler) + 'Index'
                            }).done(function(HTML){
                                Menu.behaviors.menu.response(HTML, _self_);
                            }).fail(function(){
                                $.xToast('hide');
                            });
                        }
                    },
                    response: function(HTML, link){
                        $('.navbar .container > :button:eq(0)').trigger("click");
                        
                        $('li.link.active').removeClass('active');
                        link.parents('li.link').addClass('active');
                        
                        $.xToast('hide', function(){
                            $(_PAGE_).find('#app-view').html(HTML);
                        });
                    }
                },
                executable: {
                    auth: {
                        logout: function(){
                            $.post(Define.BASE_DIR_HANDLERS + 'CerrarSesion.php', {}, function(){
                                window.parent.location.reload();
                            });
                        }
                    }
                }
            }
        };
    }
    catch(Exception){
        alert(Exception);
    }
        
    /*
     * Start logic
     */
    Menu.init();
});