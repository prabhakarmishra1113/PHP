<?php

$hostname="localhost";
$user_name="root";
$password="";
$database="test";

$conn = mysqli_connect($hostname,$user_name,$password,$database);

if($conn){
    
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email']; 
    $password=$_REQUEST['password'];

    if(empty($name) || empty($email) || empty($password)){
        echo "Insert All Values";
    }
    else{
      $query = "INSERT INTO student(name,email,password) VALUES('$name','$email','$password')";

      $result = mysqli_query($conn,$query);
    
      if($result){
            echo "Data Inserted SuccessFully";
      }
    }
}
else{
    echo "Error";
}
?>