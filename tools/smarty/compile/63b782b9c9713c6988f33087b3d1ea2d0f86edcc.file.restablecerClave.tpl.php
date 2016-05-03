<?php /* Smarty version Smarty-3.1.13, created on 2015-07-03 23:34:18
         compiled from "D:\desarrollo\web\PHP\OctoplusAdminPHP\tpl\restablecerClave.tpl" */ ?>
<?php /*%%SmartyHeaderCode:264255596ffdad568b7-00751866%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63b782b9c9713c6988f33087b3d1ea2d0f86edcc' => 
    array (
      0 => 'D:\\desarrollo\\web\\PHP\\OctoplusAdminPHP\\tpl\\restablecerClave.tpl',
      1 => 1433534588,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '264255596ffdad568b7-00751866',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'USUARIOS' => 0,
    'usuario' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5596ffdb005fe2_17440956',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5596ffdb005fe2_17440956')) {function content_5596ffdb005fe2_17440956($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("_css_js_includes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="restablecerClave" class="app-form">
    <div class="container-fluid">
        <form class="form-horizontal" id="frmRestablecerClave">
            <input type="hidden" id="txtCodigo" data-source="id" />
            <h3 class="page-header">Restablecer clave</h3>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Usuario</label>
                        <div class="col-lg-9">
                            <select id="slUsuario" name="slUsuario" class="form-control" data-validation-engine="validate[required]">
                                <option value="">Seleccione...</option>
                                <?php  $_smarty_tpl->tpl_vars['usuario'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['usuario']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['USUARIOS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['usuario']->key => $_smarty_tpl->tpl_vars['usuario']->value){
$_smarty_tpl->tpl_vars['usuario']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['usuario']->value['nombre'];?>
</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Tu clave</label>
                        <div class="col-lg-9">
                            <input type="password" id="txtPwdUsuario" name="txtPwdUsuario" maxlength="50" placeholder="Tu clave de inicio" class="form-control" data-validation-engine="validate[required,minSize[5]]" />
                        </div>
                    </div>
                </div>
            </div>
                            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Clave nueva</label>
                        <div class="col-lg-9">
                            <input type="password" id="txtPwd" name="txtPwd" maxlength="50" placeholder="Clave" class="form-control" data-validation-engine="validate[required,minSize[5]]" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Confirmar clave</label>
                        <div class="col-lg-9">
                            <input type="password" id="txtConfirmPwd" name="txtConfirmPwd" maxlength="50" placeholder="Confirmar clave" class="form-control" data-validation-engine="validate[required,minSize[5],equals[txtPwd]]" />
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">            
                <div class="col-lg-12 t-center">
                    <button type="button" id="btnSubmit" class="btn btn-primary">Guardar</button>
                    <button type="reset" id="btnReset" class="btn btn-default">Limpiar</button>
                </div>
            </div>
        </form>
    </div>
</div><?php }} ?>