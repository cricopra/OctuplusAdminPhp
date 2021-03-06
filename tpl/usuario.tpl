{include file="_css_js_includes.tpl"}
<div id="usuario" class="app-form">
    <div class="container-fluid">
        <form class="form-horizontal" id="frmUsuario">
            <input type="hidden" id="txtCodigo" data-source="id" />
            <input type="hidden" id="txtDominio" value="@{$DOMINIO}" />
            <!-- Permite establecer u omitir la validacion de la clave mediante la funcion [condRequired] -->
            <input type="hidden" id="txtCheckPwd" name="txtCheckPwd" value="{$SI}" />
            <select id="slSedes" name="slSedes" class="hidden">
                {foreach from=$SEDES item=sede}
                    <option value="{$sede.id}" data-id="{$sede.id}">{$sede.nombre}</option>
                {/foreach}
            </select>
            <h3 class="page-header">Usuarios</h3>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Login</label>
                        <div class="col-lg-9">
                            <input type="text" style="width: 70%"id="txtLogin" name="txtLogin" maxlength="50" placeholder="usuario" class="form-control" data-source="login_name" data-validation-engine="validate[required,funcCall[$.invalidChar]]" /> <label id="lblDominio" >@{$DOMINIO}</label>
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
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Clave</label>
                        <div class="col-lg-9">
                            <input type="password" id="txtPwd" name="txtPwd" maxlength="50" placeholder="Clave" class="form-control" data-validation-engine="validate[minSize[5],condRequired[txtCheckPwd]]" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Confirmar clave</label>
                        <div class="col-lg-9">
                            <input type="password" id="txtConfirmPwd" name="txtConfirmPwd" maxlength="50" placeholder="Confirmar clave" class="form-control" data-validation-engine="validate[minSize[5],condRequired[txtCheckPwd],equals[txtPwd]]" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Tipo</label>
                        <div class="col-lg-9">
                            <select id="slTipo" name="slTipo" class="form-control" data-source="tipo">
                                {foreach from=$TIPOS key=id item=label}
                                    <option value="{$id}">{$label}</option>
                                {/foreach}
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Sedes disponibles(<span id="spSedeOrigen">{$SEDES|count}</span>)</label>
                        <div class="col-lg-9">
                            <select id="slSedeOrigen" name="slSedeOrigen" multiple="" class="form-control">
                                {foreach from=$SEDES item=sede}
                                    <option value="{$sede.id}" data-id="{$sede.id}">{$sede.nombre}</option>
                                {/foreach}
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Sedes a&ntilde;adidas(<span id="spSedeDestino">0</span>)</label>
                        <div class="col-lg-9">
                            <select id="slSedeDestino" name="slSedeDestino" multiple="" class="form-control">
                                
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
        <div id="datagrid-usuario">
            <table id="tb-datagrid" class="table table-bordered table-condensed table-hover table-striped">
                <thead>
                    <tr>
                        <th data-column-id="id" data-type="numeric" data-identifier="true" data-visible="false">ID</th>
                        <th data-column-id="login">Login</th>
                        <th data-column-id="nombre" data-order="asc">Nombre</th>
                        <th data-column-id="tipo" data-formatter="tipo">Tipo</th>
                        <th data-column-id="sedes" data-formatter="sedes" data-sortable="false">Sedes</th>
                        <th data-column-id="commands" data-formatter="commands" data-sortable="false" class="commands">Opciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>