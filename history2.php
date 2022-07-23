<?php
include("scripts/connect.php");

require('PHPMailer/src/PHPMailer.php');
require('PHPMailer/src/SMTP.php');

$query = "SELECT COUNT(id) as attmpt from inquiries where status='ebrahman'";
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
        .maroon {
            background: rgb(71, 0, 0);
            background: linear-gradient(90deg, rgba(71, 0, 0, 1) 43%, rgba(96, 3, 3, 0.8942927512801996) 100%, rgba(242, 47, 47, 0) 100%);
            margin: 0%;
            padding: 0%;
        }

        body {
            background: rgb(238, 228, 228);
            background: linear-gradient(90deg, rgba(238, 228, 228, 0.8970938717283788) 30%, rgba(255, 249, 249, 1) 53%, rgba(255, 249, 249, 1) 54%, rgba(255, 249, 249, 1) 90%);
        }

        .active2 {
            background-color: grey;
            color: white;

        }

        .navbar {
            font-family: 'Open Sans', sans-serif;
            background: none;




        }

        .nav-link {
            color: white;
        }

        .nav-link:hover {
            color: black;
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
            bottom: 2em;
        }

        .carousel-caption h4 {
            color: #c4c3c3;
        }

        .carousel-caption h5 {
            font-size: 4em;
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

<body>

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
    <section id="section1">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/bg-image2.jpg" alt="...">
                    <div class="carousel-caption mt-2 px-3">
                        <h4 class="text-center">University Admin</h4>
                        <h5 class="fw-bolder text-center">Ebrahman Student Inquiries</h5>
                        <p class="fw-normal text-center">Manage Inquiries</p>


                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/bg-image3.jpg" alt="...">
                    <div class="carousel-caption mt-2 px-3 ">

                        <h4 class="text-center">University Admin</h4>
                        <h5 class="fw-bolder text-center">Ebrahman Student Inquiries</h5>
                        <p class="fw-normal text-center">Manage Inquiries</p>
                    </div>

                </div>
                <div class="carousel-item">
                    <img src="images/bg-image.jpg " alt="...">

                    <div class="carousel-caption mt-2 px-3">

                        <h4 class="text-center">University Admin</h4>
                        <h5 class="fw-bolder text-center">Ebrahman Student Inquiries</h5>
                        <p class="fw-normal text-center">Manage Inquiries</p>
                    </div>

                </div>

            </div>

        </div>




    </section>


    <div class="row container-fluid">
        <!-- SIDENAV -->

        <div class="col col-lg-2  col-md-12 col-sm-12 col-xs-12 shadow-lg p-3 mb-5 bg-body rounded mt-5 maroon">
            <div class=" w-125 text-center text-white ">

                <h3 class="py-3"><i class="fa-solid fa-block-question"></i>Inquiries</h3>
            </div>



            <ul class="nav d-flex flex-column  align-items-center py-5 nav nav-pills nav-fill text-black-50 ">


                <li class="nav-item   w-100 position-relative border">
                    <a class="nav-link text-black" aria-current="page" href="admin-inquiries2.php">
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?php echo $data2 ?></span> New</a>
                </li>
                <li class="nav-item active2 w-100 border">
                    <a class="nav-link text-black" aria-current="page" href="history.php">History</a>
                </li>
                <li class="nav-item w-100 border">
                    <a class="nav-link text-white" href="trashed2.php">Trash</a>
                </li>


            </ul>

        </div>





        <!-- MANAGE MODAL -->
        <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Student Inquiry</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="resolved2.php" method="post">
                            <input type="hidden" name="updateid" id="updateid">
                            <div class="col-12">

                                <label class="form-label">Status</label>
                                <input type="text" class="form-control" id="status" disabled>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Student Number</label>
                                <input type="text" class="form-control" id="snumber" disabled>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Student Name</label>
                                <input type="text" class="form-control" id="fullname" disabled>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Type of Inquiry</label>
                                <input type="text" class="form-control" id="type" disabled>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Inquiry</label>
                                <textarea class="form-control" placeholder="Reply" type="text" name="inquiry" id="inquiry" disabled style="height: 200px"></textarea>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Replied By</label>
                                <input type="text" class="form-control" id="replied_by" disabled>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Replied Date</label>
                                <input type="text" class="form-control" id="replied_date" disabled>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Reply</label>
                                <textarea class="form-control" placeholder="Reply" type="text" name="reply" id="reply" disabled style="height: 200px"></textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Remarks</label>
                                <input type="text" class="form-control" id="remarks" disabled>
                            </div>

                            <div class="modal-footer">

                                <button type="submit" name="resolved" class="btn btn-success w-100">Mark as Resolved</button>
                                <button type="submit" name="trash" class="btn btn-danger w-100">Trash</button>
                            </div>

                        </form>


                    </div>

                </div>
            </div>
        </div>
        <!-- MANAGE MODAL -->


        <!-- INQUIRY TABLE -->
        <div class="col col-lg-10 col-md-12 col-sm-12 col-xs-12 ">
            <div class=" container-fluid mt-5">
                <div class=" container-fluid mt-5 shadow-lg p-3 mb-5 bg-body rounded border-top"">

       
        
  


                    <table id="history" class="table table-striped border" style="width:100%">


                    <h1 class="fs-3 fw-bold my-3">Student Inquiries</h1>
                    <hr>
                    <thead>
                        <tr>
                        <th>id</th>
                                <th hidden>Status</th>
                                <th hidden>SNumber</th>
                                <th>Student Name</th>
                                <th hidden>Email</th>
                                <th>Type</th>
                                <th hidden>Inquiry</th>
                                <th>Replied By</th>
                                <th>Remarks</th>

                                <th>Replied Date</th>
                                <th hidden>Reply</th>


                            <th class="text-center">Action</th>
                        </tr>
                    </thead>





                    <tbody>
                        <?php
                        $sql = "SELECT id,status,fullname,type,email,student_number,date_time,reply,replied_by,replied_date,inquiry,remarks FROM inquiries WHERE status = 'replied' and type = 'ebrahman,' ORDER by replied_date asc";

                        $result = mysqli_query($connect, $sql);

                        if ($result) {
                            foreach ($result as $row) {
                        ?>



                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td hidden><?php echo $row['status']; ?></td>
                                    <td hidden><?php echo $row['student_number']; ?></td>


                                    <td><?php echo $row['fullname']; ?></td>
                                    <td class="overflow-auto"><?php echo $row['email']; ?></td>

                                    <td><?php echo $row['type']; ?></td>
                                    <td><?php echo $row['inquiry'];  ?></td>
                                    <td><?php echo $row['replied_by']; ?></td>

                                    <td><?php echo $row['remarks']; ?></td>
                                    <td><?php echo $row['replied_date']; ?></td>
                                    <td hidden><?php echo $row['reply']; ?></td>
                                    <td>
                                        <button class="btn btn-warning w-100 editbtn">Manage</button>
                                    </td>

                                </tr>
                        <?php
                            }
                        } else {
                            echo "No Record Found";
                        }


                        ?>


                    </tbody>








                    </table>

                </div>

            </div>


        </div>

    </div>
    </div>








    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#history').DataTable({
                "order": [
                    [0, 'desc'],
                    [1, 'desc']
                ]
            });

        });
    </script>




    <script>
        $(document).on('click', '.editbtn', function() {
            $('#editmodal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children('td').map(function() {
                return $(this).text();
            });
            console.log(data);
            $('#deleteid').val(data[0]);
            $('#updateid').val(data[0]);
            $('#status').val(data[1]);
            $('#snumber').val(data[2]);
            $('#fullname').val(data[3]);
            $('#email').val(data[4]);
            $('#type').val(data[5]);
            $('#inquiry').val(data[6]);
            $('#replied_by').val(data[7]);
            $('#remarks').val(data[8]);
            $('#replied_date').val(data[9]);
            $('#reply').val(data[10]);

        });
    </script>

    <script src="index.js"></script>










</body>

</html>