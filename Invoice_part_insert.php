<?php
 include ("connect.php");
 session_start();

    $IN =$_SESSION['e_n'];
    $SR_NO =$_POST['no'];
    $pn =$_POST['pn'];
    $qty =$_POST['qty'];
    $rate =$_POST['rate'];
    $atm = $qty * $rate;

      $result = mysqli_query($conn,"select Qty from  list_of_parts where name = '$pn'");
      $res=mysqli_fetch_array($result);
      if($res["Qty"]>=$qty)
      {
         $nqty=$res["Qty"]-$qty;
         $sql = "insert into invoce_part values(NULL,'$IN','$SR_NO','$pn','$rate','$qty','$atm')";

          if(mysqli_multi_query($conn,$sql))
          {
            
            $result = mysqli_query($conn,"update list_of_parts set Qty = '$nqty' where name = '$pn'");
            header("location:Invoice_Parts.php?no=$IN");
          }
      }
      else
      {
          $nqty=$res["Qty"];
           echo "<script> alert('stock not available insert failed');location.replace('Invoice_Parts.php?no=$IN');</script></p>";
           die();
      }


 ?>
 