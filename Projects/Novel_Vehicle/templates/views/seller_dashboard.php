<?php include "../../src/db_con.php"; session_start(); ?>

<?php
  if(isset($_SESSION['seller_id'])){
    $seller_id=$_SESSION['seller_id'];  
    $query="SELECT * FROM seller_details WHERE seller_id='$seller_id'";
    $result=$con->prepare($query);
    $result->execute();
    $row=$result->fetch(PDO::FETCH_ASSOC);
?>

<?php include "../includes/header.php" ?>
<?php include "../includes/seller_side_bar.php" ?>

<section class="main_view">
<div class="container mt-5">
    <div class="card w-50" style="margin: auto;">
       <div class="card-header"><?php echo $row['shop_name']; ?></div>
       <div class="card-body">
         <h6>Name: <span><?php echo $row['seller_name']; ?></span></h6>
         <h6>Mobile: <span><?php echo $row['seller_phone']; ?></span></h6>
         <h6>Email: <span><?php echo $row['seller_email']; ?></span></h6>
       </div>
       <div class="card-footer">
         <a href="../../src/server/seller_logout.php"><button class="btn btn-danger float-right">Logout</button></a>
       </div>
    </div>
</div>
</section>
<?php include "../includes/footer.php" ?>


<?php
}else
{
    header("location: ../../index.php");
}
?>