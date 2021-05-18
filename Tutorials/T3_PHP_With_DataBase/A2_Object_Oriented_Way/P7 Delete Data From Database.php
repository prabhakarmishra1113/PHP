<?php

 $server = "localhost";
 $username = "root";
 $password = "";
 $database = "test2";

 $conn = new mysqli($server,$username,$password,$database);

 if($conn){
    
    $query = "DELETE FROM student WHERE id = 2";
    $result = $conn->query($query);
    if($result){
        
        echo "Delete Record Successfully";

    }
    else{
        echo "Not Connected From Table";
    }

 }
 else{
     echo "Connection Lost";
 }

?>