<?php

session_start();

require_once 'config.inc.php';

// ressources principales toujours nécessaires: classes Application, User, Smarty, 
// valeur de $action
include 'inc/entetes.inc.php';

$daysOfWeek = $Application->getDaysName();

// fixation de la date "année" et "mois". Par défaut, année et mois actuels
$year = isset($_GET['year']) ? $_GET['year'] : date('Y');
$month = isset($_GET['month']) ? $_GET['month'] : date('n');

$year = intval($year);
$month = intval($month);

$ceJour = date("d/m/Y");

// nombre de jours dans ce mois

$nbJours = cal_days_in_month(CAL_GREGORIAN, $month, $year);

// ---------------------------------------------------------------------------------
// établir une grille vide des périodes de permanences pour le mois sélectionné
// la fonction recherche automatiquement à quelle contexte cela correspond

$monthGrid = $Planning->getMonthGrid($month, $year);

// ---------------------------------------------------------------------------------
// recherche des inscriptions au planning dans cette période $month / $year
$inscriptions = $Planning->getInscriptions($month, $year);

// rattachement des inscriptions aux jours et périodes dans la grille générale
foreach ($inscriptions as $jourDuMois => $lesPeriodes) {
    foreach ($lesPeriodes as $numeroPeriode => $lesBenevoles) {
        foreach ($lesBenevoles as $pseudo => $unBenevole)
            $monthGrid[$jourDuMois]['periodes'][$numeroPeriode]['benevoles'][$pseudo] = $unBenevole;
    }
}

// --------------------------------------------------------------------------------
// tous les jours de congé, hebdomadaires et fériés
$listeCongesFeries = $Conges->getListeCongesFeries();
$listeCongesHebdo = $Conges->getListeCongesHebdo();

// marquage des jours et périodes de fermetures dans la grille générale
foreach ($monthGrid as $jourDuMois => $detailsJour) {
    $idContexte = $detailsJour['idContexte'];
    $date = $detailsJour['date'];
    $noJourSemaine = $detailsJour['noJourSemaine'];

    foreach ($detailsJour['periodes'] as $noPeriode => $detailsPeriode) {
        if (
            ($listeCongesFeries[$idContexte][$date][$noPeriode] == 1)
            || ($listeCongesHebdo[$idContexte][$noJourSemaine][$noPeriode] == 1)
        )
            $monthGrid[$jourDuMois]['periodes'][$noPeriode]['closed'] = 1;
    }
}

// ---------------------------------------------------------------------
// déterminer le nombre maximum de colonnes à présenter
// pour la grille PDF
$nbColonnes = $Planning->getMaxPeriodes4month($month, $year, $nbJours);
$smarty->assign('nbColonnes', $nbColonnes);

$smarty->assign('monthGrid', $monthGrid);

$pseudo = $User->getPseudo();

$identite = $User->getIdentiteUser($pseudo);
$smarty->assign('identite', $identite);

$monthName = $Application->monthName($month);
$smarty->assign('monthName', $monthName);

$smarty->assign('year', $year);
$smarty->assign('month', $month);

$smarty->assign('ceJour', $ceJour);

$smarty->assign('inscriptions', $inscriptions);

// ----------------------------------------------------------
$planningPDF = $smarty->fetch('planningPDF.tpl');

// Application::afficher($planningPDF, true);

require INSTALL_DIR.'/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf('P','A4','fr');

$html2pdf->WriteHTML($planningPDF);

$html2pdf->Output("planning_{$monthName}_{$year}.pdf", 'D');