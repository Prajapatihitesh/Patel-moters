<?php
  include("Validation.php");
  include('connect.php');
  ?>
<!DOCTYPE html>
<html>
<head>
  <title>Search Estimate</title>
  <link rel="stylesheet" type="text/css" href="patel_moter.css">   
</head>
<body>
<div id="main"> 
  
 <?php include("Header.php");?>
 <?php include("Menubar.php");?>

    <div id="title"> 
      <span style="cursor: pointer; float: left;" onclick="openNav()">&#9776</span>
      <span style="top: 0;">SEARCH ESTIMATE</p>
    </div>

      <form action="Estimate_search.php" method="POST" class="form">
     
        <div id = form_container>
          <div id = "form_left_container">
              <div class="form_left">
                <label for="P_inso">PERIOD OF INSURANCE</label>
                <input type="date" name="dt1" id="P_inso" required onblur="document.getElementById('P_inso2').min = this.value;"> 
              </div>
          </div>

          <div id="form_right_container">
              <div class="form_right">
                <label for="P_inso2">TO</label>
                <input type="date" name="dt2" id="P_inso2" required>
              </div>
          </div>
          <input class="but1" type="submit" value="SEARCH">

        </div>
      </form>



      <?php 
      if (isset($_POST['dt1'])){
      $date1 = $_POST['dt1'];
      $date2 = $_POST['dt2'];
      $newDate1 = date("Y-m-d", strtotime($date1));
      $newDate2 = date("Y-m-d", strtotime($date2));
     $result = mysqli_query($conn,"select* from estimate where DATE between '$newDate1' AND '$newDate2'");
      }
      else{
     $result = mysqli_query($conn,"select* from estimate");
   }
     ?>
        <table border="1" style="width:100%; font-size: 20px;margin-top: 50px; text-align: center;" >
          <?php 
          echo '<tr>';
            echo '<th>'."ESTIMATE NO".'</th>';
            echo '<th>'."CUSTOMER NAME".'</th>';
            echo '<th>'."DATE".'</th>';
            echo '<th>'."MODEL".'</th>';
            echo '<th>'."INSURANCE COMPANY".'</th>';
            echo '<th>'."EDIT".'</th>';
            echo '<th>'."Labor Work".'</th>';
            echo '<th>'."Parts".'</th>';
            echo '<th>'."PRINT".'</th>';
            echo '<th>'."DELETE".'</th>';
            echo "</tr>";
        
          while ($res=mysqli_fetch_array($result)) {
             
        
            echo '<tr>';
            echo '<td>'.$res["ESTIMATE_NO"].'</td>';
            echo '<td>'.$res["CUST_NAME"].'</td>';
            echo '<td>'.$res["DATE"].'</td>';
            echo '<td>'.$res["MODEL"].'</td>';
            echo '<td>'.$res["INSURANCE_COMPANY"].'</td>';
            echo '<td>'."<a class='but1' style='margin: 4%; font-size:15px;' href='Estimate_edit.php?no=$res[ESTIMATE_NO]'> Edit</a>".'</td>';
            echo '<td>'."<a class='but1' style='margin: 4%; font-size:15px;' href='Estimate_labor.php?no=$res[ESTIMATE_NO]'>Labor</a>".'</td>';
            echo '<td>'."<a class='but1' style='margin: 4%; font-size:15px;' href='Estimate_parts.php?no=$res[ESTIMATE_NO]'>PARTS</a>".'</td>';
            echo '<td>'."<a class='but1' style='margin: 4%; font-size:15px;' target='_blank' href='Estimate_print.php?PE_Id=$res[ESTIMATE_NO]'> Print</a>".'</td>';
            echo '<td>'."<a class='but1' style='margin: 4%; font-size:15px;' href='Estimate_delete.php?no=$res[ESTIMATE_NO]'> DELETE</a>".'</td>';
            echo '</tr>';
          }
          ?>
        </table>  

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
 </script>

</body>
</html>