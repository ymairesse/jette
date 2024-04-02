<?php
/* Smarty version 4.3.1, created on 2024-03-29 17:19:00
  from '/home/yves/www/newOxfam/templates/conges/inc/selecteurContexte.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6606e9f48e21a8_51111613',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0f94a89f330285387611662637298351e82766ad' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/conges/inc/selecteurContexte.tpl',
      1 => 1711187718,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6606e9f48e21a8_51111613 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="d-flex">
    
    <label for="idContexte" class="me-3 text-danger" style="font-size:16pt">Contexte</label>
    <select class="form-select" name="idContexte" id="idContexte" aria-label="Contexte">
      <option>Choix du contexte</option>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeDoubleContextes']->value, 'datesContexte', false, 'unIdContexte');
$_smarty_tpl->tpl_vars['datesContexte']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['unIdContexte']->value => $_smarty_tpl->tpl_vars['datesContexte']->value) {
$_smarty_tpl->tpl_vars['datesContexte']->do_else = false;
?> 
      <option value="<?php echo $_smarty_tpl->tpl_vars['unIdContexte']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['unIdContexte']->value == $_smarty_tpl->tpl_vars['idContexte']->value) {?> selected<?php }?>>

        Depuis le <?php echo $_smarty_tpl->tpl_vars['datesContexte']->value[0];?>
 
         
        <?php if ($_smarty_tpl->tpl_vars['datesContexte']->value[1] != "...") {?>
          jusqu'au 
          <?php echo $_smarty_tpl->tpl_vars['datesContexte']->value[1];?>
 exclu
          <?php } else { ?> 
          ... 
        <?php }?> 
        </option>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select>
    <button type="button" class="btn btn-warning" id="btn-setContexte2day">Aujourd'hui</button>
    
  </div><?php }
}
