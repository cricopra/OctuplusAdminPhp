<?php /* Smarty version Smarty-3.1.13, created on 2015-06-10 16:05:41
         compiled from "D:\desarrollo\web\PHP\OctoPlus\tpl\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17083557844351b4ca3-59558027%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c0544e200a13d3ae2e4ea861204affa23580d9d' => 
    array (
      0 => 'D:\\desarrollo\\web\\PHP\\OctoPlus\\tpl\\login.tpl',
      1 => 1433534588,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17083557844351b4ca3-59558027',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'IMG_DIR' => 0,
    'APP_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5578443527fa83_67923084',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5578443527fa83_67923084')) {function content_5578443527fa83_67923084($_smarty_tpl) {?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <link rel="icon" type="image/ico" href="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
favicon.ico" />
        <link rel="shortcut icon" type="image/ico" href="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
favicon.ico">
        <title><?php echo $_smarty_tpl->tpl_vars['APP_NAME']->value;?>
</title>
        <?php echo $_smarty_tpl->getSubTemplate ("_css_js_includes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </head>
    <body>
        <div class="container" id="login">
            <div class="row">
                <div class="col-sm-8 col-md-6 col-lg-4 col-sm-offset-2 col-md-offset-3 col-lg-offset-4">
                    <form id="frmLogin">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
logo.png" class="img-responsive logo" />

                        <div class="form-group t-center">
                            <h2 class="header">INICIO DE SESI&Oacute;N</h2>
                            <h6 class="header">Ingrese su nombre de usuario y contrase&ntilde;a</h6>
                        </div>

                        <div class="form-group">
                            <input id="txtUser" type="text" class="form-control empty" placeholder="usuario@dominio.com" data-validation-engine="validate[required,custom[email]]" autocomplete="on">
                        </div>

                        <div class="form-group">
                            <input id="txtPwd" type="password" class="form-control empty" placeholder="Clave" data-validation-engine="validate[required]">
                        </div>

                        <div class="form-group">
                            <button type="button" id="btnSubmit" class="btn btn-primary btn-block">
                                Ingresar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html><?php }} ?>