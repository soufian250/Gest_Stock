<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
/*  require 'PHPMailer/SMTP.php';
  // Instantiation and passing `true` enables exceptions
  $mail = new PHPMailer(true);

  try {
  //Server settings
  $mail->isSMTP();
  $mail->Host       = 'smtp.gmail.com';
  $mail->SMTPAuth   = true;
  $mail->Password   = 'Hamza gt5';
  $mail->SMTPSecure = 'tls';
  $mail->Port       = 587;

  //Recipients
  $mail->setFrom('hamza.nfs02@gmail.com', 'Mailer');
  $mail->addAddress('hamza.nfs02@gmail.com', 'User');

  // Content
  $mail->isHTML(true);
  $mail->Subject = 'Here is the subject';
  $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  $mail->send();
  echo 'Message has been sent';
  } catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  } */

//Reset Password

$mail = new PHPMailer(false);

$mail->addAddress("Hamza.nfs02@gmail.com");
$mail->setFrom("hamza.gt5@outlook.com");
$mail->isHTML(true);

$mail->Subject = "Reset Password";
$mail->Body = "Hello";

if ($mail->send()) {
    echo 'true';
} else {
    echo 'false ' . $mail->ErrorInfo;
}
?>