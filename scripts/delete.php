<?php
include "../scripts/connect.php";
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "DELETE from inquiries where  id=$id";


    $result = mysqli_query($connect, $sql);

    if ($result) {
        echo "<script>alert('Deleted Succesfuly')</script>";
        echo "<script>window.location = '../admin-inquiries.php'</script>";
    } else {
        die(mysqli_error($connect));
    }
    # code...
}
