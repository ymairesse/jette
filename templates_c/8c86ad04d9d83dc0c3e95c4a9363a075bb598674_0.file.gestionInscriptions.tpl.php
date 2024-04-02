<?php
/* Smarty version 4.3.1, created on 2024-03-26 07:42:24
  from '/home/yves/www/newOxfam/templates/gestion/gestionInscriptions.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_66026e50461e72_18641626',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8c86ad04d9d83dc0c3e95c4a9363a075bb598674' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/gestion/gestionInscriptions.tpl',
      1 => 1711378113,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:gestion/inc/listeUsers.tpl' => 1,
    'file:gestion/inc/calendar.tpl' => 1,
  ),
),false)) {
function content_66026e50461e72_18641626 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row">
  <div class="col-2" id="selectUsersInscription">
    <?php $_smarty_tpl->_subTemplateRender("file:gestion/inc/listeUsers.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  </div>

  <div class="col-10" id="calendarInscription">
    <?php $_smarty_tpl->_subTemplateRender("file:gestion/inc/calendar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  </div>
</div>
<?php }
}
