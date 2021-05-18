<?php

 $server = "localhost";
 $username = "root";
 $password = "";
 $database = "test";

 $conn = new mysqli($server,$username,$password,$database);

 if($conn){
    
    $query = "SELECT * FROM student";
    $result = $conn->query($query);
    if($result){
        $total_data = $result->num_rows;
        if($total_data>0){
            while($row = $result->fetch_assoc()){
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