<?php
include 'config.php';

$sql = "SELECT * FROM student_class";
$query = mysqli_query($conn, $sql) or die("Query Failed");

if(mysqli_num_rows($query) > 0){
    $row = mysqli_fetch_all($query, MYSQLI_ASSOC);
}else{
    $row['empty']=['empty'];
}

mysqli_close($conn);

echo json_encode($row);

 