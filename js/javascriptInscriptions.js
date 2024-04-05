function inRange(x, min, max) {
  return (x - min) * (x - max) <= 0;
}

$(function () {
  // --------------------------------------------------------
  //  Présentation du calendrier planning
  // --------------------------------------------------------
  $("body").on("click", "#gestCalendrier", function (event) {
    testSession(event);
    var today = new Date();

    if (
      Cookies.get("month") == undefined ||
      !inRange(Cookies.get("month"), 1, 12)
    )
      month = today.getMonth() + 1;
    else month = Cookies.get("month");

    // penser à trouver une autre solution avant l'an 2100
    if (
      Cookies.get("year") == undefined ||
      !inRange(Cookies.get("year"), 1900, 2100)
    )
      year = today.getFullYear();
    else year = Cookies.get("year");

    $.post(
      "inc/inscriptions/getCalendar.inc.php",
      {
        month: month,
        year: year,
      },
      function (resultat) {
        $("#corpsPage").html(resultat);
      }
    );
  });

  // -------------------------------------------------------
  // Navigation de mois en mois
  // -------------------------------------------------------

  $("body").on("click", ".navigation", function (event) {
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

      $(".navigation").data("month", month);
      $(".navigation").data("year", year);

      Cookies.set("year", year, { sameSite: "strict" });
      Cookies.set("month", month, { sameSite: "strict" });

      $("#gestCalendrier").trigger("click");
    }
  });
  // ---------------------------------------------------------------------

  // --------------------------------------------------------
  // retour au mois actuel
  // --------------------------------------------------------
  $("body").on("click", "#btn-today", function (event) {
    testSession(event);
    var month = $(this).data("month");
    var year = $(this).data("year");

    Cookies.set("year", year, { sameSite: "strict" });
    Cookies.set("month", month, { sameSite: "strict" });

    $("#gestCalendrier").trigger("click");
  });

  // ---------------------------------------------------------------------

  // ------------------------------------------------
  // inscription à une permanence par un bénévole
  // ------------------------------------------------
  $("body").on("click", "#calendar .btn-inscription", function (event) {
    testSession(event);
    var ceci = $(this);
    var periode = ceci.data("periode");
    var date = ceci.data("date");
    var cb = ceci.closest("td").find("input:checkbox");
    cb.prop("checked", !cb.is(":checked"));

    ceci.closest("td").toggleClass("modified");

    // on inverse les boutons d'inscription et désinscription
    ceci.closest("td").find(".btn-inscription[data-inscription").toggle();

    if (cb.is(":checked")) {
      // on vient de demander une inscription,

      if (ceci.closest("td").find(".toDelete").length == 1) {
        // le cas échéant, réactiver l'inscription temporairement désactivée
        ceci.closest("td").find(".me").removeClass("toDelete");
      } else {
        // si nécessaire, ajouter un bouton en attente d'enregistrement pour cette inscription
        $.post(
          "inc/inscriptions/getBoutonInscr4user.inc.php",
          {},
          function (resultat) {
            ceci.closest("td").find(".listeBenevoles").append(resultat);
          }
        );
      }
    } else {
      // on vient de demander une désinscription
      // supprimer une éventuelle inscription en attente
      if (ceci.closest("td").find(".candidat").length == 1) {
        ceci.closest("td").find(".candidat").remove();
      } else {
        // marquer une véritable inscription comme temporairement désactivée
        ceci.closest("td").find(".me").addClass("toDelete");
      }
    }
  });

  // Report de l'inscription sur plusieurs journées
  $("body").on("click", ".btn-report", function (event) {
    testSession(event);
    var jourSemaine = $(this).data("joursemaine");
    var nomJour = $(this).data("nomjour");
    var date = $(this).closest("tr").data("date");
    var monthName = $("input#monthName").val();
    bootbox.confirm({
      title: "Report des inscriptions",
      message:
        "Veuille confirmer le report de vos inscriptions sur tous les<br><strong>" +
        nomJour +
        "</strong><br> du mois de <br><strong>" +
        monthName +
        "</strong>",
      callback: function (result) {
        if (result == true) {
          var listeCheckBoxes = $('input:checkbox[data-date="' + date + '"]');
          var modeleJour = {};
          listeCheckBoxes.each(function (i) {
            var ch = $(this).is(":checked") ? 1 : 0;
            // les numéros des périodes commencent à 1; il faut donc incrémenter de 1 les valeurs de i
            modeleJour[i + 1] = ch;
          });

          var n = 0;
          var listeAll4Month = $(
            'input:checkbox[data-jourSemaine="' + jourSemaine + '"]'
          );
          // recopier le modèle de journée dans les jours semaine suivants
          listeAll4Month.each(function (i) {
            // à quelle période de la journée sommes-nous sur le checkbox?
            var periode = $(this).data("periode");
            // parmi les checkboxes du même jour que l'originale,
            // attribuer la valeur trouvée dans le modèle pour cette période si pas déjà checked
            if ($(this).prop("checked") == false && modeleJour[periode] == 1) {
              // cliquer sur le bouton d'inscription de cette cellule
              $(this)
                .closest("td")
                .find('.btn-inscription[data-inscription="1"]')
                .trigger("click");
              n++;
            }
          });
        }
      },
    });

    console.log(jourSemaine, nomJour);
  });
  // ---------------------------------------------------------------------

  // ---------------------------------------------------------------------
  //  Enregistrement des modifications apportées au planning des permanences
  // ---------------------------------------------------------------------
  $("body").on("click", "#saveCalendar", function (event) {
    testSession(event);
    var month = $("input#month").val();
    var year = $("input#year").val();
    var formulaire = $("#formGrid").serialize();
    var title = "Enregistrement";

    $.post(
      "inc/inscriptions/getModifications.inc.php",
      {
        month: month,
        year: year,
        formulaire: formulaire,
      },
      function (message) {
        bootbox.confirm({
          title: title,
          message: message,
          callback: function (result) {
            if (result == true) {
              $.post(
                "inc/inscriptions/saveCalendar.inc.php",
                {
                  month: month,
                  year: year,
                  formulaire: formulaire,
                },
                function (message2) {
                  $("#gestCalendrier").trigger("click");
                }
              );
            }
          },
        });
      }
    );
  });

  // ----------------------------------------------------------
  // Annulation des inscriptions en attente de confirmation
  // ----------------------------------------------------------
  $("body").on("click", "#resetCalendar", function () {
    $("#gestCalendrier").trigger("click");
  });

  //--------------------------------------------------------------------------
});
