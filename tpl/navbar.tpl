{*
* SNavia
* Playtech
* 2013
*}
<nav class="navbar navbar-inverse navbar-fixed-top app-menu" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="javascript:"><img src="{$IMG_DIR}play_nav.png" class="img-responsive" /></a>
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
                        {if $PERMISOS.EMPRESAS|in_array:$OPCIONES}
                            <li>
                                <a href="javascript:" data-handler="Empresa"><i class="fa fa-university">&nbsp;</i>Empresas</a>
                            </li>
                        {/if}
                        {if $PERMISOS.TIPOS_VEHICULO|in_array:$OPCIONES}
                            <li>
                                <a href="javascript:" data-handler="TipoVehiculo"><i class="fa fa-car">&nbsp;</i>Tipos Veh&iacute;culo</a>
                            </li>
                        {/if}
                        {if $PERMISOS.SEDES|in_array:$OPCIONES}
                            <li>
                                <a href="javascript:" data-handler="Sede"><i class="fa fa-building">&nbsp;</i>Sedes</a>
                            </li>
                        {/if}
                        {if $PERMISOS.UNIDADES_NEGOCIO|in_array:$OPCIONES}
                            <li>
                                <a href="javascript:" data-handler="UnidadNegocio"><i class="fa fa-cubes ">&nbsp;</i>Unidades de Negocio</a>
                            </li>
                        {/if}
                        {if $PERMISOS.TRABAJADORES|in_array:$OPCIONES}
                            <li>
                                <a href="javascript:" data-handler="Trabajador"><i class="fa fa-male">&nbsp;</i>Trabajadores</a>
                            </li>
                        {/if}
                        {if $PERMISOS.CATEGORIAS|in_array:$OPCIONES}
                            <li>
                                <a href="javascript:" data-handler="Categoria"><i class="fa fa-tag">&nbsp;</i>Categor&iacute;as</a>
                            </li>
                        {/if}
                        {if $PERMISOS.ITEMS|in_array:$OPCIONES}
                            <li>
                                <a href="javascript:" data-handler="Item"><i class="fa fa-puzzle-piece">&nbsp;</i>Items</a>
                            </li>
                        {/if}
                        {if $PERMISOS.PRODUCTOS|in_array:$OPCIONES}
                            <li>
                                <a href="javascript:" data-handler="Producto"><i class="fa fa-briefcase">&nbsp;</i>Productos</a>
                            </li>
                        {/if}
                    </ul>
                </li>
                <li class="dropdown link">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-group">&nbsp;</i>
                        <span>Usuarios</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        {if $PERMISOS.USUARIOS|in_array:$OPCIONES}
                            <li>
                                <a href="javascript:" data-handler="Usuario"><i class="fa fa-wrench">&nbsp;</i>Administrar</a>
                            </li>
                        {/if}
                        {if $PERMISOS.PERFIL_USUARIO|in_array:$OPCIONES}
                            <li>
                                <a href="javascript:" data-handler="Perfil"><i class="fa fa-lock">&nbsp;</i>Perfiles</a>
                            </li>
                        {/if}
                        {if $PERMISOS.RESTABLECER_CLAVE|in_array:$OPCIONES}
                            <li>
                                <a href="javascript:" data-handler="RestablecerClave"><i class="fa fa-refresh">&nbsp;</i>Restablecer clave</a>
                            </li>
                        {/if}
                    </ul>
                </li>
                {if $PERMISOS.SERVICIOS|in_array:$OPCIONES}
                    <li class="link">
                        <a href="javascript:" data-handler="Servicio"><i class="fa fa-cubes">&nbsp;</i>Servicios</a>
                    </li>
                {/if}
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown link">                    
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-user">&nbsp;</i>
                        <span>Usuario:&nbsp;{$USUARIO}</span>
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
</nav>