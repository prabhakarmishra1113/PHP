<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "test";

$conn = mysqli_connect($server,$user,$password,$database);

if($conn){
   
    $query = "INSERT INTO student(name,email,password) VALUES ('Prabhakar','prabhakar@gmail.com','prabhakar')";
    
    $result = mysqli_query($conn,$query);

    if($result){
        echo "Data Inserted Successfully";
    }
    else{
        echo "SORRY!";
    }

}
else{
    echo "Conection Lost!";
}

?>