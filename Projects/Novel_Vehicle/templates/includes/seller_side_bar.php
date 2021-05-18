<div class="sidenav" id="sidenav">
   <span class="close_btn show-on-small" onclick="hide_sidebar()">&times;</span>
   <div class="view_part">
     <a class="navbar-brand text-dark" href="#">Your Dashboard</a>
   </div>
   <hr>

   <div class="sidenav_content">
     <a href="../views/seller_dashboard.php">Your Profile</a>
     <a href="../views/seller_add_vehicles.php">Add Vehicle</a>
     <a href="../views/seller_added_vehicles.php">Your Vehicles</a>
     <a href="../views/seller_recieve_orders.php">Your Recieved Orders</a>
   </div>
</div>

<section class="main_view">
  <nav class="navbar navbar-expand-lg navbar-light bg-danger">
    <div class="container">
      <span class="open_btn show-on-small ml-5" onclick="show_sidebar()">&#9776;</span>
      <a class="navbar-brand text-white " href="#">NovelVehicle</a>
    </div>
  </nav>
</section>

<script>
  function show_sidebar(){
     document.getElementById("sidenav").style.width="25%";
  }
  function hide_sidebar(){
     document.getElementById("sidenav").style.width="0";
  }
</script>  