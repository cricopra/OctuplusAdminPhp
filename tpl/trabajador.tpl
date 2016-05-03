{include file="_css_js_includes.tpl"}
<div id="trabajador">
    <div class="container-fluid">
        <form class="form-horizontal" id="frmTrabajador">
            <input type="hidden" id="txtCodigo" data-source="id" />
            <h3 class="page-header">Trabajadores</h3>
            <div class="row">
                <div class="col-lg-6">
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
                        <label class="col-lg-3 control-label">Documento</label>
                        <div class="col-lg-9">
                            <input type="text" id="txtDocumento" name="txtDocumento" maxlength="20" placeholder="Documento de intentidad" class="form-control" data-source="documento" data-validation-engine="validate[required,custom[onlyNumberSp]]" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Nombres</label>
                        <div class="col-lg-9">
                            <input type="text" id="txtNombres" name="txtNombres" maxlength="50" placeholder="Nombres" class="form-control" data-source="nombres" data-validation-engine="validate[required,funcCall[$.invalidChar]]" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Apellidos</label>
                        <div class="col-lg-9">
                            <input type="text" id="txtApellidos" name="txtApellidos" maxlength="50" placeholder="Apellidos" class="form-control" data-source="apellidos" data-validation-engine="validate[required,funcCall[$.invalidChar]]" />
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
        <div id="datagrid-trabajador">
            <table class="table table-bordered table-condensed table-hover table-striped">
                <thead>
                    <tr>
                        <th data-column-id="id" data-type="numeric" data-identifier="true" data-visible="false">ID</th>
                        <th data-column-id="documento">Documento</th>
                        <th data-column-id="nombres" data-order="desc">Nombres</th>
                        <th data-column-id="apellidos">Apellidos</th>
                        <th data-column-id="sede">Sede</th>
                        <th data-column-id="commands" data-formatter="commands" data-sortable="false" class="commands">Opciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>