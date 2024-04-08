<?php

session_start();

require_once '../../config.inc.php';

// ressources principales toujours nécessaires: classes Application, User, Smarty, 
include '../entetes.inc.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require INSTALL_DIR . '/vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$formulaire = isset($_POST['formulaire']) ? $_POST['formulaire'] : Null;

$form = array();
parse_str($formulaire, $form);

// enregistrer les données utilisateur
$nb = User::saveNewUser($form);

$texteMail = file_get_contents(INSTALL_DIR . '/templates/users/inc/mailInscription.tpl');

if ($nb == 1) {
    try {
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

        // destinataire
        $email = $form['mail'];
        $nom = $form['nom'];
        $prenom = $form['prenom'];
        $prenomNom = sprintf('%s %s', $prenom, $nom);

        $mail->addAddress($email, $prenomNom);

        // ajouter les admins en CC
        $listeAdmins = $Application->getListeAdmins();
        foreach ($listeAdmins as $pseudo => $unAdmin) {
            $nomPrenomAdmin = sprintf('%s %s', $ligne['nom'], $ligne['prenom']);
            $mail->addBCC($unAdmin['mail'], $nomPrenomAdmin);
        }

        $texteMail = str_replace('{nom}', $nom, $texteMail);
        $texteMail = str_replace('{prenom}', $prenom, $texteMail);
        $texteMail = str_replace('{email}', $email, $texteMail);

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Bienvenue ' . $prenomNom;
        $mail->Body = $texteMail;

        $mail->send();
        $nb = 1;
    } catch (Exception $e) {
        $nb = -1;
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

$resultat = array(
    'nb' => $nb,
    'form' => $form
);
$resultatJSON = json_encode($resultat);

echo $resultatJSON;
