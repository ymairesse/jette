<?php
/* Smarty version 4.3.1, created on 2024-04-09 19:35:58
  from '/home/yves/www/newOxfam/templates/gestion/modal/modalApprobation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_66157c7e852fd0_88233699',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cbc6462b4d3f0c8ec4c6102b983f9cbb2cf27614' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/gestion/modal/modalApprobation.tpl',
      1 => 1712684149,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66157c7e852fd0_88233699 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/yves/www/newOxfam/vendor/smarty/smarty/libs/plugins/modifier.count.php','function'=>'smarty_modifier_count',),));
?>
<!-- Modal -->
<div
  class="modal fade"
  id="modalApprobation"
  tabindex="-1"
  aria-labelledby="modalApprobationLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalApprobationLabel">
          Approbation des <?php echo smarty_modifier_count($_smarty_tpl->tpl_vars['listeUsers']->value);?>
 nouveaux bénévoles
        </h1>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body" style="max-height: 15em; overflow: auto">
        <form id="formApprobation">
          <table class="table table-condensed">
            <tr>
              <th style="width: 1em">&nbsp;</th>
              <th style="width: 7em">Pseudo</th>
              <th>Nom</th>
              <th>Mail</th>
              <th style="width: 1em">Approuvé</th>
            </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeUsers']->value, 'unBenevole', false, 'pseudo');
$_smarty_tpl->tpl_vars['unBenevole']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['pseudo']->value => $_smarty_tpl->tpl_vars['unBenevole']->value) {
$_smarty_tpl->tpl_vars['unBenevole']->do_else = false;
?>
            <tr
              data-pseudo="<?php echo $_smarty_tpl->tpl_vars['pseudo']->value;?>
"
              data-nom="<?php echo $_smarty_tpl->tpl_vars['unBenevole']->value['prenom'];?>
 <?php echo $_smarty_tpl->tpl_vars['unBenevole']->value['nom'];?>
"
            >
              <td>
                <button
                  type="button"
                  class="btn btn-danger btn-sm btn-delApprobation"
                  title="Supprimer la demande"
                >
                  <i class="fa fa-times"></i>
                </button>
              </td>
              <td><?php echo $_smarty_tpl->tpl_vars['unBenevole']->value['pseudo'];?>
</td>
              <td><?php echo $_smarty_tpl->tpl_vars['unBenevole']->value['prenom'];?>
 <?php echo $_smarty_tpl->tpl_vars['unBenevole']->value['nom'];?>
</td>
              <td>
                <a href="mailto:<?php echo $_smarty_tpl->tpl_vars['unBenevole']->value['mail'];?>
"><?php echo $_smarty_tpl->tpl_vars['unBenevole']->value['mail'];?>
</a>
              </td>
              <td>
                <div class="form-group pb-3 col-2">
                  <input
                    type="hidden"
                    class="cb"
                    id="approuve_<?php echo $_smarty_tpl->tpl_vars['unBenevole']->value['pseudo'];?>
"
                    name="approuve_<?php echo $_smarty_tpl->tpl_vars['unBenevole']->value['pseudo'];?>
"
                    value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['unBenevole']->value['approuve'] ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
"
                  />
                  <div class="btn-group" role="group" aria-label="Approuvé">
                    <button
                      type="button"
                      class="btn btn-sm btn-approuveUser <?php if ($_smarty_tpl->tpl_vars['unBenevole']->value['approuve'] == 1) {?>btn-success<?php } else { ?>btn-outline-success<?php }?>"
                      data-value="1"
                    >
                      Oui
                    </button>
                    <button
                      type="button"
                      class="btn btn-sm btn-approuveUser <?php if ($_smarty_tpl->tpl_vars['unBenevole']->value['approuve'] == 0) {?>btn-danger<?php } else { ?>btn-outline-danger<?php }?>"
                      data-value="0"
                    >
                      Non
                    </button>
                  </div>
                </div>
              </td>
            </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </table>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          Annuler
        </button>
        <button
          type="button"
          class="btn btn-primary"
          id="btn-modalSaveApprobation"
        >
          Confirmer
        </button>
      </div>
    </div>
  </div>
</div>

<?php echo '<script'; ?>
>
  $(document).ready(function () {
    $(".btn-approuveUser").click(function () {
      var ceci = $(this);
      var value = ceci.data("value");
      ceci.closest(".form-group").find(".cb").val(value);

      var btnGroup = ceci.closest(".btn-group");
      if (value == 1) {
        btnGroup
          .find('.btn[data-value="1"]')
          .addClass("btn-success")
          .removeClass("btn-outline-success");
        btnGroup
          .find('.btn[data-value="0"]')
          .addClass("btn-outline-danger")
          .removeClass("btn-danger");
      } else {
        btnGroup
          .find('.btn[data-value="0"]')
          .addClass("btn-danger")
          .removeClass("btn-outline-danger");
        btnGroup
          .find('.btn[data-value="1"]')
          .addClass("btn-outline-success")
          .removeClass("btn-success");
      }
    });
  });
<?php echo '</script'; ?>
>
<?php }
}
