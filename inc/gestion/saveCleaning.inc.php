<?php

session_start();

require_once '../../config.inc.php';

// ressources principales toujours nécessaires: classes Application, User, Smarty, 
include '../entetes.inc.php';

$formulaire = isset($_POST['formulaire']) ? $_POST['formulaire'] : null;
$form = array();
parse_str($formulaire, $form);

$nb = 0;
foreach ($form as $fieldName => $wtf) {
    $laPeriode = explode('_', $fieldName);
    $year = $laPeriode[0];
    $month = $laPeriode[1];
    $nb += $Planning->deleteCalendar($year, $month);
}

echo $nb;