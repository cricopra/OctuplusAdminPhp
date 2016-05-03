<?php /* Smarty version Smarty-3.1.13, created on 2015-08-06 00:40:51
         compiled from "D:\desarrollo\web\PHP\OctoplusAdminPHP\tpl\menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2135155c290f3f397a2-27837911%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a335307a01e2922bbbfbd23fbae52c8740ede563' => 
    array (
      0 => 'D:\\desarrollo\\web\\PHP\\OctoplusAdminPHP\\tpl\\menu.tpl',
      1 => 1434725066,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2135155c290f3f397a2-27837911',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PERMISOS' => 0,
    'OPCIONES' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55c290f40acab7_85480324',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c290f40acab7_85480324')) {function content_55c290f40acab7_85480324($_smarty_tpl) {?>
<ul class="nav nav-sidebar app-menu">
    <?php if (in_array($_smarty_tpl->tpl_vars['PERMISOS']->value['SERVICIOS'],$_smarty_tpl->tpl_vars['OPCIONES']->value)){?>
        <li>
            <a href="javascript:" data-handler="Servicio"><i class="fa fa-cubes">&nbsp;</i>Servicios</a>
        </li>
    <?php }?>
    <?php if (in_array($_smarty_tpl->tpl_vars['PERMISOS']->value['USUARIOS'],$_smarty_tpl->tpl_vars['OPCIONES']->value)){?>
        <li>
            <a href="javascript:" data-handler="Usuario"><i class="fa fa-wrench">&nbsp;</i>Usuarios</a>
        </li>
    <?php }?>
    <?php if (in_array($_smarty_tpl->tpl_vars['PERMISOS']->value['PRODUCTOS'],$_smarty_tpl->tpl_vars['OPCIONES']->value)){?>
        <li>
            <a href="javascript:" data-handler="Producto"><i class="fa fa-briefcase">&nbsp;</i>Productos</a>
        </li>
    <?php }?>
</ul><?php }} ?>