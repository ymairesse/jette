<!-- Modal -->
<div
  class="modal fade"
  id="modalCleaning"
  tabindex="-1"
  aria-labelledby="modalCleaningLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalCleaningLabel">
          Effacement périodes échues
        </h1>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <form id="formClean">
          <p>
            <span class="text-danger"
              >Attention, la suppression est définitive.</span
            ><br />
            <span class="text-success">Il n'est pas possible de supprimer une période non échue.</span>
          </p>

          <ul class="list-unstyled" style="height: 10em; overflow: auto">
            {foreach from=$listeMois key=$mois item=dataMois}
            <li>
              <div class="checkbox">
                <label>
                  <input type="checkbox"
                  name="{$dataMois.year}_{$dataMois.month}" {if $dataMois.past
                  == 0}disabled{/if} value="1"> {$dataMois.monthName}
                  {$dataMois.year} {if $dataMois.past == 0}
                  <strong>[Non échu]</strong>{/if}
                </label>
              </div>
            </li>
            {/foreach}
          </ul>
        </form>
        <hr>
        <p class="fs-6 fw-lighter">Cette opération est optionnelle. Elle permet d'alléger la base de données en éliminant des informations devenues moins utiles.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          Annuler
        </button>
        <button type="button" class="btn btn-primary" id="btn-modalClean">
          Confirmer
        </button>
      </div>
    </div>
  </div>
</div>
