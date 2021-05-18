<?php include "../../src/db_con.php" ?>
<?php session_start(); ?>
<?php include "../includes/header.php" ?>

<?php $index="../../"; $path="../../"; include "../includes/navbar.php" ?>

<!--Product Page Start-->  
 <div class="container-fluid vehicle_page">
    <div class="row">
       <div class="col-lg-2 filter hide-on-small">
         
         <div class="card">
            <div class="card-header">Filter</div>
            <div class="card body">
              <h6 class="card-title">Sort By</h6>
              <ul>
                <a href="#"><li>Price low to high</li></a>
                <a href="#"><li>Price high to low</li></a>
                <a href="#"><li>Popularity</li></a>
                <a href="#"><li>Newest</li></a>
              </ul>
            </div>
         </div>

        </div>

     <!--Product Section Start-->    
       <div class="col-12 col-lg-10 product_sec">      
         <div class="card">
           <div class="card-header">Vehicle</div>
           <div class="card-body">
              
             <!--Product Card Start-->
             <div class="row">
             <?php
               $category=$_REQUEST['vehicle_key'];
               $query="SELECT * FROM vehicles WHERE vehicle_cat='$category' OR vehicle_subcat='$category'";
               $result=$con->prepare($query);
               $result->execute();
               while($row=$result->fetch(PDO::FETCH_ASSOC))
                 {
                   $tempimg = $row['vehicle_images'];
                   $img = explode(",",$tempimg); 
             ?>
              <div class="col-6 col-md-4 col-lg-3">
               <div class="card">
                 <a class="text-center" href="vehicle_details.php?vehicle_key=<?php echo $row['vehicle_id']; ?>"><img src="../../public/images/vehicles/<?php echo $img[0]; ?>" class="img-fluid"></a>
                 <div class="card-footer">
                   <figcaption class="figure-caption brand"><?php echo $row['vehicle_company']; ?></figcaption>
                   <a href="vehicle_details.php"><figcaption class="figure-caption title text-truncate"><?php echo $row['vehicle_name']; ?></figcaption></a>
                   <figcaption class="figure-caption rs"><?php echo $row['vehicle_price']; ?></figcaption>
                   <a href="../../src/server/add_to_cart.php?vehicle_key=<?php echo $row['vehicle_id'];?>"><button class="btn btn-primary w-100 mt-1">Add To Card</button>
                 </div>
               </div>
              </div>
                
            <?php
              }
            ?>
            </div>
             <!--Product Card End-->         
           </div>

           <!--Pagination Start-->
            <nav aria-label="Page navigation example">
               <ul class="pagination justify-content-center">
                 <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                 </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                 <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                 </li>
                </ul>
            </nav>
            <!--Pagination End-->
         </div>     
       </div>
    <!--Product Section End-->
    </div>
  <!--Product Page Row End-->  
 </div>
<!--Product Page End-->  
<?php $path="../../"; include "../../templates/includes/footer_details.php" ?>
<?php include "../includes/footer.php" ?>