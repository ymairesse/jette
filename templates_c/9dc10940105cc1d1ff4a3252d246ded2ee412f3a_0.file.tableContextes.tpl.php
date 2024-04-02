<?php
/* Smarty version 4.3.1, created on 2024-04-02 18:25:16
  from '/home/yves/www/newOxfam/templates/planning/inc/tableContextes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_660c316c658722_52939361',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9dc10940105cc1d1ff4a3252d246ded2ee412f3a' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/planning/inc/tableContextes.tpl',
      1 => 1712075109,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660c316c658722_52939361 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/yves/www/newOxfam/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<h3>Liste des contextes</h3>
<table class="table table-condensed" id="listeContextes">
  <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeContextes']->value, 'date', false, 'unContexte');
$_smarty_tpl->tpl_vars['date']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['unContexte']->value => $_smarty_tpl->tpl_vars['date']->value) {
$_smarty_tpl->tpl_vars['date']->do_else = false;
?>
    <tr
      data-idcontexte="<?php echo $_smarty_tpl->tpl_vars['unContexte']->value;?>
"
      data-date="<?php echo $_smarty_tpl->tpl_vars['date']->value;?>
"
      data-datefr="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['date']->value,'%d/%m/%Y');?>
"
      class="<?php if ($_smarty_tpl->tpl_vars['idContexte']->value == $_smarty_tpl->tpl_vars['unContexte']->value) {?>choosen<?php }?>"
    >
      <td style="width: 1em">
        <button
          class="btn btn-danger btn-sm btn-delContexte"
          title="Supprimer ce contexte"
        >
          <i class="fa fa-times"></i>
        </button>
      </td>
      <td><?php echo $_smarty_tpl->tpl_vars['unContexte']->value;?>
</td>
      <td>Depuis le <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['date']->value,"%d/%m/%Y");?>
</td>
      <td style="width:1em">
        <button class="btn btn-warning btn-sm btn-editContexte" title="Modifier la date pivot">
          <i class="fa fa-edit"></i>
        </button>
      </td>
    </tr>

    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </tbody>
</table>
<button type="button" class="btn btn-warning w-100" id="btn-addContexte">
  <i class="fa fa-plus"></i> Ajouter un contexte
</button>
<?php }
}
