<?php /* Smarty version Smarty-3.1.13, created on 2015-08-01 17:26:05
         compiled from "D:\desarrollo\web\PHP\OctoplusAdminPHP\tpl\empresa.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2805655bce50ddcbf00-53999008%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15ce4bbcc44ca4b8b2015db8f08f9532eca5473f' => 
    array (
      0 => 'D:\\desarrollo\\web\\PHP\\OctoplusAdminPHP\\tpl\\empresa.tpl',
      1 => 1435678018,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2805655bce50ddcbf00-53999008',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55bce50df1dce4_19783125',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55bce50df1dce4_19783125')) {function content_55bce50df1dce4_19783125($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("_css_js_includes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div id="empresa">
    <div class="container-fluid">
        <form class="form-horizontal" id="frmEmpresa">
            <input type="hidden" id="txtCodigo" data-source="id" />
            <h3 class="page-header">Empresas</h3>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Nombre</label>
                        <div class="col-lg-9">
                            <input type="text" id="txtNombre" name="txtNombre" maxlength="20" placeholder="Nombre empresa" class="form-control" data-source="nombre" data-validation-engine="validate[required,funcCall[$.invalidChar]]" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Nit</label>
                        <div class="col-lg-9">
                            <input type="text" id="txtNit" name="txtNit" maxlength="20" placeholder="Nit" class="form-control" data-source="nit" data-validation-engine="validate[required,funcCall[$.invalidChar]]" />
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Dominio</label>
                        <div class="col-lg-9">
                            <input type="text" id="txtDominio" name="txtDominio" maxlength="20" placeholder="Dominio" class="form-control" data-source="dominio" data-validation-engine="validate[required,funcCall[$.invalidChar]]" />
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
        <div id="datagrid-empresa">
            <table class="table table-bordered table-condensed table-hover table-striped">
                <thead>
                    <tr>
                        <th data-column-id="id" data-type="numeric" data-identifier="true" data-visible="false">ID</th>
                        <th data-column-id="nombre" data-order="desc">Nombre</th>
                        <th data-column-id="nit" >Nit</th>
                        <th data-column-id="dominio">Dominio</th>
                        <th data-column-id="commands" data-formatter="commands" data-sortable="false" class="commands">Opciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div><?php }} ?>