<?php include "../../src/db_con.php" ?>
<?php session_start(); ?>
<?php include "../includes/header.php" ?>

<?php $index="../../"; $path="../../"; include "../includes/navbar.php" ?>

<section class="vehicle_detail">
  <div class="container-fluid">
    <div class="row">
        <div class="col-4 images_part">
        <!--Carousel Start-->
           <div class="card">
             <div class="card-body text-center">
            <!--Carousel Start-->     
                <div id="carouselExampleIndicators" class="carousel slide text-center" data-ride="carousel">
                 <ol class="carousel-indicators">
                 <?php
                   $vehicle_id=$_REQUEST['vehicle_key'];
                   $query="SELECT vehicles.*,seller_details.shop_name FROM vehicles INNER JOIN seller_details ON vehicles.seller_id=seller_details.seller_id WHERE vehicle_id='$vehicle_id'";
                   $result=$con->prepare($query);
                   $result->execute();
                   $row=$result->fetch(PDO::FETCH_ASSOC);
                   $tempimg = $row['vehicle_images'];
                   $img = explode(",",$tempimg);
               ?>
                   <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i ?>" class="active"></li>
                   <?php
                    for($i=1;$i<sizeof($img);$i++){
                  ?>
                   <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                 <?php
                    }
                  ?>  
                 </ol>
                 <div class="carousel-inner text-center">
                    <div class="carousel-item active text-center">
                      <img src="../../public/images/vehicles/<?php echo $img[0]; ?>" class="d-block w-100" alt="...">
                    </div>
                    <?php
                      for($i=1;$i<sizeof($img);$i++){
                    ?>
                    <div class="carousel-item">
                      <img src="../../public/images/vehicles/<?php echo $img[$i]; ?>" class="d-block w-100" alt="...">
                     </div>
                   <?php
                    }
                   ?>  
                 </div>
                </div>
        <!--Carousel End-->
             </div>  
             <div class="card-footer">
            <form action="../../src/server/add_to_cart.php?vehicle_key=<?php echo $row['vehicle_id'];?>" method="post">
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <button type="submit" class="btn btn-lg btn-success w-100" name="add_to_cart"><i class="fa fa-shopping-cart"></i> <span>ADD TO CARD</span></button>
                </div>
                <div class="col-sm-12 col-md-6">
                  <button type="submit" class="btn btn-lg btn-danger w-100" name="buy_now"><i class="fa fa-bolt"></i> <span>BUY NOW</span></button>
                </div>
              </div>                                
            </form>
          </div>
           </div>
        </div>

        <div class="col-8 detail_part">
            <div class="card">
              <div class="card-body">
               <h5 class="text-muted vehicle-seller"><?php echo $row['shop_name']; ?></h5> 
               <h4 class="vehicle-name"><?php echo $row['vehicle_name']; ?></h4>
               <h5 class="vehicle-number">V.N - <span><?php echo $row['vehicle_number']; ?></span></h5>
               <h5 class="vehicle-model">V.M - <span><?php echo $row['vehicle_model']; ?></span></h5>
               <h5 class="vehicle-fuil text-danger">Fuel - <span><?php echo $row['vehicle_fuel']; ?></span></h5> 
               <div class="btn-group">
                 <button type="button" class="btn btn-sm btn-success"><i class="fa fa-money"></i> <span><?php echo $row['vehicle_price']; ?> PER DAY</span></button>
               </div>          
               <hr class="mt-3">
               <div class="vehicle-more" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">More Details <span><i class="fa fa-plus float-right text-muted"></i></span></div>
               <div class="collapse" id="collapseExample">
                  <div class="card card-body" style="border: none;">
                   <address>
                     <?php echo $row['vehicle_details']; ?>
                   </address>
                  </div>
               </div>
               <hr>
             </div>
          </div>
        </div>
    </div>
  </div>
</section>

<?php $path="../../"; include "../../templates/includes/footer_details.php" ?>
<?php include "../includes/footer.php" ?>