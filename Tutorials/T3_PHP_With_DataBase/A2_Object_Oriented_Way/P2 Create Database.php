<?php

 $server = "localhost";
 $username = "root";
 $password = "";

 $conn = new mysqli($server,$username,$password);

 if($conn){

    $query = "CREATE DATABASE test2";
    
    $result = $conn->query($query);

    if($result){
        echo "Databse Created Successfully";
    }
    else{
        echo "Sorry!";
    }
 }
 else{
     echo "Connection lost";
 }

?>