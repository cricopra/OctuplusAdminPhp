{*
* SNavia
* Playtech
* 2013
*}
{if isset($CSS_FILES)}
    {foreach from=$CSS_FILES key=css_uri item=media}
        <link href="{$css_uri}" rel="stylesheet" type="text/css" media="{$media}" />
    {/foreach}
{/if}
{if isset($JS_FILES)}
    {foreach from=$JS_FILES item=js_uri}
        <script type="text/javascript" src="{$js_uri}"></script>
    {/foreach}
{/if}