<?php

if(isset($_GET['submit'])){
  
    $name=$_GET['name'];
    $email=$_GET['email'];
    $password=$_GET['password'];


    echo $name."<br>";
    echo $email."<br>";
    echo $password."<br>";

}

?>