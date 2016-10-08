<?php

$email = $_POST['email'];
$lastName = $_POST['lname'];
$firstName = $_POST['fname'];
$comment = $_POST['comment'];

$response = array(
  'message' => 'Error submitting your message. Please try again.',
  'success' => false
);

if( !empty( $email ) && !empty( $lastName ) && !empty( $firstName ) ) {
  require 'phpmailer/PHPMailerAutoload.php';

  $mail = new PHPMailer;
  $mail->setFrom('mocon66@gmail.com', 'Mario Ocon');
  $mail->addReplyTo($email, $firstName . ' ' . $lastName);
  //$mail->addAddress('claudia@jmcdev.com');
  $mail->addAddress('mocon66@gmail.com');
  //$mail->addAddress('agage@jmcdev.com');

  $mail->Subject = 'Belleview Contact Form';
   $content = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>' . $mail->Subject . '</title>
</head>
<body>
<div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;">
  <h3>New Belleview Place contact form message from ' . $firstName . ' ' . $lastName . '.</h3>
  <p>' . $comment .'</p>
  <p>You can reply to ' . $firstName . ' at ' . $email . '</p>
</div>
</body>
</html>
  ';
  $mail->msgHTML($content, dirname(__FILE__));
  //$mail->AltBody = 'This is a plain-text message body';

  //send the message, check for errors
  if (!$mail->send()) {
      $response = array(
        'message' => $mail->ErrorInfo,
      );
  } else {
    $response = array(
      'message' => 'Thank you! Your message has been sent. We will reply shortly.',
      'success' => true
    );
  }
}
header('Content-Type: application/json');
die(json_encode($response));