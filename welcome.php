<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	
<?php
session_start();
if (isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
	echo "Hello $username!";
} else {
	header("Location: D:\Xampp\htdocs\Day5 Lab\login.php");
	exit();
}
?>
 
<img src="download.jpeg" alt="">
</body>
</html>



