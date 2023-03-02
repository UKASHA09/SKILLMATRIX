<?php
if($_POST) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['phone'];
  $resume = $_POST['resume'];
  $to = 'ukashapersonal@gmail.com';
  $subject = 'New form submission';
  $body = "Name: $name\nEmail: $email\nMessage:\n$message";

 # SMTP server settings for Gmail
 $smtp_host = 'smtp.gmail.com';
 $smtp_port = 587;
 $smtp_username = 'ukashapersonal@gmail.com';
 $smtp_password = 'SMU09@GOOGLE';

 # Create SMTP transport
 $transport = (new Swift_SmtpTransport($smtp_host, $smtp_port))
   ->setUsername($smtp_username)
   ->setPassword($smtp_password)
   ->setEncryption('tls');

 # Create mailer and message objects
 $mailer = new Swift_Mailer($transport);
 $message = (new Swift_Message($subject))
   ->setFrom([$email => $name])
   ->setTo([$to])
   ->setBody($body);

 # Send email using SMTP
 if ($mailer->send($message)) {
   echo "Thank you for contacting us.";
 } else {
   echo "Sorry, something went wrong. Please try again later.";
 }
}
?>