<?php
/* Smarty version 4.3.1, created on 2024-04-08 09:31:07
  from '/home/yves/www/newOxfam/templates/users/ficheUser.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_66139d3b200ec1_92195836',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fee27295ed5300c9a3e19cebdacfb0dabf4c3a54' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/users/ficheUser.tpl',
      1 => 1711974677,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:users/inc/listeUsers.tpl' => 1,
    'file:users/ficheProfilUser.tpl' => 1,
  ),
),false)) {
function content_66139d3b200ec1_92195836 (Smarty_Internal_Template $_smarty_tpl) {
?><h1>Gestion des utilisateurs</h1>
<div class="row">
    <div class="col-xl-3 col-12" id="selectUsers4users">
        
        <?php $_smarty_tpl->_subTemplateRender('file:users/inc/listeUsers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>

    <div class="col-xl-9 col-12" id="ficheProfil">

        <?php $_smarty_tpl->_subTemplateRender('file:users/ficheProfilUser.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>

</div><?php }
}
