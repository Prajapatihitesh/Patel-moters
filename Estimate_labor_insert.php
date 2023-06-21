<?php
 include ("connect.php");
 session_start();

    $EN =$_SESSION['e_n'];
    $SR_NO =$_POST['no'];
    $pr =$_POST['pr'];
    $pof =$_POST['pof'];
    $result = mysqli_query($conn, "SELECT  PARTTICULARS FROM labor_work_list WHERE id = $pr;");
    while ($row = mysqli_fetch_assoc($result)) {
       $pr = $row["PARTTICULARS"];
    }


    $sql = "insert into estimate_labor values(NULL,'$EN','$SR_NO','$pr','$pof')";

    if(mysqli_multi_query($conn,$sql))
    {
      header("location:Estimate_labor.php?no=$EN");
    }
    else
    {
       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

 ?>
 