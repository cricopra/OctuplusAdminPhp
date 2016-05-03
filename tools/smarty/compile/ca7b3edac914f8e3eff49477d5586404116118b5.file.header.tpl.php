<?php /* Smarty version Smarty-3.1.13, created on 2015-08-06 00:40:51
         compiled from "D:\desarrollo\web\PHP\OctoplusAdminPHP\tpl\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1063555c290f3670ec4-30987615%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca7b3edac914f8e3eff49477d5586404116118b5' => 
    array (
      0 => 'D:\\desarrollo\\web\\PHP\\OctoplusAdminPHP\\tpl\\header.tpl',
      1 => 1433534588,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1063555c290f3670ec4-30987615',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'APP_NAME' => 0,
    'IMG_DIR' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_55c290f3767194_62404920',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55c290f3767194_62404920')) {function content_55c290f3767194_62404920($_smarty_tpl) {?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $_smarty_tpl->tpl_vars['APP_NAME']->value;?>
</title>
        <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/ico" href="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
favicon.ico" />
        <link rel="shortcut icon" type="image/ico" href="<?php echo $_smarty_tpl->tpl_vars['IMG_DIR']->value;?>
favicon.ico">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <?php echo $_smarty_tpl->getSubTemplate ("_css_js_includes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </head><?php }} ?>