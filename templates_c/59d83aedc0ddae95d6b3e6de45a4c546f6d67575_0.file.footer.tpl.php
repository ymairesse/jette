<?php
/* Smarty version 4.3.1, created on 2024-04-03 08:19:36
  from '/home/yves/www/newOxfam/templates/footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_660cf4f8d91331_56499233',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '59d83aedc0ddae95d6b3e6de45a4c546f6d67575' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/footer.tpl',
      1 => 1699647524,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660cf4f8d91331_56499233 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/yves/www/newOxfam/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<nav class="navbar fixed-bottom navbar-light bg-light">
	<div class="container-fluid">

	  <div class="d-lg-none"><?php echo smarty_modifier_date_format(time(),"%A, %e %b %Y");?>
 <?php echo smarty_modifier_date_format(time(),"%Hh%M");?>
</div>
	  <div class="d-none d-lg-block">Le <?php echo smarty_modifier_date_format(time(),"%A, %e %b %Y");?>
 à <?php echo smarty_modifier_date_format(time(),"%Hh%M");?>
</div>
	
	</div>
  </nav> <?php }
}
