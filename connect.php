<?php
$servername="localhost";
$username="root";
$password="";
$db_name="todo";

$conn=mysqli_connect($servername,$username,$password,$db_name);


if($conn){
 
}
else{
    echo"not connected";
}
?>