<?php
include("scripts/connect.php");

require('PHPMailer/src/PHPMailer.php');
require('PHPMailer/src/SMTP.php');

$query = "SELECT COUNT(id) as attmpt from inquiries where status='new'";
$result = mysqli_query($connect, $query);
$data = mysqli_fetch_assoc($result);
$data2 = $data['attmpt'];







?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiry Table</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <style>
        .btn-outline-warning {
            width: 5em;
        }

        .navbar-toggler-icon {
            background-color: none;
            color: yellow;
        }

        .gradient {
            background: rgb(0, 0, 0);
            background: linear-gradient(90deg, rgba(0, 0, 0, 1) 17%, rgba(0, 0, 0, 0.8970938717283788) 100%, rgba(0, 0, 0, 0.1856092778908438) 100%);
        }

        .gradient2 {
            background: rgb(0, 0, 0);
            background: linear-gradient(90deg, rgba(0, 0, 0, 1) 100%, rgba(96, 3, 3, 0.8942927512801996) 100%, rgba(242, 47, 47, 0) 100%);
        }


        .maroon {
            background: rgb(71, 0, 0);
            background: linear-gradient(90deg, rgba(71, 0, 0, 1) 43%, rgba(96, 3, 3, 0.8942927512801996) 100%, rgba(242, 47, 47, 0) 100%);
            margin: 0%;
            padding: 0%;
        }

        /* data-table */
        label {
            color: white;
        }

        .dataTables_info {
            color: white;
        }

        .page-link {
            background: rgb(5, 5, 6);
            background: linear-gradient(90deg, rgba(5, 5, 6, 1) 0%, rgba(1, 1, 4, 0.8998949921765581) 54%, rgba(6, 8, 8, 1) 100%);
            color: white;
        }


        .active2 {
            background-color: grey;

        }

        .navbar {
            font-family: 'Open Sans', sans-serif;
            background: none;




        }

        .nav-link {
            color: black;
        }

        .nav-link:hover {
            color: white;
            background-color: grey;
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
    <!-- fontwesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body class="gradient">
    <!-- NAVBAR -->
    <header>
        <nav class="navbar navbar-expand-lg maroon  fixed-top  py-3 px-2  mb-5">
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


    <!-- SLIDER -->
    <section id="section1">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/superadmin1.jpg" alt="...">
                    <div class="carousel-caption mt-2 px-3">
                        <h4 class="text-center">Super Admin</h4>
                        <h5 class="fw-bolder text-center">Student Portal Inquiries</h5>
                        <p class="fw-normal text-center">Manage Inquiries</p>


                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/superadmin2.jpg" alt="...">
                    <div class="carousel-caption mt-2 px-3 ">

                        <h4 class="text-center">Super Admin</h4>
                        <h5 class="fw-bolder text-center">Student Portal Inquiries</h5>
                        <p class="fw-normal text-center">Manage Inquiries</p>
                    </div>

                </div>
                <div class="carousel-item">
                    <img src="images/superadmin3.jpg " alt="...">

                    <div class="carousel-caption mt-2 px-3">

                        <h4 class="text-center">Super Admin</h4>
                        <h5 class="fw-bolder text-center">Student Portal Inquiries</h5>
                        <p class="fw-normal text-center">Manage Inquiries</p>
                    </div>

                </div>

            </div>

        </div>




    </section>


    <div class="row container-fluid">


        <!-- SIDENAV -->


        <div class="col col-lg-2  col-md-12 col-sm-12 col-xs-12 shadow-lg p-3 mb-5 bg-body rounded border-top  mt-5 maroon border  ">
            <div class="w-125 text-center text-white ">

                <h3 class="py-3"><i class="fa-solid  fa-block-question"></i>Super Admin Panel</h5>
                    <hr>
            </div>



            <ul class="nav d-flex flex-column justify-content-center align-items-center py-5 nav nav-pills nav-fill text-black-50   ">


                <li class="nav-item  active2 w-100 position-relative border">
                    <a class="nav-link text-white" aria-current="page" href="#">
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger ">
                            <?php echo $data2 ?> </span> New Inquiries </a>
                </li>
                <li class="nav-item w-100 border">
                    <a class="nav-link text-white" aria-current="page" href="superadmin-history.php">History</a>
                </li>
                <li class="nav-item w-100 border">
                    <a class="nav-link text-white" href="super-admin-trashed.php">Trash</a>
                </li>
                <li class="nav-item w-100 border">
                    <a class="nav-link text-white" aria-current="page" href="super-admin-manage.php">Manage Admins</a>
                </li>



            </ul>

        </div>



        <!-- INQUIRY TABLE -->
        <div class="col col-lg-10 col-md-12 col-sm-12 col-xs-12 ">
            <div class=" container-fluid mt-5 shadow-lg p-3 mb-5 bg-body rounded border-top ms-3 gradient">



                <table id="inquiry" class="table table-dark table-hover mt-3" style="width:100%">
                    <div class="row">
                        <div class="col col-lg-6">
                            <h1 class="fs-3 fw-bold my-3 text-white">New Student Inquiries</h1>
                        </div>
                        <div class="col col-lg-6">
                        </div>


                    </div>




                    <hr>

                    <thead>
                        <tr>
                            <th>Inquiry Id</th>
                            <th>Student Name</th>
                            <th>Student Number</th>
                            <th>Type of Inquiry</th>
                            <th hidden>Email</th>

                            <th>Date of Inquiry</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT id,fullname,type,student_number,email,date_time,inquiry   FROM inquiries WHERE status = 'new' ORDER by ID asc";
                        // $sql = "SELECT * from booksinvent2";
                        $result = mysqli_query($connect, $sql);





                        // $idnumber = 1521;

                        while ($row = mysqli_fetch_assoc($result)) {

                            # code...

                            $id = $row['id'];
                            $fullname = $row['fullname'];
                            $type = $row['type'];
                            $snumber = $row['student_number'];
                            $email = $row['email'];
                            $inquiry = $row['inquiry'];


                            $date = $row['date_time'];


                            echo "<tr>
                                        <th scope='row'>$id</th>
                                        <td>$fullname</td>
                                        
                                        <td>$snumber</td>
                                      
                                        <td>$type</td>  
                                        <td hidden>$email</td>

                                      
                                        
                                        <td >$date</td>
                                        <td class=\"text-center\">
                                        <a href=\"reply-super-admin.php?manage=$id\"><button class=\"btn btn-outline-warning my-2 \">Manage</button></a>
                                        <a href=\"manage-admin.php?manage=$id\"><button class=\"btn btn-outline-warning my-2 \">Assign</button></a>
                                        


                                        

                                        </td>
                                        
                                    
                                        
                                        
                                        </tr>";
                        }




                        ?>
                    </tbody>
                </table>


            </div>


        </div>
    </div>








    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="index.js"></script>


    <!-- DATATABLE -->
    <script>
        $(document).ready(function() {
            $('#inquiry').DataTable({
                 "order": [[ 0, 'desc' ], [ 1, 'desc' ]]
            });
        });
    </script>





</body>

</html>