<div class="card">
          <div class="card-body">
          <?php
          $seller_id=$_SESSION['seller_id'];
          $query="SELECT rent_id FROM rent_details WHERE seller_id='$seller_id'";
          $result=$con->prepare($query);
          $result->execute();
          while($row=$result->fetch(PDO::FETCH_ASSOC)){
            $rent_id=$row['rent_id'];
            $query2="SELECT rent_details.*, vehicles.*,users.*,customer_address.* FROM (((rent_details
                    INNER JOIN vehicles ON rent_details.vehicle_id = vehicles.vehicle_id)
                    INNER JOIN users ON rent_details.user_id = users.user_id)
                    INNER JOIN customer_address ON rent_details.address_id = customer_address.address_id) WHERE rent_id='$rent_id'";
            $result2=$con->prepare($query2);
            $result2->execute();    
            $row2=$result2->fetch(PDO::FETCH_ASSOC);
            $tempimg = $row2['vehicle_images'];
            $img = explode(",",$tempimg);
            
            if($row2['seller_confirmation']===$seller_con){ 
          ?>
            <div class="row">
               <div class="col-md-2">
                  <div class="d-flex justify-content-start vehicle_details">
                    <div class="col-2 col-md-3 col-lg-2">
                       <img src="../../public/images/vehicles/<?php echo $img[0]; ?>" alt="...">           
                    </div>
                  </div>
               </div>
               <div class="col-10 col-md-5 col-lg-4 justify-content-end">
                    <h6 class="text-muted vehicle-seller"><?php echo $row2['vehicle_cat']; ?></h6>
                    <h5 class="card-title"><?php echo $row2['vehicle_name']; ?></h5>
                    <h6 class="text-muted vehicle-seller"><?php echo $row2['vehicle_company']; ?></h6> 
                    <h6 class="text-muted vehicle-seller">V.N: <?php echo $row2['vehicle_number']; ?></h6> 
                    <h6 class="text-muted vehicle-seller">V.M: <?php echo $row2['vehicle_model']; ?></h6>
                    <h6 class="text-muted vehicle-seller"><?php echo $row2['vehicle_fuel']; ?></h6> 
                    <h5><span class="vehicle-price">₹<?php echo $row2['vehicle_price']; ?></span></h5>
                </div>
               <div class="col-12 col-md-4 col-lg-6 justify-content-start">
                   <h5 class="card-title">Customer Name - <?php echo $row2['user_name']; ?></h5>  
                   <h6 class="vehicle-seller">Customer Licence - <span class="text-muted"><?php echo $row2['customer_licence']; ?></span></h6>
                   <h6 class="vehicle-seller">Customer Phone - <span class="text-muted"><?php echo $row2['user_phone']; ?></span></h6>
                   <h6 class="vehicle-seller">Customer Email - <span class="text-muted"><?php echo $row2['user_email']; ?></span></h6>
                   <h6 class="vehicle-seller">Customer Address - 
                      <span class="text-muted"><?php echo $row2['customer_locality']; ?> - </span>
                      <span class="text-muted"><?php echo $row2['customer_town']; ?> - </span>
                      <span class="text-muted"><?php echo $row2['customer_state']; ?> - </span>
                      <span class="text-muted"><?php echo $row2['customer_pin']; ?></span>
                   </h6>
                   <h6 class="vehicle-seller">Order Date - <span class="text-muted"><?php echo $row2['rent_date']; ?></span></h6>
                   <h6 class="vehicle-seller">Today Date - <span class="text-muted"><?php echo date('y/m/d'); ?></span></h6>
                   <h6 class="vehicle-seller">Total Rent Days - <span class="text-muted"><?php ?></span></h6>
                   <h6 class="vehicle-seller">Total Payment - <span class="text-muted"><?php echo $row2['total_price']; ?></span></h6>
                   <h6 class="vehicle-seller">Payment Status - <span class="text-muted"><?php echo $row2['payment_status']; ?></span></h6>
                   <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                     <input type="hidden" name="seller_approval" value="<?php echo $row2['rent_id'] ?>">
                     <button class="btn btn-danger" type="submit" name="approved"><?php echo $butten_text; ?></button>
                   </form>
               </div>
            </div>
            <?php
              }
             }
            ?>
          </div>
        </div>