<?php
/* Smarty version 4.3.1, created on 2024-04-04 08:50:36
  from '/home/yves/www/newOxfam/templates/planning/modal/modalNewDate4contexte.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_660e4dbc7244a5_82580367',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c9c5f3d408cbc8dd64f55881a8e3207f7aa60183' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/planning/modal/modalNewDate4contexte.tpl',
      1 => 1712078716,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660e4dbc7244a5_82580367 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/yves/www/newOxfam/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<!-- Modal -->
<div
  class="modal fade"
  id="modalNewDate4Contexte"
  tabindex="-1"
  aria-labelledby="modalNewDate4ContexteLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalNewDate4ContexteLabel">
          Nouvelle date pivot
        </h1>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <form id="formEditDateContexte">
          <input
            type="hidden"
            name="idContexte"
            id="idContexte"
            value="<?php echo $_smarty_tpl->tpl_vars['idContexte']->value;?>
"
          />
          <input
            type="hidden"
            name="datePrecedente"
            id="datePrecedente"
            value="<?php echo $_smarty_tpl->tpl_vars['datePrecedente']->value;?>
"
          />
          <input
            type="hidden"
            name="dateSuivante"
            id="dateSuivante"
            value="<?php echo $_smarty_tpl->tpl_vars['dateSuivante']->value;?>
"
          />

          <div class="mb-3">
            <label for="dateContexte" class="form-label"
              >Nouvelle date entre le <?php if ($_smarty_tpl->tpl_vars['datePrecedente']->value != NULL) {?>
              <strong><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['datePrecedente']->value,"%d/%m/%Y");?>
</strong>
              <?php } else { ?>?????<?php }?> et le <?php if ($_smarty_tpl->tpl_vars['dateSuivante']->value != NULL) {?><strong><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['dateSuivante']->value,"%d/%m/%Y");?>
</strong><?php } else { ?>?????<?php }?></label
            >
            <input
              type="date"
              name="dateContexte"
              id="dateContexte"
              class="form-control"
              value="<?php echo $_smarty_tpl->tpl_vars['dateActuelle']->value;?>
"
            />
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          Annuler
        </button>
        <button
          type="button"
          class="btn btn-primary"
          id="modalSaveDateContexte"
        >
          Enregistrer
        </button>
      </div>
    </div>
  </div>
</div>

<?php echo '<script'; ?>
>
  $(document).ready(function () {
    $.validator.addMethod(
      "minMaxDate",
      function (value, element) {
        var datePrecedente = $("#datePrecedente").val();
        var dateSuivante = $("#dateSuivante").val();
        if (datePrecedente == "" && value < dateSuivante) return true;
        if (dateSuivante == "" && value > datePrecedente) return true;
        if (value > datePrecedente && value < dateSuivante) return true;
        return false;
      },
      "Date Invalide!"
    ); // error message

    $("#formEditDateContexte").validate({
      rules: {
        dateContexte: {
          required: true,
          date: true,
          minMaxDate: true,
        },
      },
    });
  });
<?php echo '</script'; ?>
>
<?php }
}
