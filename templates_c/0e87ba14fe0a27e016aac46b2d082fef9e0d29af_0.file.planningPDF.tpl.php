<?php
/* Smarty version 4.3.1, created on 2024-04-01 19:30:10
  from '/home/yves/www/newOxfam/templates/planningPDF.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_660aef228a7a29_42890416',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0e87ba14fe0a27e016aac46b2d082fef9e0d29af' => 
    array (
      0 => '/home/yves/www/newOxfam/templates/planningPDF.tpl',
      1 => 1711992586,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660aef228a7a29_42890416 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/yves/www/newOxfam/vendor/smarty/smarty/libs/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<link
  rel="stylesheet"
  href="fa/css/font-awesome.min.css"
  type="text/css"
  media="screen, print"
/>

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

  <h1>Planning <?php echo $_smarty_tpl->tpl_vars['monthName']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</h1>

  <p>
    Version du <strong><?php echo $_smarty_tpl->tpl_vars['ceJour']->value;?>
</strong> générée par
    <strong><?php echo $_smarty_tpl->tpl_vars['identite']->value['prenom'];?>
 <?php echo $_smarty_tpl->tpl_vars['identite']->value['nom'];?>
</strong>
  </p>
  <?php $_smarty_tpl->_assignInScope('colWidth', 630/($_smarty_tpl->tpl_vars['nbColonnes']->value+1));?>

  <table>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['monthGrid']->value, 'dataJournee', false, 'jourDuMois');
$_smarty_tpl->tpl_vars['dataJournee']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['jourDuMois']->value => $_smarty_tpl->tpl_vars['dataJournee']->value) {
$_smarty_tpl->tpl_vars['dataJournee']->do_else = false;
?>
    <tr>
      <td style="width: <?php echo $_smarty_tpl->tpl_vars['colWidth']->value;?>
px">
        <?php echo $_smarty_tpl->tpl_vars['dataJournee']->value['nomDuJour'];?>
 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['dataJournee']->value['date'],"%d");?>

      </td>

      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dataJournee']->value['periodes'], 'dataPeriode', false, 'noPeriode');
$_smarty_tpl->tpl_vars['dataPeriode']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['noPeriode']->value => $_smarty_tpl->tpl_vars['dataPeriode']->value) {
$_smarty_tpl->tpl_vars['dataPeriode']->do_else = false;
?>

      <td class="benevoles"
        style="<?php if ($_smarty_tpl->tpl_vars['dataPeriode']->value['closed']) {?>background: #ccc<?php }?>; width: <?php echo $_smarty_tpl->tpl_vars['colWidth']->value;?>
px"
      >
        <div><?php echo $_smarty_tpl->tpl_vars['dataPeriode']->value['heureDebut'];?>
</div>
        <div class="listeBenevoles">
          <?php if ((isset($_smarty_tpl->tpl_vars['dataPeriode']->value['benevoles']))) {?> <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dataPeriode']->value['benevoles'], 'dataBenevole', false, 'unPseudo');
$_smarty_tpl->tpl_vars['dataBenevole']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['unPseudo']->value => $_smarty_tpl->tpl_vars['dataBenevole']->value) {
$_smarty_tpl->tpl_vars['dataBenevole']->do_else = false;
?>

          <div style="padding: 3px">
            <strong>
              <?php if ($_smarty_tpl->tpl_vars['dataBenevole']->value['confirme'] == 1) {?><i class="fa fa-check"></i> <?php }?>
              <?php echo $_smarty_tpl->tpl_vars['dataBenevole']->value['prenom'];?>
 <?php echo substr($_smarty_tpl->tpl_vars['dataBenevole']->value['nom'],0,1);?>
.
            </strong>
          </div>
          <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> 
          <?php }?>
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

  <page_footer> Imprimé le <?php echo smarty_modifier_date_format(time(),'%d/%m/%Y');?>
 </page_footer>
</page>
<?php }
}
