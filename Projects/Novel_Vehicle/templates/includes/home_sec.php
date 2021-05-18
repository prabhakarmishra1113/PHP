
<!--Home Section Start-->
<section class="container-fluid mt-1 home-sec">

<!--Main Card Start-->
  <div class="card">
     <div class="card-header">
       <a href="#" class="float-right"><button class="btn btn-primary">View All</button></a>
       <?php echo "<strong>".$title."</strong> "?>
     </div>
<!--Main Card Body Start--> 
    <div class="card-body" >
        <div class="row w-100" id="home-sec">
        <?php
         if($title==="Best of Agriculture"){
           $pc="agriculture";
           $pc1="";
           $pc2="";
         }
         elseif($title==="Travaling"){
          $pc="traveling";
          $pc1="";
          $pc2="";
         }
         elseif($title==="Earn Money"){
          $pc="earn_money";
          $pc1="";
          $pc2="";
         }
         $query="SELECT * FROM vehicles WHERE vehicle_subcat='$pc' OR vehicle_cat='$pc1' OR vehicle_cat='$pc2' ORDER BY RAND() LIMIT 6";
         $result=$con->prepare($query);
         $result->execute();
         while($row=$result->fetch(PDO::FETCH_ASSOC)) 
          {
            $tempimg = $row['vehicle_images'];
            $img = explode(",",$tempimg);
        ?>
          <div class="col-6 col-md-3 col-lg-2">
          <!--Product Card Start-->
            <div class="product-card card myd">
              <a href="templates/views/vehicle_page.php?vehicle_key=<?php echo $row['vehicle_cat']; ?>"><img src="public/images/vehicles/<?php echo $img[0]; ?>" class="card-image-center"></a>
              <a href="templates/views/vehicle_page.php?vehicle_key=<?php echo $row['vehicle_cat']; ?>">
                <div class="card-body">
                 <h5 class="card-title text-truncate"><?php echo $row['vehicle_name']; ?></h5>
                 <p class="card-text">Start With ₹<?php echo $row['vehicle_price']; ?></p>
                 <p class="card-text text-muted text-truncate" style="margin-top: -10px;"><?php echo $row['vehicle_subcat']; ?></p>
                </div>
              </a>
            </div>
          <!--Product Card End-->  
          </div>
          <?php
          }
          ?>
        </div>
    </div>
<!--Main Card Body End-->      
  </div>
<!--Main Card End-->    
</section>
<!--Home Section Start-->