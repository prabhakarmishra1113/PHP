<?php

 $server = "localhost";
 $username = "root";
 $password = "";
 $database = "test";

 $conn = mysqli_connect($server,$username,$password,$database);

 if($conn){
    
    $query = "SELECT * FROM student";
    $result = mysqli_query($conn,$query);
    if($result){
        $total_data = mysqli_num_rows($result);
        if($total_data>0){
            while($row = mysqli_fetch_assoc($result)){
                  echo $row['name']."<br>";
            }
        }
        else{
            echo "Empty Table";
        }

    }
    else{
        echo "Not Connected From Table";
    }

 }
 else{
     echo "Connection Lost";
 }

?>