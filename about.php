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
    <div class="w3-col m2">
      <div class="w3-card-2 w3-round w3-white w3-padding-16 w3-center">
          <img src="images/IMG11813320842.png" style="height: 150px; width: 150px;">
      </div>
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
              <p align="center"> Welcome to Dog4Dog! This service is for dogs/dog owners to find other dogs/dog
                                owners and meet up with them to have a dog date! This service is to
                                bring the lonely dog lovers together, and it's absolutely free!</p>
              <p align="center"> To get started, make a user profile with your Google
                                account and fill in your profile information in the My Profile Tab and
                                upload a picture of your dog! You can always go back and edit the
                                information.</p>
              <p align="center"> Once your profile is all set to go, you can navigate
                                to the Browse and view other profiles that you may be interested in
                                being paired with for your doggy date. When both parties indicate that
                                they are interested in each other, then we will pair you canine/canine
                                lovers up. Feel free to chat with the person to settle the date info!</p>
            </div>
          </div>
        </div>
      </div>
    <!-- End Middle Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-bottom w3-padding-16">
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