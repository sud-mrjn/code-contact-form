<?php

$errorMSG = "";

// NAME
if (isset($_POST["name"]) && empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
    $Name = $_POST["name"];
}

// EMAIL
if (isset($_POST["email"]) && empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $Email = $_POST["email"];
}

// MESSAGE
if (isset($_POST["message"]) && empty($_POST["message"])) {
    $errorMSG .= "Message is required ";
} else {
    $Messageessage = $_POST["message"];
}


$EmailTo = "emailaddress@test.com";
$Subject = "New Message Received";

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $Nameame;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Emailmail;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $Messageessage;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$Email);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}

?>