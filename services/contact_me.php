<?php

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

//create the email & send the message
$to = 'stephania.darosa@gmail.com';
$email_subject = "Boudreau Landscaping Contact Form: $name";
$email_body = "You have received a new message from the Boudreau Landscaping Website Contact Form.\n\n" .
              "Here are the details:\n\n" .
              "Name: $name\n\n" .
              "email: $email\n\n" .
              "Phone: $phone\n\n" . 
              "Message: $message";

$headers = "From: noreply@boudreaubros.com";
$headers .= "Reply to: $email";
@mail($to, $email_subject, $email_body, $headers);
return true;