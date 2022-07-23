<?php

include("scripts/connect.php");

require('PHPMailer/src/PHPMailer.php');
require('PHPMailer/src/SMTP.php');


if (isset($_POST['resolved'])) {



  $id = $_POST['updateid'];

  $sql = "SELECT fullname,student_number,type,inquiry,date_time,email from inquiries where id = $id";
  $result2 = mysqli_query($connect, $sql);
  $row2 = mysqli_fetch_assoc($result2);
  $email = $row2['email'];
  $fullname = $row2['fullname'];
  $snumber = $row2['student_number'];
  $type = $row2['type'];
  $inquiry = $row2['inquiry'];

  


  $snumber = $row2['student_number'];
  $snumber .= '@ub.edu.ph';


  $mailTo = $snumber;

  $name = $row2['fullname'];

  $subject = 'Student Inquiries';

  $body = 'Hi ' . $fullname .
          ',R E S O L V E D <br>';


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
  $mail->setFrom($fullname);
  $mail->Subject = ($subject);
  $mail->isHTML(true);
  $mail->Body = $body;
  $mail->AltBody = "This is the plain email version of the content";

  if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
  }

  $sql = "UPDATE inquiries set remarks='resolved' where id=$id";



  $result3 = mysqli_query($connect, $sql);

  if ($result3) {


      $mailTo = $email;

 

      $subject = 'Student Inquiries';

      $body = 'Hi ' . $fullname .
          ',R E S O L V E D';



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
      $mail->setFrom($fullname);
      $mail->Subject = ($subject);
      $mail->isHTML(true);
      $mail->Body = $body;
      $mail->AltBody = "This is the plain email version of the content";

      if (!$mail->send()) {
          echo "Mailer Error: " . $mail->ErrorInfo;
      } else {
      }



      echo "<script>alert('Inquiry Resolved')</script>";
      echo "<script>window.location = 'superadmin-history.php'</script>";
      # code...
  } else {
      # code...
      die(mysqli_error($connect));
  }
} elseif (isset($_POST['trash'])) {
  $id = $_POST['updateid'];
  $date = date('d-m-y h:i:s');

  $sql = "UPDATE inquiries set status = 'trash' where id=$id";



  $result = mysqli_query($connect, $sql);

  if ($result) {



      echo "<script>alert('Moved To Trash')</script>";
      echo "<script>window.location = 'superadmin-history.php'</script>";
      # code...
  } else {
      # code...
      die(mysqli_error($connect));
  }
}



