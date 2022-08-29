<?php 
require_once __DIR__ . "/../classes/Template.php";
require_once __DIR__ . "/../classes/UsersDatabase.php";
Template::header("");
?>


<div class="ecommerce">
<div class="w3-container w3-padding-hor-64 w3-theme-l5">
  <div class="w3-row">
    <div class="w3-col m5">
    <div class="w3-padding-hor-16"><span class="w3-xlarge w3-border-teal w3-bottombar">Contact Us</span></div>
      <h3>Address</h3>
      <p>Like Us , Comment Us</p>
      <p><i class="fa fa-map-marker w3-text-teal w3-xlarge"></i>  Bromma, Stockholm</p>
      <p><i class="fa fa-phone w3-text-teal w3-xlarge"></i>  +46 75151516</p>
      <p><i class="fa fa-envelope-o w3-text-teal w3-xlarge"></i>  test@test.com</p>
    </div>
    <div class="container4">
	
      <form action="contact.php" method="post">
      <div>      
        <label>Name</label>
        <input class="w3-input" type="text" name="name" required>
      </div>
      <div class="w3-group">      
        <label class="label">Email</label>
        <input class="3input" type="text" name="email" required>
      </div>
      <div class="w3-group">      
        <label class="w3-label">Subject</label>
        <input class="w3-input" type="text" name="comment" required>
      </div>  
      <div class="w3-group">   
      <textarea type="text" name="text">Hi, I would like to...</textarea>
      </div> 
      <input class="w3-check" type="checkbox" checked>
      <label class="w3-validate">I Like it!</label>
      <button type="submit" class="w3-btn w3-right w3-theme" name="send">Send</button>
      </form>




<!-- Google Maps -->
<div id="googleMap" style="width:100%;height:420px;"></div>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script src="/Mystore/assets/googleMaps.js"></script>

<?php 
Template::footer();