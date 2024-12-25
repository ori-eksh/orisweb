<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files with the correct path
require __DIR__ . '/PHPMailer-master/src/PHPMailer.php';
require __DIR__ . '/PHPMailer-master/src/SMTP.php';
require __DIR__ . '/PHPMailer-master/src/Exception.php';

function sendConfirmationEmail($email, $name) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ramathod8@gmail.com'; // Replace with your Gmail
        $mail->Password = '0098OdORI'; // Replace with your app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->SMTPDebug = 2; // Debug level: 0 = off, 2 = verbose debug

        $mail->setFrom('ramathod8@gmail.com', 'Bulletin Board');
        $mail->addAddress($email, $name);

        $mail->isHTML(true);
        $mail->Subject = 'Ad Confirmation';
        $mail->Body    = "<p>Hi $name,</p><p>Your ad was successfully posted.</p>";
        $mail->AltBody = "Hi $name,\n\nYour ad was successfully posted.";

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Mailer Error: {$mail->ErrorInfo}");
        return false;
    }
}
