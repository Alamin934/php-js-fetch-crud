<?php
include 'config.php';

$input = file_get_contents("php://input");
$decode = json_decode($input, true);

if(isset($decode["id"]) || isset($decode["name"]) || isset($decode["address"]) || isset($decode["class"]) || isset($decode["phone"]) ){

    $id = mysqli_real_escape_string($conn, $decode["id"]);
    $name = mysqli_real_escape_string($conn, $decode["name"]);
    $address = mysqli_real_escape_string($conn, $decode["address"]);
    $class = mysqli_real_escape_string($conn, $decode["class"]);
    $phone = mysqli_real_escape_string($conn, $decode["phone"]);

    $sql = "UPDATE students SET sname='{$name}', saddress='{$address}', sclass={$class}, sphone={$phone} WHERE sid = {$id}";

    if(mysqli_query($conn, $sql)){
        echo json_encode(array('update'=>'success'));
    }else{
        echo json_encode(array('update'=>'error'));
    }
}
