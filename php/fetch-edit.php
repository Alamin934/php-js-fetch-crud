<?php
include 'config.php';
$id = $_GET['editId'];

$sql = "SELECT * FROM students WHERE sid = {$id}";
$query = mysqli_query($conn, $sql) or die("Query Failed");
$output = [];
if(mysqli_num_rows($query) > 0){
    $row = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $output['response'] = $row;
}


$sql1 = "SELECT * FROM student_class";
$query1 = mysqli_query($conn, $sql1) or die("Query Failed");
if(mysqli_num_rows($query1) > 0){
    $row1 = mysqli_fetch_all($query1, MYSQLI_ASSOC);
    $output['class'] = $row1;
}

mysqli_close($conn);

echo json_encode($output);
