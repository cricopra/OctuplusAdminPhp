{include file="_css_js_includes.tpl"}
<div id="unidadNegocio">
    <div class="container-fluid">
        <form class="form-horizontal" id="frmUnidadNegocio">
            <input type="hidden" id="txtCodigo" data-source="id" />
            <h3 class="page-header">Unidades de Negocio</h3>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Unidad de Negocio</label>
                        <div class="col-lg-9">
                            <select id="slUnidadNegocio" name="slUnidadNegocio" class="form-control" data-source="idunidadnegociogeneral" data-validation-engine="validate[required,funcCall[$.invalidChar]]">
                                <option value="">--Seleccione Unidad de Negocio--</option>
                                {foreach from=$UNIDAD_NEGOCIO_GENERAL item=unidadnegocio}
                                    <option value="{$unidadnegocio.id}">{$unidadnegocio.nombre}</option>
                                {/foreach}
                            </select>                        
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Sede</label>
                        <div class="col-lg-9">
                            <select id="slSede" name="slSede" class="form-control" data-source="idsede">
                                {foreach from=$SEDES item=sede}
                                    <option value="{$sede.id}">{$sede.nombre}</option>
                                {/foreach}
                            </select>
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
        <div id="datagrid-unidadNegocio">
            <table class="table table-bordered table-condensed table-hover table-striped">
                <thead>
                    <tr>
                        <th data-column-id="id" data-type="numeric" data-identifier="true" data-visible="false">ID</th>                        
                        <th data-column-id="nombre" data-order="desc">Nombre</th>  
                        <th data-column-id="sede">Sede</th>
                        <th data-column-id="estado">Estado</th>
                        <th data-column-id="commands" data-formatter="commands" data-sortable="false" class="commands">Opciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>