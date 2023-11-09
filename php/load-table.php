<?php
include 'config.php';

$sql = "SELECT students.sid,students.sname, students.sphone,student_class.cname FROM students LEFT JOIN student_class ON students.sclass = student_class.cid";
$query = mysqli_query($conn, $sql) or die("Query Failed");
// $std_arr = [];
// if(mysqli_num_rows($query) > 0){
//     while($row = mysqli_fetch_assoc($query)){
//         $std_arr[] = $row;
//     }
// }else{
//     $std_arr['empty'] = ['empty'];
// }
// echo "<pre>";
// print_r($std_arr);
// echo "</pre>";
// echo json_encode($std_arr);

if(mysqli_num_rows($query) > 0){
    $row = mysqli_fetch_all($query, MYSQLI_ASSOC);
}else{
    $row['empty']=['empty'];
}

mysqli_close($conn);

echo json_encode($row);

