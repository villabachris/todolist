<?php

$host = "localhost";
$user = "root";
$password = "";
$db_name = "to_do_list";

$conn = mysqli_connect($host, $user, $password, $db_name);

if(!$conn){
    die("Connection Failed: ".mysqli_error($conn));
}
    // echo "Successfully Connected";

    // header("Location: ../views/home.php");