<?php 
include('connect.php');
if($_SERVER['REQUEST_METHOD']==='POST'){
$username = $_POST['user'];
$password = $_POST['password'];


$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($conn,$username);
$password = mysqli_real_escape_string($conn,$password);

$sql = "select * from login where username = '$username' and password = '$password'";
$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);

if($count >= 1)
{
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;
	echo "<script> alert('Login success');location.replace('service.php');</script></p>";
}
else
{
	echo "<p><script>alert('Login failed, Invalid username or password');
	location.replace('Index.php');</script></p>";
}
}
else{ echo "<p><script>alert('Request failed');
	location.replace('Index.php');</script></p>";}


 ?>
}
}
 
