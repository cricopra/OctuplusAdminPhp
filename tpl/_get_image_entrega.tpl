{*
* SNavia
* Playtech
* 2013
*}
{if isset($ESTADO_ENTREGA)}
    {if $ESTADO_ENTREGA eq $ENTREGA_PENDIENTE}
        <img src="{$IMG_DIR}ent_pendiente.png" alt="Entrega pendiente" title="Entrega pendiente" class="img_entrega" />
    {else if $ESTADO_ENTREGA eq $ENTREGA_FINALIZADA}
        <img src="{$IMG_DIR}ent_finalizada.png" alt="Entrega finalizada" title="Entrega finalizada" class="img_entrega" />
    {else if $ESTADO_ENTREGA eq $ENTREGA_NOVEDAD}
        <img src="{$IMG_DIR}ent_novedad.png" alt="Entrega con novedad" title="Entrega con novedad" class="img_entrega" />
    {/if}
{else}
    <img src="{$IMG_DIR}ent_pendiente.png" alt="Entrega pendiente" title="Entrega pendiente" class="img_entrega" />
{/if}