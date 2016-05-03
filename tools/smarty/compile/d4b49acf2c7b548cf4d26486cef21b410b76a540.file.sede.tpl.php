<?php /* Smarty version Smarty-3.1.13, created on 2015-08-01 17:38:05
         compiled from "D:\desarrollo\web\PHP\OctoplusAdminPHP\tpl\sede.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3119055bce7dd3f3e72-09801763%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4b49acf2c7b548cf4d26486cef21b410b76a540' => 
    array (
      0 => 'D:\\desarrollo\\web\\PHP\\OctoplusAdminPHP\\tpl\\sede.tpl',
      1 => 1435962151,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3119055bce7dd3f3e72-09801763',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'DEPARTAMENTOS' => 0,
    'departamento' => 0,
    'MOSTRAREMPRESAS' => 0,
    'EMPRESAS' => 0,
    'empresa' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55bce7dd557575_98344723',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bce7dd557575_98344723')) {function content_55bce7dd557575_98344723($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("_css_js_includes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="sede">
    <div class="container-fluid">
        <form class="form-horizontal" id="frmSede">
            <input type="hidden" id="txtCodigo" data-source="id" />
            <h3 class="page-header">Sedes</h3>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Nombre</label>
                        <div class="col-lg-9">
                            <input type="text" id="txtNombre" name="txtNombre" maxlength="20" placeholder="Nombre sede" class="form-control" data-source="nombre" data-validation-engine="validate[required,funcCall[$.invalidChar]]" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Direcci&oacute;n</label>
                        <div class="col-lg-9">
                            <input type="text" id="txtDireccion" name="txtDireccion" maxlength="20" placeholder="Direcci&oacute;n" class="form-control" data-source="direccion" data-validation-engine="validate[required,funcCall[$.invalidChar]]" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Tel&eacute;fono</label>
                        <div class="col-lg-9">
                            <input type="text" id="txtTelefono" name="txtTelefono" maxlength="20" placeholder="Tel&eacute;fono" class="form-control" data-source="telefono" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Celular</label>
                        <div class="col-lg-9">
                            <input type="text" id="txtCelular" name="txtCelular" maxlength="20" placeholder="Celular" class="form-control" data-source="celular"  />
                        </div>
                    </div>
                    <!--<div class="form-group">
                        <label class="col-lg-3 control-label">Barrio</label>
                        <div class="col-lg-9">
                            <input type="text" id="txtBarrio" name="txtBarrio" maxlength="20" placeholder="Barrio" class="form-control" data-source="barrio" data-validation-engine="validate[required,funcCall[$.invalidChar]]" />
                        </div>
                    </div>-->
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Departamento</label>
                        <div class="col-lg-9">
                            <select id="slDepartamento" name="slDepartamento" class="form-control" data-source="iddepartamento">
                                <?php  $_smarty_tpl->tpl_vars['departamento'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['departamento']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['DEPARTAMENTOS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['departamento']->key => $_smarty_tpl->tpl_vars['departamento']->value){
$_smarty_tpl->tpl_vars['departamento']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['departamento']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['departamento']->value['nombre'];?>
</option>
                                <?php } ?>
                            </select>                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Ciudad</label>
                        <div class="col-lg-9">
                            <select class="form-control" id="slCiudad" name="slCiudad" data-source="idciudad"></select>
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
                    <?php if ($_smarty_tpl->tpl_vars['MOSTRAREMPRESAS']->value=='TRUE'){?>
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
                            </select>                        
                        </div>
                    </div>
                    <?php }else{ ?>
                        <input type='hidden' id="slEmpresa" value="-1" />
                    <?php }?>
                    
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
        <div id="datagrid-sede">
            <table class="table table-bordered table-condensed table-hover table-striped">
                <thead>
                    <tr>
                        <th data-column-id="id" data-type="numeric" data-identifier="true" data-visible="false">ID</th>
                        <th data-column-id="nombre">Nombre</th>
                        <th data-column-id="empresa" data-order="desc">Empresa</th>
                        <th data-column-id="direccion">Direcci&oacute;n</th>
                        <th data-column-id="ciudad">Ciudad</th>
                        <th data-column-id="telefono">Tel&eacute;fono</th>
                        <th data-column-id="celular">Celular</th>
                        <!--<th data-column-id="barrio">Barrio</th>-->
                        <th data-column-id="estado">Estado</th>
                        <th data-column-id="commands" data-formatter="commands" data-sortable="false" class="commands">Opciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div><?php }} ?>