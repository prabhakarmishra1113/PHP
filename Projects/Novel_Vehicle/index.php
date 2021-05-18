<?php include "src/db_con.php" ?>
<?php session_start(); ?>
<?php include "templates/includes/header.php" ?>

<?php $index=""; $path=""; include "templates/includes/navbar.php" ?>

<!--Slider Section Start-->
<section class="carousel-sec">
<div class="container-fluid">
 <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" >
    <div class="carousel-item active">
      <img src="public/images/sl1.jpg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="public/images/sl2.jpg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="public/images/sl3.jpg" class="d-block w-100">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only" >Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
 </div>
</div>
</section>
<!--Slider Section End-->

<!--Owl Carousel Section Start-->
<section class="container-fluid owl mt-1">
  <div class="card">
     <div class="card-header">
        <a href="#" class="float-right"><button class="btn btn-primary">View All</button></a>
        Your Choice
     </div>
      <?php $owlpath="";$page_link="vehicle_page.php"; $vehicle_col="vehicle_cat"; include "templates/includes/owlcarousel.php" ?>
  </div>
</section>
<!--Owl Carousel Section End-->

<!--Home Page Sections Or Category Start-->
<?php $title="Best of Agriculture"; include "templates/includes/home_sec.php"?>

<?php $title="Travaling"; include "templates/includes/home_sec.php"?>

<?php $title="Earn Money"; include "templates/includes/home_sec.php"?>

<!--Home Page Sections Or Category Start-->

<?php $path=""; include "templates/includes/footer_details.php" ?>
<?php include "templates/includes/footer.php" ?>
<?php 
unset($_SESSION['loginmsg']);
unset($_SESSION['signmsg']);
?>