<label class="w-100" for="listeUsers"
  >Liste des utilisateurs
  <div class="btn-group float-end">
    <button
      class="btn btn-sm btn-sortGestion parNom py-0 {if (isset($sortUsers) && ($sortUsers == 'parNom') || (!(isset($sortUsers))))}btn-primary{else}btn-default{/if}"
      title="Par ordre des noms"
    >
      <i class="fa fa-sort-alpha-asc" aria-hidden="true"></i> Noms
    </button>
    <button
      class="btn btn-sm btn-sortGestion parPrenom py-0 {if isset($sortUsers) && ($sortUsers == 'parPrenom')}btn-primary{else}btn-default{/if}"
      title="Par ordre des prénoms"
    >
      <i class="fa fa-sort-alpha-asc" aria-hidden="true"></i> Prénoms
    </button>
  </div>
</label>

<div style="height: 80vh; overflow: auto">
  <table class="table table-sm w-100" id="listeUsers">
    <tr>
      <th style="width: 1em">&nbsp;</th>
      <th>Nom</th>
      <th>Pseudo</th>
    </tr>
    <!-- L'utlisateur actif ne peut modifier son propre profil -->
    {foreach from=$listeUsers key=pseudoOneUser item=user}

    <tr
      class="{if $pseudoOneUser == $pseudo}choosen{/if}"
      data-pseudo="{$pseudoOneUser}"
    >
      <td class="text-center">
        {if $user.droits == 'admin'}<i class="fa fa-star" title="Admin"></i
        >{else}<span title="Oxfam">-</span>{/if}
      </td>
      <td>
        <div class="d-flex justify-content-between">
          <div>
            {if $sortUsers == 'parNom'} {$user.nom} {$user.prenom} {else}
            {$user.prenom} {$user.nom} {/if}
          </div>
          <div>
            <span class="badge text-bg-warning">e{$user.experience}</span>

            
</div>
        </div>
      </td>
      <td>{$pseudoOneUser}</td>
    </tr>

    {/foreach}
  </table>
</div>
