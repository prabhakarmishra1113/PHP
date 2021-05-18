<?php
include "../db_con.php";
session_start(); 

  if(isset($_SESSION['user_id'])){
      if(isset($_REQUEST['vehicle_key'])){
          $vehicle_id=$_REQUEST['vehicle_key'];
          $query = "DELETE FROM cart WHERE vehicle_id='$vehicle_id'";
          $result = $con->query($query);
          if($result){
            header("location: ../../templates/views/user_cart.php");
          }
      }
      else{
         header("location: ../../index.php");
      }  
  }
  else
  {
    header("location: ../../index.php");
  }

?>