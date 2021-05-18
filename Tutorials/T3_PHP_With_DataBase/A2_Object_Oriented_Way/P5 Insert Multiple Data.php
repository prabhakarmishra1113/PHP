<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "test2";

$conn = new mysqli($server,$user,$password,$database);

if($conn){
   
    $query = "INSERT INTO student(name,email,password) VALUES ('Rajat','rajat@gmail.com','rajat');";
    $query .= "INSERT INTO student(name,email,password) VALUES ('Saurabh','saurabh@gmail.com','saurabh');";
    $query .= "INSERT INTO student(name,email,password) VALUES ('Atul','atul@gmail.com','atul');";
    
    $result = $conn->multi_query($query);

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