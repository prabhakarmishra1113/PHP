<?php

 $server = "localhost";
 $username = "root";
 $password = "";
 $database = "test";

 $conn = mysqli_connect($server,$username,$password,$database);

 if($conn){
    
    $query = "DELETE FROM student WHERE id = 2";
    $result = mysqli_query($conn,$query);
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