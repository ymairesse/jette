<?php
/* Smarty version 4.3.1, created on 2024-04-08 09:31:02
  from '/home/yves/www/newOxfam/templates/conges/conges.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_66139d36dc5787_91848272',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'afcc4b7a49507957789be1ebf81c98b3fa0ffbb1' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/conges/conges.tpl',
      1 => 1711125028,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:conges/inc/selecteurContexte.tpl' => 1,
    'file:conges/inc/hebdomadaires.tpl' => 1,
    'file:conges/inc/feries.tpl' => 1,
  ),
),false)) {
function content_66139d36dc5787_91848272 (Smarty_Internal_Template $_smarty_tpl) {
?><form id="form-conges">
  <h2>Jours de congés</h2>

  <?php $_smarty_tpl->_subTemplateRender("file:conges/inc/selecteurContexte.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <div class="row">
    <div class="col-12 col-xl-6">
      <h3>Fermetures hebdomadaires</h3>

      <?php $_smarty_tpl->_subTemplateRender('file:conges/inc/hebdomadaires.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    </div>

    <div class="col-12 col-xl-6">
      <h3>Jours fériés ou de fermeture extraordinaire</h3>

      <?php $_smarty_tpl->_subTemplateRender('file:conges/inc/feries.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
  </div>
</form>
<?php }
}
