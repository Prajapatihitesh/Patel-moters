<?php include("Validation.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estimate</title>
  <link rel="stylesheet" type="text/css" href="patel_moter.css">   
</head>
<body onload="{fo();
  let date = new Date();
  document.getElementById('EDate').max = date.getFullYear()+'-'+String(date.getMonth()+1).padStart(2, '0') +'-'+String(date.getDate()).padStart(2, '0');
}">
<div id="main"> 
  
 <?php include("Header.php");?>
 <?php include("Menubar.php");?>

      <div id="title">
       <span style="cursor: pointer; float: left;" onclick="openNav()">&#9776</span><span>ESTIMATE ENTRY</span></p>
      </div>
  <form action="Estimate_insert.php" method="POST" class="form">
     
    <div id = form_container>
      <div id = "form_left_container">
         

          <div class="form_left">
           <label for="e_type">ESTIMATE TYPE</label>
           <select name="et" id="e_type" required9>
             <option> </option>
             <option>ACCIDENT</option>
             <option>GENERAL</option>
           </select>
          </div>
      
          <div class="form_left">
            <label for="EDate">DATE</label>
            <input type="date" name="date" id="EDate" required>
          </div>

          <div class="form_left">
            <label for="cust_n">CUST NAME</label>
            <input type="text" name="cn" id="cust_n" pattern="[A-Za-z\s]+" title="EX = RAMESH PATEL" required onkeypress ="this.value = this.value.toUpperCase();">
          </div>

          <div class="form_left">
           <label for="vehiN">VEHICLE NO</label>
           <input type="text" name="vn" id="vehiN" pattern="^[A-Z|a-z]{2}\s[0-9]{1,2}\s[A-Z|a-z]{0,3}\s[0-9]{4}$" title="EX = GJ 54 DH 5455" required onkeypress="this.value = this.value.toUpperCase();">
          </div>

          <div class="form_left">
            <label for="p_num">POLICY NO</label>
            <input type="text" name="pn" id="p_num" pattern="^[0-9]{8,10}$" title="EX = 8458458865" required>
          </div>
            <div class="form_left">
             <label for="carM">MODEL</label>
             <select name="car" id="carM" required> 
              <option> </option>

               <?php 
                include('connect.php');
                $result = mysqli_query($conn,"select* from car_model");
  
                while ($res=mysqli_fetch_array($result)) {
              ?>
              <option><?php echo "$res[Model]"; ?> </option>
              <?php
                  }
              ?>
             </select>
          </div>

      </div>

      <div id="form_right_container">
          
          <div class="form_right">
            <label for="DOA">DATE OF ACCIDENT</label>
            <input type="date" name="doa" id="DOA" required onfocus="this.max = document.getElementById('EDate').value;">
          </div>
  
          <div class="form_right">
            <label for="tmac">TIME OF ACCIDENT</label>
            <input type="time" name="toa" id="tmac" required>
          </div>
    
          <div class="form_right">
            <label for="InsuComp">INSURANCE COMPANY</label>
            <select  name="ic" id="InsuComp" required>
              <option> </option>
              <?php 
                include('connect.php');
                $result = mysqli_query($conn,"select* from insurance_company");
  
                while ($res=mysqli_fetch_array($result)) {
              ?>
              <option><?php echo "$res[C_name]"; ?> </option>
              <?php
                  }
              ?>
            </select>
          </div>

   
          <div class="form_right">
            <label for="P_inso">PERIOD OF INSURANCE</label>
            <input type="date" name="poi" id="P_inso" required onblur="document.getElementById('P_inso2').min = this.value;">
            <label for="P_inso2">TO</label>
            <input type="date" name="poi2" id="P_inso2" required>
          </div>
      </div>

    </div>
    <input class="but1" type="submit" value="SAVE">
    <input class="but1" type="reset" value="CLEAR">
  </form>


  <?php include("Footer.php");?>
 
</div>
 <script>
   function openNav(){
    document.getElementById("mynbar").style.width="250px";
    document.getElementById("main").style.marginLeft="250px";
   }
   function closeNav(){
    document.getElementById("mynbar").style.width="0";
    document.getElementById("main").style.marginLeft="0";
   }
   function fo()
   {
     document.getElementById('e_type').focus();
   }
 </script>

</body>
</html>