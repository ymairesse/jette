<?php

session_start();

require_once '../../config.inc.php';

// ressources principales toujours nécessaires: classes Application, User, Smarty, 
include '../entetes.inc.php';

$formulaire = isset($_POST['formulaire']) ? $_POST['formulaire'] : Null;

$form = array();
parse_str($formulaire, $form);

$lastContexte = isset($form['lastContexte']) ? $form['lastContexte'] : Null;
$dateDebutContexte = isset($form['dateDebutContexte']) ? $form['dateDebutContexte'] : Null;
if ($lastContexte < $dateDebutContexte)
    $nb = $Planning->saveNewContexte($dateDebutContexte);
else
    $nb = 0;

echo $nb;