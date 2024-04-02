<?php
/* Smarty version 4.3.1, created on 2024-03-31 07:57:47
  from '/home/yves/www/newOxfam/templates/gestion/modal/modalFreezes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6608fb5b2af401_21923452',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '93ec570e1c1b55d0c69bc01de6b65e4ff9f8a238' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/gestion/modal/modalFreezes.tpl',
      1 => 1711864662,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6608fb5b2af401_21923452 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Modal -->
<div
  class="modal fade"
  id="modalFreezes"
  tabindex="-1"
  aria-labelledby="modalFreezesLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalFreezesLabel">
          Gel des périodes
        </h1>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <form id="form-freezes">
            <div style="max-height: 20em; overflow: auto;">
          <table class="table table-condensed">
            <tr>
              <th>Périodes</th>
              <th colspan="3" style="text-align:center;">Statut</th>
            </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['freezes']->value, 'freeze', false, 'oneMonth');
$_smarty_tpl->tpl_vars['freeze']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['oneMonth']->value => $_smarty_tpl->tpl_vars['freeze']->value) {
$_smarty_tpl->tpl_vars['freeze']->do_else = false;
?>
            <tr data-month="<?php echo $_smarty_tpl->tpl_vars['oneMonth']->value;?>
">
              <td><?php echo $_smarty_tpl->tpl_vars['freeze']->value['dateFr'];?>
</td>
              <td>
                <div class="form-check">
                  <input class="form-check-input" type="radio"
                  name="freeze_<?php echo $_smarty_tpl->tpl_vars['oneMonth']->value;?>
" id="freeze_<?php echo $_smarty_tpl->tpl_vars['oneMonth']->value;?>
0" value="0"
                  <?php if ($_smarty_tpl->tpl_vars['freeze']->value['status'] == 0) {?> checked<?php }?>>
                  <label class="form-check-label" for="freeze_<?php echo $_smarty_tpl->tpl_vars['oneMonth']->value;?>
0">
                    Libre
                  </label>
                </div>
              </td>

              <td>
                <div class="form-check">
                  <input class="form-check-input" type="radio"
                  name="freeze_<?php echo $_smarty_tpl->tpl_vars['oneMonth']->value;?>
" id="freeze_<?php echo $_smarty_tpl->tpl_vars['oneMonth']->value;?>
1" value="1"
                  <?php if ($_smarty_tpl->tpl_vars['freeze']->value['status'] == 1) {?> checked<?php }?>>
                  <label class="form-check-label" for="freeze_<?php echo $_smarty_tpl->tpl_vars['oneMonth']->value;?>
1">
                    Plus de désinscription
                  </label>
                </div>
              </td>
              <td>
                <div class="form-check">
                  <input class="form-check-input" type="radio"
                  name="freeze_<?php echo $_smarty_tpl->tpl_vars['oneMonth']->value;?>
" id="freeze_<?php echo $_smarty_tpl->tpl_vars['oneMonth']->value;?>
2" value="2"
                  <?php if ($_smarty_tpl->tpl_vars['freeze']->value['status'] == 2) {?> checked<?php }?>>
                  <label class="form-check-label" for="freeze_<?php echo $_smarty_tpl->tpl_vars['oneMonth']->value;?>
2">
                    Ni inscription, ni désinscription
                  </label>
                </div>
              </td>
            </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </table>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          Annuler
        </button>
        <button type="button" class="btn btn-primary" id="btn-modalSaveFreezes">
          Enregistrer
        </button>
      </div>
    </div>
  </div>
</div>
<?php }
}
