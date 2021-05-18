<?php

 $server = "localhost";
 $username = "root";
 $password = "";
 $database = "test";

 $conn = mysqli_connect($server,$username,$password,$database);

 if($conn){
    
    $query = "UPDATE student SET name='PD' WHERE id = 3";
    $result = mysqli_query($conn,$query);
    if($result){
        
        echo "update Record Successfully";

    }
    else{
        echo "Not Connected From Table";
    }

 }
 else{
     echo "Connection Lost";
 }

?>