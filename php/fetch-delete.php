<?php
include 'config.php';

if(isset($_GET["delId"])){
    $current_id = $_GET["delId"];

    $sql = "DELETE FROM students WHERE sid = {$current_id}";
    if(mysqli_query($conn, $sql)){
        echo json_encode(array('delete'=>'success'));
    }else{
        echo json_encode(array('delete'=>'error'));
    }
}



 