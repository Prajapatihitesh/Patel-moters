<?php
  include("Validation.php");
 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Estimate</title>
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
    <span style="cursor: pointer; float: left;" onclick="openNav()">&#9776</span><span>EDIT ESTIMATE</span></p>
  </div>

  <?php include("connect.php");
  $ESTI_ID = $_GET['no'];

    $result = mysqli_query($conn,"select * from estimate where ESTIMATE_NO = '$ESTI_ID' ");
    while($res=mysqli_fetch_array($result)){
  ?>
  <form action="Estimate_update.php" method="POST" class="form">
     
    <div id = form_container>
      <div id = "form_left_container">
         
          <div class="form_left">
            <label for="e_num">ESTIMATE NO</label>
            <input type="text" value="<?php echo $res["ESTIMATE_NO"]?>" name="en" id="e_num" readonly>
          </div>

          <div class="form_left">
            <label for="EDate">DATE</label>
            <input type="date" value="<?php echo $res["DATE"]?>" name="date" id="EDate" required  >
          </div>

          <div class="form_left">
           <label for="e_type">ESTIMATE TYPE</label> 
           <select name="et" id="e_type" required>
             <option><?php echo $res["ESTIMATE_TYPE"]?></option>
             <option>ACCIDENT</option>
             <option>GENERAL</option>
           </select>
          </div>

          

          <div class="form_left">
            <label for="cust_n">CUST NAME</label>
            <input type="text" value="<?php echo $res["CUST_NAME"]?>" pattern="[A-Za-z\s]+" title="EX = RAMESH PATEL" name="cn" id="cust_n" required onkeypress="this.value = this.value.toUpperCase();">
          </div>

          <div class="form_left">
           <label for="vehiN">VEHICLE NO</label>
           <input type="text" value="<?php echo $res["VEHICLE_NO"]?>" pattern="^[A-Z|a-z]{2}\s[0-9]{1,2}\s[A-Z|a-z]{0,3}\s[0-9]{4}$" title="EX = GJ 54 DH 5455" name="vn" id="vehiN" required onkeypress="this.value = this.value.toUpperCase();">
          </div>

          <div class="form_left">
            <label for="p_num">POLICY NO</label>
            <input type="text" value="<?php echo $res["POLICY_NO"]?>" pattern="^[0-9]{8,10}$" title="EX = 8458458865" name="pn" id="p_num" required>            
          </div>

      </div>

      <div id="form_right_container">
          <div class="form_right">
             <label for="carM">MODEL</label>
             <select name="car" id="carM" required> 
              <option><?php echo $res["MODEL"]?></option>

               <?php 
                include('connect.php');
                $result = mysqli_query($conn,"select* from car_model");
  
                while ($res2=mysqli_fetch_array($result)) {
              ?>
              <option><?php echo "$res2[Model]"; ?> </option>
              <?php
                  }
              ?>
             </select>
          </div>

          <div class="form_right">
            <label for="DOA">DATE OF ACCIDENT</label>
            <input type="date" value="<?php echo $res["DT_OF_ACCIDENT"]?>" name="doa" id="DOA" required onfocus="this.max = document.getElementById('EDate').value;">
          </div>
  
          <div class="form_right">
            <label for="tmac">TIME OF ACCIDENT</label>
            <input type="time" value="<?php echo $res["TIME_OF_ACCIDENT"]?>" name="toa" id="tmac" required>
          </div>
    
          <div class="form_right">
            <label for="InsuComp">INSURANCE COMPANY</label>
            <select  name="ic" id="InsuComp" required>

              <option><?php echo "$res[INSURANCE_COMPANY]"; ?> </option>
              <?php 
                include('connect.php');
                $result = mysqli_query($conn,"select* from insurance_company");
  
                while ($res2=mysqli_fetch_array($result)) {
              ?>
              <option><?php echo "$res2[C_name]"; ?> </option>
              <?php
                  }
              ?>
            </select>
          </div>
             
          <div class="form_right">
            <label for="P_inso">PERIOD OF INSURANCE</label>
            <input type="date" value="<?php echo $res["PERIOD_OF_INSURANCE_START"]?>" name="poi" id="P_inso" required onblur="document.getElementById('P_inso2').min = this.value;">
            <label for="P_inso2">TO</label>
            <input type="date" value="<?php echo $res["PERIOD_OF_INSURANCE_END"]?>" name="poi2" id="P_inso2" required>
          </div>
        </div>

    </div>
    <input class="but1" type="submit" value="SAVE">
  </form>
    <button class="but1" onclick="window.location.href='Estimate_search.php'">BACK</button>
  
  <?php } ?>

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
     document.getElementById('e_num').focus();
   }
 </script>

</body>
</html>