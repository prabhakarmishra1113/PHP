<?php

 $server = "localhost";
 $username = "root";
 $password = "";
 $database = "test2";

 $conn = new mysqli($server,$username,$password,$database);

 if($conn){
    
    $query = "UPDATE student SET name ='PD' WHERE id = 3";
    $result = $conn->query($query);
    if($result){
        
        echo "UPDATEd Record Successfully";

    }
    else{
        echo "Not Connected From Table";
    }

 }
 else{
     echo "Connection Lost";
 }

?>