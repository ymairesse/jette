<h1>Calendrier des permanences</h1>

<div class="pull-left button-group">
  <button type="button" id="saveCalendar" class="btn btn-sm btn-danger">
    <i class="fa fa-floppy-o" aria-hidden="true"></i> N'oubliez pas
    d'enregistrer
  </button>
  <button type="button" id="resetCalendar" class="btn btn-sm btn-beige">
    <i class="fa fa-eraser" aria-hidden="true"></i> Annuler les modifications
  </button>
  <!-- Ne pas permettre d'imprimer un bulletins sans données -->
  <!-- probablement hors de tout contexte-->
  <a
    type="button"
    class="btn btn-sm btn-warning"
    href="planningPDF.php?month={$month}&year={$year}"
    target="_blank"
    id="printPDF"
    {if $inscriptions == Null}hidden{/if}
    ><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Imprimer le planning</a
  >
</div>

<h2 class="text-center">

  {$monthName} {$year} 
  {if $freezeStatus != 0}
    <span
      title="{if $freezeStatus ==1 }
          Les désinscriptions ne sont plus possibles
        {elseif $freezeStatus == 2}
          Ni inscription, ni désinscription
          {/if}"
    >
      <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
    </span>
  {/if}
  
  <span class="pull-right"
    >
    <div class="btn-group">
    <button
      class="btn btn-primary btn-sm navigation"
      data-gap="-1"
      title="Mois précédent"
      data-month="{$month}"
      data-year="{$year}"
    >
      <i class="fa fa-hand-o-left" aria-hidden="true"></i>
    </button>
    <button
      type="button"
      class="btn btn-success btn-sm"
      id="btn-today"
      title="Ce mois-ci"
    >
      Mois actuel: {$smarty.now|date_format:"%B"|upper}
    </button>
    <button
      class="btn btn-primary btn-sm navigation"
      data-gap="+1"
      title="Mois suivant"
      data-month="{$month}"
      data-year="{$year}"
    >
      <i class="fa fa-hand-o-right" aria-hidden="true"></i>
    </button>
  </div>
  </span>
</h2>

<form id="formGrid">
  <input type="hidden" name="month" id="month" value="{$month}" />
  <input type="hidden" name="monthName" id="monthName" value="{$monthName}" />
  <input type="hidden" name="year" id="year" value="{$year}" />
  <input
    type="hidden"
    name="freezeStatus"
    id="freezeStatus"
    value="{$freezeStatus}"
  />

  <div style="height: 80vh; overflow: auto;">
  <table
    class="table table-condensed freeze_{$freezeStatus|default:0}"
    id="calendar"
  >
    {foreach from=$monthGrid key=jourDuMois item=dataJournee}
    <tr
      data-jourdumois="{$jourDuMois}"
      data-jourSemaine="{$dataJournee.noJourSemaine}"
      data-date="{$dataJournee.date}"
      data-idcontexte="{$dataJournee.idContexte}"
    >
      {assign var=idContexte value=$dataJournee.idContexte}
      <td class="jourDate px-0 py-0" style="width: 10%">
        <p>
          {$dataJournee.nomDuJour|upper|substr:0:2}<br />{$dataJournee.date|date_format:"%d"}/{$dataJournee.date|date_format:"%m"}
        </p>
        <button
          type="button"
          class="btn btn-success btn-sm my-0 btn-report w-100 pb-0"
          data-joursemaine="{$dataJournee.noJourSemaine}"
          data-nomjour="{$dataJournee.nomDuJour}"
          title="Reporter sur tous les {$dataJournee.nomDuJour}"
        >
          <i class="fa fa-plus"></i>
        </button>
      </td>

      {foreach from=$dataJournee.periodes key=noPeriode item=dataPeriode name=boucle}

      <td class="tdwidth {if $dataPeriode.closed} conge{/if}">
        <!--  checkbox invisible pour conserver l'information ----------------------------------------------- -->
        {if !($dataPeriode.closed)} 
        <input 
          type="checkbox" 
          name="inscriptions[]" 
          class="inscription" 
          value="{$dataJournee.date}_{$noPeriode}"
          data-date="{$dataJournee.date}" data-periode="{$noPeriode}"
          data-joursemaine="{$dataJournee.noJourSemaine}" {if
          isset($dataPeriode.benevoles) && in_array($pseudo,
          array_keys($dataPeriode.benevoles))} checked{/if} hidden 
          > 
        {/if}
        <!--  checkbox invisible pour conserver l'information ----------------------------------------------- -->

        <div class="mb-2">
          <span class="badge bg-primary">{$dataPeriode.heureDebut}</span>

          <!-- si ce n'est pas un jour de congé, on présente le contenu de la période -->
          {if $dataPeriode.closed != 1}

          <!-- Bouton d'inscription -->
          <!-- n'est pas présenté si le statut de freeze = 2 -->
          <button
            type="button"
            class="btn btn-sm btn-inscription pull-right btn-success {if ($freezeStatus == 2)}d-none{/if}"
            title="Inscription"
            data-date="{$dataJournee.date}"
            data-periode="{$noPeriode}"
            data-inscription="1"
            style="{if isset($dataPeriode.benevoles) && in_array($pseudo, array_keys($dataPeriode.benevoles))}display:none{/if}"
          >
            Inscription
          </button>

          <!-- Bouton de désinscription -->
          <!-- n'est pas présenté si le statut de freeze = 1 ou = 2 (soit >= 1) -->
          <button
            type="button"
            class="btn btn-sm btn-inscription pull-right btn-danger {if ($freezeStatus >= 1)}d-none{/if}"
            title="Inscription"
            data-date="{$dataJournee.date}"
            data-periode="{$noPeriode}"
            data-inscription="0"
            style="{if !isset($dataPeriode.benevoles) || !in_array($pseudo, array_keys($dataPeriode.benevoles))}display:none{/if}"
          >
            Désinscription
          </button>

          {/if}
        </div>

        <div class="listeBenevoles">
          {if isset($dataPeriode.benevoles)} {foreach
          from=$dataPeriode.benevoles key=unPseudo item=dataBenevole}

          <button
            type="button"
            data-pseudo="{$unPseudo}"
            class="btn btn-sm w-100 {if $pseudo == $unPseudo}me{else}benevole{/if}"
          >
            <span class="d-none d-md-block">
              <span class="check">
                {if $dataBenevole.confirme == 1}<i class="fa fa-check"></i>
                {/if}
              </span>
              {$dataBenevole.civilite} {$dataBenevole.prenom}
              {$dataBenevole.nom} <span class="badge text-bg-warning">e{$dataBenevole.experience}</span>
            </span>
            <span
              class="d-md-none d-sm-block"
              title="{$dataBenevole.civilite} {$dataBenevole.prenom} {$dataBenevole.nom}"
            >
              <span class="check">
                {if $dataBenevole.confirme == 1}<i class="fa fa-check"></i>
                {/if}
              </span>
              {$dataBenevole.prenom} <span class="badge text-bg-warning">e{$dataBenevole.experience}</span>
            </span>
          </button>
          {/foreach} {/if}
        </div>
      </td>

      {/foreach}
    </tr>
    {/foreach}
  </table>
</div>
  <ul class="list-unstyled">
    <li><span class="badge text-bg-warning">e1</span> : bénévole débutant·e; ne devrait pas être seul·e</li>
    <li><span class="badge text-bg-warning">e2</span> : bénévole expérimenté·e</li>
    <li><span class="badge text-bg-warning">e3</span> : bénévole très expérimenté·e; peut conseiller en cas de difficulté</li>
  </ul>
</form>

<style>
  td {
    border: 1px solid black;
  }
</style>

<script>

  // --------------------------------------------------------------
  // calculer la largeur des colonnes du tableau en fonction du
  // nombre de périodes de permanences
  // --------------------------------------------------------------
  function largeurTd() {
    var tableau = $("table#calendar");
    var nbCols = tableau.find("tr:first-child td").length - 1;
    var width = 90 / nbCols;
    var strWidth = width + "%";
    $(".tdwidth").prop("width", strWidth);
  }

  // --------------------------------------------------------------
  // Raffraîchir le widget de navigation de mois en mois
  // --------------------------------------------------------------
  function dateNavigation() {
    const date = new Date();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();
    $("#btn-today").data("year", year);
    $("#btn-today").data("month", month);
  }

  $(document).ready(function () {
    largeurTd();
    dateNavigation();

    var freezeStatus = $("#freezeStatus").val();
  });
</script>
