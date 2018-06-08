<?php

$email_destinataire = "emailaddress@test.com"; //DESTINATAIRE EMAIL HERE
$subject = "Formulaire de Contact Test";

if (isset($_POST) && !empty($_POST)) {
    $lname = $_POST["lname"];
    $fname = $_POST["fname"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // prepare email body text
    $message_body = "";
    $message_body .= "Nom: ";
    $message_body .= $lname;
    $message_body .= "\n<br>";
    $message_body .= "Prenom: ";
    $message_body .= $fname;
    $message_body .= "\n<br>";
    $message_body .= "Email: ";
    $message_body .= $email;
    $message_body .= "\n<br>";
    $message_body .= "Texte: ";
    $message_body .= $message;
    $message_body .= "\n<br>";

    //echo $message_body;die;
    // EMAIL SENDING
    $success = mail($email_destinataire, $subject, $message_body, "From:".$email);
    // redirect to success page
    if ($success) {
        echo "success";
    } else {
        echo "Something went wrong!!";
    }
} else {
    echo "Something went wrong!!";
}

?>