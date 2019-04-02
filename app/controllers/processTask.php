<?php
require_once 'connect.php';
    $done = $_POST['done'];
    $id = $_POST['id'];

    $sql = "UPDATE tasks SET stat_id = $done WHERE id = $id";
    mysqli_query($conn, $sql);

    header("Location: ../views/home.php");


    // var_dump($sql);




    // echo "HELLO";
    