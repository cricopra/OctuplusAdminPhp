<?php /* Smarty version Smarty-3.1.13, created on 2015-07-29 23:25:57
         compiled from "D:\desarrollo\web\PHP\OctoplusAdminPHP\tpl\producto.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1879955b944e5048509-16443709%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9f7ad0fa5397869d800abc743d518bccd92c1d2' => 
    array (
      0 => 'D:\\desarrollo\\web\\PHP\\OctoplusAdminPHP\\tpl\\producto.tpl',
      1 => 1433534588,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1879955b944e5048509-16443709',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ITEMS' => 0,
    'item' => 0,
    'CATEGORIAS' => 0,
    'categoria' => 0,
    'TIPOS_VEHICULO' => 0,
    'tipoVeh' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55b944e51fadb9_32897375',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55b944e51fadb9_32897375')) {function content_55b944e51fadb9_32897375($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("_css_js_includes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="producto">
    <div class="container-fluid">
        <form class="form-horizontal" id="frmProducto">
            <input type="hidden" id="txtCodigo" data-source="id" />
            <select id="slItems" class="hidden">
                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ITEMS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['nombre'];?>
</option>
                <?php } ?>
            </select>
            <h3 class="page-header">Productos</h3>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Nombre</label>
                        <div class="col-lg-9">
                            <input type="text" id="txtNombre" name="txtNombre" maxlength="50" placeholder="Nombre" class="form-control" data-source="nombre" data-validation-engine="validate[required,funcCall[$.invalidChar]]" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Descripci&oacute;n</label>
                        <div class="col-lg-9">
                            <input type="text" id="txtDescripcion" name="txtDescripcion" maxlength="250" placeholder="Descripci&oacute;n" class="form-control" data-source="descripcion" data-validation-engine="validate[required,funcCall[$.invalidChar]]" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Categor&iacute;a</label>
                        <div class="col-lg-9">
                            <select id="slCategoria" name="slCategoria" class="form-control" data-source="idcategoria">
                                <?php  $_smarty_tpl->tpl_vars['categoria'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['categoria']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['CATEGORIAS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['categoria']->key => $_smarty_tpl->tpl_vars['categoria']->value){
$_smarty_tpl->tpl_vars['categoria']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['categoria']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['categoria']->value['nombre'];?>
</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Tipo Veh&iacute;culo</label>
                        <div class="col-lg-9">
                            <select id="slTipoVehiculo" name="slTipoVehiculo" class="form-control" data-source="idtipovehiculo">
                                <?php  $_smarty_tpl->tpl_vars['tipoVeh'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tipoVeh']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['TIPOS_VEHICULO']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tipoVeh']->key => $_smarty_tpl->tpl_vars['tipoVeh']->value){
$_smarty_tpl->tpl_vars['tipoVeh']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['tipoVeh']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['tipoVeh']->value['nombre'];?>
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
                        <label class="col-lg-3 control-label">Valor</label>
                        <div class="col-lg-9">
                            <input type="text" id="txtValor" name="txtValor" maxlength="10" placeholder="Valor" class="form-control" data-source="valor" data-validation-engine="validate[required,min[1],custom[onlyNumberSp]]" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Items disponibles(<span id="spItemOrigen"><?php echo count($_smarty_tpl->tpl_vars['ITEMS']->value);?>
</span>)</label>
                        <div class="col-lg-9">
                            <select id="slItemOrigen" name="slItemOrigen" multiple="" class="form-control" data-source="idsede">
                                <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ITEMS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['nombre'];?>
</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Items a&ntilde;adidos(<span id="spItemDestino">0</span>)</label>
                        <div class="col-lg-9" data-validation-engine="validate[funcCall[$.requireMultiSelect]]">
                            <select id="slItemDestino" name="slItemDestino" multiple="" class="form-control" data-source="idsede">
                                
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
        <div id="datagrid-producto">
            <table id="tb-datagrid" class="table table-bordered table-condensed table-hover table-striped">
                <thead>
                    <tr>
                        <th data-column-id="id" data-type="numeric" data-identifier="true" data-visible="false">ID</th>
                        <th data-column-id="nombre" data-order="asc">Nombre</th>
                        <th data-column-id="descripcion">Descripcion</th>
                        <th data-column-id="categoria">Categor&iacute;a</th>
                        <th data-column-id="tipovehiculo">Tipo veh&iacute;culo</th>
                        <th data-column-id="valor" data-formatter="valor">Valor</th>
                        <th data-column-id="items" data-formatter="items" data-sortable="false">Items</th>
                        <th data-column-id="commands" data-formatter="commands" data-sortable="false" class="commands">Opciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div><?php }} ?>