<title>Dog4Dog</title>
<meta charset="UTF-8">
<base href=" https://dog4dog-mjkoogle.c9users.io/"></base>

<!-- Check it out: I added an icon to the tab -->
<?php include('D4d_Favicon.html');  ?>

<!-- Google API Includes -->
<meta name="google-signin-scope" content="profile email">
<meta name="google-signin-client_id" content="385196188134-kdtbal0k9vq2qk6obcp2i5eki9g6lail.apps.googleusercontent.com">
<script src="https://apis.google.com/js/platform.js" async defer></script>

<!-- W3Schools Includes -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Runs our Google login API -->
<script src="Login.js"></script>

<!-- Define standard symbols -->
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>

<!-- Navbar -->
<div class="w3-top">
  <nav class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a href="home.php"><img src="images/IMG11813320842.png" style="height: 43px; width: 43px; margin:5px 3px 3px 5px;" align="left"></a>
    <a href="home.php" class="w3-bar-item w3-button w3-theme-l1" style="margin:5px;"><i class="fa fa-home fa-fw"></i>&nbsp;Home</a>
    <a href="" class="w3-bar-item w3-button w3-hide-small w3-hover-white" style="margin:5px;"><i class="fa fa-user fa-fw"></i>&nbsp;Profile</a>
    <a href="" class="w3-bar-item w3-button w3-hide-small w3-hover-white" style="margin:5px;"><i class="fa fa-globe fa-fw"></i>&nbsp;Browse</a>
    <a href="/match/match.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white" id="msgd" style="margin:5px;"><i class="fa fa-envelope fa-fw"></i>&nbsp;Messages</a>
  	<a href="help.html" class="w3-bar-item w3-button w3-hide-small w3-hover-white" style="margin:5px;"><i class="fa fa-info-circle fa-fw"></i>&nbsp;About</a>
    <a href="home.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white w3-hide" onclick="signOut()" id="logout" style="margin:5px;"><i class="fa fa-sign-out fa-fw"></i>&nbsp;Sign Out</a>
  	<div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark" style="height: 40px; margin:5px 5px;"> </div>
  </nav>
</div>
