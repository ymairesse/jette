<?php
/* Smarty version 4.3.1, created on 2024-04-01 09:38:26
  from '/home/yves/www/newOxfam/templates/modal/modalLogin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_660a6472f087e7_17929507',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '78bfe2b4622b0de6a297baf72441addf8b975cd7' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/modal/modalLogin.tpl',
      1 => 1711957010,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660a6472f087e7_17929507 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="modal fade" data-backdrop="static" tabindex="-1" id="modalLogin">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Veuillez vous identifier</h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <form autocomplete="off" id="form-login">
          <div class="row">
            <div class="form-group pb-3">
              <input
                type="text"
                id="identifiant"
                name="identifiant"
                class="form-control input-lg"
                placeholder="Votre adresse mail ou votre pseudo"
                value=""
                autocomplete="off"
                tabindex="1"
              />
            </div>
          </div>

          <div class="row">
            <div class="col-1">
              <button
                class="btn btn-outline-secondary"
                type="button"
                id="btn-view"
                tabindex="4"
              >
                <i class="fa fa-eye" aria-hidden="true"></i>
              </button>
            </div>
            <div class="col-11">
              <input
                type="password"
                class="form-control"
                placeholder="Votre mot de passe"
                value=""
                id="passwd"
                name="passwd"
                autocomplete="off"
                tabindex="2"
              />
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="btn-lostMDP" class="btn btn-warning btn-sm">
          J'ai perdu mon mot de passe
        </button>
        <button
          type="button"
          class="btn btn-secondary ms-auto"
          data-bs-dismiss="modal"
        >
          Fermer
        </button>

        <button type="button" class="btn btn-success" id="btn-modalLogin" tabindex="3">
          Connexion
        </button>

      </div>
    </div>
  </div>
</div>

<?php echo '<script'; ?>
>
  $(document).ready(function () {
    $("#modalLogin").on("shown.bs.modal", function () {
      $("#identifiant").focus();
    });

    $("#btn-view").click(function () {
      if ($("input#passwd").prop("type") == "password")
        $("input#passwd").prop("type", "text");
      else $("input#passwd").prop("type", "password");
    });

    $("#form-login").validate({
      rules: {
        passwd: {
          minlength: 6,
          pwcheck: true,
          required: true,
        },
        identifiant: {
          required: true,
        },
      },
      messages: {
        passwd: {
          pwcheck: "Au moins deux lettres et au moins 2 chiffres",
        },
      },
    });

    $.validator.addMethod("pwcheck", function (value, element) {
      var countNum = (value.match(/[0-9]/g) || []).length;
      var countLet = (value.match(/[a-zA-Z]/g) || []).length;
      return countNum >= 2 && countLet >= 2;
    });
  });
<?php echo '</script'; ?>
>
<?php }
}
