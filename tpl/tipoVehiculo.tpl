{include file="_css_js_includes.tpl"}
<div id="tipoVehiculo">
    <div class="container-fluid">
        <form class="form-horizontal" id="frmtipoVehiculo">
            <input type="hidden" id="txtCodigo" data-source="id" />
            <h3 class="page-header">Agregar Tipos de Veh&iacute;culos</h3>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Tipo Veh&iacute;culo</label>
                        <div class="col-lg-9">
                            <select id="slTipoVehiculoGeneral" name="slTipoVehiculoGeneral" class="form-control" data-source="idtipovehiculogeneral" data-validation-engine="validate[required,funcCall[$.invalidChar]]">
                                <option value="">--Seleccione Tipo Veh&iacute;culo--</option>
                                {foreach from=$TIPO_VEHICULOS_GENERAL item=tipo}
                                    <option value="{$tipo.id}">{$tipo.nombre}</option>
                                {/foreach}
                            </select>                         </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Empresa</label>
                        <div class="col-lg-9">
                            <select id="slEmpresa" name="slEmpresa" class="form-control" data-source="idempresa" data-validation-engine="validate[required,funcCall[$.invalidChar]]">
                                <option value="">--Seleccione Empresa--</option>
                                {foreach from=$EMPRESAS item=empresa}
                                    <option value="{$empresa.id}">{$empresa.nombre}</option>
                                {/foreach}
                            </select>                        </div>
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
                    <button type="button" id="btnSubmit" class="btn btn-primary">Agregar</button>
                    <button type="reset" id="btnReset" class="btn btn-default">Limpiar</button>
                </div>
            </div>
        </form>
        <br/>
        <div id="datagrid-tipovehiculo">
            <table class="table table-bordered table-condensed table-hover table-striped">
                <thead>
                    <tr>
                        <th data-column-id="id" data-type="numeric" data-identifier="true" data-visible="false">ID</th>
                        <th data-column-id="nombre" data-order="desc">Nombre</th>
                        <th data-column-id="empresa" >Empresa</th>
                        <th data-column-id="estado">Estado</th>
                        <th data-column-id="commands" data-formatter="commands" data-sortable="false" class="commands">Opciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>