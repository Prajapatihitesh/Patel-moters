 <?php
    include("Validation.php");
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>INVOICE</title>
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
    <span style="cursor: pointer; float: left;" onclick="openNav()">&#9776</span><span class="heding">INVOICE ENTRY</span></p>
  </div> 
  <form action="Invoice_insert.php" method="POST" class="form">
     
    <div id = form_container>
      <div id = "form_left_container">
         
          <div class="form_left">
             <label for="meno">MEMO</label>
             <select name="Memo" id="memo"> 
                <option> </option>
                <option>DEBIT</option>
                <option>CASH</option>
             </select>
          </div>

          <div class="form_left">
            <label for="EDate">DATE</label>
            <input type="date" name="date" id="EDate" required>
          </div>

           <div class="form_left">
            <label for="InsuComp">INSURANCE COMPANY</label>
            <select  name="ic" id="InsuComp"  required>
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

      </div>

      <div id="form_right_container">
          <div class="form_right">
            <label for="cust_n">CUST NAME</label>
              <select  name="cn" id="cust_n" required>
              <option></option>
              <?php 
                include('connect.php');
                $result = mysqli_query($conn,"select* from estimate");
  
                while ($res=mysqli_fetch_array($result)) {
              ?>
              <option><?php echo "$res[CUST_NAME]"; ?> </option>
              <?php
                  }
              ?>
            </select>
          </div>
  
          <div class="form_right">
           <label for="vehiN">VEHICLE NO</label>
            <select  name="vn" id="vehiN" required>
              <option></option>
              <?php 
                include('connect.php');
                $result = mysqli_query($conn,"select* from estimate");
  
                while ($res=mysqli_fetch_array($result)) {
              ?>
              <option><?php echo "$res[VEHICLE_NO]"; ?> </option>
              <?php
                  }
              ?>
            </select>

          </div>
  
          <div class="form_right">
            <label for="mod">MODEL</label>
            <select  name="model" id="mod" required>
              <option></option>
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
   function fo(){
    document.getElementById('memo').focus();
   }
 </script>
</body>
</html>