<!-- Modal -->
<div class="modal fade" id="modalMail" tabindex="-1" aria-labelledby="modalMailLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalMailLabel">Sélection de <strong id="nbMails">0</strong> adresse(s) mail</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table">
          <thead>
            <tr>
              <th style="width: 2em"></th>
              <th>
                Destinataire
                <div style="text-align: right; float: right">
                  Cliquer pour (dé)sélectionner tout
                  <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </div>
              </th>
              <th style="width: 2em">
                <input
                  type="checkbox"
                  id="cbMailAll"
                  title="Sélectionner/désélectionner"
                />
              </th>
            </tr>
          </thead>
        </table>

        <div style="max-height: 20em; overflow: auto">
          <table class="table table-condensed">
            {foreach from=$usersList key=acronyme item=data} {if $data.mail !=
            'nomail@nomail.com'}
            <tr>
              <td style="width: 2em">
                <a
                  type="button"
                  class="btn btn-success btn-sm py-0 px-3"
                  href="mailto:{$data.mail}"
                  data-toggle="tooltip"
                  data-placement="left"
                  title=""
                  data-original-title="Envoyer un mail à {$data.prenom} ({$data.mail})"
                >
                  <i class="fa fa-send-o" aria-hidden="true"></i>
                </a>
              </td>
              <td class="nom">{$data.prenom} {$data.nom}</td>
              <td style="width: 2em">
                <input
                  type="checkbox"
                  name="cb[]"
                  class="cbMail"
                  value="{$data.mail}"
                  data-nomprenom="{$data.prenom} {$data.nom}"
                />
              </td>
            </tr>
            {/if} {/foreach}
          </table>
      </div>
      <div class="modal-footer">
        <p><small>Copiez les adresses mail et collez-les dans votre logiciel de gestion des mails.</small></p>
        <button type="button" class="btn btn-block btn-success" id="btn-copyCb">
          Copier la sélection dans le presse-papier
        </button>
        <textarea
          name="listeMails"
          id="listeMails"
          cols="30"
          rows="2"
          class="form-control"
          style="display: block"
        ></textarea>
      </div>
    </div>
  </div>
</div>





<style>
  .nom {
    cursor: pointer;
  }

  #listeMails {
    position: absolute;
    top: -20em;
  }
</style>

<script>
  $(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();

    $("#cbMailAll").change(function () {
      var nb = 0;
      $(".cbMail").each(function () {
        $(this).prop("checked", !$(this).prop("checked"));
        if ($(this).prop("checked") == true) nb++;
      });
      $("#nbMails").text(nb);
    });

    $(".cbMail").change(function () {
      var nb = parseInt($("#nbMails").text());
      if ($(this).prop("checked") == true) nb++;
      else nb--;
      $("#nbMails").text(nb);
    });

    $(".nom").click(function () {
      var ceci = $(this);
      ceci.closest("tr").find(".cbMail").trigger("click");
    });
    
  });
</script>
