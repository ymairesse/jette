<?php
/* Smarty version 4.3.1, created on 2024-04-01 09:51:04
  from '/home/yves/www/newOxfam/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_660a67682edc58_23362636',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bd5dd7ffefabebd2bd6d3ea11e1c93bb18ef1482' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/index.tpl',
      1 => 1711957856,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
    'file:start.tpl' => 1,
    'file:users/modal/modalRenewPasswd.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_660a67682edc58_23362636 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Oxfam - Magasin du Monde</title>
    <link rel="stylesheet" href="bootstrap-5.3.0-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/screen.css" />
    <link rel="stylesheet" href="css/boutons.css" />
    <link
      rel="stylesheet"
      href="fa/css/font-awesome.min.css"
      type="text/css"
      media="screen, print"
    />
    <link rel="icon" type="image/x-icon" href="images/favicon.ico" />
    <?php echo '<script'; ?>
 src="bootstrap-5.3.0-dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="js/jquery-3.7.0.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/jsCookie/src/js.cookie.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="js/javascript.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/javascriptUsers.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/javascriptPlanning.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/javascriptConges.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/javascriptInscriptions.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/javascriptGestion.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
 src="js/jqvalidate/dist/jquery.validate.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/jqvalidate/dist/additional-methods.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="js/jqvalidate/dist/localization/messages_fr.js"><?php echo '</script'; ?>
>
    
    <?php echo '<script'; ?>
 src="js/bootbox.all.min.js"><?php echo '</script'; ?>
>
  </head>
  <body>
    <div class="container-fluid" id="menu">
      <div class="row"><?php $_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?></div>
    </div>

    <div class="container-fluid" id="corpsPage"><?php $_smarty_tpl->_subTemplateRender("file:start.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?></div>

    <?php if ($_smarty_tpl->tpl_vars['action']->value == 'renewPasswd') {?> <?php $_smarty_tpl->_subTemplateRender("file:users/modal/modalRenewPasswd.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?> <?php }?>

    <div id="modal"></div>

    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  </body>
</html>
<?php }
}
