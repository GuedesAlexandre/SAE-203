<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

/*$to = "alexandreguedes77600@gmail.com";
$subject = $_POST["object"];

$message = $_POST["Comment"];

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


mail($to,$subject,$message,$headers);
header("Location : index.html");*/
$body = $_POST["Comment"];
$mail = new PHPMailer(true);

$mail->SMTPDebug = 0;

$mail->isSMTP();

$mail->Host = 'localhost';

$mail->SMTPAuth = true;

$mail->Username = "";

$mail->Password = "";

$mail->Port = 25;

$mail->From = "test@testmail.com";

$mail->FromName = "Letecode";

$mail->addAddress("recipient@email.com", "recipient name");

$mail->isHTML(true);

$mail->Subject = $_POST["object"];

$mail->Body = "<i>$body</i>";

$mail->AltBody = "This is the plain text version of the email content";


try {

    $mail->send();

    echo "Message has been sent successfully";

} catch (Exception $e) {

    echo "Mailer Error: " . $mail->ErrorInfo;

}
?>