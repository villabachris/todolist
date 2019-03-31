<?php
require_once 'connect.php';

$tasks = $_POST['task'];

$sql = "INSERT INTO tasks(task) VALUES('$tasks')";
$result = mysqli_query($conn, $sql);

// var_dump($sql);
header('Location: ../views/home.php');
