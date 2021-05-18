<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "test2";

$conn = new mysqli($server,$user,$password,$database);

if($conn){
   
    $query = "CREATE TABLE student(id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                   name VARCHAR(50) NOT NULL,
                                   email VARCHAR(50) NOT NULL,
                                   password VARCHAR(50) NOT NULL)";
    
    $result = $conn->query($query);

    if($result){
        echo "Table Created Successfully";
    }
    else{
        echo "SORRY!";
    }

}
else{
    echo "Conection Lost!";
}

?>