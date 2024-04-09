<?php
/* Smarty version 4.3.1, created on 2024-04-09 18:14:58
  from '/home/yves/www/newOxfam/templates/users/inc/texteMailApprobation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_661569829f5115_77517980',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1d4ec31ae3da1f117e4631e3b16f53ce951adeca' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/users/inc/texteMailApprobation.tpl',
      1 => 1712678755,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661569829f5115_77517980 (Smarty_Internal_Template $_smarty_tpl) {
?><p>Chère/cher <?php echo $_smarty_tpl->tpl_vars['identite']->value['prenom'];?>
 <?php echo $_smarty_tpl->tpl_vars['identite']->value['nom'];?>
,</p>

<p>
  Ce courriel vous est adressé par le système automatique d'envoi de mails de la
  plate-forme de gestion des bénévoles Oxfam.
</p>
<p>
  Un administrateur vient d'y approuver votre inscription.<br />
  Vous pouvez donc maintenant accéder à l'application à l'adresse
  <a href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
</a> en utilisant votre identifiant
  <strong><?php echo $_smarty_tpl->tpl_vars['pseudo']->value;?>
</strong> ou votre adresse mail
  <a href="mailto:<?php echo $_smarty_tpl->tpl_vars['identite']->value['mail'];?>
"><?php echo $_smarty_tpl->tpl_vars['identite']->value['mail'];?>
</a>
  associés au mot de passe que vous avez choisi.
</p>
<p>Bienvenue dans notre équipe.</p>
<hr />
<p>
  Ce mail est généré par un robot. Les éventuelles réponses ne sont pas lues. Ne
  tentez pas d'y répondre.
</p>
<?php }
}
