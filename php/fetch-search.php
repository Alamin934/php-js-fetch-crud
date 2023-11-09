<?php
include 'config.php';
if(isset($_GET['search'])){
    $sql = "SELECT students.sid,students.sname,students.saddress, students.sphone,student_class.cname FROM students LEFT JOIN student_class ON students.sclass = student_class.cid WHERE students.sname LIKE '%{$_GET['search']}%' OR students.sphone LIKE '%{$_GET['search']}%'";
    $query = mysqli_query($conn, $sql) or die("Query Failed");
    
    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_all($query, MYSQLI_ASSOC);
    }else{
        $row['empty']=['empty'];
    }
    
    mysqli_close($conn);
    
    echo json_encode($row);
    
}