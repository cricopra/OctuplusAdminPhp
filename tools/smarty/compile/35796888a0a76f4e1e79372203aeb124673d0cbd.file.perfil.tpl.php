<?php /* Smarty version Smarty-3.1.13, created on 2015-07-29 21:08:04
         compiled from "D:\desarrollo\web\PHP\OctoplusAdminPHP\tpl\perfil.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2165555b924944b1bb5-99453782%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35796888a0a76f4e1e79372203aeb124673d0cbd' => 
    array (
      0 => 'D:\\desarrollo\\web\\PHP\\OctoplusAdminPHP\\tpl\\perfil.tpl',
      1 => 1433534588,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2165555b924944b1bb5-99453782',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'USUARIOS' => 0,
    'usuario' => 0,
    'OPCIONES' => 0,
    'id' => 0,
    'descripcion' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55b924945cd4d5_11910106',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55b924945cd4d5_11910106')) {function content_55b924945cd4d5_11910106($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("_css_js_includes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="perfil" class="app-form">
    <div class="container-fluid">
        <form class="form-horizontal" id="frmPerfil">
            <input type="hidden" id="txtCodigo" data-source="id" />
            <h3 class="page-header">Perfiles</h3>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Usuario</label>
                        <div class="col-lg-8">
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
                    <button type="button" id="btnSubmit" class="btn btn-primary">Guardar</button>
                    <button type="reset" id="btnReset" class="btn btn-default">Limpiar</button>
                </div>
            </div>
        </form>
        <br/>
        <table id="tb-opciones" class="table table-bordered table-condensed table-striped">
            <thead>
                <tr>
                    <th>Opci&oacute;n(<span id="spOpciones">0</span> de <?php echo count($_smarty_tpl->tpl_vars['OPCIONES']->value);?>
)</th>
                    <th>
                        <input type="checkbox" id="ckCheckAll" />
                        <label for="ckCheckAll">Todas / Ninguna</label>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php  $_smarty_tpl->tpl_vars['descripcion'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['descripcion']->_loop = false;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['OPCIONES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['descripcion']->key => $_smarty_tpl->tpl_vars['descripcion']->value){
$_smarty_tpl->tpl_vars['descripcion']->_loop = true;
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['descripcion']->key;
?>
                    <tr data-id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                        <td colspan="2">
                            <input type="checkbox" id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                            <label for="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="plain"><?php echo $_smarty_tpl->tpl_vars['descripcion']->value;?>
</label>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div><?php }} ?>