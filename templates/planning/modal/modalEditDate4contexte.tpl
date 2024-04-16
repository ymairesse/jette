<!-- Modal -->
<div
  class="modal fade"
  id="modalEditDate4Contexte"
  tabindex="-1"
  aria-labelledby="modalEditDate4ContexteLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalEditDate4ContexteLabel">
          Nouvelle date pivot
        </h1>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <form id="formEditDateContexte">
          <input
            type="hidden"
            name="idContexte"
            id="idContexte"
            value="{$idContexte}"
          />
          <input
            type="hidden"
            name="datePrecedente"
            id="datePrecedente"
            value="{$datePrecedente}"
          />
          <input
            type="hidden"
            name="dateSuivante"
            id="dateSuivante"
            value="{$dateSuivante}"
          />

          <div class="mb-3">
            <label for="dateContexte" class="form-label"
              >Nouvelle date entre le {if $datePrecedente != NULL}
              <strong>{$datePrecedente|date_format:"%d/%m/%Y"}</strong>
              {else}?????{/if} et le {if $dateSuivante !=
              NULL}<strong>{$dateSuivante|date_format:"%d/%m/%Y"}</strong>{else}?????{/if}</label
            >
            <input
              type="date"
              name="dateContexte"
              id="dateContexte"
              class="form-control"
              value="{$dateActuelle}"
            />
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
          Annuler
        </button>
        <button
          type="button"
          class="btn btn-primary"
          id="modalSaveDateContexte"
        >
          Enregistrer
        </button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function () {
    $.validator.addMethod(
      "minMaxDate",
      function (value, element) {
        var datePrecedente = $("#datePrecedente").val();
        var dateSuivante = $("#dateSuivante").val();
        if (datePrecedente == "" && value < dateSuivante) return true;
        if (dateSuivante == "" && value > datePrecedente) return true;
        if (value > datePrecedente && value < dateSuivante) return true;
        return false;
      },
      "Date Invalide!"
    ); // error message

    $("#formEditDateContexte").validate({
      rules: {
        dateContexte: {
          required: true,
          date: true,
          minMaxDate: true,
        },
      },
    });
  });
</script>
