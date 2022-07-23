


<?php

session_start();
include("scripts/connect.php");
include("scripts/link.php");
require('PHPMailer/src/PHPMailer.php');
require('PHPMailer/src/SMTP.php');






$id = $_GET['manage'];
$sql = "SELECT fullname,student_number,email,type,inquiry,date_time from inquiries where id = $id";
$result = mysqli_query($connect, $sql);
$row2 = mysqli_fetch_assoc($result);
$fullname = $row2['fullname'];
$snumber = $row2['student_number'];
$type = $row2['type'];
$email = $row2['email'];
$inquiry = $row2['inquiry'];
$replied_by = $_SESSION['name'];
$link='http://'.$_SERVER['HTTP_HOST'].'/Inquiry-System(OJT)/trial.php?resolved='.$id;


$date = date('y-m-d ');
// $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];




if (isset($_POST['submit'])) {




    $reply = $_POST['reply'];



    $snumber = $row2['student_number'];
    $snumber .= '@ub.edu.ph';


    $mailTo = $snumber;

    $name = $row2['fullname'];

    $subject = 'Student Inquiries';

    $body = 'Hi ' . $fullname .
        ',<br>We Succesfuly recieved your inquiry and making actions to deal with it<br><br>'
        // . $reply.'<br>'. "$link/Ojt-No-Modal/trial.php?resolved=$id";
        . $reply.'<br>'. $link;


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
    # code...












    $sql = "UPDATE inquiries set id=$id,replied_by = '$replied_by' ,status = 'replied',reply ='$reply',replied_date='$date' where id=$id";



    $result = mysqli_query($connect, $sql);

    if ($result) {






        $snumber = $row2['student_number'];
        $snumber .= '@ub.edu.ph';


        $mailTo = $email;

        $name = $row2['fullname'];

        $subject = 'Student Inquiries';

        $body = 'Hi ' . $name .
        ',<br>We Succesfuly recieved your inquiry and making actions to deal with it<br><br>'
        // . $reply.'<br>'. "$link/Ojt-No-Modal/trial.php?resolved=$id";
        . $reply.'<br>'. $link;


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


            # code...
        }



        echo "<script>alert('Replied Succesfuly')</script>";
        echo "<script>window.location = 'super-admin.php#section2'</script>";
        # code...
    } else {
        # code...
        die(mysqli_error($connect));
    }
} elseif (isset($_POST['trash'])) {
    $reply = $_POST['trash'];



    $sql = "UPDATE inquiries set id=$id,replied_by = '$replied_by' ,status = 'trash',reply ='$reply',replied_date='$date' where id=$id";



    $result = mysqli_query($connect, $sql);

    if ($result) {



        echo "<script>alert('Moved to Trash)</script>";
        echo "<script>window.location = 'super-admin.php#section2'</script>";
        # code...
    } else {
        # code...
        die(mysqli_error($connect));
    }
} elseif (isset($_POST['resolved'])) {
    



    $snumber = $row2['student_number'];
    $snumber .= '@ub.edu.ph';


    $mailTo = $snumber;

    $name = $row2['fullname'];

    $subject = 'Student Inquiries';

    $body = 'Hi ' . $name .
            ',<br>R E S O L V E D<br><br>';


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


    $sql = "UPDATE inquiries set remarks='resolved',status='replied' where id=$id";



    $result = mysqli_query($connect, $sql);

    if ($result) {
        $snumber = $row2['student_number'];
        $snumber .= '@ub.edu.ph';


        $mailTo = $email;

        $name = $row2['fullname'];

        $subject = 'Student Inquiries';

        $body = 'Hi ' . $name .
            ',<br>R E S O L V E D<br><br>';


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
}


// }


















?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link rel="icon" href="favicon (9).ico" />
    <!-- favicon -->

    <!-- css stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/addbooks.css" />
    <style>
        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url(images/superadmin1.jpg);
            background-size: cover;
            background-position: center;

        }

        .gradient {
            background: rgb(0, 0, 0);
            background: linear-gradient(90deg, rgba(0, 0, 0, 1) 17%, rgba(0, 0, 0, 0.8970938717283788) 100%, rgba(0, 0, 0, 0.1856092778908438) 100%);
        }

        .header {
            background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url(images/superadmin3.jpg);
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: space-between;

        }

        .maroon {
            background-color: #51050F;
            margin: 0%;
            padding: 0%;
        }

        .active2 {
            background-color: #D1D1D1;

        }

        .navbar {
            font-family: 'Open Sans', sans-serif;
            background: none;




        }

        .nav-link {
            color: black;
        }

        .nav-link:hover {
            color: #000;
            background-color: #ECECEC;
        }



        td img {
            width: 7em;
        }


        #section2 .active2 {
            background-color: rgb(218, 210, 210);


        }

        #section2 a {
            color: black;

        }

        #section2 a:hover {
            background-color: darkgrey;
        }

        #section1 .disabled {
            color: grey;
        }


        .carousel-item {
            max-height: 55vh;
            -webkit-background-size: cover;
            background-size: cover;

        }

        .carousel-item::before {
            content: "";
            display: block;
            position: absolute;
            top: 0%;
            left: 0%;
            bottom: 0%;
            right: 0%;
            background: #000;
            opacity: 0.7;
        }

        .carousel-caption {
            bottom: 1.5em;
        }

        .carousel-caption h4 {
            color: #c4c3c3;
        }

        .carousel-caption h5 {
            font-size: 3em;
            font-weight: bolder;
        }

        .carousel-caption p {
            font-size: 1.2em;
            color: #c4c3c3;
        }

        .btn-outline-danger:hover {
            background-color: #4F0E0E;
            color: whitesmoke;
            border: #4b1002;
        }

        @media (max-width:400px) {
            .carousel-caption {
                bottom: 1em;
            }

            .carousel-caption h5 {
                font-size: 10px;
                font-weight: bolder;
            }

            .carousel-caption p {
                font-size: .5em;
            }

            #section2 grid-item {
                align-items: center;
            }
        }
    </style>



    <!-- css stylesheets -->

    <!-- owl-carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- owl-carousel -->

    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- fontawesome cdn -->




</head>

<body>
    <!-- NAVBAR -->
    <header>
        <nav class="navbar navbar-expand-lg bg-dark  py-3 px-2  mb-5">
            <div class="container-fluid">

                <a href=""><img src="images/ubwhitelogo.png" alt="" width="120" height="40" class="d-inline-block align-text-top" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-center fs-6 ">




                        <li class="nav-item">
                            <a href="scripts/logout.php"><button class="btn btn-outline-danger px-4 rounded-pill">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>







    <section id="section2" class="my-5">
        <div class="row container-fluid">





            <!-- INQUIRY TABLE -->
            <div class=" shadow-lg p-3 mb-5 bg-body rounded mt-4  w-50 mx-auto gradient">
                <div class="container-fluid px-4 py-3">
                    <div class="row">


                        <div class="header">
                            <h5 class="fw-bolder text-white py-3 px-3 fs-4  ">Manage</h5>
                            <a href="super-admin.php"><button type="button" class="btn-close btn-close-white" aria-label="Close"></button></a>

                        </div>

                        <form method="post" class="px-5 py-5 ">


                            <div class="mb-3">
                                <label class="fw-bold text-white">Fullname</label>
                                <input type="text" class="form-control" id="fullname" value="<?php echo $fullname ?>" disabled>


                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold text-white">Student Number</label>
                                <input type="text" class="form-control" id="fullname" value="<?php echo $snumber ?>" disabled>

                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold text-white">Email</label>
                                <input type="email" class="form-control" id="fullname" value="<?php echo $email ?>" disabled>

                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold text-white">Inquiry Type</label>
                                <input type="text" class="form-control" id="fullname" value="<?php echo $type ?>" disabled>

                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold text-white">Inquiry</label>
                                <textarea class="form-control" placeholder="Reply" type="text" name="reply" style="height: 200px" disabled><?php echo $inquiry ?></textarea>

                            </div>



                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Reply" type="text" name="reply" style="height: 200px"></textarea>
                                <label for="floatingTextarea2">Reply</label>
                            </div>
                            <div class="row">
                                <div class="col-4 my-5">
                                    <button type="submit" name="submit" class="btn btn-outline-warning  py-3 px-2 w-100">Reply</button>
                                </div>
                                <div class="col-4 my-5">
                                    <button type="submit" name="resolved" class="btn btn-outline-secondary py-3 px-2 w-100">Resolved</button>
                                </div>
                                <div class="col-4 my-5">
                                    <button type="submit" name="trash" class="btn btn-outline-danger py-3 px-2 w-100">Move to Trash</button>
                                </div>

                            </div>






                        </form>







                    </div>



                </div>

            </div>
        </div>




    </section>
    <!-- jquerycdn -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    <!-- <script src="index.js"></script> -->




</body>


</html>