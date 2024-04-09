<?php

session_start();

require_once '../../config.inc.php';

// ressources principales toujours nécessaires: classes Application, User, Smarty, 
include '../entetes.inc.php';

$unApprovedList = $Planning->getUnapprovedUsers();

$smarty->assign('listeUsers', $unApprovedList);
$smarty->display('gestion/modal/modalApprobation.tpl');