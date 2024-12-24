<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendConfirmationEmail($email, $name) {
    $mail = new PHPMailer(true); // Enable exceptions
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Gmail SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'ramathod8@gmail.com'; // Your Gmail address
        $mail->Password = '12345678Rr'; // App-specific password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('ramathod8@gmail.com', 'Bulletin Board'); // Must match your Gmail
        $mail->addAddress($email, $name);

        // Content
        $mail->isHTML(false); // Plain text email
        $mail->Subject = 'Ad Confirmation';
        $mail->Body = "Hi $name,\n\nYour ad was successfully posted.\n\nThanks,\nBulletin Board Team";

        $mail->send();
        return true; // Email sent successfully
    } catch (Exception $e) {
        error_log('Mailer Error: ' . $mail->ErrorInfo); // Log the error
        return false; // Email failed to send
    }
}
?>

