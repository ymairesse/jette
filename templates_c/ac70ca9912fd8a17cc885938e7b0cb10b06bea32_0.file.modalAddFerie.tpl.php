<?php
/* Smarty version 4.3.1, created on 2024-04-09 15:32:53
  from '/home/yves/www/newOxfam/templates/conges/modal/modalAddFerie.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_66154385342030_94184386',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ac70ca9912fd8a17cc885938e7b0cb10b06bea32' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/conges/modal/modalAddFerie.tpl',
      1 => 1711204313,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66154385342030_94184386 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/yves/www/newOxfam/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<!-- Modal -->
<div
  class="modal fade"
  id="modalAddFerie"
  tabindex="-1"
  aria-labelledby="modalAddFerieLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalAddFerieLabel">
          Edition d'un jour férié
        </h1>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <form id="form-addFerie">
          <input
            type="hidden"
            name="dateDebut"
            id="dateDebut"
            value="<?php echo $_smarty_tpl->tpl_vars['datesLimites']->value[0];?>
"
          />
          <input
            type="hidden"
            name="dateFin"
            id="dateFin"
            value="<?php echo $_smarty_tpl->tpl_vars['datesLimites']->value[1];?>
"
          />
          <input type="hidden" name="idContexte" value="<?php echo $_smarty_tpl->tpl_vars['idContexte']->value;?>
" />

          <p>
            Depuis le
            <strong><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['datesLimites']->value[0],'%d/%m/%Y');?>
</strong> <?php if ($_smarty_tpl->tpl_vars['datesLimites']->value[1] != '...') {?>jusqu'au
            <strong><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['datesLimites']->value[1],'%d/%m/%Y');?>
</strong>
            exclus<?php }?>
          </p>

          <div class="form-group">
            <label for="jourFerie">Jour férié (même partiellement)</label>
            <input
              type="date"
              name="jourFerie"
              id="jourFerie"
              class="form-control"
              value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['jourFerie']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
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
          id="btn-modalSaveAddFerie"
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
      var minDate = new Date($("input#dateDebut").val());
      var inputDate = new Date(value);
      if (inputDate >= minDate) return true;
      return false;
    },
    "Date passée"
  ); // error message

  $.validator.addMethod(
    "maxDate",
    function (value, element) {
      var maxDate = new Date($("input#dateFin").val());
      var inputDate = new Date(value);
      if (inputDate < maxDate) return true;
      return false;
    },
    "Date trop éloignée"
  ); // error message

  <?php if (($_smarty_tpl->tpl_vars['datesLimites']->value[1] == '...')) {?>

    $('#form-addFerie').validate({
        rules: {
          jourFerie: {
            required: true,
            date: true,
            minDate: true,
          },
        },
      })

  <?php } else { ?>

    $('#form-addFerie').validate({
        rules: {
          jourFerie: {
            required: true,
            date: true,
            minDate: true,
            maxDate: true,
          },
        },
      })

    <?php }?>

  })
<?php echo '</script'; ?>
>
<?php }
}
