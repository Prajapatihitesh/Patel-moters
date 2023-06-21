<?php
    include("Validation.php");
 ?>
 <!DOCTYPE html>
 <html>
 <head>
  <link rel="stylesheet" type="text/css" href="patel_moter.css">   
   <title>NEW CAR MODEL</title>
 </head>
 <body onload="fo()">
   <div id="main"> 

  <?php include("Header.php"); ?>
  <?php include("Menubar.php"); ?>

   <div id="title"> 
    <span class="menu" onclick="openNav()">&#9776</span><span>NEW CAR MODEL  ENTRY</span></p>
  </div>

    <form action="New_Car_model_insert.php" method="POST" class="form">
 
    <div id = form_container>
      <div id = "form_left_container">

          <div class="form_left">
            <label for="C_model">CAR MODEL: </label>
            <input type="text" name="Name" id="C_model" pattern="[A-Za-z0-9\s]+" title="EX = NEXON"  required>
          </div>

      </div>
    </div>
    <input class="but1" type="submit" value="SAVE" name="sv">
    <input class="but1" type="reset" value="CLEAR">
   </form>
  <?php include("Footer.php"); ?>
 </div>
  <script>
     function fo(){
    document.getElementById('C_model').focus();
   }
  </script>
 </body>
 </html>