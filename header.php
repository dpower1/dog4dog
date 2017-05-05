<title>Dog4Dog</title>
<meta charset="UTF-8">
<script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!--<base href="https://dog4dog-mjkoogle.c9users.io/"></base>-->

<!-- Check it out: I added an icon to the tab -->
<?php echo file_get_contents('https://dog4dog-mjkoogle.c9users.io/images/Favicon/D4d_Favicon.html');  ?>


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
<script src="https://dog4dog-mjkoogle.c9users.io/Login.js" type = "text/javascript" language = "javascript"></script>

<!-- Define standard symbols -->
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>

<!-- Navbar -->
<div class="w3-top">
  <nav class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()">
      <i class="fa fa-bars"></i></a>
    <a href="https://dog4dog-mjkoogle.c9users.io/home.php">
      <img src="https://dog4dog-mjkoogle.c9users.io/images/IMG11813320842.png" style="height: 43px; width: 43px; margin:5px 3px 0px 5px;" align="left"></a>
    <a id='home' href="https://dog4dog-mjkoogle.c9users.io/home.php" class="w3-bar-item w3-button w3-theme-l1" style="margin:5px;">
      <i class="fa fa-home fa-fw fa-fh"></i>&nbsp;Home</a>
    <a id='profile' href="https://dog4dog-mjkoogle.c9users.io/profile.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white" style="margin:5px;">
      <i class="fa fa-user fa-fw"></i>&nbsp;Profile</a>
    <a id='browse' href="https://dog4dog-mjkoogle.c9users.io/browse/ionic2.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white" style="margin:5px;">
      <i class="fa fa-paw fa-fw" aria-hidden="true"></i>&nbsp;Browse</a>
    <a id='msgd' href="https://dog4dog-mjkoogle.c9users.io/match/match.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white" style="margin:5px;">
      <i class="fa fa-envelope fa-fw"></i>&nbsp;Messages</a>
  	<a id='about' href="https://dog4dog-mjkoogle.c9users.io/about.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white" style="margin:5px;">
  	  <i class="fa fa-info-circle fa-fw"></i>&nbsp;About</a>
    <a id='logout' href="https://dog4dog-mjkoogle.c9users.io/home.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white w3-hide" onclick="signOut()" style="margin:5px;  border: 1px solid red;">
      <i class="fa fa-sign-out fa-fw"></i>&nbsp;Sign Out</a>
  	<div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark" style="height: 43px; margin:5px;"> </div>
  </nav>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large">
  <a href="https://dog4dog-mjkoogle.c9users.io/profile.php" class="w3-bar-item w3-button w3-padding-large">Profile</a>
  <a href="https://dog4dog-mjkoogle.c9users.io/browse/ionic2.php" class="w3-bar-item w3-button w3-padding-large">Browse</a>
  <a href="https://dog4dog-mjkoogle.c9users.io/match/match.php" class="w3-bar-item w3-button w3-padding-large">Messages</a>
  <a href="https://dog4dog-mjkoogle.c9users.io/help.html" class="w3-bar-item w3-button w3-padding-large">About</a>
  <a href="https://dog4dog-mjkoogle.c9users.io/home.php" class="w3-bar-item w3-button w3-padding-large" onclick="signOut()" id="logout">Sign Out</a>
</div>