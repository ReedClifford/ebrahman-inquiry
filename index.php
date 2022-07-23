<?php
session_start();
include("scripts/connect.php");





if (isset($_POST['submit'])) {







  $snumber = $_POST['student_number'];
  $attempt = 2;
  $query = "SELECT COUNT(id) as attmpt from inquiries where student_number='$snumber'";



  $result = mysqli_query($connect, $query);
  $data = mysqli_fetch_assoc($result);
  echo $data['attmpt'];
  $data2 = $data['attmpt'];








  if ($data2 > $attempt) {
    header("location:index.php?error=You have reached the maximum number allowed of inquiries.");
    exit();
    // echo "<script>alert('You have reached the maximum number allowed of inquiry sent.')</script>";
  } else {


    $secretKey = "6Ledf68eAAAAAPizeh8lkvqOsVhkjHXGcHVjvW7l";
    $responseKey = $_POST['g-recaptcha-response'];
    $UserIP = $_SERVER['REMOTE_ADDR'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$UserIP";
    $response = file_get_contents($url);
    $response = json_decode($response);
    if ($response->success) {
      $fullname = htmlspecialchars($_POST['fullname']);
      $snumber = htmlspecialchars($_POST['student_number']);
      $email = $_POST['email'];
      $inquiry = htmlspecialchars($_POST['inquiry']);
     

      if (empty($fullname)) {
        header("location:index.php?error=Please Dont Leave an Empty Input Field");
        exit();
      } elseif (empty($snumber)) {
        header("location:index.php?error=Please Dont Leave an Empty Input Field");
        exit();
      } elseif (empty($email)) {
        header("location:index.php?error=Please Dont Leave an Empty Input Field");
        exit();
      }elseif (empty($inquiry)) {
        header("location:index.php?error=Please Dont Leave an Empty Input Field");
        exit();
      } else {
        if (!empty($_POST['type'])) {
          foreach ($_POST['type'] as $selected) {
            $type2 .= $selected . ', ';
          }
        } else {
        }
        // if (!empty($_POST['type'])) {
        //   $type2 = $_POST['type'];
        //   $select = '';
        //   foreach ($type2 as $selected) {
        //     $select .=$selected . ',';
        //   }
        // } else {
        // }

        $sql = "INSERT into inquiries (fullname,student_number,email,type,inquiry) 
      values('$fullname','$snumber','$email','$type2','$inquiry')";
        $result = mysqli_query($connect, $sql);
        if ($result) {


          header("location:index.php?success=Inquiry Sent Succesfuly");

          exit();
        } else {
          die(mysqli_error($connect));
        }
      }
    } else {
      // echo "<script>alert('Answer Captcha First')</script>";
      header("location:index.php?error=Answer Captcha First");
      exit();
    }
  }
}















?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inquiry</title>




  <!-- css stylesheet -->
  <link rel="stylesheet" href="index.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- css stylesheet -->
  <style>
    .button {
      background: rgb(71, 0, 0);
      background: linear-gradient(90deg, rgba(71, 0, 0, 1) 43%, rgba(96, 3, 3, 0.8942927512801996) 100%, rgba(242, 47, 47, 0) 100%);
      color: white;
      padding: 1em;
      border-radius: 5px;
      box-shadow: inset 0 0 0 0 rgb(71, 0, 0);
      transition: ease-in 0.5s;
      outline: none;
    }

    .button:hover {
      box-shadow: inset 50em 0 0 0 rgb(71, 0, 0);
      color: white;
      padding: 1em;
      border-radius: 5px;
    }

    body {
  font-family: "Montserrat", sans-serif;
  background-image: linear-gradient(rgba(0, 0, 0, 0.89), rgba(0, 0, 0, 0.89)),
    url(images/ubindex.jpg);
  background-size: cover;
  background-position: center;
}
  </style>


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css
">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css
" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js
"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js
"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js
"></script>


  <!-- fontawesome cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- fontawesome -->


  <!-- bootstrap js script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- bootstrap js script -->

  <script src="https://www.google.com/recaptcha/api.js" async defer></script>



</head>


<body>

  <div class="container border border-2  mx-auto my-5 shadow-lg mb-5 bg-body rounded w-75 max-vh-100">
    <div class="row">
      <div class="col col-lg-6 col-md-6 col-sm-12 image border border-2">
        <div class="container  w-100">
          <div class="d-flex flex-column justify-content-between align-items-center">
            <h3 class="text-white-50 "><i class="fa-solid fa-location-dot fa-sm me-2 text-white-50"></i>Location</h5>
              <p class="text-white-50 mt-3 ">Hilltop, Batangas, 4200 Batangas</p>
              <h3 class="text-white-50 "><i class="fa-solid fa-phone fa-sm me-2 text-white-50"></i>Contact Number</h3>
              <p class="text-white-50 mt-3 "> (043) 723 2744</p>
          </div>


        </div>





      </div>

      <!-- FORM -->
      <div class="col col-lg-6 col-md-6 col-sm-12  py-5 px-5 ">
        <h2 class="fw-bold fs-2">Brahmans,Send Us Your Inquiry</h2>

        <?php if (isset($_GET['error'])) { ?>
          <div class="alert alert-danger mt-2" role="alert">
            <span><i class="fa-solid fa-circle-exclamation me-2"></i><?= $_GET['error'] ?></span>
          </div>
        <?php } ?>

        <?php if (isset($_GET['success'])) { ?>
          <div class="alert alert-success mt-2" role="alert">
            <span><i class="fa-solid fa-circle-check me-2"></i><?= $_GET['success'] ?></span>
          </div>
        <?php } ?>






        <hr>
        <form class="needs-validation row g-3" method="post">
          <div class="col-lg-4 col-md-12 col-sm-12">
            <label class="form-label">Student Number</label>
            <input type="text" class="form-control" name="student_number" minlength="7" maxlength="11">


          </div>
          <div class="col-lg-8 col-md-12 col-sm-12">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control" name="fullname" oninvalid="this.setCustomValidity('Invalid Input')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')" pattern="\b([A-ZÀ-ÿ][-,a-z. ']+[ ]*)+" maxlength="50">



          </div>
          <div class="col-12">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" >



          </div>


          <!-- INQUIRY TYPE -->
          <!-- <label class="form-label ms-2">Type of Inquiry</label>
          <div class="col-12">
          
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name = "type[]" value="Ubian">
              <label class="form-check-label" >Ubian</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox"  name = "type[]" value="Ebrahman">
              <label class="form-check-label" >Ebrahman</label>
            </div>
            
           
 

          </div> -->

          <div class="col-12">


            <label class="form-label">Select Type of Inquiry</label>




            <select class="selectpicker w-100 " multiple data-live-search="true" name="type[]">

              <option value="Ubian">Ubian</option>
              <option value="Ebrahman">Ebrahman</option>
              <!-- <option value="Ubmail">UbMail</option> -->

            </select>



          </div>


          <div class="col-12">
            <div class="form-floating">
              <textarea class="form-control" placeholder="Leave a comment here" name="inquiry" style="height: 12em" maxlength="255"></textarea>
              <label for="floatingTextarea2">Inquiries..</label>

            </div>

            <br>

            <div class="g-recaptcha mx-5 max-vw-100" data-sitekey="6Ledf68eAAAAAKPXsq5tGt5wwf1AEqLvQqwAF-vY"></div>

          </div>

          <div class="col-12 ">
            <input type="submit" name="submit" class="button w-100 fw-bold" value="Send Inquiry">
          </div>
        </form>
      </div>
    </div>


  </div>








</body>



</html>