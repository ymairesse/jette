<?php
/* Smarty version 4.3.1, created on 2024-04-02 17:39:10
  from '/home/yves/www/newOxfam/templates/planning/gestPeriodes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_660c269e575c49_29036610',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9c6e21a7668bbaa4cd4be271a6c1c95feb0a4079' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/planning/gestPeriodes.tpl',
      1 => 1712072347,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:planning/inc/tableContextes.tpl' => 1,
    'file:planning/inc/detailsPermanences.tpl' => 1,
  ),
),false)) {
function content_660c269e575c49_29036610 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>Gestion des périodes de permanences</h2>
<div class="row">
<div class="col-3" id="listeEpoques">
    
    <?php $_smarty_tpl->_subTemplateRender("file:planning/inc/tableContextes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</div>

<div class="col-9" id="detailsPermanences">

    <?php $_smarty_tpl->_subTemplateRender("file:planning/inc/detailsPermanences.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    
</div>

</div>

<?php }
}
