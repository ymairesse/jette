<?php
/* Smarty version 4.3.1, created on 2024-04-04 08:50:03
  from '/home/yves/www/newOxfam/templates/planning/inc/detailsPermanences.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_660e4d9b13ef13_03710431',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '51d663e820b0ba51a3082e4348d20554e70eaf23' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/planning/inc/detailsPermanences.tpl',
      1 => 1711140236,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660e4d9b13ef13_03710431 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/yves/www/newOxfam/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<h3>Date pivot: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['date']->value,"%d/%m/%Y");?>
 pour le contexte n° <?php echo $_smarty_tpl->tpl_vars['idContexte']->value;?>
</h3>

<table class="table table-condensed" id="tableContextes">
  <tr>
    <th style="width: 1em">&nbsp;</th>
    <th>n°</th>
    <th>Heure de début</th>
    <th>Heure de fin</th>
    <th style="width: 1em">&nbsp;</th>
  </tr>

  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['permanences']->value, 'unContexte', false, 'numeroPermanence');
$_smarty_tpl->tpl_vars['unContexte']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['numeroPermanence']->value => $_smarty_tpl->tpl_vars['unContexte']->value) {
$_smarty_tpl->tpl_vars['unContexte']->do_else = false;
?>
  <tr
    data-idcontexte="<?php echo $_smarty_tpl->tpl_vars['idContexte']->value;?>
"
    data-numeropermanence="<?php echo $_smarty_tpl->tpl_vars['unContexte']->value['numeroPermanence'];?>
"
  >
    <td>
      <button
        class="btn btn-danger btn-sm btn-delPermanence"
        title="Supprimer cette permanence"
      >
        <i class="fa fa-times"></i>
      </button>
    </td>
    <td><?php echo $_smarty_tpl->tpl_vars['numeroPermanence']->value;?>
</td>
    <td class="hdebut"><?php echo $_smarty_tpl->tpl_vars['unContexte']->value['heureDebut'];?>
</td>
    <td class="hfin"><?php echo $_smarty_tpl->tpl_vars['unContexte']->value['heureFin'];?>
</td>
    <td>
      <button
        class="btn btn-warning btn-sm btn-editPermanence"
        title="Modifier cette permanence"
      >
        <i class="fa fa-edit"></i>
      </button>
    </td>
  </tr>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table>
<button class="btn btn-warning w-100" id="btn-addPermanence">
  <i class="fa fa-plus"></i> Ajouter des permanences
</button>
<?php }
}
