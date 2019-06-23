<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

</body>
</html>

<?php

$mysqli = new mysqli('localhost','root','','data') or die(mysqli_error($mysqli));

$name = '';
$pay = '';


if(isset($_POST['save'])){
	$name = $_POST['name'];
	$pay = $_POST['pay'];
	
	$mysqli->query("INSERT INTO data(name, pay) VALUES('$name','$pay')") or die($mysqli->error);

	$_SESSION['message']  = "Record has been saved!";
	$_SESSION['msg_type'] = "success";
	header("location: index.php");
}
if(isset($_GET['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM data WHERE id='$id'") or die($mysqli->error());

	$_SESSION['message']  = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";
	header("location: index.php");
}

if(isset($_GET['edit'])){
	$id = $_GET['edit'];
	$result = $mysqli->query("SELECT * FROM data WHERE id='$id' ") or die($mysqli->error());
	if($result)
	{
		$row = $result->fetch_array();
		$name = $row['name'];
		$pay = $row['pay'];
		
	}

}
header("location: index.php");

?>