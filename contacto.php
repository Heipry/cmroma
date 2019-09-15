<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'lib/PHPMailer/src/Exception.php';
require 'lib/PHPMailer/src/PHPMailer.php';
require 'lib/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.easyname.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = '161266mail1';                 // SMTP username
    $mail->Password = 'ramonR';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress('web@cmroma.es');     // Add a recipient
    $mail->addReplyTo($_POST['email'], $_POST['name']);

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $_POST['subject'];
    $mail->Body    = $_POST['message'];
    $mail->AltBody = $_POST['message'];

    $mail->send();
    echo 'El mensaje ha sido enviado';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>
<!DOCTYPE HTML>
<html lang="es">
<meta charset="UTF-8">
<head>
	<script>alert("Gracias por contactar. Le responderemos tan pronto como sea posible.");</script>
	<meta HTTP-EQUIV="REFRESH" content="0; url=http://cmroma.es"> 
</head>