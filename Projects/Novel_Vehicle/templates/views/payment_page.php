<?php include "../../src/db_con.php"; session_start(); ?>
<?php include "../includes/header.php" ?>

<?php  $index="../../index.php"; $path="../../"; include "../includes/navbar.php" ?>

<?php if(isset($_SESSION['user_id'])){
  if(isset($_REQUEST['place_order'])){
    $_SESSION['place_order']="place_order";
  } 
  if(isset($_REQUEST['buy_now'])){
    $_SESSION['buy_now']="buy_now";
  }
?>

<script>
$(document).ready(function(){
  $("#payment_sheet").hide();
});
</script>

<section class="payment_page">
 <div class="container">
   <div class="row">

     <div class="col-sm-8">

<!--Card 1 Login Details START-->   
      <div class="card bg-white login_part mb-3">
        <div class="card-header bg-white">
          <h6 class="text-muted">LOGIN</h6>
          <p><span class="name"><?php echo $_SESSION['user_name']; ?></span>  <span class="text-muted number">+918360886874</span></p>
        </div>
       </div>
<!--Card 1 Login Details END-->       

<!--Card 2 Already Saved Address Part Start--> 
    <div class="card bg-white mb-3 saved_address">
      <div class="card-header bg-white" id="sa">
        <h6 class="card-title">DELIVERY ADDRESS</h6>
      </div>  
      <div class="card-body" id="already_saved">
         <form action="../../src/server/payment_page.php" method="post">
            <div class="form-group ml-3">

                <?php
                  $user_id=$_SESSION['user_id'];
                  $query="SELECT * FROM customer_address WHERE user_id='$user_id'";
                  $result=$con->prepare($query);
                  $result->execute();
                  $num=$result->rowCount();
                  if($num>0){
                    $i=1;
                    while($row=$result->fetch(PDO::FETCH_ASSOC))
                     {
                ?>

                <script type="text/javascript">
                  $(document).ready(function(){
                    $("#save_address<?php echo $i; ?>").click(function(){
                       $("#db<?php echo $i; ?>").toggle();
                    });
                  });
                </script>

                <div class="form-check form-check">
                 <input class="form-check-input" type="radio" name="save_address" id="save_address<?php echo $i; ?>" value="<?php echo $row['address_id'] ?>" <?php if(isset($_SESSION['checked_id']) && ($_SESSION['checked_id']==$row['address_id'])){ echo $_SESSION['checked']; } ?>>
                 <address class="form-check-label" for="save_address">
                   <span class="buyer_name"><?php echo $row['customer_name'] ?></span> <span class="address_type"><?php echo $row['customer_licence'] ?></span> <span class="buyer_number text-success"><?php echo $row['customer_number'] ?></span><br>
                   <span><?php echo $row['customer_locality']."," ?></span> <span><?php echo $row['customer_town']."," ?></span> <span><?php echo $row['customer_state']." -" ?></span> <span class="buyer_pin"><?php echo $row['customer_pin'] ?></span>
                 </address>
                 <button class="btn btn-danger mt-2" id="db<?php echo $i; ?>" style="display: none;" type="submit" name="delivery_here">DELIVER HERE</button>      
                </div><hr>
              <?php
              $i++;
               }
            ?>
            <script>
             $(document).ready(function(){
                   $("#address_form").hide();
                });
            </script>
            <?php   
              }
              else{
                ?>
              <script>
                $(document).ready(function(){
                   $("#already_saved").hide();
                });
              </script>
            <?php    
              }
              ?>  
          </div> 
        </form>
      </div>
    </div>
<!--Card 2 Already Saved Address Part END--> 

<!--Card 3 Add New Address Part Start--> 
       <div class="address_part card mb-3">
         <div class="card-body">
            <h5><?php if(isset($_SESSION['address_msg'])){echo $_SESSION['address_msg'];} ?></h5>    
            <h6 class="card-title text-primary font-weight-bold" id="add_new_address" style="cursor: pointer;">Add New Address</h6>
         <form action="../../src/server/address_save.php" id="address_form">
           <div class="form-row"> 

             <div class="form-group col-md-6">
                 <input type="text" class="form-control" name="customer_name" placeholder="Name">
             </div>

             <div class="form-group col-md-6">
                 <input type="tel" class="form-control" name="customer_number" placeholder="10-digit mobile number">
             </div>

             <div class="form-group col-md-6">
                 <input type="text" class="form-control" name="customer_licence" placeholder="Enter Driving Licence">
             </div>

             <div class="form-group col-md-6">
                 <input type="text" class="form-control" name="address_pin" placeholder="Pincode">
             </div>

             <div class="form-group col-md-6">
                 <input type="text" class="form-control" name="address_locality" placeholder="Locality">
             </div>

             <div class="form-group col-md-6">
                 <input type="text" class="form-control" name="address_town" placeholder="City/District/Town">
             </div>

             <div class="form-group col-md-12 w-50">
                 <input type="text" class="form-control" name="address_state" placeholder="State">
             </div>

             <button type="submit" name="order" class="btn btn-lg btn-danger" style="font-size: 14px;">SAVE AND DELIVER HERE</button>
            </div>   
         </form>
        </div> 
    </div>
<!--Card 3 Add New Address Part End--> 

<!--Card 4 Order Summary Part Start--> 
    <div class="card summery_part mb-3 user_cart">
      <div class="card-header" id="order_summary">
         <h5 class="card-title">ORDER SUMMARY</h5>
       </div>
      <?php
        if(isset($_SESSION['checked'])){
      ?>
      <div class="card">
      <form action="../../src/server/payment_page.php" method="post">
      <div class="card-body">
       <?php
          if(isset($_SESSION['buy_now']) && isset($_SESSION['vehicle_id'])){
              $vehicle_id=$_SESSION['vehicle_id'];
              $query="SELECT vehicles.*,seller_details.shop_name FROM vehicles INNER JOIN seller_details ON vehicles.seller_id=seller_details.seller_id WHERE vehicle_id='$vehicle_id'";
              $result1=$con->prepare($query);
              $result1->execute();
              $row1=$result1->fetch(PDO::FETCH_ASSOC);
              $tempimg = $row1['vehicle_images'];
              $img = explode(",",$tempimg);
        ?>
        <div class="row d-flex justify-content-start" style="margin: 0;">
          <div class="col-4 col-md-3 col-lg-2 text-center">
              <img src="../../public/images/vehicles/<?php echo $img['0'] ?>" alt="...">           
          </div>
          <div class="col-8 col-md-9 col-lg-10">
              <h5 class="card-title"><?php echo $row1['vehicle_name'];?>"</h5>
              <h6 class="text-muted vehicle-size">Rent Days: <input type="number" name="rent_days" value="<?php if(isset($_SESSION['rent_days'])){ $days=$_SESSION['rent_days']; echo $_SESSION['rent_days'];} ?>" oninput="priceCounter(this.value)"></h6>
              <h6 class="text-muted vehicle-seller">Seller:<?php echo $row1['shop_name']; ?></h6> 
              <input type="hidden" name="seller_id" value="<?php echo $row1['seller_id']; ?>">
              <input type="hidden" name="price" value="<?php if(isset($_SESSION['total_price'])){echo $_SESSION['total_price'];} ?>" id="mainPrice">
              <h5>₹<span class="vehicle-price" id="price"><?php if(isset($_SESSION['total_price'])){ echo $_SESSION['total_price']; }else{ echo $row1['vehicle_price']; } ?></span></h5> 
          </div>
          <script>
            function priceCounter(days){
              var price = days * <?php echo $row1['vehicle_price']; ?>;
               document.getElementById("price").innerHTML = price;
               document.getElementById("mainPrice").value = price;
               document.getElementById("confirm_price").value = price;
            }
          </script>
        </div>    
    <?php
      }
    ?>
    </div>
  
  <?php 
   if(isset($_SESSION['place_order'])){
     unset($_SESSION['buy_now']);
  ?>
    <div class="card-body">
       <?php
          $user_id=$_SESSION['user_id'];
          $query="SELECT vehicle_id FROM cart WHERE user_id='$user_id'";
          $result=$con->prepare($query);
          $result->execute();
          $num=$result->rowCount();
          while($row=$result->fetch(PDO::FETCH_ASSOC)){
            $vehicle_id=$row['vehicle_id'];
            $query="SELECT vehicles.*,seller_details.shop_name FROM vehicles INNER JOIN seller_details ON vehicles.seller_id=seller_details.seller_id WHERE vehicle_id='$vehicle_id'";
            $result1=$con->prepare($query);
            $result1->execute();
            $row1=$result1->fetch(PDO::FETCH_ASSOC);
            $tempimg = $row1['vehicle_images'];
            $img = explode(",",$tempimg);
        ?>
        <div class="row d-flex justify-content-start" style="margin: 0;">
          <div class="col-4 col-md-3 col-lg-2 text-center">
              <img src="../../public/images/vehicles/<?php echo $img['0'] ?>" alt="...">           
          </div>
          <div class="col-8 col-md-9 col-lg-10">
              <h5 class="card-title"><?php echo $row1['vehicle_name'];?>"</h5>
              <h6 class="text-muted vehicle-size">Rent Days: <input type="number" name="rent_days" value="<?php if(isset($_SESSION['rent_days'])){ $days=$_SESSION['rent_days']; echo $_SESSION['rent_days'];} ?>" oninput="priceCounter(this.value)"></h6>
              <h6 class="text-muted vehicle-seller">Seller: <?php echo $row['shop_name']; ?></h6> 
              <input type="hidden" name="price" value="<?php if(isset($_SESSION['total_price'])){echo $_SESSION['total_price'];} ?>" id="mainPrice">
              <h5>₹<span class="vehicle-price" id="price"><?php if(isset($_SESSION['total_price'])){ echo $_SESSION['total_price']; }else{ echo $row1['vehicle_price']; } ?></span></h5> 
          </div>
          <script>
            function priceCounter(days){
              var price = days * <?php echo $row1['vehicle_price']; ?>;
               document.getElementById("price").innerHTML = price;
               document.getElementById("mainPrice").value = price;
               document.getElementById("confirm_price").value = price;
            }
          </script>
        </div>   
    <?php
      }
    ?>
    </div>
    <?php
     }
    ?>
      <div class="card-footer">
        <button class="btn btn-danger float-right mb-2" id="pay_order_now" type="submit" name="pay_and_rent_now">PAY & RENT NOW</button>
      </div>
  </form>
  </div>
  <?php
  }
  ?>
</div>
<!--Card 4 Order Summary Part End-->     
    <?php
    if(isset($_SESSION['pay_and_rent_now'])){
      ?>
    <script>
       $(document).ready(function(){
          $("#payment_sheet").show();
       });
    </script>

   <?php   
    }
    ?>

<!--Card 5 Payment Options Part Start--> 
    <div class="card payment_part mb-3">
      <div class="card-header">
         <h5 class="card-title text-muted">PAYMENT OPTIONS</h5>
       </div>
       <div class="card-body" id="payment_sheet">
         <script>
            $(document).ready(function(){
               $("#confirm").hide();
               $("#cash_on_delivery").click(function(){
                   $("#confirm").show();
               });
            });
         </script>
           <form action="../../src/server/payment_page.php" method="post">
              <div class="form-group">
                 <div class="form-check form-check">
                   <input type="hidden" name="confirm_price" value="<?php if(isset($_SESSION['total_price'])){echo $_SESSION['total_price'];} ?>" id="confirm_price">
                   <input class="form-check-input collapsed" type="radio" name="payment_method" id="cash_on_delivery" value="Cash On Delivery">
                   <label class="form-check-label" for="inlineRadio2">Cash On Delivery</label>
                 </div>
                 <button type="submit" name="confirm" class="btn btn-lg btn-danger float-right" style="font-size: 14px;" id="confirm">CONFIRM</button>
              </div>  
           </form>
       </div>
    </div>
<!--Card 5 Payment Options Part End--> 
</div>
<!--1st Column END--> 
   </div>
 </div>
</section>
<?php
}
else{
  echo "<h1>Sorry! First Login </h1>";
}
?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#add_new_address").click(function(){
            $("#address_form").show();
        });
    });
</script>

<?php include "../includes/footer.php" ?>
<?php unset($_SESSION['address_msg']) ?>
<?php unset($_SESSION['pay_and_rent_now']); ?>