<?php

session_start();

require_once '../../config.inc.php';

// ressources principales toujours nécessaires: classes Application, User, Smarty, 
include '../entetes.inc.php';


// liste des mois de fonctionnements de l'application
$listeMois = $Planning->getCalendarMonths();

$todayYear = date('Y');
$todayMonth = date('m'); 

$today = $todayYear.$todayMonth;

foreach ($listeMois as $monthYear => $data){
	// recherche des dates dans le passé % aujourd'hui
	if ($data['year'].$data['month'] < $today)
		$listeMois[$monthYear]['past'] = 1;
		else $listeMois[$monthYear]['past'] = 0;
}

$smarty->assign('listeMois', $listeMois);

$smarty->display('gestion/modal/modalCleaning.tpl');