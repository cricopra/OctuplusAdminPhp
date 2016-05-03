<?php /* Smarty version Smarty-3.1.13, created on 2015-07-29 23:19:47
         compiled from "D:\desarrollo\web\PHP\OctoplusAdminPHP\tpl\categoria.tpl" */ ?>
<?php /*%%SmartyHeaderCode:63155b943737dc6e3-79339225%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b5eabf03e3c78e82b238965f2d023e1758bb7a9' => 
    array (
      0 => 'D:\\desarrollo\\web\\PHP\\OctoplusAdminPHP\\tpl\\categoria.tpl',
      1 => 1433534588,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '63155b943737dc6e3-79339225',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'UNIDADES_NEGOCIO' => 0,
    'uniNegocio' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55b9437391d0c3_10778079',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55b9437391d0c3_10778079')) {function content_55b9437391d0c3_10778079($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("_css_js_includes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="categoria" class="app-form">
    <div class="container-fluid">
        <form class="form-horizontal" id="frmCategoria">
            <input type="hidden" id="txtCodigo" data-source="id" />
            <h3 class="page-header">Categor&iacute;as</h3>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Unidad de negocio</label>
                        <div class="col-lg-8">
                            <select id="slUnidadNegocio" name="slUnidadNegocio" class="form-control" data-source="idunidadnegocio">
                                <?php  $_smarty_tpl->tpl_vars['uniNegocio'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['uniNegocio']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['UNIDADES_NEGOCIO']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['uniNegocio']->key => $_smarty_tpl->tpl_vars['uniNegocio']->value){
$_smarty_tpl->tpl_vars['uniNegocio']->_loop = true;
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['uniNegocio']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['uniNegocio']->value['nombre'];?>
</option>
                                <?php } ?>
                            </select>
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
            <br/>
            <div class="row">            
                <div class="col-lg-12 t-center">
                    <button type="button" id="btnSubmit" class="btn btn-primary">Guardar</button>
                    <button type="reset" id="btnReset" class="btn btn-default">Limpiar</button>
                </div>
            </div>
        </form>
        <br/>
        <div id="datagrid-categoria">
            <table id="tb-datagrid" class="table table-bordered table-condensed table-hover table-striped">
                <thead>
                    <tr>
                        <th data-column-id="id" data-type="numeric" data-identifier="true" data-visible="false">ID</th>
                        <th data-column-id="nombre" data-order="asc">Nombre</th>
                        <th data-column-id="unidadnegocio">Unidad negocio</th>
                        <th data-column-id="commands" data-formatter="commands" data-sortable="false" class="commands">Opciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div><?php }} ?>