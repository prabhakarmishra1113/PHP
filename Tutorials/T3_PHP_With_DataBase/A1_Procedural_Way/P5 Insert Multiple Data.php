<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "test";

$conn = mysqli_connect($server,$user,$password,$database);

if($conn){
   
    $query = "INSERT INTO student(name,email,password) VALUES ('Rajat','rajat@gmail.com','rajat');";
    $query .= "INSERT INTO student(name,email,password) VALUES ('Saurabh','saurabh@gmail.com','saurabh');";
    $query .= "INSERT INTO student(name,email,password) VALUES ('Atul','atul@gmail.com','atul');";
    
    $result = mysqli_multi_query($conn,$query);

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