<?php
 include "../../src/db_con.php";
 session_start();

if(isset($_SESSION['user_id'])){
    if(isset($_REQUEST['order'])){
           $customer_name=$customer_number=$customer_licence=$order_pin=$order_locality=$order_town=$order_state="";

           $customer_name=$_REQUEST['customer_name'];
           $customer_number=$_REQUEST['customer_number'];
           $customer_licence=$_REQUEST['customer_licence'];
           $address_pin=$_REQUEST['address_pin'];
           $address_locality=$_REQUEST['address_locality'];
           $address_town=$_REQUEST['address_town'];
           $address_state=$_REQUEST['address_state'];
           $user_id=$_SESSION['user_id'];

        if(empty($customer_name)||empty($customer_number)||empty($customer_licence)||empty($address_pin)||empty($address_locality)||empty($address_town)||empty($address_state)){
            header("location:../../index.php");
            $_SESSION['address_msg']="Fill All The Details";
        }
        else{
            $query="INSERT INTO customer_address(customer_name,customer_licence,customer_number,customer_locality,customer_town,customer_state,customer_pin,user_id) VALUES(?,?,?,?,?,?,?,?)";
            $result=$con->prepare($query);
            $result->execute(array($customer_name,$customer_licence,$customer_number,$address_locality,$address_town,$address_state,$address_pin,$user_id));
  
            if($result)
            {
              header("location: ../../templates/views/payment_page.php");
            }
            else
            {
              header("location: ../../templates/views/payment_page.php");
              $_SESSION['address_msg']="Server Error Find";
            }
        }
    }
 }
 else{
     header("location: ../../index.php");
 }

 ?>