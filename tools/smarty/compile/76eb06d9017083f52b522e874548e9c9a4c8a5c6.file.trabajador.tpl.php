<?php /* Smarty version Smarty-3.1.13, created on 2015-08-01 17:25:54
         compiled from "D:\desarrollo\web\PHP\OctoplusAdminPHP\tpl\trabajador.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2116455bce502684a22-44481913%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76eb06d9017083f52b522e874548e9c9a4c8a5c6' => 
    array (
      0 => 'D:\\desarrollo\\web\\PHP\\OctoplusAdminPHP\\tpl\\trabajador.tpl',
      1 => 1433534588,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2116455bce502684a22-44481913',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SEDES' => 0,
    'sede' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55bce5027d1bd0_77399238',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bce5027d1bd0_77399238')) {function content_55bce5027d1bd0_77399238($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("_css_js_includes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="trabajador">
    <div class="container-fluid">
        <form class="form-horizontal" id="frmTrabajador">
            <input type="hidden" id="txtCodigo" data-source="id" />
            <h3 class="page-header">Trabajadores</h3>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Sede</label>
                        <div class="col-lg-9">
                            <select id="slSede" name="slSede" class="form-control" data-source="idsede">
                                <?php  $_smarty_tpl->tpl_vars['sede'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sede']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['SEDES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sede']->key => $_smarty_tpl->tpl_vars['sede']->value){
$_smarty_tpl->tpl_vars['sede']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['sede']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['sede']->value['nombre'];?>
</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Documento</label>
                        <div class="col-lg-9">
                            <input type="text" id="txtDocumento" name="txtDocumento" maxlength="20" placeholder="Documento de intentidad" class="form-control" data-source="documento" data-validation-engine="validate[required,custom[onlyNumberSp]]" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Nombres</label>
                        <div class="col-lg-9">
                            <input type="text" id="txtNombres" name="txtNombres" maxlength="50" placeholder="Nombres" class="form-control" data-source="nombres" data-validation-engine="validate[required,funcCall[$.invalidChar]]" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Apellidos</label>
                        <div class="col-lg-9">
                            <input type="text" id="txtApellidos" name="txtApellidos" maxlength="50" placeholder="Apellidos" class="form-control" data-source="apellidos" data-validation-engine="validate[required,funcCall[$.invalidChar]]" />
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
        <div id="datagrid-trabajador">
            <table class="table table-bordered table-condensed table-hover table-striped">
                <thead>
                    <tr>
                        <th data-column-id="id" data-type="numeric" data-identifier="true" data-visible="false">ID</th>
                        <th data-column-id="documento">Documento</th>
                        <th data-column-id="nombres" data-order="desc">Nombres</th>
                        <th data-column-id="apellidos">Apellidos</th>
                        <th data-column-id="sede">Sede</th>
                        <th data-column-id="commands" data-formatter="commands" data-sortable="false" class="commands">Opciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div><?php }} ?>