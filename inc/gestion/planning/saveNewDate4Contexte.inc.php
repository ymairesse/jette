<?php

session_start();

require_once '../../config.inc.php';

// ressources principales toujours nécessaires: classes Application, User, Smarty, 
include '../entetes.inc.php';

$formulaire = isset($_POST['formulaire']) ? $_POST['formulaire'] : Null;

$form = array();
parse_str($formulaire, $form);

$idContexte = isset($form['idContexte']) ? $form['idContexte'] : Null;
$dateContexte = isset($form['dateContexte']) ? $form['dateContexte'] : Null;

$nb = $Planning->saveNewDate4Contexte($idContexte, $dateContexte);

echo $nb;