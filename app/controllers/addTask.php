<?php
session_start();
require_once 'connect.php';

$tasks = $_POST['task'];
$_SESSION['alert']="";

if(empty($tasks)){ 
    $_SESSION['alert'] = "no task were input";
    header('Location: ../views/home.php');
}else if(!empty($tasks)){
    $sql = "INSERT INTO tasks(task) VALUES('$tasks')";
    $result = mysqli_query($conn, $sql);
    unset($_SESSION['alert']);
    header('Location: ../views/home.php');
}


// var_dump($sql);
