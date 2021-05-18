<?php
 include "../db_con.php";
 session_start();

//Code For SignUp Data
 if(isset($_REQUEST['seller_registration']))
 {
      $seller_name=$seller_phone=$seller_email=$seller_dl=$seller_password=$shop_name=$shop_locality=$shop_town_pin=$shop_town=$shop_town=$shop_district=$shop_state="";
      $seller_name=$_REQUEST['seller_name'];
      $seller_phone=$_REQUEST['seller_phone'];
      $seller_email=$_REQUEST['seller_email'];
      $seller_dl=$_REQUEST['seller_dl'];
      $shop_name=$_REQUEST['shop_name'];
      $shop_locality=$_REQUEST['shop_locality'];
      $shop_town_pin=$_REQUEST['shop_town_pin'];
      $shop_town=$_REQUEST['shop_town'];
      $shop_district=$_REQUEST['shop_district'];
      $shop_state=$_REQUEST['shop_state'];
      $seller_password=$_REQUEST['seller_password'];
      $seller_confirm_password=$_REQUEST['seller_confirmpass'];
    if(empty($seller_name)||empty($seller_phone)||empty($seller_email)||empty($seller_dl)||empty($shop_name)||empty($shop_locality)||empty($shop_town_pin)||empty($shop_town)||empty($shop_district)||empty($shop_state)||empty($seller_password)||empty($seller_confirm_password))
    {
       header("location:../../templates/views/seller_login_registration.php");
       $_SESSION['seller_signmsg']="Fill All The Details";
    }
    else
    {
        if($seller_password===$seller_confirm_password){
            $query="SELECT * FROM seller_details WHERE seller_email='$seller_email' or seller_phone='$seller_phone' ";
            $result=$con->prepare($query);
            $result->execute();
            $num=$result->rowCount();
            if($num>0)
            {
                header("location:../../templates/views/seller_login_registration.php");
                $_SESSION['seller_signmsg']="Seller Already Exist";
            }
            else
            {
              $query="INSERT INTO seller_details(seller_name,seller_phone,seller_email,seller_dl,shop_name,shop_locality,shop_town_pin,shop_town,shop_town,shop_district,shop_state,seller_password) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
              $result=$con->prepare($query);
              $result->execute(array($seller_name,$seller_phone,$seller_email,$seller_dl,$shop_name,$shop_locality,$shop_town_pin,$shop_town,$shop_district,$shop_state,$seller_password));
              if($result)
              {
                $query="SELECT seller_id FROM seller_details WHERE seller_email='$seller_email'";
                $result=$con->prepare($query);
                $result->execute();
                $row=$result->fetch(PDO::FETCH_ASSOC);
                 $_SESSION['seller_id']=$row['seller_id'];
                 header("location: ../../templates/views/seller_dashboard.php");
              }
              else
              {
                 echo "Wrong data";
              }
            }
        }
        else
        {
            header("location:../../templates/views/seller_login_registration.php");
            $_SESSION['seller_signmsg']="Confirm Password Wrong";
        }

    }
 }

 //code For Login DATA

if(isset($_REQUEST['seller_login']))
{
    $seller_login_details=$seller_login_password="";
    $seller_login_details=$_REQUEST['seller_login_details'];
    $seller_login_password=$_REQUEST['seller_login_password'];

    if(empty($seller_login_details)||empty($seller_login_password))
    {
        header("location:../../templates/views/seller_login_registration.php");
        $_SESSION['seller_loginmsg']="Please Fill All The Details";
    }
    else{
    $query="SELECT * FROM seller_details WHERE (seller_email='$seller_login_details' OR seller_phone='$$seller_login_details') AND seller_password='$seller_login_password'";
    $result=$con->prepare($query);
    $result->execute();
    $row=$result->fetch(PDO::FETCH_ASSOC);
    if($row)
    {     
       if($row>0)
       {
         $_SESSION['seller_id']=$row['seller_id'];
         header("location: ../../templates/views/seller_dashboard.php");
       }
    }
    else
    {
        header("location:../../index.php");
        $_SESSION['seller_loginmsg']="Invalid Login Details";
    }
 }

}
?>
