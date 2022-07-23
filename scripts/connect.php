<?php

$host = 'localhost';

$user = 'reed';
$pass = '123';
$name = 'student_inquiry';

$connect = mysqli_connect($host, $user, $pass, $name);


if (!$connect) {
    die("<script>alert('failed')</script>" . mysqli_connect_error());
    
    
}


