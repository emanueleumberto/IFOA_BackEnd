<?php

// Invia una mail di conferma

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; 
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'sandbox.smtp.mailtrap.io';             //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'e3d7d37f62a4ea';                       //SMTP username
    $mail->Password   = '6760ef448d045d';                       //SMTP password
    $mail->Port       = 2525;                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


    //Recipients
    $mail->setFrom('admin@example.com', 'Mario Rossi');
    $mail->addAddress($email, $firstname . ' ' . $lastname);     //Add a recipient
    $mail->addReplyTo('admin@example.com', 'Information');

    //Attachments
    $mail->addAttachment($image);    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Grazie per esserti Registrato sul nostro sito';
    $mail->Body    = '<h1>Grazie!!!!</h1><p>Ti aspettiamo sulla nostra rubrica</p>';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>