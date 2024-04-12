<?php
/* Smarty version 4.3.1, created on 2024-04-10 08:46:45
  from '/home/yves/www/newOxfam/templates/gestion/inc/calendar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_661635d5e1da71_29345740',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5f984b76364cef508d133ef3f2a3f6758a826e85' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/gestion/inc/calendar.tpl',
      1 => 1712731584,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_661635d5e1da71_29345740 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/yves/www/newOxfam/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<h1 title="<?php echo $_smarty_tpl->tpl_vars['pseudo']->value;?>
">
  Calendrier des permanences: <?php echo $_smarty_tpl->tpl_vars['identite']->value['civilite'];?>
 <?php echo $_smarty_tpl->tpl_vars['identite']->value['prenom'];?>

  <?php echo $_smarty_tpl->tpl_vars['identite']->value['nom'];?>

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
  <?php echo $_smarty_tpl->tpl_vars['monthName']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['year']->value;?>

  <span class="pull-right"
    >
    <div class="btn-group">
    <button
      class="btn btn-primary btn-sm navigationAdmin"
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
      class="btn btn-success btn-sm"
      id="btn-today"
      title="Ce mois-ci"
    >
      Mois actuel: <?php echo mb_strtoupper((string) smarty_modifier_date_format(time(),"%B") ?? '', 'UTF-8');?>

    </button>
    <button
      class="btn btn-primary btn-sm navigationAdmin"
      data-gap="+1"
      title="Mois suivant"
      data-month="<?php echo $_smarty_tpl->tpl_vars['month']->value;?>
"
      data-year="<?php echo $_smarty_tpl->tpl_vars['year']->value;?>
"
    >
      <i class="fa fa-hand-o-right" aria-hidden="true"></i>
    </button>
  </div>
  </span>
</h2>

<form id="formGrid">
  <input type="hidden" name="month" id="month" value="<?php echo $_smarty_tpl->tpl_vars['month']->value;?>
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

  <table class="table table-condensed freeze_<?php echo (($tmp = $_smarty_tpl->tpl_vars['freezeStatus']->value ?? null)===null||$tmp==='' ? 0 ?? null : $tmp);?>
" id="calendarGestion" >
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

        <div class="d-grid">
          <!--
            Liste de trois boutons de confirmation rapide
          -->
          <?php $_smarty_tpl->_assignInScope('btnType', array('btn-success','btn-warning','btn-info'));?> <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, array(1,2,3), 'nombre', false, 'wtf');
$_smarty_tpl->tpl_vars['nombre']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['wtf']->value => $_smarty_tpl->tpl_vars['nombre']->value) {
$_smarty_tpl->tpl_vars['nombre']->do_else = false;
?>
          <div class="btn-group">
            <button
              type="button"
              class="btn btn-sm btn-confirmMulti w-75 <?php echo $_smarty_tpl->tpl_vars['btnType']->value[$_smarty_tpl->tpl_vars['wtf']->value];?>
"
              data-nombre="<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
"
              title="Confirmer/Infirmer <?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
 ligne(s)"
            >
              <i class="fa fa-check"></i> <?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
 ligne<?php if ($_smarty_tpl->tpl_vars['nombre']->value > 1) {?>s<?php }?>
            </button>
            <button
              type="button"
              class="btn btn-sm btn-danger d-md-none d-lg-block btn-resetMulti w-25"
              data-nombre="<?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
"
              title="Reset <?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
 ligne(s)"
            >
              <i class="fa fa-eraser"></i>
            </button>
          </div>
          <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
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
        <?php if (!($_smarty_tpl->tpl_vars['dataPeriode']->value['closed'])) {?> <input type="checkbox" name="inscriptions[]"
        class="inscription" value="<?php echo $_smarty_tpl->tpl_vars['dataJournee']->value['date'];?>
_<?php echo $_smarty_tpl->tpl_vars['noPeriode']->value;?>
"
        data-date="<?php echo $_smarty_tpl->tpl_vars['dataJournee']->value['date'];?>
" data-periode="<?php echo $_smarty_tpl->tpl_vars['noPeriode']->value;?>
" <?php if ((isset($_smarty_tpl->tpl_vars['dataPeriode']->value['benevoles'])) && in_array($_smarty_tpl->tpl_vars['pseudo']->value,array_keys($_smarty_tpl->tpl_vars['dataPeriode']->value['benevoles']))) {?> checked<?php }?> hidden > <?php }?>
        <!--  checkbox invisible pour conserver l'information ----------------------------------------------- -->

        <div class="mb-2 zoneBadge">
          <span class="badge bg-primary"><?php echo $_smarty_tpl->tpl_vars['dataPeriode']->value['heureDebut'];?>
</span>

          <!-- si c'est un jour de congé, on laisse la cellule vide -->
          <?php if ($_smarty_tpl->tpl_vars['dataPeriode']->value['closed'] != 1) {?>
          <!-- S'il y a des inscriptions et que l'utilisateur actuel est dans la liste  -->

          <button
            type="button"
            class="btn btn-sm btn-inscription pull-right <?php if ((isset($_smarty_tpl->tpl_vars['dataPeriode']->value['benevoles'])) && in_array($_smarty_tpl->tpl_vars['pseudo']->value,array_keys($_smarty_tpl->tpl_vars['dataPeriode']->value['benevoles']))) {?> btn-danger<?php } else { ?> btn-success<?php }?>"
            data-placement="left"
            data-toggle="tooltip"
            title="Inscription ou désinscription"
            data-date="<?php echo $_smarty_tpl->tpl_vars['dataJournee']->value['date'];?>
"
            data-periode="<?php echo $_smarty_tpl->tpl_vars['noPeriode']->value;?>
"
          >
            <!-- Si l'utilisateur actif est déjà inscrit, on lui propose la désinscription   -->
            <?php if ((isset($_smarty_tpl->tpl_vars['dataPeriode']->value['benevoles'])) && in_array($_smarty_tpl->tpl_vars['pseudo']->value,array_keys($_smarty_tpl->tpl_vars['dataPeriode']->value['benevoles']))) {?> Désinscription <?php } else { ?>
            <!-- Sinon, l'inscription                                                         -->
            Inscription <?php }?>
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
          <div class="btn-group w-100">
            <button
              type="button"
              data-pseudo="<?php echo $_smarty_tpl->tpl_vars['unPseudo']->value;?>
"
              class="btn btn-sm w-100 <?php if ($_smarty_tpl->tpl_vars['pseudo']->value == $_smarty_tpl->tpl_vars['unPseudo']->value) {?>me<?php } else { ?>benevole<?php }?>"
            >
              <span class="d-md-none d-lg-block">
                <span class="check">
                  <?php if ($_smarty_tpl->tpl_vars['dataBenevole']->value['confirme'] == 1) {?><i class="fa fa-check"></i>
                  <?php }?>
                </span>
                <?php echo $_smarty_tpl->tpl_vars['dataBenevole']->value['civilite'];?>
 <?php echo $_smarty_tpl->tpl_vars['dataBenevole']->value['prenom'];?>

                <?php echo $_smarty_tpl->tpl_vars['dataBenevole']->value['nom'];?>
 <span class="badge text-bg-warning">e<?php echo $_smarty_tpl->tpl_vars['dataBenevole']->value['experience'];?>
</span>
              </span>
              
              <span
                class="d-lg-none d-md-block"
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
 
                <span class="badge text-bg-warning">e<?php echo $_smarty_tpl->tpl_vars['dataBenevole']->value['experience'];?>
</span>
              </span>
            </button>
            <button
              type="button"
              class="btn btn-sm btn-lightRed btn-confirme"
              style="width: 2em"
              title="Confirmer l'inscription"
              data-pseudo="<?php echo $_smarty_tpl->tpl_vars['unPseudo']->value;?>
"
              data-periode="<?php echo $_smarty_tpl->tpl_vars['noPeriode']->value;?>
"
              data-date="<?php echo $_smarty_tpl->tpl_vars['dataJournee']->value['date'];?>
"
            >
              <i class="fa fa-check"></i>
            </button>
          </div>
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

<?php echo '<script'; ?>
>
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
<?php echo '</script'; ?>
>
<?php }
}
