$(function () {
  //----------------------------------------------------------------
  // profil et gestion de l'utilisateur actif
  //----------------------------------------------------------------
  $("body").on("click", "#editProfilPerso", function (event) {
    testSession(event);
    $.post("inc/users/getOwnUserProfile.inc.php", {}, function (resultat) {
      $("#modal").html(resultat);
      $("#modalEditUser").modal("show");
    });
  });

  //----------------------------------------------------------------
  // enregistre le profil de l'utilisateur actif depuis la boîte modale
  //----------------------------------------------------------------
  $("body").on("click", "#btn-modalSaveProfile", function (event) {
    testSession(event);
    if ($("#modalFormUser").valid()) {
      var formulaire = $("#modalFormUser").serialize();
      var pseudo = $("#modalFormUser input#pseudo").val();
      $.post(
        "inc/users/saveUserOxfam.inc.php",
        {
          formulaire: formulaire,
        },
        function (resultat) {
          $("#modalEditUser").modal("hide");
          bootbox.alert({
            title: "Enregistrement",
            message:
              resultat > 0
                ? "Modification enregistrée"
                : "Aucune modification effectuée",
          });
          // si la liste des utilisateurs est visible à l'écran
          // c'est qu'on est en mode "admin"
          if ($("table#listeUsers") != null) {
            Cookies.set("pseudo", pseudo, { sameSite: "strict" });
            $("#gestUsers").trigger("click");
          }
        }
      );
    }
  });

  //----------------------------------------------------------------
  // gestion des utilisateurs OXFAM par un admin
  //----------------------------------------------------------------

  // gestion des utilisateurs OXFAM: visualisation de la liste
  $("body").on("click", "#gestUsers", function (event) {
    testSession(event);
    var pseudo =
      Cookies.get("pseudo") != undefined ? Cookies.get("pseudo") : null;
    $.post(
      "inc/users/getUsersProfiles.inc.php",
      {
        pseudo: pseudo,
      },
      function (resultat) {
        $("#corpsPage").html(resultat);
        var pseudo = $("#selectUsers4Users table tr.choosen").data("pseudo");
        $('#selectUsers4Users table tr[data-pseudo="' + pseudo + '"]').trigger(
          "click"
        );
      }
    );
  });

  // sélection d'un utilisateur dans le sélecteur latéral gauche
  $("body").on("click", "#selectUsers4users table tr", function (event) {
    testSession(event);
    // récupérer le pseudo de l'utilisateur
    var pseudo = $(this).data("pseudo");
    // positionner le Cookie
    Cookies.set("pseudo", pseudo, { sameSite: "strict" });
    // envoi des informations dans la div#ficheProfil à droite
    $.post(
      "inc/users/getRandomUserProfile.inc.php",
      {
        pseudo: pseudo,
      },
      function (resultat) {
        $("#ficheProfil").html(resultat);
        // confirmer la (nouvelle) sélection dans la colonne des utilisateurs
        $("#listeUsers tr").removeClass("choosen");
        $('#listeUsers tr[data-pseudo="' + pseudo + '"]').addClass("choosen");
      }
    );
  });

  // choix du tri des utilisateurs
  $("body").on("click", ".btn-sortGestion", function (event) {
    testSession();
    $(".btn-sortGestion").removeClass("btn-primary");
    $(this).addClass("btn-primary");
    var sortUsers = $(this).hasClass("parNom") ? "parNom" : "parPrenom";
    Cookies.set("sortUsers", sortUsers, { sameSite: "strict" });

    var pseudo = $("table#listeUsers tr.choosen").data("pseudo");
    $.post(
      "inc/users/refreshListeUsers.inc.php",
      {
        pseudo: pseudo,
        sortUsers: sortUsers,
      },
      function (resultat) {
        $("#selectUsers4users").html(resultat);
      }
    );
  });

  // gestion du profil d'un utilisateur lambda par un admin
  $("body").on(
    "click",
    "#btn-editUserProfile, .openModal",
    function (event) {
      testSession(event);
      var pseudo = $("input#pseudo").val();
      // edition dans la modale #modalEditUser
      $.post(
        "inc/users/editUser.inc.php",
        {
          pseudo: pseudo,
        },
        function (resultat) {
          $("#modal").html(resultat);
          $("#modalEditUser").modal("show");
        }
      );
    }
  );

  // ----------------------------------------------------------
  // auto-création d'un nouveau compte depuis la navbar
  // ----------------------------------------------------------
  $("body").on("click", "#creationCompte", function () {
    $.post("inc/users/modalNewUser.inc.php", {}, function (resultat) {
      $("#modal").html(resultat);
      $("#modalAutoInscription").modal("show");
    });
  });

  // --------------------------------------------------------
  // Enregistrement d'un nouvel utilisateur OXFAM
  // --------------------------------------------------------
  $("body").on("click", "#btn-modalAutoSaveUser", function () {
    if ($("#modalFormInscription").valid()) {
      var formulaire = $("#modalFormInscription").serialize();
      $.post(
        "inc/users/saveNewUserOxfam.inc.php",
        {
          formulaire: formulaire,
        },
        function (resultatJSON) {
          $("#modalAutoInscription").modal("hide");

          var resultat = JSON.parse(resultatJSON);
          var pseudo = resultat["form"]["pseudo"];
          var mail = resultat["form"]["mail"];
          var prenom = resultat["form"]["prenom"];
          var title = "Inscription MDM Oxfam";
          var message = "";
          switch (resultat["nb"]) {
            case 1:
              var message =
                "Bienvenue <strong>" +
                prenom +
                "</strong>, vous recevrez bientôt un mail de confirmation de votre demande d'inscription à l'adresse <strong>" +
                mail +
                "</strong>";
              break;
            case 0:
              var message =
                "<span style='color:red'><i class='fa fa-exclamation-triangle fa-2x'></i> Quelque chose ne s'est pas bien passé.<br>Veuillez contacter un·e admin de la plateforme.</span>";
              break;
            case -1:
              message =
                "<span style='color:red'><i class='fa fa-exclamation-triangle fa-2x'></i> Le mail de confirmation n'a pas été envoyé.<br>Veuillez contacter un·e admin de la plateforme.</span>";
              break;
          }

          bootbox.alert({
            title: title,
            message: message,
            callback: function () {
              // si la liste des utilisateurs est visible à l'écran
              // (cas de l'inscription par un admin)
              if ($("table#listeUsers").length == 1) {
                $.post(
                  "inc/users/refreshListeUsers.inc.php",
                  {
                    pseudo: pseudo,
                  },
                  function (resultat) {
                    $("#selectUsers4users").html(resultat);
                    $(
                      'table#listeUsers tr[data-pseudo="' + pseudo + '"]'
                    ).trigger("click");
                  }
                );
              }
            },
          });
        }
      );
    }
  });

  // --------------------------------------------------------
  // Suppression d'un utilisateur
  // --------------------------------------------------------
  $("body").on("click", "#btn-delUser", function (event) {
    testSession(event);
    var pseudo = $("table#listeUsers tr.choosen").data("pseudo");
    var nom = $('#listeUsers tr[data-pseudo="' + pseudo + '"] td')
      .eq(0)
      .text()
      .trim();

    bootbox.confirm({
      title: "Suppression d'un utilisateur",
      message:
        "Veuillez confirmer la suppression définitive de<br><b>" + nom + "</b>",
      callback: function (result) {
        if (result == true) {
          $.post(
            "inc/users/deleteUser.inc.php",
            {
              pseudo: pseudo,
            },
            function (resultat) {
              if (resultat == -1)
                bootbox.alert({
                  title: "Suppression d'un utilisateur",
                  message:
                    "Vous ne pouvez pas supprimer votre propre inscription",
                });
              else
                $.post(
                  "inc/users/refreshListeUsers.inc.php",
                  {
                    pseudo: null,
                  },
                  function (resultat) {
                    $("#selectUsers4users").html(resultat);
                    $("table#listeUsers tr.choosen").trigger("click");
                  }
                );
            }
          );
        }
      },
    });
  });

  // --------------------------------------------------------------
  // gestion des mails
  // --------------------------------------------------------------
  $('body').on('click', '#btn-mail', function(event){
    testSession(event);

    $.post('inc/users/getModalMail.inc.php', {}, 
        function(resultat){
            $('#modal').html(resultat);
            $('#modalMail').modal('show');
    })
})

$('body').on('click', '#btn-copyCb', function(event){
  testSession(event);

  var allAdresses = '';
  var nb = 0;
  $(".cbMail").each(function () {
      if ($(this).prop("checked") == true) {
      allAdresses += $(this).data('nomprenom')+ ' <' + $(this).val() + '>, \n';
      nb++;
      }
  });
  $('#listeMails').text(allAdresses);
  $('#listeMails').select();
  document.execCommand("copy");
      
  bootbox.alert({
      title: nb + ' adresse(s) <strong>Copiée(s)</strong>',
      message: 'Vous pouvez maintenant les <strong>Coller</strong> dans votre mail',
      backdrop: false,
  })
})
  
});
