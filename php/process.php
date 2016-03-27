<?php
include('config.php');
/*
 * The config file contain :
 * $email_a
 * $email_cc
 * $email_cci
 * $subject
 */

$name = $_POST['name1'];
$email = $_POST['email1'];
$destination = $email_a;

$message = nl2br(htmlentities($_POST['message1']));
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $subject = $email_subject;
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'To: ' . $destination . "\r\n";
    $headers .= 'From: ' . $name . ' <' . $email . '>' . "\r\n";
    if ($email_cci) {
        $headers .= "Bcc: " . $email_cci . "\r\n";
    }
    $template = $message . '<br/><br/>' . $name . '<br/>' . $email . '<br/>';
    $sendmessage = $template;
    $sendmessage = wordwrap($sendmessage, 70);
    mail($destination, $subject, $sendmessage, $headers);
    echo '<div class="alert alert-success" role="alert">Votre message a bien été envoyé, vous recevrez une réponse dans moins de 72 heures !</div>';
} else {
    echo '<div class="alert alert-danger" role="alert">Adresse e-mail invalide</div>';
}