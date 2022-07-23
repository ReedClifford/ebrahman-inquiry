<?php


session_start();
include 'scripts/connect.php';












?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- FAVICON -->

    <!-- STYLESHEETS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="index.css">

    <style>
        html {
            scroll-behavior: smooth;
        }




        /* SECTION1 */

        section {
            background-image: linear-gradient(rgba(0, 0, 0, 0.80), rgba(0, 0, 0, 0.80)), url("images/bg-image.jpg");
            background-position: center;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .maroon {
            background: rgb(71, 0, 0);
            background: linear-gradient(90deg, rgba(71, 0, 0, 1) 43%, rgba(96, 3, 3, 0.8942927512801996) 100%, rgba(242, 47, 47, 0) 100%);
        }


        .container {
            max-width: 50em;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 3em;
        }

        form {
            width: 30em;
            min-height: 50vh;
            background-color: white;
            border-radius: 10px;
            border: none;
            box-shadow: 0 5px 15px darkslategrey;

        }

        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 1em;
        }

        .alert-danger {
            text-align: center;
            margin: 1em;

        }


        .formheader {
            background-color: #6b1500;
            color: white;
            padding: 1em;
        }

        .inputcontainer {
            padding: 2em;
        }

        .inputs-box {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .inputs {
            margin: 1em;
            width: 20em;
            height: 5vh;
        }

        .form-control {
            min-width: 20em;
        }

        .btn-login {
            min-width: 15em;
            border-radius: 20px;
            margin: 1.2em;
            padding: 8px;

            background: rgb(71, 0, 0);
            background: linear-gradient(90deg, rgba(71, 0, 0, 1) 43%, rgba(96, 3, 3, 0.8942927512801996) 100%, rgba(242, 47, 47, 0) 100%);
            border: 3px #6b1500 solid;
            color: goldenrod;
            font-weight: 500;
            box-shadow: inset 0 0 0 0 #4b1002;
            transition: ease-in 0.2s;




        }

        .btn-login:hover {
            box-shadow: inset 15em 0 0 0 #4b1002;
            border: 3px #4b1002 solid;

        }


        @media (max-width:420px) {
            .image {

                padding: 5em 0;

            }
        }

        .formheader {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>


    <!-- FONTAWESOME CDN -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- BOOTSTRAP JSCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>

    <section>
        <div class="container">


            <form class="needs-validation mx-3 " action="scripts/loginscript.php" method="POST">
                <div class="formheader maroon">
                    <h2>LOGIN </h2>
                    <a href="index.php"><button type="button" class="btn-close" aria-label="Close"></button></a>


                </div>


                <!-- ERROR ALLERT -->
                <?php if (isset($_GET['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $_GET['error'] ?>
                    </div>
                <?php } ?>



                <div class="inputcontainer">
                    <div class="inputs-box">
                        <select class="form-select mx-auto w-75 my-3" name="usertype" aria-label="Default select example">
                            <option value="Super Admin">Super Admin</option>
                            <option value="Ubian Inquiry Admin">Ubian Admin</option>
                            <option value="Ebrahman Inquiry Admin">Ebrahman Admin</option>


                        </select>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="uid" name="uid" placeholder="Uid">
                            <div class="invalid-feedback">
                                Please Enter the User-Id
                            </div>

                            <label for="floatingInput">Admin..</label>




                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password">

                            <div class="invalid-feedback">
                                Please Enter the Password
                            </div>

                            <label for="floatingPassword">Password..</label>

                        </div>








                    </div>
                    <div class="form-check ms-5 mt-3">
                        <input class="form-check-input " type="checkbox" value="" id="defaultCheck1" onclick="show()">
                        <label class="form-check-label " for="defaultCheck1">
                            Show Password
                        </label>
                    </div>



                    <div class="center">
                        <button class="btn-login" type="submit" name="login" id="login">Login</button>
                    </div>

                </div>




            </form>
        </div>

    </section>
    <script>
        function show() {
            var x = document.getElementById("pwd");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>



</body>

</html>