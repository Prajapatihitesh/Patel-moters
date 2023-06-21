<?php
  include("Validation.php");
  include('connect.php');
  ?>
  <script> var id;</script>
<!DOCTYPE html>
<html>
<head>
  <title>SEARCH INVOICE</title>
  <link rel="stylesheet" type="text/css" href="patel_moter.css">   
</head>
<body>
  
  <div id="main"> 
 <?php include("Header.php");?>
 <?php include("Menubar.php");?>

  <div id="title"> 
    <span style="cursor: pointer; float: left;" onclick="openNav()">&#9776</span>
    <span style="top: 0;">SEARCH INVOICE</span></p>
  </div>

   <form action="Invoice_search.php" method="POST" class="form">
     
    <div id = form_container>
      <div id = "form_left_container">
          <div class="form_left">
            <label for="P_inso">PERIOD OF INSURANCE</label>
            <input type="date" placeholder="dd-mm-yyyy" name="dt1" id="P_inso" required onblur="document.getElementById('P_inso2').min = this.value;"> 
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
     $result = mysqli_query($conn,"select* from invoice where DATE between '$newDate1' AND '$newDate2'");
      }
      else{
     $result = mysqli_query($conn,"select* from invoice");
      }
     ?>

<div id="frm" class="modal">

     <div class="modal-content animate" method="POST">
      <div class="title">
      <span > Choose which invoice you can print</span>
    </div>
        <div class="check" >
           <div class="option"><input type="radio" id="radio1" name="op" value="PRINT PERFORMA INVOICE"><label for="radio1"> PRINT PERFORMA INVOICE</label></div>
            <div class="option"><input type="radio" id="radio2" name="op" value="PRINT TAX INVOICE"><label for="radio2"> PRINT TAX INVOICE</label></div>
            <button onclick="displayRadioValue()">Yes</button>
            <button onclick="document.getElementById('frm').style.display='none'">No</button>
          </div>
     </div>
</div>
        <table border="1" style="width:100%; font-size: 20px;margin-top: 50px; text-align: center;" >
          <?php 
          echo '<tr>';
            echo '<th>'."INVOICE NO".'</th>';
            echo '<th>'."CUSTOMER NAME".'</th>';
            echo '<th>'."DATE".'</th>';
            echo '<th>'."MODEL".'</th>';
            echo '<th>'."INSURANCE COMPANY".'</th>';
            echo '<th>'."EDIT".'</th>';
            echo '<th>'."Labor work".'</th>';
            echo '<th>'."Parts".'</th>';
            echo '<th>'."PRINT".'</th>';
            echo '<th>'."DELETE".'</th>';
            echo "</tr>";
        
          while ($res=mysqli_fetch_array($result)) {
             
        
            echo '<tr>';
            echo '<td>'.$res["INVOICE_NO"].'</td>';
            echo '<td>'.$res["CUSTOMER_NAME"].'</td>';
            echo '<td>'.$res["DATE"].'</td>';
            echo '<td>'.$res["MODEL"].'</td>';
            echo '<td>'.$res["company_name"].'</td>';
            echo '<td>'."<a class='but1' style='margin: 4%; font-size:15px;' href='Invoice_edit.php?no=$res[INVOICE_NO]'> Edit</a>".'</td>';
            echo '<td>'."<a class='but1' style='margin: 4%; font-size:15px;' href='Invoice_labor.php?no=$res[INVOICE_NO]'>Labor</a>".'</td>';
            echo '<td>'."<a class='but1' style='margin: 4%; font-size:15px;' href='Invoice_Parts.php?no=$res[INVOICE_NO]'>PARTS</a>".'</td>';
            echo '<td>'."<a class='but1' style='margin: 4%; font-size:15px;'  number= '$res[INVOICE_NO]' onclick=\"document.getElementById('frm').style.display='block'; setId(this.getAttribute('number'));
            \"> Print</a>".'</td>';
            echo '<td>'."<a class='but1' style='margin: 4%; font-size:15px;' href='Invoice_delete.php?no=$res[INVOICE_NO]'> DELETE</a>".'</td>';
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
   function setId(no){
      id = no;
   }
   function displayRadioValue() {
       var ele = document.getElementById('radio1');
       var ele2 = document.getElementById('radio2');
       console.log(id);
           if(ele.checked){
           window.open('Invoice_Print_Perform.php?PE_Id='+id,'_blank');
            }
           else if(ele2.checked){
           window.open('Invoice_Print_tax.php?PE_Id='+id,'_blank');
            }
            else{
              alert("please select valid option");
            }
          }
 </script>

</body>
</html>