<?php
/* Smarty version 4.3.1, created on 2024-03-29 17:19:00
  from '/home/yves/www/newOxfam/templates/conges/inc/feries.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6606e9f48f0fe1_48663965',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a4ab3eb72d9eb98bd0e207f19a777cb1631658c' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/conges/inc/feries.tpl',
      1 => 1711186781,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6606e9f48f0fe1_48663965 (Smarty_Internal_Template $_smarty_tpl) {
?><table class="table table-condensed" id="tableFeries">
  <tbody>
    <tr>
      <th>
        Date<br />
        <button
          type="button"
          class="btn btn-sm btn-warning w-100"
          id="btn-addFerie"
          title="Ajouter une date"
          data-idcontexte="<?php echo $_smarty_tpl->tpl_vars['idContexte']->value;?>
"
        >
          <i class="fa fa-plus"></i>
        </button>
      </th>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listePeriodes']->value, 'permanence', false, 'numeroPermanence');
$_smarty_tpl->tpl_vars['permanence']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['numeroPermanence']->value => $_smarty_tpl->tpl_vars['permanence']->value) {
$_smarty_tpl->tpl_vars['permanence']->do_else = false;
?>
      <th>
        <span class="d-none d-xl-inline"
          ><?php echo $_smarty_tpl->tpl_vars['permanence']->value['heureDebut'];?>
 - <?php echo $_smarty_tpl->tpl_vars['permanence']->value['heureFin'];?>
</span
        >
        <span class="d-inline d-xl-none"><?php echo $_smarty_tpl->tpl_vars['numeroPermanence']->value;?>
</span>
      </th>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      <td style="width: 1em">&nbsp;</td>
    </tr>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeCongesFeries']->value, 'lesPeriodes', false, 'laDate');
$_smarty_tpl->tpl_vars['lesPeriodes']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['laDate']->value => $_smarty_tpl->tpl_vars['lesPeriodes']->value) {
$_smarty_tpl->tpl_vars['lesPeriodes']->do_else = false;
?>

    <tr class="congesFeries">
      <td>
        <div class="form-group">
          <input
            type="date"
            name="datesConge[]"
            class="form-control"
            placeholder="date"
            value="<?php echo $_smarty_tpl->tpl_vars['laDate']->value;?>
"
            readonly
          />
        </div>
      </td>

      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listePeriodes']->value, 'permanence', false, 'noPeriode');
$_smarty_tpl->tpl_vars['permanence']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['noPeriode']->value => $_smarty_tpl->tpl_vars['permanence']->value) {
$_smarty_tpl->tpl_vars['permanence']->do_else = false;
?>
      <td>
        <div class="form-check form-switch">
          <input class="form-check-input switchFerie"
          data-periode="<?php echo $_smarty_tpl->tpl_vars['noPeriode']->value;?>
" type="checkbox" role="switch"
          value="<?php echo $_smarty_tpl->tpl_vars['noPeriode']->value;?>
" id="switch_<?php echo $_smarty_tpl->tpl_vars['laDate']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['noPeriode']->value;?>
"
          data-ladate="<?php echo $_smarty_tpl->tpl_vars['laDate']->value;?>
" <?php if ((isset($_smarty_tpl->tpl_vars['listeCongesFeries']->value[$_smarty_tpl->tpl_vars['laDate']->value][$_smarty_tpl->tpl_vars['noPeriode']->value])) && ($_smarty_tpl->tpl_vars['listeCongesFeries']->value[$_smarty_tpl->tpl_vars['laDate']->value][$_smarty_tpl->tpl_vars['noPeriode']->value] == 1)) {?>checked<?php }?> 
          />

          <label
            class="form-check-label"
            for="switch_<?php echo $_smarty_tpl->tpl_vars['laDate']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['noPeriode']->value;?>
"
          ></label>
        </div>
        
      </td>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      <td>
        <button
          type="button"
          class="btn btn-sm btn-danger btn-delConge"
          title="Suppression de la ligne"
        >
          <i class="fa fa-times"></i>
        </button>
      </td>
    </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </tbody>
</table>
<?php }
}
