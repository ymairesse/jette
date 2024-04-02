<?php
/* Smarty version 4.3.1, created on 2024-03-29 17:19:00
  from '/home/yves/www/newOxfam/templates/conges/inc/hebdomadaires.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6606e9f48e96c1_08916279',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8cece1441eff144ded7abf2eab13fabe132ec19b' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/conges/inc/hebdomadaires.tpl',
      1 => 1711192866,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6606e9f48e96c1_08916279 (Smarty_Internal_Template $_smarty_tpl) {
?><table class="table table-condensed">
  <thead>
    <tr>
      <th style="width: 10%">Jour</th>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listePeriodes']->value, 'permanence', false, 'noPeriode');
$_smarty_tpl->tpl_vars['permanence']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['noPeriode']->value => $_smarty_tpl->tpl_vars['permanence']->value) {
$_smarty_tpl->tpl_vars['permanence']->do_else = false;
?>
      <th>
        <span class="d-none d-xl-inline"
          ><?php echo $_smarty_tpl->tpl_vars['permanence']->value['heureDebut'];?>
 - <?php echo $_smarty_tpl->tpl_vars['permanence']->value['heureFin'];?>
</span
        >
        <span class="d-inline d-xl-none"><?php echo $_smarty_tpl->tpl_vars['noPeriode']->value;?>
</span>
      </th>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tr>
  </thead>

  <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['daysOfWeek']->value, 'jourFR', false, 'noJour');
$_smarty_tpl->tpl_vars['jourFR']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['noJour']->value => $_smarty_tpl->tpl_vars['jourFR']->value) {
$_smarty_tpl->tpl_vars['jourFR']->do_else = false;
?>
    <tr data-jour="<?php echo $_smarty_tpl->tpl_vars['jourFR']->value;?>
">
      <th><?php echo $_smarty_tpl->tpl_vars['jourFR']->value;?>
</th>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listePeriodes']->value, 'permanence', false, 'noPeriode');
$_smarty_tpl->tpl_vars['permanence']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['noPeriode']->value => $_smarty_tpl->tpl_vars['permanence']->value) {
$_smarty_tpl->tpl_vars['permanence']->do_else = false;
?>
      <td data-jour="<?php echo $_smarty_tpl->tpl_vars['noJour']->value;?>
" data-periode="<?php echo $_smarty_tpl->tpl_vars['noPeriode']->value;?>
">
        <div class="form-check form-switch">
          <input 
            class="form-check-input switchHebdo" 
            type="checkbox" 
            role="switch"
            value="<?php echo $_smarty_tpl->tpl_vars['noJour']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['noPeriode']->value;?>
" 
            data-jour="<?php echo $_smarty_tpl->tpl_vars['noJour']->value;?>
"
            data-periode="<?php echo $_smarty_tpl->tpl_vars['noPeriode']->value;?>
" 
            id="switch_<?php echo $_smarty_tpl->tpl_vars['noJour']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['noPeriode']->value;?>
" 
            <?php if ((isset($_smarty_tpl->tpl_vars['listeCongesHebdo']->value[$_smarty_tpl->tpl_vars['noJour']->value][$_smarty_tpl->tpl_vars['noPeriode']->value])) && ($_smarty_tpl->tpl_vars['listeCongesHebdo']->value[$_smarty_tpl->tpl_vars['noJour']->value][$_smarty_tpl->tpl_vars['noPeriode']->value] == 1)) {?> checked<?php }?>>
          <label class="form-check-label" for="switch_<?php echo $_smarty_tpl->tpl_vars['noJour']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['noPeriode']->value;?>
"></label>
        </div>

      </td>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tr>

    <tr>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tr>
  </tbody>
</table>
<?php }
}
