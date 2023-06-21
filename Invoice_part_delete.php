<?php
 session_start();

include("connect.php");
$sr =$_GET['no']; //which part delete by Sr no to enter part
$id = $_GET['id'];
$id2 =$_SESSION['e_n']; //estimate number by enter parts

    

    $result = mysqli_query($conn,"select PARTTICULARS from  invoce_part where id = '$id'");
    $res=mysqli_fetch_array($result); 
    $pn=$res["PARTTICULARS"];

    $result2 = mysqli_query($conn,"select Qty from  list_of_parts where name = '$pn'");
    $res2=mysqli_fetch_array($result2); 
    $result3 = mysqli_query($conn,"select QTY from  invoce_part where SR_NO = '$sr'");
    $res3=mysqli_fetch_array($result3);
    $nqty=$res2["Qty"]+$res3["QTY"];

    $sql = "delete from invoce_part where id ='$id'";


    if(mysqli_multi_query($conn,$sql))
    {
        $result = mysqli_query($conn,"update list_of_parts set Qty = '$nqty' where name = '$pn'");
        header("location:Invoice_Parts.php?no=$id2"); 
    }
    else
    {
       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
?>