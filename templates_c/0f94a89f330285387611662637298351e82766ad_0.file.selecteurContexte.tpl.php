<?php
/* Smarty version 4.3.1, created on 2024-04-09 19:25:57
  from '/home/yves/www/newOxfam/templates/conges/inc/selecteurContexte.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_66157a25d62649_76230245',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0f94a89f330285387611662637298351e82766ad' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/conges/inc/selecteurContexte.tpl',
      1 => 1712683550,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66157a25d62649_76230245 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/yves/www/newOxfam/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<div class="d-flex">
    
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

        Depuis le <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['datesContexte']->value[0],'%d/%m/%Y');?>
 
         
        <?php if ($_smarty_tpl->tpl_vars['datesContexte']->value[1] != "...") {?>
          jusqu'au 
          <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['datesContexte']->value[1],'%d/%m/%Y');?>
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