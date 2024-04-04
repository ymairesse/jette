<?php
/* Smarty version 4.3.1, created on 2024-04-04 08:49:36
  from '/home/yves/www/newOxfam/templates/gestion/inc/boutonInscription.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_660e4d80319f64_85908131',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4cbd267ebae0f5cc75ce267cecccd59103ebacac' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/gestion/inc/boutonInscription.tpl',
      1 => 1711467592,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660e4d80319f64_85908131 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/yves/www/newOxfam/vendor/smarty/smarty/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>
<button
  type="button"
  data-pseudo="<?php echo $_smarty_tpl->tpl_vars['identite']->value['pseudo'];?>
"
  class="btn btn-pink btn-sm candidat w-100"
  title="N'oubliez pas d'enregistrer"
>
  <span class="d-none d-md-block"
    ><?php echo $_smarty_tpl->tpl_vars['identite']->value['civilite'];?>
 <?php echo $_smarty_tpl->tpl_vars['identite']->value['prenom'];?>
 <?php echo $_smarty_tpl->tpl_vars['identite']->value['nom'];?>

    <span class="disk">(<i class="fa fa-floppy-o"></i>)</span></span
  >
  <span class="d-md-none d-sm-block"
    ><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['identite']->value['prenom'],10,"...",true);?>

    <span class="disk">(<i class="fa fa-floppy-o"></i>)</span></span
  >
</button>
<?php }
}
