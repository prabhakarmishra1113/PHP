<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "test2";

$conn = new mysqli($server,$user,$password,$database);

if($conn){
   
    $query = "INSERT INTO student(name,email,password) VALUES ('Prabhakar','prabhakar@gmail.com','prabhakar')";
    
    $result = $conn->query($query);

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