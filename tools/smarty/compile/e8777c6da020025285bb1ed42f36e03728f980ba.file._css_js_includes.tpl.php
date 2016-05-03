<?php /* Smarty version Smarty-3.1.13, created on 2015-12-29 03:17:45
         compiled from "D:\desarrollo\web\PHP\OctoplusAdminPHP\tpl\_css_js_includes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:117815681ed49e7b079-40472904%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8777c6da020025285bb1ed42f36e03728f980ba' => 
    array (
      0 => 'D:\\desarrollo\\web\\PHP\\OctoplusAdminPHP\\tpl\\_css_js_includes.tpl',
      1 => 1433534588,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '117815681ed49e7b079-40472904',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'CSS_FILES' => 0,
    'css_uri' => 0,
    'media' => 0,
    'JS_FILES' => 0,
    'js_uri' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5681ed49ede8b4_02942033',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5681ed49ede8b4_02942033')) {function content_5681ed49ede8b4_02942033($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['CSS_FILES']->value)){?>
    <?php  $_smarty_tpl->tpl_vars['media'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['media']->_loop = false;
 $_smarty_tpl->tpl_vars['css_uri'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['CSS_FILES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['media']->key => $_smarty_tpl->tpl_vars['media']->value){
$_smarty_tpl->tpl_vars['media']->_loop = true;
 $_smarty_tpl->tpl_vars['css_uri']->value = $_smarty_tpl->tpl_vars['media']->key;
?>
        <link href="<?php echo $_smarty_tpl->tpl_vars['css_uri']->value;?>
" rel="stylesheet" type="text/css" media="<?php echo $_smarty_tpl->tpl_vars['media']->value;?>
" />
    <?php } ?>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['JS_FILES']->value)){?>
    <?php  $_smarty_tpl->tpl_vars['js_uri'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js_uri']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['JS_FILES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js_uri']->key => $_smarty_tpl->tpl_vars['js_uri']->value){
$_smarty_tpl->tpl_vars['js_uri']->_loop = true;
?>
        <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['js_uri']->value;?>
"></script>
    <?php } ?>
<?php }?><?php }} ?>