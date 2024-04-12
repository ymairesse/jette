<h1 title="{$pseudo}">
  Calendrier des permanences: {$identite.civilite} {$identite.prenom}
  {$identite.nom}
</h1>

<div class="pull-left button-group">
  <button type="button" id="saveCalendarGestion" class="btn btn-sm btn-danger">
    <i class="fa fa-floppy-o" aria-hidden="true"></i> N'oubliez pas
    d'enregistrer
  </button>
  <button type="button" id="resetCalendarGestion" class="btn btn-sm btn-beige">
    <i class="fa fa-eraser" aria-hidden="true"></i> Annuler les modifications
  </button>
</div>

<h2 class="text-center">
  {$monthName} {$year}
  <span class="pull-right"
    >
    <div class="btn-group">
    <button
      class="btn btn-primary btn-sm navigationAdmin"
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
      class="btn btn-primary btn-sm navigationAdmin"
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

<div style="height: 80vh; overflow: auto;">
<form id="formGrid">
  <input type="hidden" name="month" id="month" value="{$month}" />
  <input type="hidden" name="year" id="year" value="{$year}" />
  <input
    type="hidden"
    name="freezeStatus"
    id="freezeStatus"
    value="{$freezeStatus}"
  />

  <table class="table table-condensed freeze_{$freezeStatus|default:0}" id="calendarGestion" >
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
          {$dataJournee.nomDuJour|upper|substr:0:2}<br />{$dataJournee.date|date_format:"%d"}/{$dataJournee.date|date_format:"%m"}<br />
        </p>

        <div class="d-grid">
          <!--
            Liste de trois boutons de confirmation rapide
          -->
          {assign var=btnType value=array('btn-success', 'btn-warning',
          'btn-info')} {foreach from=array(1,2,3) key=wtf item=nombre}
          <div class="btn-group">
            <button
              type="button"
              class="btn btn-sm btn-confirmMulti w-75 {$btnType.$wtf}"
              data-nombre="{$nombre}"
              title="Confirmer/Infirmer {$nombre} ligne(s)"
            >
              <i class="fa fa-check"></i> {$nombre} ligne{if $nombre > 1}s{/if}
            </button>
            <button
              type="button"
              class="btn btn-sm btn-danger d-md-none d-lg-block btn-resetMulti w-25"
              data-nombre="{$nombre}"
              title="Reset {$nombre} ligne(s)"
            >
              <i class="fa fa-eraser"></i>
            </button>
          </div>
          {/foreach}
        </div>
      </td>

      {foreach from=$dataJournee.periodes key=noPeriode item=dataPeriode name=boucle}

      <td class="tdwidth {if $dataPeriode.closed} conge{/if}">
        <!--  checkbox invisible pour conserver l'information ----------------------------------------------- -->
        {if !($dataPeriode.closed)} <input type="checkbox" name="inscriptions[]"
        class="inscription" value="{$dataJournee.date}_{$noPeriode}"
        data-date="{$dataJournee.date}" data-periode="{$noPeriode}" {if
        isset($dataPeriode.benevoles) && in_array($pseudo,
        array_keys($dataPeriode.benevoles))} checked{/if} hidden > {/if}
        <!--  checkbox invisible pour conserver l'information ----------------------------------------------- -->

        <div class="mb-2 zoneBadge">
          <span class="badge bg-primary">{$dataPeriode.heureDebut}</span>

          <!-- si c'est un jour de congé, on laisse la cellule vide -->
          {if $dataPeriode.closed != 1}
          <!-- S'il y a des inscriptions et que l'utilisateur actuel est dans la liste  -->

          <button
            type="button"
            class="btn btn-sm btn-inscription pull-right {if isset($dataPeriode.benevoles) && in_array($pseudo, array_keys($dataPeriode.benevoles))} btn-danger{else} btn-success{/if}"
            data-placement="left"
            data-toggle="tooltip"
            title="Inscription ou désinscription"
            data-date="{$dataJournee.date}"
            data-periode="{$noPeriode}"
          >
            <!-- Si l'utilisateur actif est déjà inscrit, on lui propose la désinscription   -->
            {if isset($dataPeriode.benevoles) && in_array($pseudo,
            array_keys($dataPeriode.benevoles))} Désinscription {else}
            <!-- Sinon, l'inscription                                                         -->
            Inscription {/if}
          </button>

          {/if}
        </div>

        <div class="listeBenevoles">
          {if isset($dataPeriode.benevoles)} {foreach
          from=$dataPeriode.benevoles key=unPseudo item=dataBenevole}
          <div class="btn-group w-100">
            <button
              type="button"
              data-pseudo="{$unPseudo}"
              class="btn btn-sm w-100 {if $pseudo == $unPseudo}me{else}benevole{/if}"
            >
              <span class="d-md-none d-lg-block">
                <span class="check">
                  {if $dataBenevole.confirme == 1}<i class="fa fa-check"></i>
                  {/if}
                </span>
                {$dataBenevole.civilite} {$dataBenevole.prenom}
                {$dataBenevole.nom} <span class="badge text-bg-warning">e{$dataBenevole.experience}</span>
              </span>
              
              <span
                class="d-lg-none d-md-block"
                title="{$dataBenevole.civilite} {$dataBenevole.prenom} {$dataBenevole.nom}"
              >
                <span class="check">
                  {if $dataBenevole.confirme == 1}<i class="fa fa-check"></i>
                  {/if}
                </span>
                {$dataBenevole.prenom} 
                <span class="badge text-bg-warning">e{$dataBenevole.experience}</span>
              </span>
            </button>
            <button
              type="button"
              class="btn btn-sm btn-lightRed btn-confirme"
              style="width: 2em"
              title="Confirmer l'inscription"
              data-pseudo="{$unPseudo}"
              data-periode="{$noPeriode}"
              data-date="{$dataJournee.date}"
            >
              <i class="fa fa-check"></i>
            </button>
          </div>
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
  function largeurTd() {
    var tableau = $("table#calendarGestion");
    var nbCols = tableau.find("tr:first-child td").length - 1;
    var width = 90 / nbCols;
    var strWidth = width + "%";
    $(".tdwidth").prop("width", strWidth);
  }

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
  });
</script>
