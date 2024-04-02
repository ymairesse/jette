<h3>Liste des contextes</h3>
<table class="table table-condensed" id="listeContextes">
  <tbody>
    {foreach from=$listeContextes key=unContexte item=$date}
    <tr
      data-idcontexte="{$unContexte}"
      data-date="{$date}"
      data-datefr="{$date|date_format:'%d/%m/%Y'}"
      class="{if $idContexte == $unContexte}choosen{/if}"
    >
      <td style="width: 1em">
        <button
          class="btn btn-danger btn-sm btn-delContexte"
          title="Supprimer ce contexte"
        >
          <i class="fa fa-times"></i>
        </button>
      </td>
      <td>{$unContexte}</td>
      <td>Depuis le {$date|date_format:"%d/%m/%Y"}</td>
      <td style="width:1em">
        <button class="btn btn-warning btn-sm btn-editContexte" title="Modifier la date pivot">
          <i class="fa fa-edit"></i>
        </button>
      </td>
    </tr>

    {/foreach}
  </tbody>
</table>
<button type="button" class="btn btn-warning w-100" id="btn-addContexte">
  <i class="fa fa-plus"></i> Ajouter un contexte
</button>
