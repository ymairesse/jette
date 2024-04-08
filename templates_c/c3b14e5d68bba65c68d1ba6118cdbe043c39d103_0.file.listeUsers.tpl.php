<?php
/* Smarty version 4.3.1, created on 2024-04-08 09:31:07
  from '/home/yves/www/newOxfam/templates/users/inc/listeUsers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_66139d3b20a226_10193901',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c3b14e5d68bba65c68d1ba6118cdbe043c39d103' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/users/inc/listeUsers.tpl',
      1 => 1711974476,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66139d3b20a226_10193901 (Smarty_Internal_Template $_smarty_tpl) {
?><button type="button" id="creationCompte" class="btn btn-success text-truncate w-100"><i class="fa fa-edit"></i> Nouvel Utilisateur Oxfam</button>

<label class="w-100" for="listeUsers">Liste des utilisateurs
    <div class="btn-group float-end">
        <button
          class="btn btn-sm btn-sort parNom py-0 <?php if (((isset($_smarty_tpl->tpl_vars['sortUsers']->value)) && ($_smarty_tpl->tpl_vars['sortUsers']->value == 'parNom') || (!((isset($_smarty_tpl->tpl_vars['sortUsers']->value)))))) {?>btn-primary<?php } else { ?>btn-default<?php }?>"
          title="Par ordre des noms"
        >
        <i class="fa fa-sort-alpha-asc" aria-hidden="true"></i> Noms
        </button>
        <button
          class="btn btn-sm btn-sort parPrenom py-0 <?php if ((isset($_smarty_tpl->tpl_vars['sortUsers']->value)) && ($_smarty_tpl->tpl_vars['sortUsers']->value == 'parPrenom')) {?>btn-primary<?php } else { ?>btn-default<?php }?>"
          title="Par ordre des prénoms"
        >
        <i class="fa fa-sort-alpha-asc" aria-hidden="true"></i> Prénoms
        </button>

      </div>
</label>

<table class="table table-sm w-100" id="listeUsers">

    <tr>
        <th class="w-65">Nom</th>
        <th class="w-15">Droits</th>
        <th class="w-20">Pseudo</th>
    </tr>
        <!-- L'utlisateur actif ne peut modifier son propre profil -->
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeUsers']->value, 'user', false, 'pseudoOneUser');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['pseudoOneUser']->value => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
    <?php if ($_smarty_tpl->tpl_vars['pseudoOneUser']->value != $_smarty_tpl->tpl_vars['myPseudo']->value) {?>
        <tr class="<?php if ($_smarty_tpl->tpl_vars['pseudoOneUser']->value == $_smarty_tpl->tpl_vars['pseudo']->value) {?>choosen<?php }?>" data-pseudo="<?php echo $_smarty_tpl->tpl_vars['pseudoOneUser']->value;?>
">
            <td>
                <?php if ($_smarty_tpl->tpl_vars['sortUsers']->value == 'parNom') {?>
                <?php echo $_smarty_tpl->tpl_vars['user']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['prenom'];?>

                <?php } else { ?> 
                <?php echo $_smarty_tpl->tpl_vars['user']->value['prenom'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['nom'];?>

                <?php }?>
                
            </td>
            <td><?php echo $_smarty_tpl->tpl_vars['user']->value['droits'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['pseudoOneUser']->value;?>
</td>
        </tr>
    <?php }?>

    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

</table>

<button type="button" class="btn btn-danger text-truncate w-100" id="btn-delUser"><i class="fa fa-times"></i> Supprimer cet utilisateur</button><?php }
}
