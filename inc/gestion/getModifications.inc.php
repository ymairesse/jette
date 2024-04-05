<?php

session_start();

require_once '../../config.inc.php';

// ressources principales toujours nécessaires: classes Application, User, Smarty, 
include '../entetes.inc.php';

$year = isset($_POST['year']) ? $_POST['year'] : Null;
$month = isset($_POST['month']) ? $_POST['month'] : Null;
// on récupère le pseudo de l'utilisateur concerné
$pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : Null;

// -----------------------------------------------------------------------
// ensemble des inscriptions figurant dans la BD
$oldInscriptions = $Planning->getInscriptionsArray($month, $year, $pseudo);

// -----------------------------------------------------------------------
// le formulaire revient avec toutes les cases cochées pour les anciennes
// et les nouvelles inscriptions de l'utilisateur courant
$formulaire = isset($_POST['formulaire']) ? $_POST['formulaire'] : Null;
$form = array();
parse_str($formulaire, $form);

$newInscriptions = $form['inscriptions'];
// pour s'assurer que $newInscriptions soit un array (compatible avec array_diff)
if ($newInscriptions == NULL)
    $newInscriptions = array();

// -----------------------------------------------------------------------
// périodes ajoutées
$added = array_diff($newInscriptions, $oldInscriptions);
$nbAdded = count($added);

// périodes disparues
$deleted = array_diff($oldInscriptions, $newInscriptions);
$nbDeleted = count($deleted);

$message = sprintf('<span class="text-center">Vous allez supprimer <strong>%d</strong> période(s) et ajouter <strong>%d</strong> période(s) de permanence', $nbDeleted, $nbAdded);
$message .= '<br>VEUILLEZ CONFIRMER</span>';

echo $message;
