<?php 
require('PHPMailer/src/PHPMailer.php');
require('PHPMailer/src/SMTP.php');

if (isset($_POST['submit'])) {

  
  $snNumber = $_POST['studentnumber']; 
  $snNumber .='@ub.edu.ph';

  $mailTo = $snNumber;

  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $subject = 'student inquiries';

  $body = $_POST['inquiry'];


  $mail = new PHPMailer\PHPMailer\PHPMailer();
  // $mail->SMTPDebug = 3;
  $mail->isSMTP();

  $mail->Host = 'mail.smtp2go.com';
  $mail->SMTPAuth = true;

  $mail->Username = 'ub.edu.ph';
  $mail->Password = 'test123';

  $mail->SMTPSecure = 'tls';
  $mail->Port = '2525';


  $mail->From = 'admin@ub.edu.ph';
  $mail->FromName = 'University Admin';

  $mail->addAddress($mailTo, "User");
  $mail->setFrom($firstname,$lastname);
  $mail->Subject=($subject);
  $mail->isHTML(true);
  $mail->Body = $body;
  $mail->AltBody = "This is the plain email version of the content";

  if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
    echo "Inquiry has been sent";
  }
  # code...
}