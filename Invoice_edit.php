<?php
   include("Validation.php");
 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Invoice</title>
  <link rel="stylesheet" type="text/css" href="patel_moter.css">   
</head>
<body onload="fo()">
<div id="main"> 
  
 <?php include("Header.php");?>
 <?php include("Menubar.php");?>

  <div id="title"> 
    <span style="cursor: pointer; float: left;" onclick="openNav()">&#9776</span><span>EDIT INVOICE</span></p>
  </div>

  <?php include("connect.php");
  $ESTI_ID = $_GET['no'];

    $result2 = mysqli_query($conn,"select * from invoice where INVOICE_NO = '$ESTI_ID' ");
    while($res2=mysqli_fetch_array($result2)){
  ?>
  <form action="Invoice_update.php" method="POST" class="form">
     
    <div id = form_container>
      <div id = "form_left_container">
         
          <div class="form_left">
            <label for="I_num">INVOICE NO</label>
            <input type="text" value="<?php echo $res2["INVOICE_NO"]?>" name="in" id="I_num" readonly required>
          </div>


          <div class="form_left">
             <label for="meno">MEMO</label>
             <select name="Memo" id="memo"> 
                <option><?php echo $res2["MEMO"]?></option>
                <option>DEBIT</option>
                <option>CASE</option>
             </select>
          </div>

           <div class="form_left">
            <label for="EDate">DATE</label>
            <input type="date" name="date"value="<?php echo $res2["DATE"]?>" id="EDate" required>
          </div>

           <div class="form_left">
            <label for="InsuComp">INSURANCE COMPANY</label>
            <select  name="ic" id="InsuComp"  required>
              <option> <?php echo $res2["company_name"]?></option>
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
              <option><?php echo $res2["CUSTOMER_NAME"]?></option>
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
              <option><?php echo $res2["VEHICLE_NO"]?></option>
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
              <option><?php echo $res2["MODEL"]?></option>
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
  </form>
    <button class="but1" onclick="window.location.href='Invoice_search.php'">BACK</button>
    </div>
  
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
    function fo(){
    document.getElementById('I_num').focus();
   }
 </script>

</body>
</html>