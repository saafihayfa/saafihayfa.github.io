<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Inclusion des fichiers de PHPMailer
require '..\forms\PHPMailer-master\src\Exception.php';
require '..\forms\PHPMailer-master\src\PHPMailer.php';
require '..\forms\PHPMailer-master\src\SMTP.php';


// Informations d'authentification SMTP
$smtp_username = 'f376f67d124e8c'; // Votre adresse e-mail SMTP
$smtp_password = 'e93d277edbc023'; // Votre mot de passe SMTP

// Instanciation de PHPMailer
$mail = new PHPMailer(true);

try {
    // Paramètres SMTP
    $mail->isSMTP();
    $mail->Host = 'sandbox.smtp.mailtrap.io'; // Remplacez par votre serveur SMTP
    $mail->SMTPAuth = true;
    $mail->Username = $smtp_username;
    $mail->Password = $smtp_password;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Destinataire, expéditeur, sujet et corps de l'e-mail
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress('saafi1.hayfa@gmail.com'); // Remplacez par votre adresse e-mail réelle
    $mail->Subject = $_POST['subject'];
    $mail->Body = $_POST['message'];

    // Envoi de l'e-mail
    $mail->send();
    echo 'E-mail envoyé avec succès.';
} catch (Exception $e) {
    echo 'Erreur lors de l\'envoi de l\'e-mail : ', $mail->ErrorInfo;
}
?>

