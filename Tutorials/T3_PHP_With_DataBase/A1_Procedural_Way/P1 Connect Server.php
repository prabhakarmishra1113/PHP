<?php

$server="localhost";
$user_name="root";
$password="";

$conn = mysqli_connect($server,$user_name,$password);

if($conn){
    echo "Connection Successfully";
}
else
{
    die("Connection Fail".mysqli_connect_errno());
}

?>