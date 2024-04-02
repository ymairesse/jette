$(function () {

  $("body").on("click", "#gestInscriptions", function (event) {
    testSession(event);
    $.post("inc/gestion/getCalendar4gestion.inc.php", {}, function (resultat) {
      $("#corpsPage").html(resultat);
    });
  });

  // -------------------------------------------------------------------------
  // sélection d'un utilisateur dans le sélecteur latéral gauche
  // -------------------------------------------------------------------------
  $("body").on("click", "#selectUsersInscription table tr", function (event) {
    testSession(event);

    var nbCandidat = $(".listeBenevoles .candidat").length;
    var nbToDelete = $(".listeBenevoles .toDelete").length;
    var total = nbCandidat + nbToDelete;
    if (total > 0) {
      bootbox.alert({
        title: "Attention",
        message:
          "Vous avez <strong> " +
          total +
          "</strong> modification(s) non enregistrée(s).<br>Veuillez la/les annuler.",
      });
    } else {
      var pseudo = $(this).data("pseudo");
      Cookies.set("pseudo", pseudo, { sameSite: "strict" });
      $("#selectUsersInscription table tr").removeClass("choosen");
      $(this).addClass("choosen");
      $.post(
        "inc/gestion/restoreCalendar4gestion.inc.php",
        {
          pseudo: pseudo,
        },
        function (resultat) {
          $("#calendarInscription").html(resultat);
        }
      );
    }
  });

  // -------------------------------------------------------------------------
  // Tri de la liste des noms des utilisateur dans le sélecteur
  // -------------------------------------------------------------------------

  $("body").on("click", ".btn-sortGestion", function (event) {
    testSession();
    $(".btn-sortGestion").removeClass("btn-primary");
    $(this).addClass("btn-primary");
    var sortUsers = $(this).hasClass("parNom") ? "parNom" : "parPrenom";
    Cookies.set("sortUsers", sortUsers, { sameSite: "strict" });

    var pseudo = $("table#listeUsers tr.choosen").data("pseudo");
    $.post(
      "inc/gestion/refreshListeUsers.inc.php",
      {
        pseudo: pseudo,
      },
      function (resultat) {
        $("#selectUsersInscription").html(resultat);
      }
    );
  });

  // -------------------------------------------------------
  // Navigation de mois en mois
  // -------------------------------------------------------

  $("body").on("click", ".navigationAdmin", function (event) {
    testSession(event);

    var nbCandidat = $(".listeBenevoles .candidat").length;
    var nbToDelete = $(".listeBenevoles .toDelete").length;
    var total = nbCandidat + nbToDelete;
    if (total > 0) {
      bootbox.alert({
        title: "Attention",
        message:
          "Vous avez <strong> " +
          total +
          "</strong> modification(s) non enregistrée(s).<br>Veuillez la/les annuler.",
      });
    } else {
      var gap = $(this).data("gap");
      var month = $(this).data("month");
      var year = $(this).data("year");

      month = parseInt(month) + parseInt(gap);
      if (parseInt(month) == 0) {
        month = 12;
        year = year - 1;
      }
      if (parseInt(month) == 13) {
        month = 1;
        year = year + 1;
      }

      $(".navigationAdmin").data("month", month);
      $(".navigationAdmin").data("year", year);

      Cookies.set("year", year, { sameSite: "strict" });
      Cookies.set("month", month, { sameSite: "strict" });

      $("#gestInscriptions").trigger("click");
    }
  });
  // ---------------------------------------------------------------------

  // -----------------------------------------------------------
  // Nouvelle inscription admin d'un utilisateur sélectionné
  // -----------------------------------------------------------
  $("body").on("click", "#calendarGestion .btn-inscription", function (event) {
    testSession(event);

    var ceci = $(this);
    var pseudo = $("table#listeUsers tr.choosen").data("pseudo");
    var periode = ceci.data("periode");
    var date = ceci.data("date");
    var cb = ceci.closest("td").find("input:checkbox");
    cb.prop("checked", !cb.is(":checked"));

    ceci.closest("td").toggleClass("modified");

    if (cb.is(":checked")) {
      // on vient donc de demander une inscription
      // prévoyons l'avenir
      ceci.text("Désinscription");
      ceci.removeClass("btn-success").addClass("btn-danger");

      if (ceci.closest("td").find(".toDelete").length == 1) {
        // une demande d'inscription était marquée "to delete"; on va la réactiver
        ceci.closest("td").find(".me").removeClass("toDelete");
      } else {
        // c'est une nouvelle inscription; on prévoit donc l'inscription
        // avec le bouton "rose" ajouté à la liste des bénévoles
        $.post(
          "inc/gestion/getBoutonInscr4pseudo.inc.php",
          {
            pseudo: pseudo,
          },
          function (resultat) {
            ceci.closest("td").find(".listeBenevoles").append(resultat);
          }
        );
      }
    } else {
      // le bouton n'était pas "checked"; c'est qu'on vient de demander une désinscription
      // prévoyons l'avenir
      ceci.text("Inscription");
      ceci.removeClass("btn-danger").addClass("btn-success");

      // S'il y avait un candidat (en rose), le supprimer
      if (ceci.closest("td").find(".candidat").length == 1) {
        ceci.closest("td").find(".candidat").remove();
      } else {
        // marquer une vraie inscription comme temporairement désactivée et à supprimer
        ceci.closest("td").find(".me").addClass("toDelete");
      }
    }
  });

  // ----------------------------------------------------------------
  // Remise à zéro des demandes de modification du planning
  // ----------------------------------------------------------------
  $("body").on("click", "#resetCalendarGestion", function (event) {
    testSession(event);
    // suppression de l'attribut de classe
    $(".me").removeClass("toDelete");
    // suppression de tous les boutons temporaires
    $(".candidat").remove();
    
    $("#gestInscriptions").trigger("click");
  });

  // ---------------------------------------------------------------------
  //  Enregistrement des modifications apportées au planning des permanences
  // par un admin
  // ---------------------------------------------------------------------
  $("body").on("click", "#saveCalendarGestion", function (event) {
    testSession(event);
    var month = $("input#month").val();
    var year = $("input#year").val();
    var formulaire = $("#formGrid").serialize();
    var title = "Enregistrement des permanences";
    // pseudo de l'utilisateur sélectionné
    var pseudo = $("#listeUsers tr.choosen").data("pseudo");

    $.post(
      "inc/gestion/getModifications.inc.php",
      {
        month: month,
        year: year,
        formulaire: formulaire,
        pseudo: pseudo,
      },
      function (message) {
        bootbox.confirm({
          title: title,
          message: message,
          callback: function (result) {
            if (result == true) {
              // procédure semblable mais différente de celle de la branche "inscriptions"
              $.post(
                "inc/gestion/saveCalendar.inc.php",
                {
                  month: month,
                  year: year,
                  formulaire: formulaire,
                  pseudo: pseudo,
                },
                function (message2) {
                  bootbox.alert({
                    title: title,
                    message: message2,
                  });
                  $("#resetCalendarGestion").trigger("click");
                  $("#selectUsersInscription table tr.choosen").trigger(
                    "click"
                  );
                }
              );
            }
          },
        });
      }
    );
  });

  // -------------------------------------------------------------------
  // confirme/infirme l'inscription pour une date et une période donnée
  // pour le bénévole pseudo
  // action = click sur le bouton portant un coche à droite du nom
  // -------------------------------------------------------------------
  $("body").on("click", ".btn-confirme", function (event) {
    testSession(event);
    var ceci = $(this);
    var pseudo = ceci.data("pseudo");
    var date = ceci.data("date");
    var periode = ceci.data("periode");
    // procédure qui inverse la valeur du champ "confirme"
    // pour l'inscription de l'utilisateur $pseudo
    $.post(
      "inc/gestion/checkUncheckInscription.inc.php",
      {
        pseudo: pseudo,
        date: date,
        periode: periode,
      },
      function (resultat) {
        // le resultat est la valeur actuelle du champ "confirme"
        ceci.data("confirme", resultat);
        if (resultat == 1) 
          ceci
            .closest(".btn-group")
            .find(".check")
            .html('<i class="fa fa-check"></i>');
        else ceci.closest(".btn-group").find(".check").html("");
      }
    );
  });

  // -----------------------------------------------------------------
  // confirme jusqu'à trois inscriptions pour les x premiers bénévoles
  // inscrits dans le plannig
  // action = "click" sur l'un des boutons de confirmation dans la première colonne
  // -----------------------------------------------------------------
  $("body").on("click", ".btn-confirmMulti", function (event) {
    testSession(event);
    var ceci = $(this);
    var nb = $(this).data("nombre");
    var date = $(this).closest("tr").data("date");
    var idContexte = $(this).closest("tr").data("idcontexte");
    // dans la même ligne du tableau, chercher tous les div.listeBenevoles
    ceci
      .closest("tr")
      .find(".listeBenevoles")
      .each(function (index) {
        // Pour chaque liste des bénévoles, chercher les boutons de confirmation
        var checkBtns = $(this).find(".btn-confirme");
        // si son index est <= nb -1 (la numérotation commence à 0)
        // cliquer
        checkBtns.each(function (index) {
          if (index <= nb - 1) $(this).trigger("click");
        });
      });
  });

  // ------------------------------------------------------------------
  // reset des confirmations pour jusqu'à 3 lignes
  // ------------------------------------------------------------------
  $('body').on('click', '.btn-resetMulti', function(event){
    testSession(event);
    var ceci = $(this);
    var nb = ceci.data('nombre');
    var date = ceci.closest('tr').data(date);
    var idContexte = $(this).closest("tr").data("idcontexte");
    // dans la même ligne du tableau, chercher tous les div.listeBenevoles
    // il en existe un par cellule, contenant un certain nombre de lignes
    var listeBenevoles = ceci.closest('tr').find('.listeBenevoles');
    ceci
      .closest("tr")
      .find(".listeBenevoles")
      .each(function (index) {
        // Pour chaque liste des bénévoles, chercher les boutons de confirmation
        var checkBtns = $(this).find(".btn-confirme");
        // pour chacun d'eux, si l'index de la boucle "each" est <= nb -1 
        // (noter que la numérotation commence à 0)
        // et qu'il a le statut "confirme", cliquer
        checkBtns.each(function (index) {
          if ((index <= nb - 1) && ($(this).data('confirme') == 1)){
            $(this).trigger("click");
          }           
        });
      });
  })

  // -------------------------------------------------------------------
  // Gel des inscriptions pour les différentes périodes
  // -------------------------------------------------------------------
  $('body').on('click', '#gestFreeze', function(event){
    testSession(event);
    $.post('inc/gestion/gestFreeze.inc.php', {
    }, function(resultat){
      $('#modal').html(resultat);
      $('#modalFreezes').modal('show');
    })
  })

  // ----------------------------------------------------------------
  // Enregistrement du gel des inscriptions
  // ----------------------------------------------------------------
  $('body').on('click', '#btn-modalSaveFreezes', function(event){
    testSession(event);
    var formulaire = $('#form-freezes').serialize();
    $.post('inc/gestion/saveModalFreezes.inc.php', {
      formulaire: formulaire
    }, function(nb){
      bootbox.alert({
        title: 'Enregistrement',
        message: nb + ' enregistrement(s) effectué(s)'
      })
    })
  })




});
