<?php 

include("scripts/connect.php");


if (isset($_POST['deleteid'])) {
    $id = $_POST['deleteid'];
    $sql = "DELETE from inquiries where id=$id";



    $result = mysqli_query($connect, $sql);

    if ($result) {



        echo "<script>alert('Inquiry  Deleted')</script>";
        echo "<script>window.location = 'super-admin-trashed.php'</script>";
        # code...
    } else {
        # code...
        die(mysqli_error($connect));
    }
    # code...
}