<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once 'PHPMailer/PHPMailer.php';
require_once 'PHPMailer/Exception.php';


//Reset Password
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer();

$mail->addAddress("Hamza.nfs02@gmail.com");
$mail->setFrom("hello@codingpassiveincome.com", "CPI");
$mail->isHTML(true);

$mail->Subject = "Reset Password";
$mail->Body = "Hello";

if ($mail->send()) {
    echo 'true';
} else {
    echo 'false '.$mail->ErrorInfo;
}
?>