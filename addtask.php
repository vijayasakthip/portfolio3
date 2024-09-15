<?php
include("connect.php");
$taskname=$_POST["taskname"];
$assignto=$_POST["assignto"];
$status="uncompleted";

if(isset($_POST["submit"])){
    $sql="INSERT INTO task (taskname,assignedto,status) VALUES ('$taskname','$assignto','$status')";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        header("Location:todolist.php");
        exit();
    }
    else{
        echo"error";
    }
}
else{
    echo"error";
}
?>
