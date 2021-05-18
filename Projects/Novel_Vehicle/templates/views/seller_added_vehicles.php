<?php include "../../src/db_con.php"; session_start(); ?>

<?php include "../includes/header.php" ?>
<?php include "../includes/seller_side_bar.php" ?>
  <section class="main_view mt-5">
           <div class="table-responsive">
             <table class="table table-bordered table-hover">
               <thead class="thead-dark">
                <?php
                   $table_header=array("Sr.No","Vehicle Category","Vehicle Sub Category","Vehicle Name","Vehicle Company","Vehicle Number","Vehicle Model","Vehicle Fuel","Vehicle Price","Vehicle Details");
                ?>
                <tr>
                  <?php 
                    foreach($table_header as $headers){
                  ?>
                  <th scope="col" style="font-size: 12px;"><?php echo $headers; ?></th>
                <?php
                 }
                ?>
                </tr>
               </thead>
               <tbody>
               <?php
                $seller_id=$_SESSION['seller_id'];
                $query="SELECT * FROM vehicles where seller_id='$seller_id'";
                $result=$con->prepare($query);
                $result->execute();
                $i=1;
                while($row=$result->fetch(PDO::FETCH_ASSOC)){
                    $tempimg = $row['vehicle_images'];
                    $img = explode(",",$tempimg);
               ?>
                 <tr>
                   <th><?php echo $i; ?></th>
                   <td><?php echo $row['vehicle_cat'] ?></td>
                   <td><?php echo $row['vehicle_subcat'] ?></td>
                   <td><?php echo $row['vehicle_name'] ?></td>
                   <td><?php echo $row['vehicle_company'] ?></td>
                   <td><?php echo $row['vehicle_number'] ?></td>
                   <td><?php echo $row['vehicle_model'] ?></td>
                   <td><?php echo $row['vehicle_fuel'] ?></td>
                   <td><?php echo $row['vehicle_price'] ?></td>
                   <td><?php echo $row['vehicle_details'] ?></td>
                 </tr>
               <?php
                $i++;
                }
               ?> 
               </tbody>
             </table>
           </div>
  </section>

<?php include "../includes/footer.php" ?>