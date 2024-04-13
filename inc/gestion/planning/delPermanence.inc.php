<?php

session_start();

require_once '../../config.inc.php';

// ressources principales toujours nécessaires: classes Application, User, Smarty, 
include '../entetes.inc.php';

$idContexte = isset($_POST['idContexte']) ? $_POST['idContexte'] : Null;
$numeroPermanence = isset($_POST['numeroPermanence']) ? $_POST['numeroPermanence'] : Null;

$nb = $Planning->delPermanence($idContexte, $numeroPermanence);

echo $nb;