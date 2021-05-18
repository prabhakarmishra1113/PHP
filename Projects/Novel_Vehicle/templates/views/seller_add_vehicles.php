<?php include "../../src/db_con.php"; session_start(); ?>

<?php include "../includes/header.php" ?>
<?php include "../includes/seller_side_bar.php" ?>

<section class="seller_add_vehicles main_view">
   <div class="container mt-3">
     <div class="card">
       <div class="card-header">
         <h6>ADD VEHICLE</h6>
        <?php
          if(isset($_SESSION['add_vehicle_msg'])||isset($_SESSION['image_msg']))
          {
         ?>
          <span class="text-danger"><?php if(isset($_SESSION['add_vehicle_msg'])){echo $_SESSION['add_vehicle_msg'];} ?></span><span class="text-danger"><?php if(isset($_SESSION['image_msg'])){echo $_SESSION['image_msg'];} ?></span>
        <?php    
          }
        ?> 
       </div>
       <div class="card-body">
          <form action="../../src/server/seller_add_vehicle.php" method="post" enctype="multipart/form-data">
             <div class="form-row">
               <!--Vehicle Category-->  
                <div class="form-group col-md-12">
                 <label for="vehicle_cat">Vehicle Category</label>  
                  <select class="form-control" id="vehicle_cat" name="vehicle_category">
                      <option selected>Select Vehicle Category</option>
                      <?php
                       $vehicle_cat=array("Tractor","Trolly","Bike","Car","Scooty","Bus","E-Riksha","Cycle","Taxi");
                       for($i=0;$i<sizeof($vehicle_cat);$i++){
                           ?>
                        <option><?php echo $vehicle_cat[$i]; ?></option>   
                     <?php      
                       }
                      ?>
                  </select>
                </div>
                <!--Vehicle Sub Category-->
                <div class="form-group col-md-12">
                 <label for="vehicle_subcat">Vehicle Used For</label>  
                  <select class="form-control" id="vehicle_subcat" name="vehicle_subcategory">
                      <option selected>Select Vehicle Uses</option>
                      <?php
                       $vehicle_subcat=array("agriculture","travelling","earn-mony");
                       for($i=0;$i<sizeof($vehicle_subcat);$i++){
                           ?>
                        <option><?php echo $vehicle_subcat[$i]; ?></option>   
                     <?php      
                       }
                      ?>
                  </select>
                </div>

                <div class="form-group col-md-12">
                 <label for="vehicle_company">Vehicle Brand Name</label>   
                 <input type="text" class="form-control" name="vehicle_company" placeholder="Enter Company Name" require>
                </div>

                <div class="form-group col-md-12">
                 <label for="vehicle_name">Vehicle Name</label>   
                 <input type="text" class="form-control" name="vehicle_name" placeholder="Enter Vehicle Name" require>
                </div>

                <div class="form-group col-md-12">
                 <label for="vehicle_number">Vehicle Number</label>   
                 <input type="text" class="form-control" name="vehicle_number" placeholder="Enter Vehicle Number" require>
                </div>

                <div class="form-group col-md-12">
                 <label for="vehicle_model">Vehicle Model</label>   
                 <input type="text" class="form-control" name="vehicle_model" placeholder="Enter Vehicle Model" require>
                </div>

                <div class="form-group col-md-12">
                 <label for="vehicle_fuel">Vehicle Fuel</label>  
                  <select class="form-control" id="vehicle_fuel" name="vehicle_fuel" require>
                      <option selected>Select Vehicle Fuel</option>
                      <?php
                       $vehicle_fuel=array("Petrol","Diesel");
                       for($i=0;$i<sizeof($vehicle_fuel);$i++){
                           ?>
                        <option><?php echo $vehicle_fuel[$i]; ?></option>   
                     <?php      
                       }
                      ?>
                  </select>
                </div>

                <div class="form-group col-md-12">
                 <label for="vehicle_model">Vehicle Rent Price</label>   
                 <input type="number" class="form-control" name="vehicle_price" placeholder="Enter Rent Price/day" require>
                </div>

                <div class="form-group col-md-12">
                 <label for="vehicle_details">Enter Other Details</label>   
                 <textarea  class="form-control" name="vehicle_details" require></textarea>
                </div>

                <div class="form-group col-md-12">
                  <label for="vehicle_images">Enter Images</label>   
                  <input type="file" class="form-control-file" name="vehicle_images[]" id="vehicle_images" multiple require>
                </div>

                <div class="form-group col-md-12">
                   <button class="btn btn-danger" name="upload">Upload</button>
                </div>

             </div> 
          </form>
       </div>
     </div>
   </div>
</section>

<div class="main_view">


</div>

<?php include "../includes/footer.php" ?>
