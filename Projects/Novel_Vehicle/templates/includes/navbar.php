
<!--Header Start-->
<div class="sticky-top">
<header class="navbar bg-primary w-100">
    <!--Icon and Logo Section Start-->
        <ul class="nav">
            <li class="nav-item">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="vehicle_pagenavbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
                </button>
            </li>

            <li class="nav-item ">
                <a class="navbar-brand ml-lg-3 ml-lg-4" href="<?php echo $path ?>index.php">Novel Vehicle</a>
             </li>
         </ul>
    <!--Icon and Logo Section End-->

    <!--SignIn/SignUp and Cart Section Start-->
    <ul class="nav ml-auto order-sm-last mr-lg-5 rc">
        <?php 
           if(isset($_SESSION['user_id'])){
            $user_id=$_SESSION['user_id'];
            $query="SELECT vehicle_id FROM cart WHERE user_id='$user_id'";
            $result=$con->prepare($query);
            $result->execute();
            $cart_count=$result->rowCount();
        ?>

          
               <li class="nav-item dropleft">
                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
               
               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                 <a class="dropdown-item" href="#"><?php echo $_SESSION['user_name']; ?></a>  
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="#">Your Profile</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="<?php echo $path ?>templates/views/user_rented_vehicles.php">My Rented Vehicles</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="<?php echo $path; ?>src/server/user_logout.php">Logout</a>
               </div>
               </li>   
        <?php
           }
           else{
             ?>
           <li class="nav-item">
               <a class="nav-link" href="#" data-toggle="modal" data-target="#login"><i class="fa fa-user"></i> <span class="lc">Login</span></a>
           </li> 
        <?php     
           } 
        ?>    
            <li class="nav-item">
               <a class="nav-link" href="<?php echo $path ?>templates/views/user_cart.php"><i class="fa fa-shopping-cart"></i> <span class="lc">Cart<sup class="text-danger"><sup style="font-size:10px;"><?php if(isset($cart_count)){echo $cart_count;} ?></sup></span></a>
            </li>
         </ul>
    <!--SignIn/SignUp and Cart Section End-->

    <!--Search Bar Section Start-->
         <ul class="nav mr-auto ml-md-3">
            <li class="nav-item">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control" type="search" placeholder="Search Your City" aria-label="Search">
                </form>
            </li>
         </ul>
    <!--Search Bar Section End-->
    </header>
 </div>

<section class="container-fluid">
 <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">

     <a class="p-2 text-muted" href="<?php echo $path ?>templates/views/vehicle_page.php?vehicle_key=Tractor">
       <figure class="figure">
         <img src="<?php echo $path ?>public/images/icons/tractor.png" class="figure-img img-fluid rounded" alt="..." style="width: 50px;height:50px;">
         <figcaption class="figure-caption">Tractor</figcaption>
       </figure>    
     </a>

     <a class="p-2 text-muted" href="<?php echo $path ?>templates/views/vehicle_page.php?vehicle_key=Trolley">
       <figure class="figure">
         <img src="<?php echo $path ?>public/images/icons/trolley.png" class="figure-img img-fluid rounded" alt="..." style="width: 50px;height:50px;">
         <figcaption class="figure-caption">Trolly</figcaption>
       </figure>    
     </a>

     <a class="p-2 text-muted" href="<?php echo $path ?>templates/views/vehicle_page.php?vehicle_key=BIKE">
       <figure class="figure">
         <img src="<?php echo $path ?>public/images/icons/bike.png" class="figure-img img-fluid rounded" alt="..." style="width: 50px;height:50px;">
         <figcaption class="figure-caption">Bikes</figcaption>
       </figure>    
     </a>

     <a class="p-2 text-muted" href="<?php echo $path ?>templates/views/vehicle_page.php?vehicle_key=Car">
       <figure class="figure">
         <img src="<?php echo $path ?>public/images/icons/car.png" class="figure-img img-fluid rounded" alt="..." style="width: 50px;height:50px;">
         <figcaption class="figure-caption">Cars</figcaption>
       </figure>    
     </a>

     <a class="p-2 text-muted" href="<?php echo $path ?>templates/views/vehicle_page.php?vehicle_key=Scooty">
       <figure class="figure">
         <img src="<?php echo $path ?>public/images/icons/scooty.png" class="figure-img img-fluid rounded" alt="..." style="width: 50px;height:50px;">
         <figcaption class="figure-caption">Scooty</figcaption>
       </figure>    
     </a>

     <a class="p-2 text-muted" href="<?php echo $path ?>templates/views/vehicle_page.php?vehicle_key=E-Riksha">
       <figure class="figure">
         <img src="<?php echo $path ?>public/images/icons/e-rick.png" class="figure-img img-fluid rounded" alt="..." style="width: 50px;height:50px;">
         <figcaption class="figure-caption">E-Riksha</figcaption>
       </figure>    
     </a>

     <a class="p-2 text-muted" href="<?php echo $path ?>templates/views/vehicle_page.php?vehicle_key=Cycle">
       <figure class="figure">
         <img src="<?php echo $path ?>public/images/icons/cycle.png" class="figure-img img-fluid rounded" alt="..." style="width: 50px;height:50px;">
         <figcaption class="figure-caption">Cycle</figcaption>
       </figure>    
     </a>

     <a class="p-2 text-muted" href="<?php echo $path ?>templates/views/vehicle_page.php?vehicle_key=BUS">
       <figure class="figure">
         <img src="<?php echo $path ?>public/images/icons/bus.png" class="figure-img img-fluid rounded" alt="..." style="width: 50px;height:50px;">
         <figcaption class="figure-caption">Bus</figcaption>
       </figure>    
     </a>

     <a class="p-2 text-muted" href="<?php echo $path ?>templates/views/vehicle_page.php?vehicle_key=taxi">
       <figure class="figure">
         <img src="<?php echo $path ?>public/images/icons/taxi.png" class="figure-img img-fluid rounded" alt="..." style="width: 50px;height:50px;">
         <figcaption class="figure-caption">Taxi</figcaption>
       </figure>    
     </a>

     <a class="p-2 text-muted" href="<?php echo $path ?>templates/views/vehicle_page.php?vehicle_key=Tractor">
       <figure class="figure">
         <img src="<?php echo $path ?>public/images/icons/tractor.png" class="figure-img img-fluid rounded" alt="..." style="width: 50px;height:50px;">
         <figcaption class="figure-caption">Tractor</figcaption>
       </figure>    
     </a>
    </nav>
  </div>
  </section>
    <!--Header End-->
<!--login starts-->
<div class="modal fade" id="login" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <div class="modal-header bg-primary">
        <h3 class="text-light">Login</h3>
        <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body justify-content-right">
        <div class="text-center pt-5 pb-5">
          <form  action="<?php echo $path; ?>src/server/user_signup_login.php" method="POST">
             <div class="form-group">
              <input type="text" name="userlogin" class="form-control" placeholder="Email Or Phone">
            </div>

            <div class="form-group">
              <input type="password" name="userpassword" class="form-control"
              placeholder="Password">
            </div>

            <button type="submit" name="login" class="btn btn-primary btn-block btn-md">Login</button></button></div>
            <p class="text-center text-danger"><?php if(isset($_SESSION['loginmsg'])){ echo $_SESSION['loginmsg']; }?></p>
          </form>
        </div>

        <div class="modal-footer bg-primary text-light">
          <p>Do not have an Account?<a href="#" data-toggle="modal" data-target="#signup"> <span class="text-warning">Sign Up</span></a></p>
        </div>
         
    </div>    
  </div>
</div>  
<!-- login ends-->

<!-- modal for signup-->
<div class="modal fade" id="signup" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <div class="modal-header bg-primary">
        <h3 class="text-light">Sign Up</h3>
        <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body justify-content-right">
        <div class="text-center pt-5 pb-5">
          <form  action="<?php echo $path; ?>src/server/user_signup_login.php" method="POST">

            <div class="form-group">
              <input type="text" name="username" class="form-control" placeholder="Name">
            </div>

            <div class="form-group">
              <input type="email" name="useremail" class="form-control"
              placeholder="Email">
            </div>

            <div class="form-group">
              <input type="tel" name="userphone" class="form-control"
              placeholder="Phone">
            </div>

            <div class="form-group">
              <input type="password" name="userpassword" class="form-control"
              placeholder="Password">
            </div>

            <div class="form-group">
              <input type="password" name="userconfirmpassword" class="form-control"
              placeholder="Confirm Password">
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-block btn-md">Register</button></button></div>
            <p class="text-center text-danger"><?php if(isset($_SESSION['signmsg'])){ echo $_SESSION['signmsg']; }?></p>
          </form>
        </div>
        <div class="modal-footer bg-primary text-light">
          <p>Already have an Account?<a href="#" data-toggle="modal" data-target="#login"><span class="text-warning"> Login</span></a></p>
        </div>         
    </div>  
  </div>
</div>
<!-- Signup Ends-->