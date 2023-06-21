<?php
    include("Validation.php");
 ?>
 <!DOCTYPE html>
 <html>
 <head>
  <link rel="stylesheet" type="text/css" href="patel_moter.css">   
   <title>NEW PARTS</title>
 </head>
 <body onload="fo()">
   <div id="main"> 

  <?php include("Header.php"); ?>
  <?php include("Menubar.php"); ?>

   <div id="title"> 
    <span class="menu" onclick="openNav()">&#9776</span><span>NEW LABOR ENTRY</span></p>
  </div>

    <form action="New_labor_work_insert.php" method="POST" class="form">
 
    <div id = form_container>
      <div id = "form_left_container">

          <div class="form_left">
            <label for="Part">PARTTICULARS: </label>
            <input type="text" name="Name" id="Part"  pattern="[A-Za-z\s]+" title="EX = DANTING AND PAINTING" required onkeypress="this.value = this.value.toUpperCase();" required>
          </div>

          <div class="form_left">
           <label for="Rate">RATE: </label>
            <input type="text" name="rate" id="Rate"  pattern="^[0-9]+$" title="EX = 11000" required>
          </div>

          <div class="form_left">
            <label for="C">CGST: </label>
            <input type="text" name="CGST" id="C" pattern="^(9|14|0)$" title="EX = 0 and 9 OR 14" required>
          </div>

      </div>

      <div id="form_right_container">
      
          <div class="form_right"> 
            <label for="S">SGST: </label>
            <input type="text" name="SGST" id="S" pattern="^(9|14|0)$" title="EX = 0 and 9 OR 14" required>
          </div>
    
          <div class="form_right">
           <label for="I">IGST: </label>
           <input type="text" name="IGST" id="I" pattern="^(9|14|0)$" title="EX = 0 and 9 OR 14">
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
    document.getElementById('Part').focus();
   }
  </script>
 </body>
 </html>