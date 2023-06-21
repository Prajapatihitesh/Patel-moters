<?php include("Validation.php"); ?>
 
<!DOCTYPE html>
<html>
<head>
  <title>Index</title>
  <link rel="stylesheet" type="text/css" href="Index.css">
</head>
<body>
  
  <?php include("Header.php");?>

  <div id="nbar">
    <a href="#">Home</a>
    <a href="Estimate.php">Services</a>
    <a href="index.php" class="but">Log Out</a>
  </div>

 
<div id="wlcm">
        <h2>WELCOME TO PATEL MOTORS</h2>
        <p>All TYPE OF DIESEL & PETROL CAR VEHICLES REPAIRING</p>
</div>


  <div class="news">
    <marquee behavior=scroll direction="left" scrollamount="10"> 
    <h3>All TYPE OF DIESEL & PETROL CAR VEHICLES REPAIRING</h3>
  </marquee>
  </div>
  <?php include("Slider.php"); ?>


  <?php include("Footer.php");?>

</body>
</html>