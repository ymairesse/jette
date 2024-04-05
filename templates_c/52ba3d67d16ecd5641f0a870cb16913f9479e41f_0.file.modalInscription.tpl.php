<?php
/* Smarty version 4.3.1, created on 2024-04-05 13:19:26
  from '/home/yves/www/newOxfam/templates/users/modal/modalInscription.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_660fde3e7eccf7_75762055',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '52ba3d67d16ecd5641f0a870cb16913f9479e41f' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/users/modal/modalInscription.tpl',
      1 => 1711975600,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660fde3e7eccf7_75762055 (Smarty_Internal_Template $_smarty_tpl) {
?><div
  class="modal fade"
  id="modalAutoInscription"
  tabindex="-1"
  aria-labelledby="modalAutoInscriptionLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalAutoInscriptionLabel">
          Inscription à la plateforme des bénévoles
        </h1>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">

        <form id="modalFormInscription" class="form">

          <form autocomplete="false" id="modalFormUser">

          <div class="row">
            <div class="pb-3 col-2">
              <label for="civilite">
                <i class="fa fa-female" aria-hidden="true"></i> 
                <i class="fa fa-male" aria-hidden="true"></i> 
                <i class="fa fa-genderless" aria-hidden="true"></i>
              </label>
              <select name="civilite" id="civilite" class="form-control">
                <option value="">Select</option>
                <option value="F"<?php if ($_smarty_tpl->tpl_vars['dataUser']->value['civilite'] == 'F') {?> selected<?php }?>>Madame</option>
                <option value="M"<?php if ($_smarty_tpl->tpl_vars['dataUser']->value['civilite'] == 'M') {?> selected<?php }?>>Monsieur</option>
                <option value="X"<?php if ($_smarty_tpl->tpl_vars['dataUser']->value['civilite'] == 'X') {?> selected<?php }?>>MX</option>
              </select>
              
            </div>
            <div class="form-group pb-3 col-5">
              <label for="nom">
                  Nom
              </label>
              <input
                type="text"
                class="form-control nomPrenom"
                name="nom"
                id="nom"
                value=""
                autocomplete="off"
                placeholder="Nom"
              />
            </div>
            <div class="form-group pb-3 col-5">
              <label for="prenom">
                Prénom
              </label>
              <input
                type="text"
                class="form-control nomPrenom"
                name="prenom"
                id="prenom"
                value=""
                autocomplete="off"
                placeholder="Prénom"
              />
            </div>

            <div class="form-group pb-3 col-4">
              <label for="pseudo"><i class="fa fa-user-secret"></i> Pseudo</label>
              <input type="text"
              class="form-control"
              name="pseudo"
              id="pseudo"
              autocomplete="off"
              value=""
              readonly
              >
              <small id="pseudoExiste" class="form-text text-muted">
              </small>
            </div>

            <div class="form-group pb-3 col-4">
              <label for="password">Mot de passe</label>
              <div class="input-group mb-3">
                <span class="input-group-text addonMdp"><i class="fa fa-eye"></i></span>
                  <input type="password" 
                    class="form-control" 
                    name="pwd" 
                    id="pwd" 
                    autocomplete="off" 
                    value="" 
                    placeholder="Au moins 6 caractères" 
                    aria-describedby="addonMdp">
              </div>
            </div>

            <div class="form-group pb-3 col-4">
                <label for="password">Mot de passe (encore)</label>
                <div class="input-group mb-3">
                  <span class="input-group-text addonMdp"><i class="fa fa-eye"></i></span>
                    <input type="password" 
                      class="form-control" 
                      name="pwd2" 
                      id="pwd2" 
                      autocomplete="off" 
                      value="" 
                      placeholder="Au moins 6 caractères" 
                      aria-describedby="addonMdp">
                </div>
              </div>
            

            <div class="form-group pb-3 col-6 col-md-7  ">
              <label for="mail">
                <i class="fa fa-send" aria-hidden="true"></i> Mail
              </label
              >
              <input
                type="mail"
                class="form-control"
                name="mail"
                id="mail"
                value=""
                autocomplete="off"
                placeholder="Adresse mail"
              />
            </div>

            <div class="form-group pb-3 col-6 col-md-5">
              <label for="telephone"
                ><i class="fa fa-mobile" aria-hidden="true"></i> 
                Téléphone
                </label
              >
              <input
                type="text"
                class="form-control contact phone"
                name="telephone"
                id="telephone"
                value=""
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
              value=""
              autocomplete="off"
              placeholder="Adresse rue / numéro"
            />
            <div class="form-text helpBlock">Optionnel</div>
          </div>

          <div class="form-group pb-3 col-5 col-md-3">
            <label for="cpost">
              Code postal (optionnel)
            </label>
            <input
              type="text"
              class="form-control"
              name="cpost"
              id="cpost"
              value=""
              autocomplete="off"
              placeholder="Code Postal"
            />
            <div class="form-text helpBlock">Optionnel</div>
          </div>
          
            <div class="form-group pb-3 col-7 col-md-4">
              <label for="commune">
                Commune (optionnel)
              </label>
              <input
                type="text"
                class="form-control"
                name="commune"
                id="commune"
                value=""
                autocomplete="off"
                placeholder="Commune"
              />
              <div class="form-text helpBlock">Optionnel</div>
            </div>
           
        </form>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          Fermer
        </button>
        <button type="button" class="btn btn-primary" id="btn-modalAutoSaveUser">
          Je demande mon inscription
        </button>
      </div>
    </div>
  </div>
</div>

<style>

    div.error {
      color: red;
    }

    #pseudo {
    background-color: pink;
    font-size: 14pt;
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

    $.validator.addMethod("lettresEtSymboles", function(value, element) {
    // Expression régulière pour vérifier si le champ contient au moins 2 lettres et au plus 2 symboles non alphanumériques
    var lettreRegex = /.*[a-zA-Z].*[a-zA-Z]/;
    var symboleRegex = /[^a-zA-Z0-9]/g;
    var symboles = value.match(symboleRegex);
    var nombreSymboles = symboles ? symboles.length : 0;
    return lettreRegex.test(value) && nombreSymboles <= 2;
}, "Au moins deux lettres et au plus deux symboles.");

  $(document).ready(function () {

    $(phoneFormatter);

    $("#modalFormInscription").validate({
      rules: {
        nom: {
          required: true,
          minlength: 2,
        },
        prenom: {
          required: true,
          minlength: 2,
        },
        mail: {
          required: true,
          email: true,
        },
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
        telephone: {
          required: true,
        }
      },
    });




  // ----------------------------------------------------------
  // génération du pseudo
  // ----------------------------------------------------------
  $(".nomPrenom").on("keyup", function () {
    var nom = $("#nom").val();
    var prenom = $("#prenom").val();
    $.post(
      "inc/users/pseudoFromNomPrenom.inc.php",
      {
        nom: nom,
        prenom: prenom,
      },
      function (resultatJSON) {
        var resultat = JSON.parse(resultatJSON);
        $("#pseudo").val(resultat["pseudo"]);
        if (resultat["pseudoExiste"] == true) {
          $("#pseudoExiste").text("Ce pseudo existe déjà");
          $('#btn-modalSaveUser').attr('disabled', true);
          $('#pseudoExiste').removeClass('text-muted').addClass('text-danger');

        } else {
            $("#pseudoExiste").text("OK");
            $('#btn-modalSaveUser').attr('disabled', false);
          $('#pseudoExiste').removeClass('text-danger').addClass('text-muted');
        }
      }
    );
  });

  });
<?php echo '</script'; ?>
>
<?php }
}