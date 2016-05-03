<?php /* Smarty version Smarty-3.1.13, created on 2015-08-06 00:40:51
         compiled from "D:\desarrollo\web\PHP\OctoplusAdminPHP\tpl\body.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1600155c290f3bce3e3-12589190%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dea041ea7f92d51eb82828c8ddf6f9455e81df55' => 
    array (
      0 => 'D:\\desarrollo\\web\\PHP\\OctoplusAdminPHP\\tpl\\body.tpl',
      1 => 1433534588,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1600155c290f3bce3e3-12589190',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55c290f3c24ad3_04565180',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c290f3c24ad3_04565180')) {function content_55c290f3c24ad3_04565180($_smarty_tpl) {?>
<body>
    <noscript>
        <p class="text-error noscript">
            <span class="label label-warning">Para el correcto funcionamiento del software es necesario habilitar Javascript</span>
        </p>
    </noscript>
    <div id="app">
        <?php echo $_smarty_tpl->getSubTemplate ("navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <?php echo $_smarty_tpl->getSubTemplate ("menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <div id="app-view"></div>
                </div>
                <!--<div class="col-lg-12 main">
                    <div id="app-view"></div>
                </div>-->
            </div>
        </div>
        <?php }} ?>