<?php /* Smarty version Smarty-3.1.13, created on 2015-08-06 00:41:05
         compiled from "D:\desarrollo\web\PHP\OctoplusAdminPHP\tpl\usuario.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2036955c29101d48b30-65225325%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34a030219914d53f412867933ea9fdfacb906252' => 
    array (
      0 => 'D:\\desarrollo\\web\\PHP\\OctoplusAdminPHP\\tpl\\usuario.tpl',
      1 => 1435790838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2036955c29101d48b30-65225325',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'DOMINIO' => 0,
    'SI' => 0,
    'SEDES' => 0,
    'sede' => 0,
    'TIPOS' => 0,
    'id' => 0,
    'label' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55c29102024026_16857833',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c29102024026_16857833')) {function content_55c29102024026_16857833($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("_css_js_includes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="usuario" class="app-form">
    <div class="container-fluid">
        <form class="form-horizontal" id="frmUsuario">
            <input type="hidden" id="txtCodigo" data-source="id" />
            <input type="hidden" id="txtDominio" value="@<?php echo $_smarty_tpl->tpl_vars['DOMINIO']->value;?>
" />
            <!-- Permite establecer u omitir la validacion de la clave mediante la funcion [condRequired] -->
            <input type="hidden" id="txtCheckPwd" name="txtCheckPwd" value="<?php echo $_smarty_tpl->tpl_vars['SI']->value;?>
" />
            <select id="slSedes" name="slSedes" class="hidden">
                <?php  $_smarty_tpl->tpl_vars['sede'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sede']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['SEDES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sede']->key => $_smarty_tpl->tpl_vars['sede']->value){
$_smarty_tpl->tpl_vars['sede']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['sede']->value['id'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['sede']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['sede']->value['nombre'];?>
</option>
                <?php } ?>
            </select>
            <h3 class="page-header">Usuarios</h3>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Login</label>
                        <div class="col-lg-9">
                            <input type="text" style="width: 70%"id="txtLogin" name="txtLogin" maxlength="50" placeholder="usuario" class="form-control" data-source="login_name" data-validation-engine="validate[required,funcCall[$.invalidChar]]" /> <label id="lblDominio" >@<?php echo $_smarty_tpl->tpl_vars['DOMINIO']->value;?>
</label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Nombre</label>
                        <div class="col-lg-9">
                            <input type="text" id="txtNombre" name="txtNombre" maxlength="50" placeholder="Nombre" class="form-control" data-source="nombre" data-validation-engine="validate[required,funcCall[$.invalidChar]]" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Clave</label>
                        <div class="col-lg-9">
                            <input type="password" id="txtPwd" name="txtPwd" maxlength="50" placeholder="Clave" class="form-control" data-validation-engine="validate[minSize[5],condRequired[txtCheckPwd]]" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Confirmar clave</label>
                        <div class="col-lg-9">
                            <input type="password" id="txtConfirmPwd" name="txtConfirmPwd" maxlength="50" placeholder="Confirmar clave" class="form-control" data-validation-engine="validate[minSize[5],condRequired[txtCheckPwd],equals[txtPwd]]" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Tipo</label>
                        <div class="col-lg-9">
                            <select id="slTipo" name="slTipo" class="form-control" data-source="tipo">
                                <?php  $_smarty_tpl->tpl_vars['label'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['label']->_loop = false;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['TIPOS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['label']->key => $_smarty_tpl->tpl_vars['label']->value){
$_smarty_tpl->tpl_vars['label']->_loop = true;
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['label']->key;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['label']->value;?>
</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Sedes disponibles(<span id="spSedeOrigen"><?php echo count($_smarty_tpl->tpl_vars['SEDES']->value);?>
</span>)</label>
                        <div class="col-lg-9">
                            <select id="slSedeOrigen" name="slSedeOrigen" multiple="" class="form-control">
                                <?php  $_smarty_tpl->tpl_vars['sede'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sede']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['SEDES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sede']->key => $_smarty_tpl->tpl_vars['sede']->value){
$_smarty_tpl->tpl_vars['sede']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['sede']->value['id'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['sede']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['sede']->value['nombre'];?>
</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Sedes a&ntilde;adidas(<span id="spSedeDestino">0</span>)</label>
                        <div class="col-lg-9">
                            <select id="slSedeDestino" name="slSedeDestino" multiple="" class="form-control">
                                
                            </select>
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
        <br/>
        <div id="datagrid-usuario">
            <table id="tb-datagrid" class="table table-bordered table-condensed table-hover table-striped">
                <thead>
                    <tr>
                        <th data-column-id="id" data-type="numeric" data-identifier="true" data-visible="false">ID</th>
                        <th data-column-id="login">Login</th>
                        <th data-column-id="nombre" data-order="asc">Nombre</th>
                        <th data-column-id="tipo" data-formatter="tipo">Tipo</th>
                        <th data-column-id="sedes" data-formatter="sedes" data-sortable="false">Sedes</th>
                        <th data-column-id="commands" data-formatter="commands" data-sortable="false" class="commands">Opciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div><?php }} ?>