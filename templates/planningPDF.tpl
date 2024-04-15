<style type="text/css">
  table {
    border-collapse: collapse;
  }
  th,
  td {
    border: 2px solid #555;
  }

  th {
    font-weight: bold;
    padding: 10px;
  }

  .benevole {
    margin: 0em;
    padding: 0;
  }

  .conge {
    background-color: #ccc;
  }

  p.benevole {
    padding: 5px 10px;
    margin: 0;
    font-size: 10pt;
  }

  h1 {
    text-align: center;
  }

  p.encadre {
    text-decoration: underline;
    text-decoration-style: double;
  }

  #logo {
    width: 150px;
    float: left;
  }

  td.benevoles {
    vertical-align: top;
    height: 40px;
  }

</style>

<page backtop="7mm" backbottom="7mm" backleft="10mm" backright="20mm">
  <img src="images/oxfam.png" id="logo" />

  <h1>Planning {$monthName} {$year}</h1>

  <p>
    Version du <strong>{$ceJour}</strong> générée par
    <strong>{$identite.prenom} {$identite.nom}</strong>
  </p>
  {assign var=colWidth value=630/($nbColonnes+1)}

  <table>
    {foreach from=$monthGrid key=jourDuMois item=dataJournee}
    <tr>
      <td style="width: {$colWidth}px; text-align:center; font-weight: bold;">
        {$dataJournee.nomDuJour}<br>{$dataJournee.date|date_format:"%d/%m"}
      </td>

      {foreach from=$dataJournee.periodes key=noPeriode item=dataPeriode}

      <td class="benevoles"
        style="{if $dataPeriode.closed}background: #ccc{/if}; width: {$colWidth}px"
      >
        <div>{$dataPeriode.heureDebut}</div>
        <div class="listeBenevoles">
          {if isset($dataPeriode.benevoles)} 
          {foreach from=$dataPeriode.benevoles key=unPseudo item=dataBenevole}
          <div style="padding: 3px">
            <strong>
              {if $dataBenevole.confirme == 1}<img src='images/check-mark.png'> {/if}
              {$dataBenevole.prenom} {$dataBenevole.nom|substr:0:1}.
            </strong>
          </div>
          {/foreach} 
          {/if}
        </div>
      </td>
      {/foreach}
    </tr>

    {/foreach}
  </table>
  <p>Les permanences marquées d'un <img src="images/check-mark.png"> sont confirmées.</p>

  <page_footer> Imprimé le {$smarty.now|date_format:'%d/%m/%Y'} </page_footer>
</page>
