<?php /* Smarty version Smarty-3.1.13, created on 2015-08-01 17:25:20
         compiled from "D:\desarrollo\web\PHP\OctoplusAdminPHP\tpl\tipoVehiculo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2009655bce4e0323527-85333053%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '71acfe964a5e29cd89c4f6d1149cf42f7d6fed5c' => 
    array (
      0 => 'D:\\desarrollo\\web\\PHP\\OctoplusAdminPHP\\tpl\\tipoVehiculo.tpl',
      1 => 1435932661,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2009655bce4e0323527-85333053',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TIPO_VEHICULOS_GENERAL' => 0,
    'tipo' => 0,
    'EMPRESAS' => 0,
    'empresa' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55bce4e04a8967_20917743',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bce4e04a8967_20917743')) {function content_55bce4e04a8967_20917743($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("_css_js_includes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="tipoVehiculo">
    <div class="container-fluid">
        <form class="form-horizontal" id="frmtipoVehiculo">
            <input type="hidden" id="txtCodigo" data-source="id" />
            <h3 class="page-header">Agregar Tipos de Veh&iacute;culos</h3>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Tipo Veh&iacute;culo</label>
                        <div class="col-lg-9">
                            <select id="slTipoVehiculoGeneral" name="slTipoVehiculoGeneral" class="form-control" data-source="idtipovehiculogeneral" data-validation-engine="validate[required,funcCall[$.invalidChar]]">
                                <option value="">--Seleccione Tipo Veh&iacute;culo--</option>
                                <?php  $_smarty_tpl->tpl_vars['tipo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tipo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['TIPO_VEHICULOS_GENERAL']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tipo']->key => $_smarty_tpl->tpl_vars['tipo']->value){
$_smarty_tpl->tpl_vars['tipo']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['tipo']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['tipo']->value['nombre'];?>
</option>
                                <?php } ?>
                            </select>                         </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Empresa</label>
                        <div class="col-lg-9">
                            <select id="slEmpresa" name="slEmpresa" class="form-control" data-source="idempresa" data-validation-engine="validate[required,funcCall[$.invalidChar]]">
                                <option value="">--Seleccione Empresa--</option>
                                <?php  $_smarty_tpl->tpl_vars['empresa'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['empresa']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['EMPRESAS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['empresa']->key => $_smarty_tpl->tpl_vars['empresa']->value){
$_smarty_tpl->tpl_vars['empresa']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['empresa']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['empresa']->value['nombre'];?>
</option>
                                <?php } ?>
                            </select>                        </div>
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
                    <button type="button" id="btnSubmit" class="btn btn-primary">Agregar</button>
                    <button type="reset" id="btnReset" class="btn btn-default">Limpiar</button>
                </div>
            </div>
        </form>
        <br/>
        <div id="datagrid-tipovehiculo">
            <table class="table table-bordered table-condensed table-hover table-striped">
                <thead>
                    <tr>
                        <th data-column-id="id" data-type="numeric" data-identifier="true" data-visible="false">ID</th>
                        <th data-column-id="nombre" data-order="desc">Nombre</th>
                        <th data-column-id="empresa" >Empresa</th>
                        <th data-column-id="estado">Estado</th>
                        <th data-column-id="commands" data-formatter="commands" data-sortable="false" class="commands">Opciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div><?php }} ?>