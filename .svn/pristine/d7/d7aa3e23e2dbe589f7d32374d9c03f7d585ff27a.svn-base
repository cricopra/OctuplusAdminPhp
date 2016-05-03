{include file="_css_js_includes.tpl"}
<div id="producto">
    <div class="container-fluid">
        <form class="form-horizontal" id="frmProducto">
            <input type="hidden" id="txtCodigo" data-source="id" />
            <select id="slItems" class="hidden">
                {foreach from=$ITEMS item=item}
                    <option value="{$item.id}" data-id="{$item.id}">{$item.nombre}</option>
                {/foreach}
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
                                {foreach from=$CATEGORIAS item=categoria}
                                    <option value="{$categoria.id}">{$categoria.nombre}</option>
                                {/foreach}
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Tipo Veh&iacute;culo</label>
                        <div class="col-lg-9">
                            <select id="slTipoVehiculo" name="slTipoVehiculo" class="form-control" data-source="idtipovehiculo">
                                {foreach from=$TIPOS_VEHICULO item=tipoVeh}
                                    <option value="{$tipoVeh.id}">{$tipoVeh.nombre}</option>
                                {/foreach}
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
                        <label class="col-lg-3 control-label">Items disponibles(<span id="spItemOrigen">{$ITEMS|count}</span>)</label>
                        <div class="col-lg-9">
                            <select id="slItemOrigen" name="slItemOrigen" multiple="" class="form-control" data-source="idsede">
                                {foreach from=$ITEMS item=item}
                                    <option value="{$item.id}" data-id="{$item.id}">{$item.nombre}</option>
                                {/foreach}
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
</div>