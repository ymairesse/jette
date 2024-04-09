<?php
/* Smarty version 4.3.1, created on 2024-04-08 14:59:00
  from '/home/yves/www/newOxfam/templates/users/modal/modalRenewPasswd.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6613ea14d81ea2_52591769',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7602a3d4ff1a1fe3f11223d9dd19844134754cf8' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/users/modal/modalRenewPasswd.tpl',
      1 => 1711190269,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6613ea14d81ea2_52591769 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Modal -->
<div
  class="modal fade"
  id="modalRenewPwd"
  tabindex="-1"
  aria-labelledby="modalRenewPwdLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalRenewPwdLabel">
          Changement du mot de passe
        </h1>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <form id="formRenewPasswd">

          <input type="hidden" name="token" id="token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">
          <input type="hidden" name="pseudo" id="pseudo" value="<?php echo $_smarty_tpl->tpl_vars['pseudo']->value;?>
">

          <p>Bonjour <strong><?php echo $_smarty_tpl->tpl_vars['distrait']->value['prenom'];?>
</strong>. Votre identifiant est <strong><?php echo $_smarty_tpl->tpl_vars['pseudo']->value;?>
</strong></p>

          <p>Veuillez entrer deux fois votre nouveau mot de passe</p>
          <div class="row">
          <div class="form-group pb-3 col-6">
            <label for="password">Mot de passe</label>
            <div class="input-group mb-3">
              <span class="input-group-text addonMdp"
                ><i class="fa fa-eye"></i
              ></span>
              <input
                type="password"
                class="form-control"
                name="pwd"
                id="pwd"
                autocomplete="off"
                value=""
                placeholder="Au moins 6 caractères"
                aria-describedby="addonMdp"
              />
            </div>
          </div>

          <div class="form-group pb-3 col-6">
            <label for="password">Mot de passe (encore)</label>
            <div class="input-group mb-3">
              <span class="input-group-text addonMdp"
                ><i class="fa fa-eye"></i
              ></span>
              <input
                type="password"
                class="form-control"
                name="pwd2"
                id="pwd2"
                autocomplete="off"
                value=""
                placeholder="Au moins 6 caractères"
                aria-describedby="addonMdp"
              />
            </div>
          </div>
        </div>
          <div class="clearfix"></div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          Annuler
        </button>
        <button type="button" class="btn btn-primary" id="btn-modalRenewPwd">
          Changer le mot de passe
        </button>
      </div>
    </div>
  </div>
</div>

<?php echo '<script'; ?>
>
  
  $.validator.addMethod(
    "lettresEtSymboles",
    function (value, element) {
      // Expression régulière pour vérifier si le champ contient au moins 2 lettres et au plus 2 symboles non alphanumériques
      var lettreRegex = /.*[a-zA-Z].*[a-zA-Z]/;
      var symboleRegex = /[^a-zA-Z0-9]/g;
      var symboles = value.match(symboleRegex);
      var nombreSymboles = symboles ? symboles.length : 0;
      return lettreRegex.test(value) && nombreSymboles <= 2;
    },
    "Au moins deux lettres et au plus deux symboles."
  );

  $(document).ready(function () {
    $("#modalRenewPwd").modal("show");

    $("#formRenewPasswd").validate({
      rules: {
        pwd: {
          required: true,
          minlength: 6,
          maxlength: 12,
          lettresEtSymboles: true,
        },
        pwd2: {
          minlength: 6,
          equalTo: "#pwd",
        },
      },
    });
  });
<?php echo '</script'; ?>
>
<?php }
}
