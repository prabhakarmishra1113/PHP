<?php

$server = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($server,$username,$password);

if($conn){

    $query = "CREATE DATABASE test";
    $result = mysqli_query($conn,$query);
    if($result){
        echo "Database Created Successfully";
    }
    else
    {
        echo "Sorry !";
    }
}
else{
    echo "Server Connection Lost";
}

?>