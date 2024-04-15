<?php

session_start();

require_once '../../config.inc.php';

// ressources principales toujours nécessaires: classes Application, User, Smarty, 
// valeur de $action
include '../entetes.inc.php';

// liste avec tri sur les prénoms
$usersList = $User-> getListeUsers('parPrenom');


$smarty->assign('usersList', $usersList);

$smarty->display('users/modal/modalMail.tpl');
