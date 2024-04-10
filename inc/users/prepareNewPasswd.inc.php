<?php

session_start();

require_once '../../config.inc.php';

// ressources principales toujours nécessaires: classes Application, User, Smarty, 
// valeur de $action
include '../entetes.inc.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require INSTALL_DIR . '/vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$identifiant = isset($_POST['identifiant']) ? strtolower(trim($_POST['identifiant'])) : Null;

// est-ce une adresse mail?
$qui = false;
if (filter_var($identifiant, FILTER_VALIDATE_EMAIL)) {
    // vérifions que l'adresse mail existe dans la table des users en retournant
    // le couple pseudo/adresse mail
    $qui = User::getIdentite4mail($identifiant);
} else {
    // vérifions que l'adresse mail existe dans la table des users en retournant
    // le couple pseudo/adresse mail
    $qui = User::getIdentiteUser($identifiant);
}

if ($qui != false) {
    try {
        //Server settings
        $mail->SMTPDebug = 0;
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'ssl0.ovh.net';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = MAILADMIN;                     //SMTP username
        $mail->Password = PASSWDMAIL;                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';

        //Recipients
        $mailExp = MAILADMIN;
        $nomExp = NOMADMIN;
        $mail->setFrom(MAILADMIN, NOMADMIN);

        $date = date('d/m/Y');
        $heure = date('H:i');

        $pseudo = $qui['pseudo'];
        // reset d'un éventuel Token précédent
        $nb = User::clearToken($pseudo);
        // création d'un nouveau Token
        $link = User::createPasswdLink($pseudo);

        $identite = User::getIdentiteUser($pseudo);
        $identiteReseau = User::identiteReseau();

        $smarty->assign('expediteur', MAILADMIN);
        $smarty->assign('URL', URL);
        $smarty->assign('link', $link);
        $smarty->assign('identite', $identite);
        $smarty->assign('identiteReseau', $identiteReseau);
        $smarty->assign('date', $date);
        $smarty->assign('heure', $heure);

        $texteMail = $smarty->fetch('users/inc/texteMailmdp.tpl');

        $email = $identite['mail'];
        $prenomNom = sprintf('%s %s', $identite['prenom'], $identite['nom']);
        $mail->addAddress($email, $prenomNom);

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Renouvellement de votre mot de passe';
        $mail->Body = $texteMail;

        $mail->send();
        $nb = 1;

    } catch (Exception $e) {
        $nb = -1;
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    $texte = sprintf('Nous venons d\'envoyer un mail à l\'adresse <a href="mailto:%s">%s</a>.<br>', $identite['mail'], $identite['mail']);
    $texte .= 'Il contient un lien qui vous permettra de changer votre mot de passe ';
    echo $texte;
} else
    die("L'utilisateur <strong>" . $identifiant . "</strong> n'existe pas dans notre base de données.");
