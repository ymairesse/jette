<?php

// Édition des profils des utilisateurs par un user "root"

session_start();

require_once '../../config.inc.php';

// ressources principales toujours nécessaires: classes Application, User, Smarty, 
include '../entetes.inc.php';

$pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : Null;
$date = isset($_POST['date']) ? $_POST['date'] : Null;
$periode = isset($_POST['periode']) ? $_POST['periode'] : Null;
$idContexte = $Planning->getContexte4date($date);

$confirme = $Planning->checkUncheck($idContexte, $pseudo, $date, $periode);

echo $confirme;