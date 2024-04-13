<?php

$token = isset($_GET['token']) ? $_GET['token'] : Null;
$acronyme = isset($_GET['acronyme']) ? $_GET['acronyme'] : Null;


$identite = $Application->getUser4token($acronyme, $token);
$smarty->assign('identite', $identite);
$smarty->assign('token', $token);

$smarty->assign('noButtons', true);

$smarty->assign('corpsPage', 'renewPasswd');

