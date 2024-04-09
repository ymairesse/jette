<?php
/* Smarty version 4.3.1, created on 2024-04-09 14:22:22
  from '/home/yves/www/newOxfam/templates/users/modal/modalEditUser.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_661532fe5dd3a9_42967638',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'add4ecb9c3367630f0d84beb0c8c370320c3f93e' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/users/modal/modalEditUser.tpl',
      1 => 1712664393,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661532fe5dd3a9_42967638 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- modal -->
<div
  class="modal fade"
  id="modalEditUser"
  data-bs-backdrop="static"
  data-bs-keyboard="false"
  tabindex="-1"
  aria-labelledby="modalEditUserLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 w-100" id="modalEditUserLabel">Fiche Utilisateur</h1>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">

        <form id="modalFormUser" autocomplete="false">

          <div class="row">
            <div class="pb-3 col-2">
              <label for="civilite">
                <i class="fa fa-female" aria-hidden="true"></i> 
                <i class="fa fa-male" aria-hidden="true"></i> 
                <i class="fa fa-genderless" aria-hidden="true"></i>
              </label>
              <select name="civilite" id="civilite" class="form-control">
                <option value="">Choisir</option>
                <option value="F"<?php if ($_smarty_tpl->tpl_vars['dataUser']->value['civilite'] == 'F') {?> selected<?php }?>>Madame</option>
                <option value="M"<?php if ($_smarty_tpl->tpl_vars['dataUser']->value['civilite'] == 'M') {?> selected<?php }?>>Monsieur</option>
                <option value="X"<?php if ($_smarty_tpl->tpl_vars['dataUser']->value['civilite'] == 'X') {?> selected<?php }?>>MX</option>
              </select>
              
            </div>
            <div class="form-group pb-3 col-4">
              <label for="nom">
                  Nom
              </label>
              <input
                type="text"
                class="form-control"
                name="nom"
                id="nom"
                value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['dataUser']->value['nom'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"
                autocomplete="off"
                placeholder="Nom"
              />
            </div>
            <div class="form-group pb-3 col-4">
              <label for="prenom">
                Prénom
              </label>
              <input
                type="text"
                class="form-control"
                name="prenom"
                id="prenom"
                value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['dataUser']->value['prenom'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"
                autocomplete="off"
                placeholder="Prénom"
              />
            </div>

            <div class="form-group pb-3 col-2">

              <label for="approuve">Approuvé</label>
              <input type="hidden" id="approuve" name="approuve" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['dataUser']->value['approuve'] ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
">
              <div class="btn-group" role="group" aria-label="Approuvé">
                <button 
                  type="button" 
                  class="btn btn-approuve <?php if ($_smarty_tpl->tpl_vars['dataUser']->value['approuve'] == 1) {?>btn-success<?php } else { ?>btn-outline-success<?php }?>" 
                  data-value="1"
                  <?php if ($_smarty_tpl->tpl_vars['dataUser']->value['pseudo'] == $_smarty_tpl->tpl_vars['self']->value['pseudo']) {?> disabled title="Vous ne pouvez pas modifier cet item"<?php }?>>
                  Oui
                </button>
                <button 
                  type="button" 
                  class="btn btn-approuve <?php if ($_smarty_tpl->tpl_vars['dataUser']->value['approuve'] == 0) {?>btn-danger<?php } else { ?>btn-outline-danger<?php }?>" 
                  data-value="0"
                  <?php if ($_smarty_tpl->tpl_vars['dataUser']->value['pseudo'] == $_smarty_tpl->tpl_vars['self']->value['pseudo']) {?> disabled title="Vous ne pouvez pas modifier cet item"<?php }?>>
                  Non
                </button>
              </div>
              <?php if ($_smarty_tpl->tpl_vars['dataUser']->value['pseudo'] == $_smarty_tpl->tpl_vars['self']->value['pseudo']) {?>
              <span class="helpBlock form-text">Non modifiable</span>
              <?php }?>
   
            </div>

            <div class="form-group pb-3 col-3">
              <label for="pseudo"><i class="fa fa-user-secret"></i> Pseudo</label>
              <input type="text"
              class="form-control"
              name="pseudo"
              id="pseudo"
              value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['dataUser']->value['pseudo'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"
              autocomplete="off"
              readonly
              >
              <div class=">helpBlock form-text">Non modifiable</div>
            </div>

            <div class="form-group pb-3 col-3">
              <label for="pwd">M. passe</label>
              <div class="input-group mb-3">
                <span class="input-group-text addonMdp"><i class="fa fa-eye"></i></span>
                  <input type="password" 
                    class="form-control" 
                    name="pwd" 
                    id="pwd" 
                    autocomplete="off" 
                    value="" 
                    placeholder="Laisser vide si inchangé" 
                    aria-describedby="addonMdp">
              </div>
            </div>

            <div class="form-group pb-3 col-3">
              <label for="pwd2">M. passe (encore)</label>
              <div class="input-group mb-3">
                <span class="input-group-text addonMdp"><i class="fa fa-eye"></i></span>
            <input type="password" 
              class="form-control" 
              name="pwd2" 
              id="pwd2" 
              autocomplete="off" 
              value="" 
              placeholder="Laisser vide si inchangé" 
              aria-describedby="addonMdp">
              </div>
            </div>

            <div class="form-group pb-3 col-3">
              <label for="experience">Expérience</label>
              <select name="experience" id="experience" class="form-control">
                <option value="0"<?php if ($_smarty_tpl->tpl_vars['dataUser']->value['experience'] == 0) {?> selected<?php }?>>De base</option>
                <option value="1"<?php if ($_smarty_tpl->tpl_vars['dataUser']->value['experience'] == 1) {?> selected<?php }?>>Bonne</option>
                <option value="2"<?php if ($_smarty_tpl->tpl_vars['dataUser']->value['experience'] == 2) {?> selected<?php }?>>Très bonne</option>
              </select>
            </div>

            <div class="form-group pb-3 col-4">
              <label for="droits"><i class="fa fa-user-plus" aria-hidden="true"></i> Droits
              </label>
              <!-- Il est impossible de modifier ses propres droits -->
              <?php if ($_smarty_tpl->tpl_vars['self']->value['pseudo'] == $_smarty_tpl->tpl_vars['dataUser']->value['pseudo']) {?>
              <input type="text" id="droits" name="droits" class="form-control" readonly value="<?php echo $_smarty_tpl->tpl_vars['dataUser']->value['droits'];?>
">
              <span class="form-text">Non modifiable par vous</span>
              <?php } else { ?> 
              <select name="droits" class="form-control" id="droits">
                <option value="oxfam" <?php if ($_smarty_tpl->tpl_vars['dataUser']->value['droits'] == "oxfam") {?>selected<?php }?>>oxfam</option>
                <option value="admin" <?php if ($_smarty_tpl->tpl_vars['dataUser']->value['droits'] == "admin") {?>selected<?php }?>>admin</option>
              </select>
              <?php }?>

            </div>
            
            <div class="form-group pb-3 col-6 col-md-4">
              <label for="mail">
                <i class="fa fa-send" aria-hidden="true"></i> Mail
              </label
              >
              <input
                type="mail"
                class="form-control"
                name="mail"
                id="mail"
                value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['dataUser']->value['mail'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"
                autocomplete="off"
                placeholder="Adresse mail"
              />
            </div>

             <div class="form-group pb-3 col-6 col-md-4">
              <label for="telephone"
                ><i class="fa fa-phone" aria-hidden="true"></i> 
                Téléphone
                </label
              >
              <input
                type="text"
                class="form-control contact phone"
                name="telephone"
                id="telephone"
                value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['dataUser']->value['telephone'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"
                autocomplete="off"
                placeholder="Téléphone"
              />
            </div>

          <div class="form-group pb-3 col-6 col-md-5">
            <label for="adresse">
              Adresse
            </label>
            <input
              type="text"
              class="form-control"
              name="adresse"
              id="adresse"
              value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['dataUser']->value['adresse'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"
              autocomplete="off"
              placeholder="Adresse rue / numéro"
            />
            <div id=">adresseHelpBlock" class="form-text">Optionnel</div>
          </div>

          <div class="form-group pb-3 col-5 col-md-3">
            <label for="cpost">
              Code postal
            </label>
            <input
              type="text"
              class="form-control"
              name="cpost"
              id="cpost"
              value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['dataUser']->value['cpost'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"
              autocomplete="off"
              placeholder="Code Postal"
            />
            <div id="cpostHelpBlock" class="form-text">Optionnel</div>
          </div>
          
            <div class="form-group pb-3 col-7 col-md-4">
              <label for="commune">
                Commune
              </label>
              <input
                type="text"
                class="form-control"
                name="commune"
                id="commune"
                value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['dataUser']->value['commune'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"
                autocomplete="off"
                placeholder="Commune"
              />
              <div id="communeHelpBlock" class="form-text">Optionnel</div>
            </div>
           
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          Annuler
        </button>
        <button type="button" class="btn btn-primary" id="btn-modalSaveProfile">Enregistrer</button>
      </div>
    </div>
  </div>
</div>

<style>

  div.error {
    color: red;
  }

</style>

<?php echo '<script'; ?>
>

  function phoneFormatter() {
      $('.phone').on('input', function() {
        var number = $(this).val().replace(/[^\d+]/g, '')
        if (number.length == 9) {
            var pfx = number.substr(0,2);
            var no = number.substr(2,)
            number = pfx + " " + no;
        } else if (number.length == 10) {
            var pfx = number.substr(0,4);
            var no = number.substr(4,)
            number = pfx + " " + no;
        }
        $(this).val(number)
      });
    };

  $(document).ready(function () {

    $(phoneFormatter);

    $('.btn-approuve').click(function() {
      var value = $(this).data('value');
      $('#approuve').val(value);
      if (value == 1) {
        $('.btn-approuve[data-value="1"]').addClass('btn-success').removeClass('btn-outline-success');
        $('.btn-approuve[data-value="0"]').addClass('btn-outline-danger').removeClass('btn-danger');
      }
      else {
        $('.btn-approuve[data-value="0"]').addClass('btn-danger').removeClass('btn-outline-danger');
        $('.btn-approuve[data-value="1"]').addClass('btn-outline-success').removeClass('btn-success');
        }
    });

    $("#modalFormUser").validate({
      lang: "fr",
      errorElement: "div",
      rules: {
        nom: {
          required: true,
        },
        prenom: {
          required: true,
        },
        telephone: {
          required: true,
        },
          pwd: {
          required: false,
          minlength: 6,
          pwcheck: true,
        },
        pwd2: {
          equalTo: "#pwd",
        },
        mail: {
          required: true,
          email: true,
        },
        droits: {
          required: true,
        }
      },
      errorPlacement: function (error, element) {
        if (element.parent().hasClass("input-group")) {
          error.insertAfter(element.parent(".input-group"));
        } else {
          error.insertAfter(element);
        }
      },
      messages: {
        pwd: {
          pwcheck: "Au moins deux lettres et au moins 2 chiffres",
        },
      },
    });

    $.validator.addMethod("pwcheck", function (value, element) {
      var countNum = (value.match(/[0-9]/g) || []).length;
      var countLet = (value.match(/[a-zA-Z]/g) || []).length;
      // un mot de passe n'est pas obligatoire pour un compte déjà défini
      var pseudo = $('#pseudo').val();
      if ((element.value == "") && (pseudo != "")) return true;
      else return countNum >= 2 && countLet >= 2;
    });

  });
<?php echo '</script'; ?>
>
<?php }
}
