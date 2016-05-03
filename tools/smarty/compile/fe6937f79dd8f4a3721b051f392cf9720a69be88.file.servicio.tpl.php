<?php /* Smarty version Smarty-3.1.13, created on 2015-07-30 21:54:29
         compiled from "D:\desarrollo\web\PHP\OctoplusAdminPHP\tpl\servicio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:203655ba80f5138f45-04009307%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe6937f79dd8f4a3721b051f392cf9720a69be88' => 
    array (
      0 => 'D:\\desarrollo\\web\\PHP\\OctoplusAdminPHP\\tpl\\servicio.tpl',
      1 => 1437681696,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203655ba80f5138f45-04009307',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'DATE_NOW' => 0,
    'TRABAJADORES' => 0,
    'trabajador' => 0,
    'ESTADOS' => 0,
    'id' => 0,
    'desc' => 0,
    'TIPOS_VEHICULO' => 0,
    'tipo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55ba80f544ef24_93804303',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55ba80f544ef24_93804303')) {function content_55ba80f544ef24_93804303($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("_css_js_includes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="servicio" class="app-form">
    <div class="container-fluid">
        <form class="form-horizontal" id="frmServicio">
            <input type="hidden" id="txtCodigo" data-source="id" />
            <h3 class="page-header">Servicios</h3> 
            <div class="top-bar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown link"> 
                        <a id="nuevo_registro" href="#" class="dropdown-toggle" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-plus-circle fa-3"></i> 
                            <span>Nuevo registro de servicio</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="row fix-datepicker">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Fecha Incial</label>
                        <div class="col-lg-8">
                            <input type="text" id="txtFechaCreacionIni" name="txtFechaCreacionIni" value="<?php echo $_smarty_tpl->tpl_vars['DATE_NOW']->value;?>
" data-type="datepicker" class="form-control" readonly="" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Fecha Final</label>
                        <div class="col-lg-8">
                            <input type="text" id="txtFechaCreacionFin" name="txtFechaCreacionIni" value="<?php echo $_smarty_tpl->tpl_vars['DATE_NOW']->value;?>
" data-type="datepicker" class="form-control" readonly="" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Trabajador</label>
                        <div class="col-lg-8">
                            <select id="slTrabajador" name="slTrabajador" class="form-control" >
                                <option value="">Todos</option>
                                <?php  $_smarty_tpl->tpl_vars['trabajador'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['trabajador']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['TRABAJADORES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['trabajador']->key => $_smarty_tpl->tpl_vars['trabajador']->value){
$_smarty_tpl->tpl_vars['trabajador']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['trabajador']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['trabajador']->value['nombres'];?>
 <?php echo $_smarty_tpl->tpl_vars['trabajador']->value['apellidos'];?>
</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Estado</label>
                        <div class="col-lg-8">
                            <select id="slEstado" name="slEstado" class="form-control">
                                <option value="">Todos</option>
                                <?php  $_smarty_tpl->tpl_vars['desc'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['desc']->_loop = false;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ESTADOS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['desc']->key => $_smarty_tpl->tpl_vars['desc']->value){
$_smarty_tpl->tpl_vars['desc']->_loop = true;
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['desc']->key;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['desc']->value;?>
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
                        <label class="col-lg-4 control-label">Placa</label>
                        <div class="col-lg-8">
                            <input type="text" id="txtPlaca" name="txtPlaca" maxlength="10" placeholder="Placa" class="form-control" data-validation-engine="validate[funcCall[$.invalidChar]]" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Documento</label>
                        <div class="col-lg-8">
                            <input type="text" id="txtDocumento" name="txtDocumento" maxlength="10" placeholder="Documento" class="form-control" data-validation-engine="validate[funcCall[$.invalidChar]]" />
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">            
                <div class="col-lg-12 t-center">
                    <button type="button" id="btnSubmit" class="btn btn-primary">Buscar</button>
                    <button type="reset" id="btnReset" class="btn btn-default">Limpiar</button>
                </div>
            </div>
        </form>
        <br/>
        <div id="datagrid-servicio">
            <table id="tb-datagrid" class="table table-bordered table-condensed table-hover table-striped">
                <thead>
                    <tr>
                        <th data-column-id="id" data-type="numeric" data-identifier="true" data-visible="false">ID</th>
                        <th data-column-id="fechacreacion" data-sortable="false">Fecha</th>
                        <th data-column-id="horacreacion" data-sortable="false">Hora</th>
                        <th data-column-id="placa" data-sortable="false">Placa</th>
                        <th data-column-id="tipovehiculo" data-sortable="false">Veh&iacute;culo</th>
                        <th data-column-id="documento" data-sortable="false">Documento</th>
                        <th data-column-id="cliente" data-sortable="false">Cliente</th>
                        <th data-column-id="celular" data-sortable="false" data-visible="false">Celular</th>
                        <th data-column-id="trabajador" data-sortable="false">Trabajador</th>
                        <th data-column-id="valor" data-sortable="false" data-formatter="valor">Valor</th>
                        <th data-column-id="estado" data-sortable="false" data-formatter="estado">Estado</th>
                        <th data-column-id="productos" data-sortable="false" data-formatter="productos" class="commands">Productos</th>
                        <th data-column-id="commands" data-sortable="false" data-formatter="commands" class="commands">Opciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Registro de Servicio</h4>
            </div>
            <div class="modal-body">
                <div id="servicio" class="app-form">
                    <div class="container-fluid">
                        <form class="form-horizontal" id="frmRegistrarServicio">
                            <input type="hidden" id="txtCodigoServicio" data-source="id" />
                            <div class="row fix-datepicker">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label">Tipo Veh&iacute;culo</label>
                                        <div class="col-lg-8">
                                            <select id="slTipoVehiculo" name="slTipoVehiculo" class="form-control" data-validation-engine="validate[required,funcCall[$.invalidChar]]">
                                                <option value="">Seleccione Tipo Veh&iacute;culo</option>
                                                <?php  $_smarty_tpl->tpl_vars['tipo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tipo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['TIPOS_VEHICULO']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tipo']->key => $_smarty_tpl->tpl_vars['tipo']->value){
$_smarty_tpl->tpl_vars['tipo']->_loop = true;
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['tipo']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['tipo']->value['nombre'];?>
</option>
                                                <?php } ?>
                                            </select>                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label">Productos</label>
                                        <div class="col-lg-8">
                                            <select class="selectpicker form-control" multiple  id="slProductos" name="slProductos" data-source="idProducto" data-validation-engine="validate[required]">
                                                <option value="">Seleccione Producto</option>                                           
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label">Placa</label>
                                        <div class="col-lg-8">
                                            <input type="text" id="txtRegistroPlaca" name="txtRegistroPlaca" maxlength="10" placeholder="Placa" class="form-control" data-validation-engine="validate[required,funcCall[$.invalidChar]]" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label">Documento</label>
                                        <div class="col-lg-8">
                                            <input type="text" id="txtRegistroDocumento" name="txtRegistroDocumento" maxlength="10" placeholder="Documento" class="form-control" data-validation-engine="validate[required,funcCall[$.invalidChar]]" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label">Cliente</label>
                                        <div class="col-lg-8">
                                            <input type="text" id="txtRegistroCliente" name="txtRegistroCliente"  placeholder="Nombre Cliente" class="form-control" data-validation-engine="validate[required,funcCall[$.invalidChar]]" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label">N&uacute;mero Celular</label>
                                        <div class="col-lg-8">
                                            <input type="text" id="txtRegistroCelular" name="txtRegistroCelular" maxlength="10" placeholder="N&uacute;mero celular" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-lg-4 control-label">Trabajador</label>
                                        <div class="col-lg-8">
                                            <select id="slRegistroTrabajador" name="slRegistroTrabajador" class="form-control" data-validation-engine="validate[required,funcCall[$.invalidChar]]">
                                                <?php  $_smarty_tpl->tpl_vars['trabajador'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['trabajador']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['TRABAJADORES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['trabajador']->key => $_smarty_tpl->tpl_vars['trabajador']->value){
$_smarty_tpl->tpl_vars['trabajador']->_loop = true;
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['trabajador']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['trabajador']->value['nombres'];?>
 <?php echo $_smarty_tpl->tpl_vars['trabajador']->value['apellidos'];?>
</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="row">            
                                <div class="col-lg-12 t-center">
                                    <button type="button" id="btnRegistrarServicio" class="btn btn-primary">Registrar Servicio</button>
                                    <button type="reset" id="btnReset" class="btn btn-default">Limpiar</button>
                                </div>
                            </div>
                        </form>
                        <br/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div><?php }} ?>