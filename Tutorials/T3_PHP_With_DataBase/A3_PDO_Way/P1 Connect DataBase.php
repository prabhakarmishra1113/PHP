<?php

$data_base="test";
$user_name="root";
$password="";

$conn = mysqli_connect($data_base,$user_name,$password);

if($conn){
    echo "Connection Successfully";
}
else
{
    die("Connection Fail".mysqli_connect_errno());
}

?>