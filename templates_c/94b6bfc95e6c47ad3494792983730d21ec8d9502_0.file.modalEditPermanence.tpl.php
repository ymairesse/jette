<?php
/* Smarty version 4.3.1, created on 2024-04-01 17:33:12
  from '/home/yves/www/newOxfam/templates/planning/modal/modalEditPermanence.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_660ad3b8af8a60_17817839',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '94b6bfc95e6c47ad3494792983730d21ec8d9502' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/planning/modal/modalEditPermanence.tpl',
      1 => 1711138610,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660ad3b8af8a60_17817839 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/yves/www/newOxfam/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<!-- Modal -->
<div
  class="modal fade"
  id="modalEditPermanence"
  data-bs-backdrop="static"
  data-bs-keyboard="false"
  tabindex="-1"
  aria-labelledby="modalEditPermanenceLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalEditPermanenceLabel">
          Modal title
        </h1>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <form id="formEditPermanence">
          <input type="hidden" name="idContexte" value="<?php echo $_smarty_tpl->tpl_vars['permanence']->value['idContexte'];?>
" />
          <input
            type="hidden"
            name="numeroPermanence"
            value="<?php echo $_smarty_tpl->tpl_vars['permanence']->value['numeroPermanence'];?>
"
          />
          <p>Permanence n° <strong><?php echo $_smarty_tpl->tpl_vars['permanence']->value['numeroPermanence'];?>
</strong> à partir du <strong><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['permanence']->value['dateDebutContexte'],"%d/%m/%Y");?>
</strong></p>
          <div class="row">
            <div class="col-6">
              <label for="heureDebut" class="form-label"
                >Heure de début</label
              >
              <input
                type="time"
                class="form-control"
                id="heureDebut"
                name="heureDebut"
                placeholder="Heure de début"
                value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['permanence']->value['heureDebut'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"
              />
            </div>

            <div class="col-6">
              <label for="heureFin" class="form-label"
                >Heure de fin</label
              >
              <input
                type="time"
                class="form-control"
                id="heureFin"
                name="heureFin"
                placeholder="Heure de Fin"
                value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['permanence']->value['heureFin'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"

              />
            </div>
          </div>
        </form>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          Annuler
        </button>
        <button type="button" class="btn btn-primary" id="btn-modalSavePeriodePermanence">Enregistrer</button>
      </div>
    </div>
  </div>
</div>
<?php }
}
