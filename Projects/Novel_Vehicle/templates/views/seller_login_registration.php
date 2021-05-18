<?php include "../../src/db_con.php"; session_start(); ?>
<?php include "../includes/header.php" ?>
<?php  $index="../../index.php"; $path="../../"; include "../includes/navbar.php" ?>

<script>
$(document).ready(function(){
  $("#login_card").hide();
  $("#already_have_an_account").click(function(){
    $("#signup_card").hide();
    $("#login_card").show();
  });

  $("#dont_have_an_account").click(function(){
    $("#login_card").hide();
    $("#signup_card").show();
  });
});
</script>


<section>
 <div class="container">
<!--Signup Card Start-->  
    <div class="card" id="signup_card">
      <div class="card-header">Signup</div>
      <div class="card-body">
        <form action="../../src/server/seller_signup_login.php" method="post">
          <div class="form-row">

            <div class="form-group col-md-6">
              <input type="text" class="form-control" name="seller_name" placeholder="Enter Your Name" required>
              <div class="invalid-feedback">
                 Please Enter Name
              </div>
            </div>

            <div class="form-group col-md-6">
              <input type="tel" class="form-control" name="seller_phone" placeholder="Enter Your Phone Number" required>
            </div>

            <div class="form-group col-md-6">
              <input type="email" class="form-control" name="seller_email" placeholder="Enter Your Email" required>
            </div>

            <div class="form-group col-md-6">
              <input type="text" class="form-control" name="seller_dl" placeholder="Enter Your DL Number" required>
            </div>

            <div class="form-group col-md-6">
              <input type="text" class="form-control" name="shop_name" placeholder="Enter Your Shop Name" required>
            </div>

            <div class="form-group col-md-6">
              <input type="text" class="form-control" name="shop_locality" placeholder="Shop Locality" required>
            </div>
            
            <div class="form-group col-md-6">
              <input type="text" class="form-control" name="shop_town_pin" placeholder="sho town pin" required>
            </div>

            <div class="form-group col-md-6">
              <input type="text" class="form-control" name="shop_town" placeholder="shop town" required>
            </div>

            <div class="form-group col-md-6">
              <input type="text" class="form-control" name="shop_district" placeholder="shop district" required>
            </div>

            <div class="form-group col-md-6">
              <input type="text" class="form-control" name="shop_state" placeholder="shop state" required>
            </div>

            <div class="form-group col-md-6">
              <input type="password" class="form-control" name="seller_password" placeholder="Enter Your Password" required>
            </div>

            <div class="form-group col-md-6">
              <input type="password" class="form-control" name="seller_confirmpass" placeholder="Confirm Password" required>
            </div>

            <div class="form-group col-md-6">
              <button class="btn btn-large btn-danger w-100" type="submit" name="seller_registration">Register</button>
            </div>
          </div>
        </form>
      </div>
      <div class="card-footer">
         <p>Already have an account ? <a id="already_have_an_account" href="#">Login</a> </p>
      </div> 
    </div>
<!--Signup Card End-->
<!--Login Card Start-->
    <div class="card" id="login_card">
      <div class="card-header">Login <span><?php if(isset($_SESSION['seller_loginmsg'])){echo $_SESSION['seller_loginmsg'];} ?></span></div>
      <div class="card-body">
        <form action="../../src/server/seller_signup_login.php" method="post">
          <div class="form-row"> 

            <div class="form-group col-md-6">
              <input type="email" class="form-control" name="seller_login_details" placeholder="Email Or Phone" required>
            </div>

            <div class="form-group col-md-6">
              <input type="password" class="form-control" name="seller_login_password" placeholder="Password" required>
            </div>

            <div class="form-group col-md-6">
              <button class="btn btn-large btn-danger w-100" type="submit" name="seller_login">Login</button>
            </div>

          </div> 
        </form>
      </div>
      <div class="card-footer">
         <p>Don't have an account ? <a id="dont_have_an_account" href="#">Register</a> </p>  
      </div>
    </div>
<!--Login Card End-->
  </div>

</section>

<?php include "../includes/footer.php" ?>
<?php unset($_SESSION['seller_loginmsg']); ?>