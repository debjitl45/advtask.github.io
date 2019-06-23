<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

</body>
</html>




<?php 
session_start();

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'userregistration');
$name = $_POST['user'];
$pass = $_POST['password'];

$s = "select * from usertable where name ='$name' && password='$pass'";
$result = mysqli_query($con, $s);
$num    = mysqli_num_rows($result);

if($num==1)
{
	header('location: index.php');
    $_SESSION['username'] = $name;
	echo "Login Successful!";
}
else{
	header('location: login.php');
	echo "Please enter correct username and password!!";
}

?> 