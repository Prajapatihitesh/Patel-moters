<?php
include("Validation.php");

include ("connect.php");

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
    <span class="menu" onclick="openNav()">&#9776</span><span>NEW PARTS ENTRY</span></p>
  </div>
    <form action="New_Part_insert.php" method="POST" class="form">
 
    <div id = form_container>
      <div id = "form_left_container">

          <div class="form_left">
            <label for="Part">PARTS NAME: </label>
            <input type="text" name="Name" id="Part" pattern="[A-Za-z\s]+" title="EX = WHEELS" required onkeypress="this.value = this.value.toUpperCase();">
          </div>

          <div class="form_left">
           <label for="Rate">RATE: </label>
            <input type="text" name="rate" id="Rate" pattern="^[0-9]+$" title="EX = 11000" required>
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
           <input type="text" name="IGST" id="I" pattern="^(9|14|0)$" title="EX = 0 and 9 OR 14" required>
          </div>
           
      </div>
    </div>
    <input class="but1" type="submit" value="SAVE" name="sv">
    <input class="but1" type="reset" value="CLEAR">
   </form>


      <?php 
          $result = mysqli_query($conn,"select* from list_of_parts order by id");
        ?>

<div id="frm" class="modal">
     <div class="modal-content animate" method="POST">
      <div class="title">
    </div>
        <div class="check" >
           <div class="option">
            <label for="Stock">Add Stock</label>
            <input type="Text" id="Stock" name="AS" required></div>
               <button onclick="addstock(document.getElementById('Stock').value)">Yes</button>
            <button onclick="document.getElementById('frm').style.display='none'">No</button>
          </div>
     </div>
</div>

<div id="frm2" class="modal">
     <div class="modal-content animate" method="POST">
      <div class="title">
    </div>
        <div class="check" >
           <div class="option">
            <label for="Stock">Remove Stock</label>
            <input type="Text" id="Rstock" name="AS" required></div>
               <button onclick="removestock(document.getElementById('Rstock').value)">Yes</button>
            <button onclick="document.getElementById('frm2').style.display='none'">No</button>
          </div>
     </div>
</div>


<table border="1" style="width:100%; font-size: 15px; text-align: center;" >
  <?php 
  echo '<tr>';
    echo '<th>'."ID".'</th>';
    echo '<th>'."NAME".'</th>';
    echo '<th>'."RATE".'</th>';
    echo '<th>'."CGST".'</th>';
    echo '<th>'."SGST".'</th>';
    echo '<th>'."IGST".'</th>';
    echo '<th>'."QTY".'</th>';
    echo '<th>'."ADD".'</th>';
    echo '<th>'."REMOVE".'</th>';
    echo '<th>'."DELETE".'</th>';
    echo "</tr>";

  while ($res=mysqli_fetch_array($result)) {
    echo '<tr>';
    echo '<td>'.$res["id"].'</td>';
    echo '<td>'.$res["name"].'</td>';
    echo '<td>'.$res["Rate"].'</td>';
    echo '<td>'.$res["CGST"].'</td>';
    echo '<td>'.$res["SGST"].'</td>';
    echo '<td>'.$res["IGST"].'</td>';
    echo '<td>'.$res["Qty"].'</td>';

    echo '<td>'."<a class='but1' style='margin: 4%; font-size:15px;'   onclick=\"setId($res[id], ); \"> Add</a>".'</td>';

    echo '<td>'."<a class='but1' style='margin: 4%; font-size:15px;'   onclick=\"setId2($res[id], ); \"> Remove</a>".'</td>';

    echo '<td>'."<a class='but1' style='margin: 2%; font-size:15px;' href='New_Part_delete.php?no=$res[id]'> DELETE</a>".'</td>';
    echo '</tr>';
  }
  ?>
</table>  
 
  <?php include("Footer.php"); ?>
</div>
  <script>
    let id = 0;
     function fo(){
    document.getElementById('Part').focus();
   } 
   function addstock(stock){
    location.href = 'New_Stock_insert.php?S_Id='+id+'&Stock='+stock;
   }
    function removestock(rstock){
    location.href = 'New_Stock_update.php?S_Id='+id+'&Stock='+rstock;
   }

    function setId(no){
    document.getElementById('frm').style.display='block';
      id = no;
   }
   

   function setId2(no){
    document.getElementById('frm2').style.display='block';
      id = no;
   }
 </script>
 </body>
 </html>