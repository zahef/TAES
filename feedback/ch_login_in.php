<html>
<head>
<meta charset="utf-8">
</head>

<?php
	
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';//password
$dbname = 'feedback';  
$con = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname) or die ('Error connecting to mysql'); 
session_start();

if(isset($_POST['login'])){
		
	$password = $_POST['password'];
	$_SESSION["password"]= $_POST['password'];

	if(empty($password))
	{
		header("location: Login_in.php");
		
	}

	$result = mysqli_query($con,"select * from pages where password='$password'");

	if(mysqli_num_rows($result)>0)
	{
	header("location: index.php?password=$password");
	
	}else
	{
	header("location: Login_in.php?error=Invaild password");
	}
	}	
?>
</html>