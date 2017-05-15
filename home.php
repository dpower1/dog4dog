<!DOCTYPE html>
<html>
<head class="w3-center w3-top">
  <?php include('header.php');  ?>
</head>

<body class="w3-theme-l5">
<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m2">
      <div class="w3-card-2 w3-round w3-white w3-padding-16 w3-center">
          <img src="images/IMG11813320842.png" style="max-width:100%; height: 150px; width: 150px;">
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
              <p align="center">Looking for Canine Companionship?  Need someone you can trust to take care of your best friend?   (Dog4Dog makes no attempt to screen users of this site and will not be held liable for any unfortunate incidents).</p>
              <p align="center">Make an account and browse other users near you!   Create a profile, select one of our three options, "Seeking Dog", "Seeking Human", or "Seeking Both", and you are on your way to making you furry friends!</p>
            </div>
          </div>
        </div>
      </div>

      <div class="w3-container w3-card-2 w3-white w3-round w3-margin" style='padding-bottom: 2cm;'><br>
        <p class="w3-center"><img src="/images/Graceful-Dog.jpg" style="max-width:100%; height:250px;width:375px;border-style: outset;"></p>
        <hr class="w3-clear">
        <p>Dogs just like this one are waiting to play with you. Don't keep them waiting for you! Start swiping today!</p>

      </div>  

    <!-- End Middle Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-col m3">
      <!-- ADS -->
      <aside class="w3-card-2 w3-round w3-white w3-padding-16 w3-center">
        <a href="https://cdn-images-1.medium.com/max/455/1*snTXFElFuQLSFDnvZKJ6IA.png"><img src="images/fakeAD.png" style="max-width:100%; height:200px;width:300px;border-style: outset;"></a>
      </aside>
      <br>

      <aside class="w3-card-2 w3-round w3-white w3-padding-16 w3-center">
        <a href="http://www.petsmart.com/"><img src="/images/petsmart-stock-up-and-save-sale-save-more-large-5.jpg" style="max-width:100%; height:200px;width:300px; border-style: solid;"></a>
      </aside>
      
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>

<!-- Oh, bite me. It works. -->
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5 class='w3-center'>&copy; Dog4Dog Inc. 2017 &nbsp;&nbsp;&nbsp;<a href='https://en.wikipedia.org/wiki/Twilight_bark' target='_blank'>Contact Us &#9733;</a> </h5>
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
