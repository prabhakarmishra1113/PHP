<?php

if(isset($_REQUEST['submit'])){
  
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $password=$_REQUEST['password'];


    echo $name."<br>";
    echo $email."<br>";
    echo $password."<br>";

}

?>