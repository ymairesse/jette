<?php

// Édition des profils des utilisateurs par un user "root"

session_start();

require_once '../../config.inc.php';

// ressources principales toujours nécessaires: classes Application, User, Smarty, 
include '../entetes.inc.php';

$formulaire = isset($_POST['formulaire']) ? $_POST['formulaire'] : Null;
$form = array();
parse_str($formulaire, $form);

// enregistrement des approbations
$approuve = 0;
foreach ($form as $field => $value) {
    $field = explode('_', $field);
    $pseudo = $field[1];
    if ($value == 1)
        $approuve += $Planning->approuve($pseudo);
}

// envoi des mails de confirmation

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require INSTALL_DIR . '/vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

//Server settings
$mail->SMTPDebug = 0;
$mail->isSMTP();                                            //Send using SMTP
$mail->Host = 'ssl0.ovh.net';                     //Set the SMTP server to send through
$mail->SMTPAuth = true;                                   //Enable SMTP authentication
$mail->Username = MAILADMIN;                     //SMTP username
$mail->Password = 'adminmai76641';                               //SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
$mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

$mail->CharSet = 'UTF-8';
$mail->Encoding = 'base64';

//Recipients
$mailExp = MAILADMIN;
$nomExp = NOMADMIN;

$mail->setFrom(MAILADMIN, NOMADMIN);

$mail->isHTML(true);                                  //Set email format to HTML
$mail->Subject = 'Approbation de votre inscription';

$envoye = 0;
$echoue = 0;

foreach ($form as $field => $value) {
    if ($value == 1) {
        try {
            $field = explode('_', $field);
            $pseudo = $field[1];
            $identite = User::getIdentiteUser(($pseudo));

            $smarty->assign('identite', $identite);
            $smarty->assign('pseudo', $pseudo);
            $smarty->assign('URL', URL);

            $texteMail = $smarty->fetch('users/inc/texteMailApprobation.tpl');

            $email = $identite['mail'];
            $prenomNom = sprintf('%s %s', $identite['prenom'], $identite['nom']);
            $mail->addAddress($email, $prenomNom);

            $mail->Body = $texteMail;

            $mail->send();
            $envoye++;

        } catch (Exception $e) {
            $echoue++;
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}

$resultat = array(
    'approuve' => $approuve,
    'envoye' => $envoye,
    'echoue' => $echoue
);

$resultatJSON = json_encode($resultat);

echo $resultatJSON;