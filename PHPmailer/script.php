<?php 
// namespaces

use PHPMailer\PhpMailer\Exception;
use PHPMailer\PhpMailer\PHPMailer;
use PHPMailer\PhpMailer\SMTP;

require_once 'config.php';

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

function sendMail($email, $subject, $message) {
    //Creating a new PhpMailer object
    $mail = new PHPMailer(true);

    //Using the SMTP protocol to send the email
    $mail->isSMTP();
    
    //allow gmal login details to send the email
    $mail->SMTPAuth = true;

    $mail->Host = MAILHOST;

    $mail->Username = USERNAME;

    $mail->Password = PASSWORD;

    //encrypt our email when it gets received by the server.
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    $mail->Port = 587;

    //who is sending the email;
    $mail->setFrom(SEND_FROM, SEND_FROM_NAME);

    $mail->addAddress($email);

    $mail->addReplyTo(REPLY_TO, REPLY_TO_NAME);


    $mail->isHTML(true);

    $mail->Subject = $subject;

    $mail->Body = $message;

    if(!$mail->send()) {
        return "Email sending failed";
    } 
    return "Success";
}

