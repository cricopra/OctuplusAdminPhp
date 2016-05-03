{*
* SNavia
* Playtech
* 2013
*}
<ul class="nav nav-sidebar app-menu">
    {if $PERMISOS.SERVICIOS|in_array:$OPCIONES}
        <li>
            <a href="javascript:" data-handler="Servicio"><i class="fa fa-cubes">&nbsp;</i>Servicios</a>
        </li>
    {/if}
    {if $PERMISOS.USUARIOS|in_array:$OPCIONES}
        <li>
            <a href="javascript:" data-handler="Usuario"><i class="fa fa-wrench">&nbsp;</i>Usuarios</a>
        </li>
    {/if}
    {if $PERMISOS.PRODUCTOS|in_array:$OPCIONES}
        <li>
            <a href="javascript:" data-handler="Producto"><i class="fa fa-briefcase">&nbsp;</i>Productos</a>
        </li>
    {/if}
</ul>