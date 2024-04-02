<?php

session_start();

require_once '../../config.inc.php';

// ressources principales toujours nécessaires: classes Application, User, Smarty,
include '../entetes.inc.php';

$pseudoUser = isset($_POST['pseudo']) ? $_POST['pseudo'] : null;
$myPseudo = $User->getPseudo();

if ($myPseudo == $pseudoUser)
    $n = -1;
else
    $n = $User->delUser($pseudoUser);

echo $n;