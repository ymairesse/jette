<?php

session_start();

require_once '../../config.inc.php';

// ressources principales toujours nécessaires: classes Application, User, Smarty, 
include '../entetes.inc.php';

$formulaire = isset($_POST['formulaire']) ? $_POST['formulaire'] : Null;

$form = array();
parse_str($formulaire, $form);

$dateContexte = isset($form['dateContexte']) ? $form['dateContexte'] : Null;
$idContexte = isset($form['idContexte']) ? $form['idContexte'] : Null;

$nb = $Planning->saveDateContexte($idContexte, $dateContexte);

echo $nb;
