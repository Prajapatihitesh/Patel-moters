 <?php
 include ("connect.php");
 session_start();

    $EN =$_SESSION['e_n'];
    $SR_NO =$_POST['no'];
    $pn =$_POST['pn'];
    $qty =$_POST['qty'];
    $rate =$_POST['rate'];
    $atm = $qty * $rate;


    $sql = "insert into parts values(NULL,'$EN','$SR_NO','$pn','$rate','$qty','$atm')";

    if(mysqli_multi_query($conn,$sql))
    {
      header("location:Estimate_parts.php?no=$EN");
    }
    else
    {
       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

 ?>
 