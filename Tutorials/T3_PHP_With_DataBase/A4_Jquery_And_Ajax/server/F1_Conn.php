<?php

$hostname="localhost";
$user_name="root";
$password="";
$database="test";

$conn = mysqli_connect($hostname,$user_name,$password,$database);

if($conn){
    echo "Database Connected Successfully";
}
else{
    echo "Error";
}