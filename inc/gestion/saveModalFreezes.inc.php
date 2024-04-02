<?php

// Édition des profils des utilisateurs par un user "root"

session_start();

require_once '../../config.inc.php';

// ressources principales toujours nécessaires: classes Application, User, Smarty, 
include '../entetes.inc.php';

$formulaire = isset($_POST['formulaire']) ? $_POST['formulaire'] : Null;
$form = array();
parse_str($formulaire, $form);

$nb = 0;

foreach ($form as $fieldName => $value) {
    $date = explode('_', $fieldName)[1];
    $nb += $Planning->saveFreezeStatus($date, $value);
}

echo $nb;