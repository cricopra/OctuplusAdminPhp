<?php /* Smarty version Smarty-3.1.13, created on 2015-08-06 00:40:51
         compiled from "D:\desarrollo\web\PHP\OctoplusAdminPHP\tpl\navbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:695055c290f3c4f619-69144892%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58b3868fdf9ac5c9c1acdf28b64c6bf226d33876' => 
    array (
      0 => 'D:\\desarrollo\\web\\PHP\\OctoplusAdminPHP\\tpl\\navbar.tpl',
      1 => 1435932950,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '695055c290f3c4f619-69144892',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'IMG_DIR' => 0,
    'PERMISOS' => 0,
    'OPCIONES' => 0,
    'USUARIO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55c290f3ec9ae8_22983737',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c290f3ec9ae8_22983737')) {function content_55c290f3ec9ae8_22983737($_smarty_tpl) {?>
<nav class="navbar navbar-inverse navbar-fixed-top app-menu" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="javascript:"><img src="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
play_nav.png" class="img-responsive" /></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
                <li class="dropdown link">                    
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-gear">&nbsp;</i>
                        <span>Administraci&oacute;n</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu"> 
                        <?php if (in_array($_smarty_tpl->tpl_vars['PERMISOS']->value['EMPRESAS'],$_smarty_tpl->tpl_vars['OPCIONES']->value)){?>
                            <li>
                                <a href="javascript:" data-handler="Empresa"><i class="fa fa-university">&nbsp;</i>Empresas</a>
                            </li>
                        <?php }?>
                        <?php if (in_array($_smarty_tpl->tpl_vars['PERMISOS']->value['TIPOS_VEHICULO'],$_smarty_tpl->tpl_vars['OPCIONES']->value)){?>
                            <li>
                                <a href="javascript:" data-handler="TipoVehiculo"><i class="fa fa-car">&nbsp;</i>Tipos Veh&iacute;culo</a>
                            </li>
                        <?php }?>
                        <?php if (in_array($_smarty_tpl->tpl_vars['PERMISOS']->value['SEDES'],$_smarty_tpl->tpl_vars['OPCIONES']->value)){?>
                            <li>
                                <a href="javascript:" data-handler="Sede"><i class="fa fa-building">&nbsp;</i>Sedes</a>
                            </li>
                        <?php }?>
                        <?php if (in_array($_smarty_tpl->tpl_vars['PERMISOS']->value['UNIDADES_NEGOCIO'],$_smarty_tpl->tpl_vars['OPCIONES']->value)){?>
                            <li>
                                <a href="javascript:" data-handler="UnidadNegocio"><i class="fa fa-cubes ">&nbsp;</i>Unidades de Negocio</a>
                            </li>
                        <?php }?>
                        <?php if (in_array($_smarty_tpl->tpl_vars['PERMISOS']->value['TRABAJADORES'],$_smarty_tpl->tpl_vars['OPCIONES']->value)){?>
                            <li>
                                <a href="javascript:" data-handler="Trabajador"><i class="fa fa-male">&nbsp;</i>Trabajadores</a>
                            </li>
                        <?php }?>
                        <?php if (in_array($_smarty_tpl->tpl_vars['PERMISOS']->value['CATEGORIAS'],$_smarty_tpl->tpl_vars['OPCIONES']->value)){?>
                            <li>
                                <a href="javascript:" data-handler="Categoria"><i class="fa fa-tag">&nbsp;</i>Categor&iacute;as</a>
                            </li>
                        <?php }?>
                        <?php if (in_array($_smarty_tpl->tpl_vars['PERMISOS']->value['ITEMS'],$_smarty_tpl->tpl_vars['OPCIONES']->value)){?>
                            <li>
                                <a href="javascript:" data-handler="Item"><i class="fa fa-puzzle-piece">&nbsp;</i>Items</a>
                            </li>
                        <?php }?>
                        <?php if (in_array($_smarty_tpl->tpl_vars['PERMISOS']->value['PRODUCTOS'],$_smarty_tpl->tpl_vars['OPCIONES']->value)){?>
                            <li>
                                <a href="javascript:" data-handler="Producto"><i class="fa fa-briefcase">&nbsp;</i>Productos</a>
                            </li>
                        <?php }?>
                    </ul>
                </li>
                <li class="dropdown link">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-group">&nbsp;</i>
                        <span>Usuarios</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <?php if (in_array($_smarty_tpl->tpl_vars['PERMISOS']->value['USUARIOS'],$_smarty_tpl->tpl_vars['OPCIONES']->value)){?>
                            <li>
                                <a href="javascript:" data-handler="Usuario"><i class="fa fa-wrench">&nbsp;</i>Administrar</a>
                            </li>
                        <?php }?>
                        <?php if (in_array($_smarty_tpl->tpl_vars['PERMISOS']->value['PERFIL_USUARIO'],$_smarty_tpl->tpl_vars['OPCIONES']->value)){?>
                            <li>
                                <a href="javascript:" data-handler="Perfil"><i class="fa fa-lock">&nbsp;</i>Perfiles</a>
                            </li>
                        <?php }?>
                        <?php if (in_array($_smarty_tpl->tpl_vars['PERMISOS']->value['RESTABLECER_CLAVE'],$_smarty_tpl->tpl_vars['OPCIONES']->value)){?>
                            <li>
                                <a href="javascript:" data-handler="RestablecerClave"><i class="fa fa-refresh">&nbsp;</i>Restablecer clave</a>
                            </li>
                        <?php }?>
                    </ul>
                </li>
                <?php if (in_array($_smarty_tpl->tpl_vars['PERMISOS']->value['SERVICIOS'],$_smarty_tpl->tpl_vars['OPCIONES']->value)){?>
                    <li class="link">
                        <a href="javascript:" data-handler="Servicio"><i class="fa fa-cubes">&nbsp;</i>Servicios</a>
                    </li>
                <?php }?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown link">                    
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-user">&nbsp;</i>
                        <span>Usuario:&nbsp;<?php echo $_smarty_tpl->tpl_vars['USUARIO']->value;?>
</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="javascript:" data-handler="CambiarClave"><i class="fa fa-refresh">&nbsp;</i>Cambiar mi clave</a>
                        </li>
                        <li>
                            <a href="#" data-module="auth" data-function="logout"><i class="fa fa-sign-out">&nbsp;</i>Cerrar sesi&oacute;n</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav><?php }} ?>