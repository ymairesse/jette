<?php
/* Smarty version 4.3.1, created on 2024-04-02 13:50:58
  from '/home/yves/www/newOxfam/templates/planning/modal/modalNewContexte.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_660bf12252fd64_48558844',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '908155d4b024bb1cc0738427a5460088f02fc7f6' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/planning/modal/modalNewContexte.tpl',
      1 => 1711190064,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660bf12252fd64_48558844 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/yves/www/newOxfam/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<!-- Modal -->
<div
  class="modal fade"
  id="modalNewContexte"
  data-bs-backdrop="static"
  data-bs-keyboard="false"
  tabindex="-1"
  aria-labelledby="modalNewContexteLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalNewContexteLabel">
          Nouveau contexte
        </h1>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <form id="formNewContexte">
          <input
            type="hidden"
            name="lastContexte"
            id="lastContexte"
            value="<?php echo $_smarty_tpl->tpl_vars['lastContexte']->value;?>
"
          />

          <label for="dateDebut" class="form-label"
            >Date de début <u>après le <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['lastContexte']->value,"%d/%m/%Y");?>
</u>
          </label>
          <input
            type="date"
            class="form-control"
            id="dateDebutContexte"
            name="dateDebutContexte"
            placeholder="Date de début du contexte"
            value="<?php echo $_smarty_tpl->tpl_vars['lastContexte']->value;?>
"
          />
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          Annuler
        </button>
        <button
          type="button"
          class="btn btn-primary"
          id="btn-modalSaveNewContexte"
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
    "minDate",
    function (value, element) {
      var minDate = new Date($("input#lastContexte").val());
      var inputDate = new Date(value);
      if (inputDate > minDate) return true;
      return false;
    },
    "Date invalide"
  ); // error message

    $("#formNewContexte").validate({
      rules: {
        dateDebutContexte: {
          required: true,
          date: true,
          minDate: true,
        },
      },
    });


  });
<?php echo '</script'; ?>
>
<?php }
}
