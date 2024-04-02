<?php

// Édition des profils des utilisateurs par un user "root"

session_start();

require_once '../../config.inc.php';

// ressources principales toujours nécessaires: classes Application, User, Smarty, 
include '../entetes.inc.php';

$listeMonths = $Planning->getListeMonths();
$freezes = $Planning->getFreezings4month($listeMonths);

$smarty->assign('freezes', $freezes);
$smarty->assign('listeMonths', $listeMonths);

$smarty->display('gestion/modal/modalFreezes.tpl');
