<?php

include("../scripts/connect.php");
// session_start();



// if (isset($_POST['uid']) && isset($_POST['pwd'])) {
//     function validate($data)
//     {
//         $data = trim($data);
//         $data = stripslashes($data);
//         $data = htmlspecialchars($data);
//         return $data;
//     }
//     $admin_id = validate($_POST['uid']);
//     $pwd = validate($_POST['pwd']);
//     if (empty($admin_id)) {
//         header("location: ../adminlogin.php?error=Admin Id is Required");
//         exit();
//     } elseif (empty($pwd)) {
//         header("location: ../adminlogin.php?error=Password  is Required");
//         exit();
//     } else {

//         $sql = "SELECT * FROM admin WHERE uid = '$admin_id' AND pwd = '$pwd'";
//         $result = mysqli_query($connect, $sql);
//         if (mysqli_num_rows($result) === 1) {
//             $row = mysqli_fetch_assoc($result);

//             if ($row['uid'] === $admin_id && $row['pwd'] === $pwd ) {
//                 $_SESSION['uid'] = $row['uid'];
//                 $_SESSION['id'] = $row['id'];
//                 $_SESSION['name'] = $row['name'];
//                 header("location: ../admin-inquiries.php");
//                 exit();
//             } else {
//                 header("location: ../adminlogin.php?error=Incorrect Admin Id or Password");
//                 exit();
//             }
//         } else {
//             header("location: ../adminlogin.php?error=Incorrect Admin Id or Password");
//             exit();
//         }
//     }
// } else {
//     header("location:../adminlogin.php");
//     exit();
// }


// include '../include/connect.php';
session_start();


if (isset($_POST['uid']) && isset($_POST['pwd']) && isset($_POST['usertype'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $uid = validate($_POST['uid']);
    $pwd = validate($_POST['pwd']);
    $usertype = validate($_POST['usertype']);
    if (empty($uid)) {
        header("location: ../adminlogin.php?error=User Id is Required");
        exit();
    } elseif (empty($pwd)) {
        header("location: ../adminlogin.php?error=Password  is Required");
        exit();
    } else {
        $sql = "SELECT * FROM admin WHERE uid = '$uid' AND pwd = '$pwd'";
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['pwd'] === $pwd && $row['usertype'] === $usertype) {

                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['uid'] = $row['uid'];
                $_SESSION['usertype'] = $row['usertype'];

                if ($row['usertype'] == 'Super Admin') {
                    header("location: ../super-admin.php");
                    # code...
                } elseif ($row['usertype'] == 'Ubian Inquiry Admin') {
                    header("location: ../admin-inquiries.php");
                } elseif ($row['usertype'] == 'Ebrahman Inquiry Admin') {
                    header("location: ../admin-inquiries2.php");
                } else {
                    header("location: ../adminlogin.php?error=Incorrect User Id or Password");
                    exit();
                }
            } else {
                header("location: ../adminlogin.php?error=Incorrect User Id or Password");
                exit();
            }
        } else {
            header("location: ../adminlogin.php?error=Incorrect User Id or Password");
            exit();
        }
    }
} else {
    header("location: ../adminlogin.php");
    exit();
}
