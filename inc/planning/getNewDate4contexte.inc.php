<?php

session_start();

require_once '../../config.inc.php';

// ressources principales toujours nécessaires: classes Application, User, Smarty, 
include '../entetes.inc.php';

$idContexte = isset($_POST['idContexte']) ? $_POST['idContexte'] : Null;
$dateActuelle = isset($_POST['dateActuelle']) ? $_POST['dateActuelle'] : Null;
$datePrecedente = isset($_POST['datePrecedente']) ? $_POST['datePrecedente'] : Null;
$dateSuivante = isset($_POST['dateSuivante']) ? $_POST['dateSuivante'] : Null;

$smarty->assign('idContexte', $idContexte);
$smarty->assign('dateActuelle', $dateActuelle);
$smarty->assign('datePrecedente', $datePrecedente);
$smarty->assign('dateSuivante', $dateSuivante);

$smarty->display('planning/modal/modalEditDate4contexte.tpl');