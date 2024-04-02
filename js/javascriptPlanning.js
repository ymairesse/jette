$(function () {
  // ---------------------------------------------------
  // périodes de permanences en fonction des ères
  // ---------------------------------------------------

  $("body").on("click", "#gestPeriodes", function (event) {
    testSession(event);
    $.post(
      "inc/planning/gestPeriodesPlanning.inc.php",
      {},
      function (resultat) {
        $("#corpsPage").html(resultat);
      }
    );
  });

  // ---------------------------------------------------
  // sélection d'une "époque" dans la colonne de gauche
  // ---------------------------------------------------
  $("body").on("click", "table#listeContextes tr", function (event) {
    testSession(event);
    var idContexte = $(this).data("idcontexte");
    $("table#listeContextes tr").removeClass("choosen");
    $(this).addClass("choosen");
    Cookies.set("idContexte", idContexte, { sameSite: "strict" });
    var date = $(this).data("date");
    $.post(
      "inc/planning/getPermanences4Contexte.inc.php",
      {
        idContexte: idContexte,
      },
      function (resultat) {
        $("#detailsPermanences").html(resultat);
      }
    );
  });

  // ----------------------------------------------------
  // édition d'une permanence
  // -----------------------------------------------
  $("body").on("click", ".btn-editPermanence", function (event) {
    testSession(event);
    var idContexte = $(this).closest("tr").data("idcontexte");
    var numeroPermanence = $(this).closest("tr").data("numeropermanence");

    $.post(
      "inc/planning/modalEditPermanence.inc.php",
      {
        idContexte: idContexte,
        numeroPermanence: numeroPermanence,
      },
      function (resultat) {
        $("#modal").html(resultat);
        $("#modalEditPermanence").modal("show");
      }
    );
  });

  // -----------------------------------------------------
  // Enregistrement d'une permanence
  // -----------------------------------------------------
  $("body").on("click", "#btn-modalSavePeriodePermanence", function (event) {
    testSession(event);
    var formulaire = $("#formEditPermanence").serialize();
    var idContexte = $('#formEditPermanence input[name="idContexte"]').val();
    $.post(
      "inc/planning/saveModalPermanence.inc.php",
      {
        formulaire: formulaire,
      },
      function (resultat) {
        bootbox.alert({
          title: "Enregistrement",
          message: resultat + " enregistrement OK",
        });
        $("#modalEditPermanence").modal("hide");
        $(
          'table#listeContextes tr[data-idContexte="' + idContexte + '"]'
        ).trigger("click");
      }
    );
  });

  // ----------------------------------------------------
  // Ajout d'une époque
  // ----------------------------------------------------
  $("body").on("click", "#btn-addContexte", function (event) {
    testSession(event);
    $.post(
      "inc/planning/modalDefineNewContexte.inc.php",
      {},
      function (resultat) {
        $("#modal").html(resultat);
        $("#modalNewContexte").modal("show");
      }
    );
  });

  // ---------------------------------------------------
  // Enregistrement de la date initiale de la nouvelle époque
  // ---------------------------------------------------
  $("body").on("click", "#btn-modalSaveNewContexte", function (event) {
    testSession(event);
    if ($("#formNewContexte").valid()) {
      var date = $("#formNewContexte input#dateDebutContexte").val();
      var formulaire = $("#formNewContexte").serialize();
      $.post(
        "inc/planning/saveDateContexte.inc.php",
        {
          formulaire: formulaire,
        },
        function (idContexte) {
          if (idContexte > 0) $("#modalNewContexte").modal("hide");
          bootbox.alert({
            title: "Enregistrement",
            message: "Nouvelle époque créée",
            callback: function () {
              // sélection de la nouvelle "époque"
              Cookies.set("idContexte", idContexte, { sameSite: "strict" });
              // rafraîchissement de l'écran
              $("#gestPeriodes").trigger("click");
            },
          });
        }
      );
    }
  });

  // ----------------------------------------------------
  // Ajout d'une période de permanence dans un planning
  // ----------------------------------------------------
  $("body").on("click", "#btn-addPermanence", function (event) {
    testSession(event);
    var idContexte = $("table#listeContextes tr.choosen").data("idcontexte");
    bootbox.prompt({
      title: "Ajouter des permanences",
      message: "Combien de permanences faut-il ajouter?",
      inputType: "select",
      inputOptions: [
        {
          text: "Choisissez dans la liste",
          value: "",
        },
        {
          text: "1 permanence",
          value: "1",
        },
        {
          text: "2 permanences",
          value: "2",
        },
        {
          text: "3 permanences",
          value: "3",
        },
        {
          text: "4 permanences",
          value: "4",
        },
        {
          text: "5 permanences",
          value: "5",
        },
        {
          text: "6 permanences",
          value: "6",
        },
        {
          text: "7 permanences",
          value: "7",
        },
        {
          text: "8 permanences",
          value: "8",
        },
      ],
      callback: function (nb) {
        if (nb > 0) {
        }
        {
          $.post(
            "inc/planning/saveNewPermanences.inc.php",
            {
              idContexte: idContexte,
              nbPermanences: nb,
            },
            function (resultat) {
              bootbox.alert({
                title: "Enregistrement",
                message: resultat + " permanences créées",
              });
              $(
                'table#listeContextes tr[data-idContexte="' + idContexte + '"]'
              ).trigger("click");
            }
          );
        }
      },
    });
  });

  // -------------------------------------------------
  // Suppression d'une permanence
  // -------------------------------------------------
  $("body").on("click", ".btn-delPermanence", function () {
    var ceci = $(this);
    var idContexte = $("table#listeContextes tr.choosen").data("idcontexte");
    var numeroPermanence = ceci.closest("tr").data("numeropermanence");
    var texthDebut = ceci.closest("tr").find(".hdebut").text();
    if (texthDebut == "") texthDebut = "???";
    var texthFin = ceci.closest("tr").find(".hfin").text();
    if (texthFin == "") texthFin = "???";
    bootbox.confirm({
      title: "Suppression d'une permanence",
      message:
        "Confirmez la suppression de la permanence n° <strong>" +
        numeroPermanence +
        "</strong> de <strong>" +
        texthDebut +
        "</strong> à <strong>" +
        texthFin +
        "</strong><br>du contexte n° <strong>" +
        idContexte +
        "</strong>",
      callback: function (result) {
        if (result == true) {
          $.post(
            "inc/planning/delPermanence.inc.php",
            {
              idContexte: idContexte,
              numeroPermanence: numeroPermanence,
            },
            function (resultat) {
              $(
                'table#listeContextes tr[data-idContexte="' + idContexte + '"]'
              ).trigger("click");
            }
          );
        }
      },
    });
  });

  function messageContexte(trprev, trnext) {
    var message =
      "<div class='text-danger text-uppercase'><strong><i class='fa fa-exclamation-triangle fa-2x' aria-hidden='true'></i>";
    message += " Attention! Vous allez supprimer les réglages pour la période";
    if (trprev != undefined) {
      message += "<br>depuis le <strong>" + trprev + "</strong> ";
    }
    if (trnext != undefined) {
      message += "<br>jusqu'au <strong>" + trnext + "</strong> exclu ";
    }
    message +=
      "<br><u>y compris toutes les permanences éventuelles déjà enregistrées!</strong></u></div>";
    return message;
  }

  $("body").on("click", ".btn-delContexte", function () {
    var tr = $(this).closest("tr");
    var idContexte = tr.data("idcontexte");
    var date = tr.data("date");
    var contextePrecedent = tr.prev().data("datefr");
    var contexteSuivant = tr.next().data("datefr");
    var message = messageContexte(contextePrecedent, contexteSuivant);

    bootbox.confirm({
      title: "Suppression d'un contexte",
      message: message,
      callback: function (result) {
        if (result == true)
          $.post(
            "inc/planning/delContexte.inc.php",
            {
              idContexte: idContexte,
            },
            function (resultat) {
              if (resultat == 1) {
                $("#gestPeriodes").trigger("click");
              }
            }
          );
      },
    });
  });

  $("body").on("click", ".btn-editContexte", function () {
    var tr = $(this).closest("tr");
    var idContexte = tr.data("idcontexte");
    var date = tr.data("date");
    var contextePrecedent = tr.prev().data("date");
    var contexteSuivant = tr.next().data("date");
    $.post(
      "inc/planning/getNewDate4contexte.inc.php",
      {
        idContexte: idContexte,
        dateActuelle: date,
        datePrecedente: contextePrecedent,
        dateSuivante: contexteSuivant,
      },
      function (resultat) {
        $("#modal").html(resultat);
        $("#modalNewDate4Contexte").modal("show");
      }
    );
  });

  $("body").on("click", "#modalSaveDateContexte", function () {
    if ($("#formEditDateContexte").valid()) {
      var formulaire = $("#formEditDateContexte").serialize();
      $.post(
        "inc/planning/saveNewDate4Contexte.inc.php",
        {
          formulaire: formulaire,
        },
        function (resultat) {
          $("#modalNewDate4Contexte").modal("hide");
          $("#gestPeriodes").trigger("click");
        }
      );
    }
  });
});