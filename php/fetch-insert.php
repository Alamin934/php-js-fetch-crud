<?php
include 'config.php';

$input = file_get_contents("php://input");
$decode = json_decode($input, true);

if(isset($decode["name"]) || isset($decode["address"]) || isset($decode["class"]) || isset($decode["phone"]) ){

    $name = mysqli_real_escape_string($conn, $decode["name"]);
    $address = mysqli_real_escape_string($conn, $decode["address"]);
    $class = mysqli_real_escape_string($conn, $decode["class"]);
    $phone = mysqli_real_escape_string($conn, $decode["phone"]);

    $sql = "INSERT INTO students(sname, saddress, sclass, sphone) VALUES('{$name}','{$address}',{$class},{$phone})";

    if(mysqli_query($conn, $sql)){
        echo json_encode(array('insert'=>'success'));
    }else{
        echo json_encode(array('insert'=>'error'));
    }
}













mysqli_close($conn);