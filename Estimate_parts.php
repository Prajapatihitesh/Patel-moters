<?php
  include("Validation.php");
  include('connect.php');
       $id =$_GET['no'];    
       ?>

<!DOCTYPE html>
<html>
<head>
  <title>Parts Estimate</title>
  <link rel="stylesheet" type="text/css" href="patel_moter.css">  
</head>
<body onload="fo()">
  <div id="main"> 
  
  <?php include("Header.php");?>
  <?php include("Menubar.php") ?>
  <div id="title"> 
    <span style="cursor: pointer; float: left;" onclick="openNav()">&#9776</span>
    <span>PARTS ENTRY</span></p>  
  </div>

  <form action="Estimate_part_insert.php" method="POST" class="form">
    <?php 
      $_SESSION["e_n"]=$id;
    ?>
    <div id = form_container>
      <div id = "form_left_container">
          <div class="form_left">
            <label for="SR">SR NO: </label>
            <input type="text" name="no" id="SR" required>
          </div>

          <div class="form_left">
            <label for="Part">PARTS NAME: </label>
            <select  name="pn" id="Part" required>
                <option value=""></option>
                <?php 
                  $res = mysqli_query($conn, "select * from list_of_parts;");
                  while($row = mysqli_fetch_assoc($res)){
                      echo "<option value ='".$row['name']."'>".$row['name']."</option>";
                  }
                 ?>
            </select>
          </div>



      </div>

      <div id="form_right_container">
      
          <div class="form_right">
           <label for="Rate">RATE: </label>
            <select  name="rate" id="Rate" required>
            </select>
          </div>

          <div class="form_right"> 
            <label for="Qty">QTY: </label>
            <input type="text" name="qty" id="Qty" pattern="^[0-9]+$" title="EX = 1,2,100" required>
          </div>    
      </div>
    </div>
    <input class="but1" type="submit" value="SAVE" name="sv">
   </form>
    <button class="but1" onclick="window.location.href='Estimate_search.php'">BACK</button>

   
      <?php 
          $result = mysqli_query($conn,"select* from parts where ESTIMATE_NO = '$id' order by SR_NO");
        ?>


<table border="1" style="width:100%; font-size: 25px; text-align: center;" >
  <?php 
  echo '<tr>';
    echo '<th>'."SR NO".'</th>';
    echo '<th>'."PARTTICULARS".'</th>';
    echo '<th>'."QTY".'</th>';
    echo '<th>'."RATE".'</th>';
    echo '<th>'."AMT".'</th>';
    echo '<th>'."DELETE".'</th>';
    echo "</tr>";

  while ($res=mysqli_fetch_array($result)) {
    echo '<tr>';
    echo '<td>'.$res["SR_NO"].'</td>';
    echo '<td>'.$res["PARTTICULARS"].'</td>';
    echo '<td>'.$res["QTY"].'</td>';
    echo '<td>'.$res["RATE"].'</td>';
    echo '<td>'.$res["AMT"].'</td>';

    echo '<td>'."<a class='but1' href='Estimate_part_delete.php?no=$res[SR_NO]'> DELETE</a>".'</td>';
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

   
   document.getElementById("Part").addEventListener("change", function(){
      loadData(this.value);
   });

   function loadData(name) {
  const xhttp = new XMLHttpRequest();
  xhttp.open("GET", "Part.php?name="+name);
  xhttp.send();
  xhttp.onload = function() {
    document.getElementById("Rate").innerHTML = xhttp.responseText;
    }
}

   function fo()
   {
     document.getElementById('SR').focus();
   }
 </script>
</body>
</html>