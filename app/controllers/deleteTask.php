<?php
require_once 'connect.php';
    $id = $_GET['id'];

    $sql = "DELETE FROM tasks WHERE id = $id";
    mysqli_query($conn, $sql);
    // var_dump($sql);
    header('Location: ../views/home.php');