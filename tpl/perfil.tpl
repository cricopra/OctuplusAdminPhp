{include file="_css_js_includes.tpl"}
<div id="perfil" class="app-form">
    <div class="container-fluid">
        <form class="form-horizontal" id="frmPerfil">
            <input type="hidden" id="txtCodigo" data-source="id" />
            <h3 class="page-header">Perfiles</h3>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="col-lg-4 control-label">Usuario</label>
                        <div class="col-lg-8">
                            <select id="slUsuario" name="slUsuario" class="form-control" data-validation-engine="validate[required]">
                                <option value="">Seleccione...</option>
                                {foreach from=$USUARIOS item=usuario}
                                    <option value="{$usuario.id}">{$usuario.nombre}</option>
                                {/foreach}
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <button type="button" id="btnSubmit" class="btn btn-primary">Guardar</button>
                    <button type="reset" id="btnReset" class="btn btn-default">Limpiar</button>
                </div>
            </div>
        </form>
        <br/>
        <table id="tb-opciones" class="table table-bordered table-condensed table-striped">
            <thead>
                <tr>
                    <th>Opci&oacute;n(<span id="spOpciones">0</span> de {$OPCIONES|count})</th>
                    <th>
                        <input type="checkbox" id="ckCheckAll" />
                        <label for="ckCheckAll">Todas / Ninguna</label>
                    </th>
                </tr>
            </thead>
            <tbody>
                {foreach from=$OPCIONES key=id item=descripcion}
                    <tr data-id="{$id}">
                        <td colspan="2">
                            <input type="checkbox" id="{$id}" value="{$id}">
                            <label for="{$id}" class="plain">{$descripcion}</label>
                        </td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>