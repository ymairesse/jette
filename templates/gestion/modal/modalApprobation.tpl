<!-- Modal -->
<div
  class="modal fade"
  id="modalApprobation"
  tabindex="-1"
  aria-labelledby="modalApprobationLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalApprobationLabel">
          Approbation des {$listeUsers|@count} nouveaux bénévoles
        </h1>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body" style="max-height: 15em; overflow: auto">
        <form id="formApprobation">
          <table class="table table-condensed">
            <tr>
              <th style="width: 1em">&nbsp;</th>
              <th style="width: 7em">Pseudo</th>
              <th>Nom</th>
              <th>Mail</th>
              <th style="width: 1em">Approuvé</th>
            </tr>
            {foreach from=$listeUsers key=pseudo item=$unBenevole}
            <tr
              data-pseudo="{$pseudo}"
              data-nom="{$unBenevole.prenom} {$unBenevole.nom}"
            >
              <td>
                <button
                  type="button"
                  class="btn btn-danger btn-sm btn-delApprobation"
                  title="Supprimer la demande"
                >
                  <i class="fa fa-times"></i>
                </button>
              </td>
              <td>{$unBenevole.pseudo}</td>
              <td>{$unBenevole.prenom} {$unBenevole.nom}</td>
              <td>
                <a href="mailto:{$unBenevole.mail}">{$unBenevole.mail}</a>
              </td>
              <td>
                <div class="form-group pb-3 col-2">
                  <input
                    type="hidden"
                    class="cb"
                    id="approuve_{$unBenevole.pseudo}"
                    name="approuve_{$unBenevole.pseudo}"
                    value="{$unBenevole.approuve|default:0}"
                  />
                  <div class="btn-group" role="group" aria-label="Approuvé">
                    <button
                      type="button"
                      class="btn btn-sm btn-approuveUser {if $unBenevole.approuve == 1}btn-success{else}btn-outline-success{/if}"
                      data-value="1"
                    >
                      Oui
                    </button>
                    <button
                      type="button"
                      class="btn btn-sm btn-approuveUser {if $unBenevole.approuve == 0}btn-danger{else}btn-outline-danger{/if}"
                      data-value="0"
                    >
                      Non
                    </button>
                  </div>
                </div>
              </td>
            </tr>
            {/foreach}
          </table>
        </form>
      </div>
      <div class="modal-footer">
        <i
        style="display: none"
        class="fa fa-spinner fa-spin fa-fw ajaxLoader"
      ></i>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          Annuler
        </button>
        <button
          type="button"
          class="btn btn-primary"
          id="btn-modalSaveApprobation"
        >
          Confirmer
        </button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function () {
    $(".btn-approuveUser").click(function () {
      var ceci = $(this);
      var value = ceci.data("value");
      ceci.closest(".form-group").find(".cb").val(value);

      var btnGroup = ceci.closest(".btn-group");
      if (value == 1) {
        btnGroup
          .find('.btn[data-value="1"]')
          .addClass("btn-success")
          .removeClass("btn-outline-success");
        btnGroup
          .find('.btn[data-value="0"]')
          .addClass("btn-outline-danger")
          .removeClass("btn-danger");
      } else {
        btnGroup
          .find('.btn[data-value="0"]')
          .addClass("btn-danger")
          .removeClass("btn-outline-danger");
        btnGroup
          .find('.btn[data-value="1"]')
          .addClass("btn-outline-success")
          .removeClass("btn-success");
      }
    });
  });
</script>
