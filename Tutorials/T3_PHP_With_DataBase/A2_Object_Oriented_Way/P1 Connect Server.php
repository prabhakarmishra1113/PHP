<?php

$server="localhost";
$user_name="root";
$password="";

$conn = new mysqli($server,$user_name,$password);

if($conn){
    echo "Connection Successfully";
}
else
{
    die("Connection Fail".$conn->connect_errno);
}

?>