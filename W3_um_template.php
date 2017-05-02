<!DOCTYPE html>
<html>
<head class="w3-center w3-top">
  <?php include('header.php');  ?>
</head>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <aside class="w3-container">
        <a href="https://cdn-images-1.medium.com/max/455/1*snTXFElFuQLSFDnvZKJ6IA.png"><img src="images/fakeAD.png" style="height:200px;width:300px;border:1px"></a>
      </aside>
      <br>
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-round w3-white">
            <div class="w3-container w3-padding">
              <h1 class="w3-text-orange w3-center w3-font-size:large">Welcome to Dog4Dog!</h1>
              <p align="center">Looking for Canine Companionship?  Need someone you can trust to take care of your best friend?   (Dog4Dog makes no attempt to screen users of this site and will not be held liable for any unfortunate incidents).</p>
              <p align="center">Make an account and browse other users near you!   Create a profile, select one of our three options, "Seeking Dog", "Seeking Human", or "Seeking Both", and you are on your way to making you furry friends!</p>
            </div>
          </div>
        </div>
      </div>
      
      <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <img src="/w3images/avatar5.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity">16 min</span>
        <h4>Jane Doe</h4><br>
        <hr class="w3-clear">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button> 
        <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button> 
      </div>  

    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
      <div class="w3-card-2 w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Upcoming Events:</p>
          <img src="/w3images/forest.jpg" alt="Forest" style="width:100%;">
          <p><strong>Holiday</strong></p>
          <p>Friday 15:00</p>
          <p><button class="w3-button w3-block w3-theme-l4">Info</button></p>
        </div>
      </div>
      <br>
      
      <div class="w3-card-2 w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Friend Request</p>
          <img src="/w3images/avatar6.png" alt="Avatar" style="width:50%"><br>
          <span>Jane Doe</span>
          <div class="w3-row w3-opacity">
            <div class="w3-half">
              <button class="w3-button w3-block w3-green w3-section" title="Accept"><i class="fa fa-check"></i></button>
            </div>
            <div class="w3-half">
              <button class="w3-button w3-block w3-red w3-section" title="Decline"><i class="fa fa-remove"></i></button>
            </div>
          </div>
        </div>
      </div>
      <br>
      
      <div class="w3-card-2 w3-round w3-white w3-padding-16 w3-center">
        <p>ADS</p>
      </div>
      <br>
      
      <div class="w3-card-2 w3-round w3-white w3-padding-32 w3-center">
        <p><i class="fa fa-bug w3-xxlarge"></i></p>
      </div>
      
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>Footer</h5>
</footer>

<script>
// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

</body>
</html> 
