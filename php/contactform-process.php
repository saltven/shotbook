<?php
$errorMSG = "";
$captcha_error = "";

if (empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
    $name = $_POST["name"];
}

if (empty($_POST["email"])) {
    $errorMSG = "Email is required ";
} else {
    $email = $_POST["email"];
}

if (empty($_POST["message"])) {
    $errorMSG = "Message is required ";
} else {
    $message = $_POST["message"];
}

if (empty($_POST["terms"])) {
    $errorMSG = "Terms is required ";
} else {
    $terms = "I have read and agreed to the Privacy Policy, Terms and Conditions of Shotbook";
}

if (empty($_POST["updates"])) {
    $updates = "I DO NOT want to be notified of future updates and announcement, I know this is a mistake that I will regret later.";
} else {
    $updates = "I WANT to be notified, sign me up please!!!";
}

/*if (empty($_POST["g-recaptcha-response"])) {
    $captcha_error = "Captcha is required ";
exit;
} else {
$captcha = $_POST['g-recaptcha-response'];
$secretKey = '6Lfr68kUAAAAAA8Mj7Or4amlA2qD64qdpjl5P9vc';
$ip = $_SERVER['REMOTE_ADDR'];
$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
$responseKeys = json_decode($response,true);
}*/


$EmailTo = "info@shotbook.app";
$Subject = "You've got mail! A new interested user for Shotbook from the website";

// prepare email body text
$Body = "Hi Shotbook,\n\nI would like to be included in your awesome ecosystem, my details as follow:\n\n";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n\n";
$Body .= "Terms: ";
$Body .= $terms;
$Body .= "\n\n";
$Body .= "Updates: ";
$Body .= $updates;
$Body .= "\n\n";
$Body .= "Do not keep me waiting.";

// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$email);

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