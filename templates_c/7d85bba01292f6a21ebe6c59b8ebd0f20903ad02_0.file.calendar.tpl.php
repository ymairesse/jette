<?php
/* Smarty version 4.3.1, created on 2024-04-02 15:46:56
  from '/home/yves/www/newOxfam/templates/inscriptions/calendar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_660c0c50589108_54511145',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7d85bba01292f6a21ebe6c59b8ebd0f20903ad02' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/inscriptions/calendar.tpl',
      1 => 1712065604,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660c0c50589108_54511145 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/yves/www/newOxfam/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
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
    href="planningPDF.php?month=<?php echo $_smarty_tpl->tpl_vars['month']->value;?>
&year=<?php echo $_smarty_tpl->tpl_vars['year']->value;?>
"
    target="_blank"
    id="printPDF"
    <?php if ($_smarty_tpl->tpl_vars['inscriptions']->value == Null) {?>hidden<?php }?>
    ><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Imprimer le planning</a
  >
</div>

<h2 class="text-center">
  <?php echo $_smarty_tpl->tpl_vars['monthName']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
 <?php if ($_smarty_tpl->tpl_vars['freezeStatus']->value != 0) {?>
  <span
    title="<?php if ($_smarty_tpl->tpl_vars['freezeStatus']->value == 1) {?>Les désinscriptions ne sont plus possibles<?php } elseif ($_smarty_tpl->tpl_vars['freezeStatus']->value == 2) {?>Ni inscription, ni désinscription<?php }?>"
  >
    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
  </span>
  <?php }?>
  <span class="pull-right"
    ><button
      class="btn btn-primary btn-sm navigation"
      data-gap="-1"
      title="Mois précédent"
      data-month="<?php echo $_smarty_tpl->tpl_vars['month']->value;?>
"
      data-year="<?php echo $_smarty_tpl->tpl_vars['year']->value;?>
"
    >
      <i class="fa fa-hand-o-left" aria-hidden="true"></i>
    </button>
    <button
      type="button"
      class="btn btn-secondary btn-sm"
      id="btn-today"
      title="Ce mois-ci"
    >
      <?php echo mb_strtoupper((string) smarty_modifier_date_format(time(),"%B") ?? '', 'UTF-8');?>

    </button>
    <button
      class="btn btn-primary btn-sm navigation"
      data-gap="+1"
      title="Mois suivant"
      data-month="<?php echo $_smarty_tpl->tpl_vars['month']->value;?>
"
      data-year="<?php echo $_smarty_tpl->tpl_vars['year']->value;?>
"
    >
      <i class="fa fa-hand-o-right" aria-hidden="true"></i>
    </button>
  </span>
</h2>

<form id="formGrid">
  <input type="hidden" name="month" id="month" value="<?php echo $_smarty_tpl->tpl_vars['month']->value;?>
" />
  <input type="hidden" name="monthName" id="monthName" value="<?php echo $_smarty_tpl->tpl_vars['monthName']->value;?>
" />
  <input type="hidden" name="year" id="year" value="<?php echo $_smarty_tpl->tpl_vars['year']->value;?>
" />
  <input
    type="hidden"
    name="freezeStatus"
    id="freezeStatus"
    value="<?php echo $_smarty_tpl->tpl_vars['freezeStatus']->value;?>
"
  />

  <table
    class="table table-condensed freeze_<?php echo (($tmp = $_smarty_tpl->tpl_vars['freezeStatus']->value ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
"
    id="calendar"
  >
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['monthGrid']->value, 'dataJournee', false, 'jourDuMois');
$_smarty_tpl->tpl_vars['dataJournee']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['jourDuMois']->value => $_smarty_tpl->tpl_vars['dataJournee']->value) {
$_smarty_tpl->tpl_vars['dataJournee']->do_else = false;
?>
    <tr
      data-jourdumois="<?php echo $_smarty_tpl->tpl_vars['jourDuMois']->value;?>
"
      data-jourSemaine="<?php echo $_smarty_tpl->tpl_vars['dataJournee']->value['noJourSemaine'];?>
"
      data-date="<?php echo $_smarty_tpl->tpl_vars['dataJournee']->value['date'];?>
"
      data-idcontexte="<?php echo $_smarty_tpl->tpl_vars['dataJournee']->value['idContexte'];?>
"
    >
      <?php $_smarty_tpl->_assignInScope('idContexte', $_smarty_tpl->tpl_vars['dataJournee']->value['idContexte']);?>
      <td class="jourDate px-0 py-0" style="width: 10%">
        <p>
          <?php echo substr(mb_strtoupper((string) $_smarty_tpl->tpl_vars['dataJournee']->value['nomDuJour'] ?? '', 'UTF-8'),0,2);?>
<br /><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['dataJournee']->value['date'],"%d");?>
/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['dataJournee']->value['date'],"%m");?>
<br />
        </p>
        <button
          type="button"
          class="btn btn-success btn-sm my-0 btn-report w-100 pb-0"
          data-joursemaine="<?php echo $_smarty_tpl->tpl_vars['dataJournee']->value['noJourSemaine'];?>
"
          data-nomjour="<?php echo $_smarty_tpl->tpl_vars['dataJournee']->value['nomDuJour'];?>
"
          title="Reporter sur tous les <?php echo $_smarty_tpl->tpl_vars['dataJournee']->value['nomDuJour'];?>
"
        >
          <i class="fa fa-plus"></i>
        </button>
      </td>

      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dataJournee']->value['periodes'], 'dataPeriode', false, 'noPeriode', 'boucle', array (
));
$_smarty_tpl->tpl_vars['dataPeriode']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['noPeriode']->value => $_smarty_tpl->tpl_vars['dataPeriode']->value) {
$_smarty_tpl->tpl_vars['dataPeriode']->do_else = false;
?>

      <td class="tdwidth <?php if ($_smarty_tpl->tpl_vars['dataPeriode']->value['closed']) {?> conge<?php }?>">
        <!--  checkbox invisible pour conserver l'information ----------------------------------------------- -->
        <?php if (!($_smarty_tpl->tpl_vars['dataPeriode']->value['closed'])) {?> 
        <input 
          type="checkbox" 
          name="inscriptions[]" 
          class="inscription" 
          value="<?php echo $_smarty_tpl->tpl_vars['dataJournee']->value['date'];?>
_<?php echo $_smarty_tpl->tpl_vars['noPeriode']->value;?>
"
          data-date="<?php echo $_smarty_tpl->tpl_vars['dataJournee']->value['date'];?>
" data-periode="<?php echo $_smarty_tpl->tpl_vars['noPeriode']->value;?>
"
          data-joursemaine="<?php echo $_smarty_tpl->tpl_vars['dataJournee']->value['noJourSemaine'];?>
" <?php if ((isset($_smarty_tpl->tpl_vars['dataPeriode']->value['benevoles'])) && in_array($_smarty_tpl->tpl_vars['pseudo']->value,array_keys($_smarty_tpl->tpl_vars['dataPeriode']->value['benevoles']))) {?> checked<?php }?> hidden 
          > 
        <?php }?>
        <!--  checkbox invisible pour conserver l'information ----------------------------------------------- -->

        <div class="mb-2">
          <span class="badge bg-primary"><?php echo $_smarty_tpl->tpl_vars['dataPeriode']->value['heureDebut'];?>
</span>

          <!-- si ce n'est pas un jour de congé, on présente le contenu de la période -->
          <?php if ($_smarty_tpl->tpl_vars['dataPeriode']->value['closed'] != 1) {?>

          <!-- Bouton d'inscription -->
          <button
            type="button"
            class="btn btn-sm btn-inscription pull-right btn-success <?php if (($_smarty_tpl->tpl_vars['freezeStatus']->value == 2)) {?>d-none<?php }?>"
            title="Inscription"
            data-date="<?php echo $_smarty_tpl->tpl_vars['dataJournee']->value['date'];?>
"
            data-periode="<?php echo $_smarty_tpl->tpl_vars['noPeriode']->value;?>
"
            data-inscription="1"
            style="<?php if ((isset($_smarty_tpl->tpl_vars['dataPeriode']->value['benevoles'])) && in_array($_smarty_tpl->tpl_vars['pseudo']->value,array_keys($_smarty_tpl->tpl_vars['dataPeriode']->value['benevoles']))) {?>display:none<?php }?>"
          >
            Inscription
          </button>

          <!-- Bouton de désinscription -->
          <button
            type="button"
            class="btn btn-sm btn-inscription pull-right btn-danger <?php if ($_smarty_tpl->tpl_vars['freezeStatus']->value >= 1) {?>d-none<?php }?>"
            title="Inscription"
            data-date="<?php echo $_smarty_tpl->tpl_vars['dataJournee']->value['date'];?>
"
            data-periode="<?php echo $_smarty_tpl->tpl_vars['noPeriode']->value;?>
"
            data-inscription="0"
            style="<?php if (!(isset($_smarty_tpl->tpl_vars['dataPeriode']->value['benevoles'])) || !in_array($_smarty_tpl->tpl_vars['pseudo']->value,array_keys($_smarty_tpl->tpl_vars['dataPeriode']->value['benevoles']))) {?>display:none<?php }?>"
          >
            Désinscription
          </button>

          <?php }?>
        </div>

        <div class="listeBenevoles">
          <?php if ((isset($_smarty_tpl->tpl_vars['dataPeriode']->value['benevoles']))) {?> <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dataPeriode']->value['benevoles'], 'dataBenevole', false, 'unPseudo');
$_smarty_tpl->tpl_vars['dataBenevole']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['unPseudo']->value => $_smarty_tpl->tpl_vars['dataBenevole']->value) {
$_smarty_tpl->tpl_vars['dataBenevole']->do_else = false;
?>

          <button
            type="button"
            data-pseudo="<?php echo $_smarty_tpl->tpl_vars['unPseudo']->value;?>
"
            class="btn btn-sm w-100 <?php if ($_smarty_tpl->tpl_vars['pseudo']->value == $_smarty_tpl->tpl_vars['unPseudo']->value) {?>me<?php } else { ?>benevole<?php }?>"
          >
            <span class="d-none d-md-block">
              <span class="check">
                <?php if ($_smarty_tpl->tpl_vars['dataBenevole']->value['confirme'] == 1) {?><i class="fa fa-check"></i>
                <?php }?>
              </span>
              <?php echo $_smarty_tpl->tpl_vars['dataBenevole']->value['civilite'];?>
 <?php echo $_smarty_tpl->tpl_vars['dataBenevole']->value['prenom'];?>

              <?php echo $_smarty_tpl->tpl_vars['dataBenevole']->value['nom'];?>

            </span>
            <span
              class="d-md-none d-sm-block"
              title="<?php echo $_smarty_tpl->tpl_vars['dataBenevole']->value['civilite'];?>
 <?php echo $_smarty_tpl->tpl_vars['dataBenevole']->value['prenom'];?>
 <?php echo $_smarty_tpl->tpl_vars['dataBenevole']->value['nom'];?>
"
            >
              <span class="check">
                <?php if ($_smarty_tpl->tpl_vars['dataBenevole']->value['confirme'] == 1) {?><i class="fa fa-check"></i>
                <?php }?>
              </span>
              <?php echo $_smarty_tpl->tpl_vars['dataBenevole']->value['prenom'];?>

            </span>
          </button>
          <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> <?php }?>
        </div>
      </td>

      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </table>
</form>

<style>
  td {
    border: 1px solid black;
  }
</style>

<?php echo '<script'; ?>
>
  function largeurTd() {
    var tableau = $("table#calendar");
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

    var freezeStatus = $("#freezeStatus").val();
  });
<?php echo '</script'; ?>
>
<?php }
}
