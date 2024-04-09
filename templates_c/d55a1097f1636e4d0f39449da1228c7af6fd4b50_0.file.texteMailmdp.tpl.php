<?php
/* Smarty version 4.3.1, created on 2024-04-08 14:19:42
  from '/home/yves/www/newOxfam/templates/texteMailmdp.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6613e0de5681c6_51456892',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd55a1097f1636e4d0f39449da1228c7af6fd4b50' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/texteMailmdp.tpl',
      1 => 1709973525,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6613e0de5681c6_51456892 (Smarty_Internal_Template $_smarty_tpl) {
?><p>Chère/cher <?php echo $_smarty_tpl->tpl_vars['identite']->value['prenom'];?>
 <?php echo $_smarty_tpl->tpl_vars['identite']->value['nom'];?>
,</p>

<p>
  Ce courriel vous est adressé par le système automatique d'envoi de mails de la
  plate-forme de gestion des bénévoles Oxfam.
</p>
<p>
  Ce <?php echo $_smarty_tpl->tpl_vars['jour']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['date']->value;?>
 à <?php echo $_smarty_tpl->tpl_vars['heure']->value;?>
, quelqu'un (sans doute vous) à l'adresse IP
  <?php echo $_smarty_tpl->tpl_vars['identiteReseau']->value['ip'];?>
 (<?php echo $_smarty_tpl->tpl_vars['identiteReseau']->value['hostname'];?>
) a demandé le changement de
  mot passe pour l'utilisateur <strong><?php echo $_smarty_tpl->tpl_vars['identite']->value['pseudo'];?>
</strong>.
</p>
<p>
  Si vous n'êtes pas à l'origine de cette demande ou si vous n'avez rien
  demandé, négligez simplement ce mail.
</p>
<p>
  Si vous souhaitez, par contre, réellement pouvoir changer votre mot de passe,
  cliquez sur le lien suivant (ou recopiez la ligne dans la barre d'adresse de
  votre navigateur).
</p>
<a
  href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
index.php?action=renewPasswd&amp;pseudo=<?php echo $_smarty_tpl->tpl_vars['identite']->value['pseudo'];?>
&amp;token=<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
"
  ><?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
index.php?action=renewPasswd&amp;pseudo=<?php echo $_smarty_tpl->tpl_vars['identite']->value['pseudo'];?>
&amp;token=<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
</a
>
<p>
  Ce lien ne fonctionnera que pendant 48h à dater du moment précis de la
  demande, soit le moment d'envoi du présent mail.
</p>

<p>
  <u>/!\</u> Attention! Ce lien ne peut servir qu'une seule fois. Pour un autre
  renouvellement de mot de passe
<ul>
  <li>au-delà du délai de 48h ou</li>
  <li>si vous avez utilisé ce lien une fois</li>
</ul>
il faudra faire une nouvelle demande.
</p>

<p>&nbsp;</p>
<hr />
<p>
  Ce mail est généré par un robot. Les éventuelles réponses ne sont pas lues. Ne
  tentez pas d'y répondre.
</p>
<?php }
}
