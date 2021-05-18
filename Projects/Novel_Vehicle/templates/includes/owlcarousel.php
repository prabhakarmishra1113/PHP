
<section class="owl-card mt-1">
 <div class="container-fluid">
  <div class="owl-carousel owl-theme">
  <?php
   if(isset($vehicle_cat)){
     $query="SELECT * FROM vehicles WHERE vehicle_cat='$vehicle_cat' ORDER BY RAND() LIMIT 10";
   }
   else{
    $query="SELECT * FROM vehicles ORDER BY RAND() LIMIT 10";
   }
  
   $result=$con->prepare($query);
   $result->execute();
   while($row=$result->fetch(PDO::FETCH_ASSOC))
     {
       $tempimg = $row['vehicle_images'];
       $img = explode(",",$tempimg);
  ?>
   <div class="item" >
     <div class="card myd">
        <a href="<?php echo $owlpath ?>templates/views/<?php echo $page_link ?>?vehicle_key=<?php echo $row[$vehicle_col]; ?>"><img src="<?php echo $owlpath; ?>public/images/vehicles/<?php echo $img[0]; ?>" class="card-image-center"></a>
        <a href="<?php echo $owlpath ?>templates/views/<?php echo $page_link ?>?vehicle_key=<?php echo $row[$vehicle_col]; ?>">
          <div class="card-body">
            <h5 class="card-title text-truncate"><?php echo $row['vehicle_name']; ?></h5>
            <p class="card-text"><?php echo $row['vehicle_price']; ?></p>
            <p class="card-text text-muted text-truncate" style="margin-top: -10px;"><?php echo $row['vehicle_cat']; ?></p>
          </div>
        </a>
      </div>
  </div>
  <?php
   }
  ?> 
 </div>
</div>
</section>
