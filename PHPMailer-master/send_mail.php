<?php

require '../PHPMailer-master/src/Exception.php';
// require './src/OAuth.php';
// require './src/OAuthTokenProvider.php'; 
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/POP3.php';
require '../PHPMailer-master/src/SMTP.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
// require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
function send_mail($email, $name, $title, $content) {
    
    $mail = new PHPMailer(true);
    $mail->CharSet = "UTF-8";

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '23shoestore.ha@gmail.com';                     //SMTP username
    $mail->Password   = 'gbiasvkuugskowaj';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    // $mail->Port       = 465;
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->SMTPSecure = "tls";
    // $mail->charSet    = "UTF-8";                                    
    $mail->Encoding = 'base64';
    //Recipients
    $mail->setFrom('23shoestore.ha@gmail.com', '23 Shoe Store');
    $mail->addAddress($email, $name);     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $title;
    $mail->Body    = $content;

    // echo 'Message has been sent';
    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
    // header('location:../collection/index.php');
    // exit;
}