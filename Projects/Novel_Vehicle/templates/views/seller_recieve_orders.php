<?php include "../../src/db_con.php"; session_start(); ?>

<?php include "../includes/header.php" ?>
<?php include "../includes/seller_side_bar.php" ?>

  <section class="main_view mt-2 seller_recieve_orders">
    <div class="container-fluid">
      <ul class="nav nav-pills mb-3 row" id="pills-tab" role="tablist">

        <li class="col-md-4 nav-item" role="presentation">
           <a class="nav-link active" id="pills-new-tab" data-toggle="pill" href="#pills-new" role="tab" aria-controls="pills-new" aria-selected="true">New Request</a>
        </li>

        <li class="col-md-4 nav-item" role="presentation">
           <a class="nav-link" id="pills-going-tab" data-toggle="pill" href="#pills-going" role="tab" aria-controls="pills-going" aria-selected="true">Going On</a>
        </li>

        <li class="col-md-4 nav-item" role="presentation">
           <a class="nav-link" id="pills-old-tab" data-toggle="pill" href="#pills-old" role="tab" aria-controls="pills-old" aria-selected="true">Older</a>
        </li>
      </ul>

      <div class="tab-content" id="pills-tabContent">

      <div class="tab-pane fade show active" id="pills-new" role="tabpanel" aria-labelledby="pills-new-tab">
          <?php $seller_con="Pending"; $butten_text="Approved"; include "../includes/seller_recieved_card.php" ?>
      </div>

      <div class="tab-pane fade show" id="pills-going" role="tabpanel" aria-labelledby="pills-going-tab">
        <?php $seller_con="GoingOn"; $butten_text="Going On"; include "../includes/seller_recieved_card.php" ?>
      </div>

       <div class="tab-pane fade show" id="pills-old" role="tabpanel" aria-labelledby="pills-old-tab">
         <?php $seller_con="Complete"; $butten_text="Completed"; include "../includes/seller_recieved_card.php" ?>
       </div>
       
    </div>
  </section>

<?php include "../includes/footer.php" ?>
<?php

if(isset($_REQUEST['approved'])){
   $rent_id3=$_REQUEST['seller_approval'];
   $query3="UPDATE rent_details SET seller_confirmation ='GoingOn' WHERE rent_id='$rent_id3'";
   $result3=$con->prepare($query3);
   $result3->execute();
} 

?>