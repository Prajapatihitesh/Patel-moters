<?php
   include("Validation.php");
  include('connect.php');
       $id =$_GET['no'];    
       ?>

<!DOCTYPE html>
<html>
<head>
  <title>LABOR INVOICE</title>
  <link rel="stylesheet" type="text/css" href="patel_moter.css">  
</head>
<body onload="fo()">
  <div id="main"> 
  
  <?php include("Header.php");?>
  <?php include("Menubar.php") ?>
  <div id="title"> 
    <span style="cursor: pointer; float: left;" onclick="openNav()">&#9776</span>
    <span>LABOR WORK ENTRY</span></p>  
  </div>

  <form action="Invoice_labor_insert.php" method="POST" class="form">
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
            <label for="p">PARTTICULARS: </label>
            <select  name="pr" id="p" required>
                <option value=""></option>
                <?php 
                  $res = mysqli_query($conn, "select *  from labor_work_list;");
                  while($row = mysqli_fetch_assoc($res)){
                      echo "<option value ='".$row['id']."'>".$row['PARTTICULARS']."</option>";
                  }
                 ?>
            </select>
          </div>
      </div>

      <div id="form_right_container">
          <div class="form_right">
           <label for="Pof">P.O/F: </label>
           <input type="text" name="pof" id="Pof" value="" pattern="^[0-9]+$" title="EX = 8458458865" required>

          </div>
  
      </div>
    </div>
    <input class="but1" type="submit" value="SAVE" name="sv">
   </form>
    <button class="but1" onclick="window.location.href='Invoice_search.php'">BACK</button>

   
      <?php 
          $result = mysqli_query($conn,"select* from invoice_labor where INVOICE_NO = '$id' order by SR_NO");
        ?>


<table border="1" style="width:100%; font-size: 25px; text-align: center;" >
  <?php 
  echo '<tr>';
    echo '<th>'."SR NO".'</th>';
    echo '<th>'."PARTTICULARS".'</th>';
    echo '<th>'."P.O/F".'</th>';
    echo '<th>'."DELETE".'</th>';
    echo "</tr>";

  while ($res=mysqli_fetch_array($result)) {
    echo '<tr>';
    echo '<td>'.$res["SR_NO"].'</td>';
    echo '<td>'.$res["PARTTICULARS"].'</td>';
    echo '<td>'.$res["POF"].'</td>';

    echo '<td>'."<a class='but1' href='Invoice_labor_delete.php?no=$res[SR_NO]'> DELETE</a>".'</td>';
    echo '</tr>';
  }
  ?>
</table>  

  <?php include("Footer.php");?>
</div>
 <script>
     document.getElementById("p").addEventListener("change", function(){
      loadData(this.value);
   });

     function loadData(id) {
  const xhttp = new XMLHttpRequest();
  xhttp.open("GET", "Labor_ajex.php?name="+id);
  xhttp.send();
  xhttp.onload = function() {
    document.getElementById("Pof").value = xhttp.responseText;
    }
}
   function fo()
{
  document.getElementById('SR').focus();
}
 </script>
</body>
</html>