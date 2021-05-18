<?php include "../../src/db_con.php"; session_start(); ?>

<?php
if(isset($_SESSION['user_id'])){
 if(isset($_REQUEST['delivery_here'])){
      $address_id=$_REQUEST['save_address'];
      $_SESSION['checked']="checked";
      $_SESSION['checked_id']=$address_id;
      header("location: ../../templates/views/payment_page.php");
  }
  if(isset($_REQUEST['pay_and_rent_now'])){
     $_SESSION['rent_days']=$_REQUEST['rent_days'];
     $_SESSION['total_price']=$_REQUEST['price'];
     $_SESSION['seller_id']=$_REQUEST['seller_id'];
     $_SESSION['pay_and_rent_now']="pay_and_rent_now";
     header("location: ../../templates/views/payment_page.php");
  }
if(isset($_REQUEST['confirm'])){
      $user_id=$address_id=$vehicle_id=$rent_days=$rent_date="";
      $user_id=$_SESSION['user_id'];
      $address_id=$_SESSION['checked_id'];
      $rent_date=date("d-m-y");
      $rent_days=$_SESSION['rent_days'];
      $confirm_price=$_REQUEST['confirm_price'];
      $seller_confirmation="Pending";
      $user_confirmation="Pending";

     
    if(isset($_SESSION['place_order'])){
        $query="SELECT vehicle_id FROM cart WHERE user_id='$user_id'";
        $result=$con->prepare($query);
        $result->execute();
        $num=$result->rowCount();
        while($row=$result->fetch(PDO::FETCH_ASSOC)){
          $vehicle_id=$row['vehicle_id'];
          $seller_id=$row['seller_id'];
          $query="INSERT INTO rent_details(user_id,address_id,vehicle_id,seller_id,rent_days,total_price,rent_date,seller_confirmation,user_confirmation) VALUES(?,?,?,?,?,?,?,?,?)";
          $result1=$con->prepare($query);
          $result1->execute(array($user_id,$address_id,$vehicle_id,$seller_id,$rent_days,$confirm_price,$rent_date,$seller_confirmation,$user_confirmation));
          if($result1){
            $query = "DELETE FROM cart WHERE vehicle_id='$vehicle_id'";
            $result_del = $con->query($query);
            unset($_SESSION['checked']);
            unset($_SESSION['checked_id']);
            unset($_SESSION['place_order']);
            unset($_SESSION['total_price']);
            header("location: ../../templates/views/rent_confirmation_page.php");
          }  
        }
      }
      else{
        $vehicle_id=$_SESSION['vehicle_id'];
        $seller_id=$_SESSION['seller_id'];  
        $query="INSERT INTO rent_details(user_id,address_id,vehicle_id,seller_id,rent_days,total_price,rent_date,seller_confirmation,user_confirmation) VALUES(?,?,?,?,?,?,?,?,?)";
        $result=$con->prepare($query);
        $result->execute(array($user_id,$address_id,$vehicle_id,$seller_id,$rent_days,$confirm_price,$rent_date,$seller_confirmation,$user_confirmation));
        if($result){
            $query = "DELETE FROM cart WHERE vehicle_id='$vehicle_id'";
            $result_del = $con->query($query);
            unset($_SESSION['checked']);
            unset($_SESSION['checked_id']);
            unset($_SESSION['buy_now']);
            unset($_SESSION['pay_and_rent_now']);
            unset($_SESSION['seller_id']);
            unset($_SESSION['total_price']);
            header("location: ../../templates/views/rent_confirmation_page.php");
        }
      }
}
}
else{
  header("location: ../../index.php");
}
?>
