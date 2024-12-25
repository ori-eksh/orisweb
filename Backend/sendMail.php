<?php
function sendConfirmationEmail($email, $name) {
    $to = $email;
    $subject = 'Ad Confirmation';
    $message = "Hi $name,\n\nYour ad was successfully posted.\n\nThanks,\nBulletin Board Team";
    $headers = 'From: noreply@ramathod.local' . "\r\n" .
               'Reply-To: noreply@ramathod.local' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        return true;
    } else {
        error_log('Error sending email to ' . $email);
        return false;
    }
}
