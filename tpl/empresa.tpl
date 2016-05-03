{include file="_css_js_includes.tpl"}
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
</div>