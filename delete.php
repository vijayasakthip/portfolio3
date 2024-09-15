<?php
include("connect.php");

$id=$_GET["id"];

$sql="UPDATE task set action='1' where id=$id";
if(mysqli_query($conn,$sql))
{
    header("Location:todolist.php");
    exit();
}
else{
    echo"error";
}

?>