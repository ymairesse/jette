<!-- Modal -->
<div
  class="modal fade"
  id="modalFreezes"
  tabindex="-1"
  aria-labelledby="modalFreezesLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalFreezesLabel">
          Gel des périodes
        </h1>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <form id="form-freezes">
            <div style="max-height: 20em; overflow: auto;">
          <table class="table table-condensed">
            <tr>
              <th>Périodes</th>
              <th colspan="3" style="text-align:center;">Statut</th>
            </tr>
            {foreach from=$freezes key=oneMonth item=freeze}
            <tr data-month="{$oneMonth}">
              <td>{$freeze.dateFr}</td>
              <td>
                <div class="form-check">
                  <input class="form-check-input" type="radio"
                  name="freeze_{$oneMonth}" id="freeze_{$oneMonth}0" value="0"
                  {if $freeze.status == 0} checked{/if}>
                  <label class="form-check-label" for="freeze_{$oneMonth}0">
                    Libre
                  </label>
                </div>
              </td>

              <td>
                <div class="form-check">
                  <input class="form-check-input" type="radio"
                  name="freeze_{$oneMonth}" id="freeze_{$oneMonth}1" value="1"
                  {if $freeze.status == 1} checked{/if}>
                  <label class="form-check-label" for="freeze_{$oneMonth}1">
                    Plus de désinscription
                  </label>
                </div>
              </td>
              <td>
                <div class="form-check">
                  <input class="form-check-input" type="radio"
                  name="freeze_{$oneMonth}" id="freeze_{$oneMonth}2" value="2"
                  {if $freeze.status == 2} checked{/if}>
                  <label class="form-check-label" for="freeze_{$oneMonth}2">
                    Ni inscription, ni désinscription
                  </label>
                </div>
              </td>
            </tr>
            {/foreach}
          </table>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          Annuler
        </button>
        <button type="button" class="btn btn-primary" id="btn-modalSaveFreezes">
          Enregistrer
        </button>
      </div>
    </div>
  </div>
</div>
