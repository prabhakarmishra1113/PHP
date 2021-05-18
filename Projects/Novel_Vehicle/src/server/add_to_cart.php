<?php
 include "../../src/db_con.php";
 session_start();
 
 if(isset($_SESSION['user_id'])){
       $vehicle_id=$_REQUEST['vehicle_key'];
       $user_id=$_SESSION['user_id'];

       $query="SELECT * FROM cart WHERE user_id='$user_id' AND vehicle_id='$vehicle_id'";
       $result=$con->prepare($query);
       $result->execute();
       $num=$result->rowCount();
       if($num>0)
       {
         if(isset($_REQUEST['buy_now'])){
            $_SESSION['vehicle_id']=$_REQUEST['vehicle_key'];
            $_SESSION['buy_now']="buy_now";
            header("location:../../templates/views/payment_page.php");
         } 
         else{
            header("location: ../../index.php");
            $_SESSION['cartmsg']="vehicle Alredy Added To Cart";
         }
       }
       else{
         $query="INSERT INTO cart(user_id,vehicle_id) VALUES(?,?)";
         $result=$con->prepare($query);
         $result->execute(array($user_id,$vehicle_id));
         if($result){
            if(isset($_REQUEST['buy_now'])){
               $_SESSION['vehicle_id']=$_REQUEST['vehicle_key'];
               $_SESSION['buy_now']="buy_now";
               header("location:../../templates/views/payment_page.php");
            }
            else{
               $_SESSION['vehicle_id']=$_REQUEST['vehicle_key'];
               header("location:../../templates/views/user_cart.php");
            }
         }
       }
    }
 else{
    header("location:../../index.php");
 }
?>