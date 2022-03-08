<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/**
 * PHPMailer autoloader
 */
require '../vendor/autoload.php';
require '../classes/Config.php';

/**
 * Chek PHPMailer is loaded
 */
$mail = new PHPMailer(true);

try{

/**
 * Server Settings
 */
$mail->HOST = Config::SMTP_HOST;
$mail->PORT = Config::SMTP_PORT;
$mail->SMTPAuth = true;
$mail->Username = Config::SMTP_USER;
$mail->Password = Config::SMTP_PASSWORD;
$mail->SMTPSecure = 'ssl';    

/**
 * Recipients
 */
$mail->setFrom('no-reply@email', 'Admin');
$mail->addAddress('email@email.com', 'Recipient');
// $mail->addAddress('additionalemail.com', 'Recipient');
$mail->addReplyTo('hello@corvdesigns.com', 'Sender');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

/**
 * Content Settings
 */
$mail->CharSet = "UTF-8";
$mail->isHTML(true); 

/**
 * Content
 */
$mail->Subject = 'PHPMailer test';
$mail->Body = '<h2>This is an HTML body tag</h2>';
$mail->AltBody = "This is the body in plain text for non-HTML mail clients. \nUse breaks in order to separate paragraphs. \n\nThe Admin";
// $mail->addAttachment(dirname(__FILE__) . '/assets/dummy.pdf', '25124142.pdf');
// $mail->addEmbeddedImage(dirname(__FILE__) . 'logo.png', 'logo');

/**
 * Confirmation Message
 */
$mail->send();
echo 'Your message has been sent.';
} catch (Exception $e) {
echo "Your message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}