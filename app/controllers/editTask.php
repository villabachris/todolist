<?php
require_once 'connect.php';
$task = $_POST['task'];
$id = $_POST['id'];

if(isset($task) && isset($id)){ 
    $sql = "UPDATE tasks SET task= '$task' WHERE id= $id";
    mysqli_query($conn, $sql);
    echo "success";
    header('Location: ../views/home.php');
}else{
    echo "not save";
}

// var_dump($sql);