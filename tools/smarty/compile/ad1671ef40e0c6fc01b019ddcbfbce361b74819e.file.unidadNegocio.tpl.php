<?php /* Smarty version Smarty-3.1.13, created on 2015-07-29 23:14:48
         compiled from "D:\desarrollo\web\PHP\OctoplusAdminPHP\tpl\unidadNegocio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:194755b94248046957-68940331%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad1671ef40e0c6fc01b019ddcbfbce361b74819e' => 
    array (
      0 => 'D:\\desarrollo\\web\\PHP\\OctoplusAdminPHP\\tpl\\unidadNegocio.tpl',
      1 => 1436213162,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194755b94248046957-68940331',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'UNIDAD_NEGOCIO_GENERAL' => 0,
    'unidadnegocio' => 0,
    'SEDES' => 0,
    'sede' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55b9424818b4e2_10266375',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55b9424818b4e2_10266375')) {function content_55b9424818b4e2_10266375($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("_css_js_includes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="unidadNegocio">
    <div class="container-fluid">
        <form class="form-horizontal" id="frmUnidadNegocio">
            <input type="hidden" id="txtCodigo" data-source="id" />
            <h3 class="page-header">Unidades de Negocio</h3>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Unidad de Negocio</label>
                        <div class="col-lg-9">
                            <select id="slUnidadNegocio" name="slUnidadNegocio" class="form-control" data-source="idunidadnegociogeneral" data-validation-engine="validate[required,funcCall[$.invalidChar]]">
                                <option value="">--Seleccione Unidad de Negocio--</option>
                                <?php  $_smarty_tpl->tpl_vars['unidadnegocio'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['unidadnegocio']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['UNIDAD_NEGOCIO_GENERAL']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['unidadnegocio']->key => $_smarty_tpl->tpl_vars['unidadnegocio']->value){
$_smarty_tpl->tpl_vars['unidadnegocio']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['unidadnegocio']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['unidadnegocio']->value['nombre'];?>
</option>
                                <?php } ?>
                            </select>                        
                        </div>
                    </div>
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
                        <label class="col-lg-3 control-label">Estado</label>
                        <div class="col-lg-9">
                            <select id="slEstado" name="slEstado" class="form-control" data-source="idestado">
                                <option value="A">Activo</option>
                                <option value="I">Inactivo</option>
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
        <div id="datagrid-unidadNegocio">
            <table class="table table-bordered table-condensed table-hover table-striped">
                <thead>
                    <tr>
                        <th data-column-id="id" data-type="numeric" data-identifier="true" data-visible="false">ID</th>                        
                        <th data-column-id="nombre" data-order="desc">Nombre</th>  
                        <th data-column-id="sede">Sede</th>
                        <th data-column-id="estado">Estado</th>
                        <th data-column-id="commands" data-formatter="commands" data-sortable="false" class="commands">Opciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div><?php }} ?>