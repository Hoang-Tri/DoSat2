<?php

require 'mail/PHPMailer/src/Exception.php';
require 'mail/PHPMailer/src/PHPMailer.php';
require 'mail/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


class Mailer {
    public function sendMail($title, $content, $addressMail) {
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->CharSet = "utf-8";
            //Server settings
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'tthai9123456@gmail.com';                   //SMTP username
            $mail->Password   = 'qeum bbya gjfq wgpp';                   //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;                                  //Enable SSL encryption
            $mail->Port       = 465;                                    //TCP port to connect to

            //Recipients
            $mail->setFrom('tthai9123456@gmail.com');
            $mail->addAddress($addressMail);     //Add a recipient

            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $title;
            $mail->Body    = $content;

            $mail->send();
            return true;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }
}
?>


