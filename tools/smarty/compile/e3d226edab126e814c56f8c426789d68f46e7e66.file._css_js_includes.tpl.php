<?php /* Smarty version Smarty-3.1.13, created on 2015-06-10 16:05:41
         compiled from "D:\desarrollo\web\PHP\OctoPlus\tpl\_css_js_includes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5080557844352a79a7-01789337%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3d226edab126e814c56f8c426789d68f46e7e66' => 
    array (
      0 => 'D:\\desarrollo\\web\\PHP\\OctoPlus\\tpl\\_css_js_includes.tpl',
      1 => 1433534588,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5080557844352a79a7-01789337',
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
  'unifunc' => 'content_55784435316d85_24583882',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55784435316d85_24583882')) {function content_55784435316d85_24583882($_smarty_tpl) {?>
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