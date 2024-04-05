<?php
/* Smarty version 4.3.1, created on 2024-04-05 18:00:23
  from '/home/yves/www/newOxfam/templates/gestion/modal/modalCleaning.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_661020175dc1b4_70519862',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '50d15c2ae5b9094bd894655fc0ba54fe2b13db5d' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/gestion/modal/modalCleaning.tpl',
      1 => 1712332819,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661020175dc1b4_70519862 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Modal -->
<div
  class="modal fade"
  id="modalCleaning"
  tabindex="-1"
  aria-labelledby="modalCleaningLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalCleaningLabel">
          Effacement périodes échues
        </h1>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <form id="formClean">
          <p>
            <span class="text-danger"
              >Attention, la suppression est définitive.</span
            ><br />
            <span class="text-success">Il n'est pas possible de supprimer une période non échue.</span>
          </p>

          <ul class="list-unstyled" style="height: 10em; overflow: auto">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeMois']->value, 'dataMois', false, 'mois');
$_smarty_tpl->tpl_vars['dataMois']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['mois']->value => $_smarty_tpl->tpl_vars['dataMois']->value) {
$_smarty_tpl->tpl_vars['dataMois']->do_else = false;
?>
            <li>
              <div class="checkbox">
                <label>
                  <input type="checkbox"
                  name="<?php echo $_smarty_tpl->tpl_vars['dataMois']->value['year'];?>
_<?php echo $_smarty_tpl->tpl_vars['dataMois']->value['month'];?>
" <?php if ($_smarty_tpl->tpl_vars['dataMois']->value['past'] == 0) {?>disabled<?php }?> value="1"> <?php echo $_smarty_tpl->tpl_vars['dataMois']->value['monthName'];?>

                  <?php echo $_smarty_tpl->tpl_vars['dataMois']->value['year'];?>
 <?php if ($_smarty_tpl->tpl_vars['dataMois']->value['past'] == 0) {?>
                  <strong>[Non échu]</strong><?php }?>
                </label>
              </div>
            </li>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </ul>
        </form>
        <hr>
        <p class="fs-6 fw-lighter">Cette opération est optionnelle. Elle permet d'alléger la base de données en éliminant des informations devenues moins utiles.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          Annuler
        </button>
        <button type="button" class="btn btn-primary" id="btn-modalClean">
          Confirmer
        </button>
      </div>
    </div>
  </div>
</div>
<?php }
}
