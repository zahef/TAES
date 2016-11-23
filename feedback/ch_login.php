<?php
	session_start();
	include ("includes/config_db.php");
	
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$password = $_POST['password'];

	if(empty($firstname) or empty($password)or empty($lastname))
	{
		header("location: Login.php");
	}

	 $con = mysqli_connect(dbhost, dbuser, dbpass,dbname) or die ('Error connecting to mysql');

	$result = mysqli_query($con,"select * from faculty_master where f_name='$firstname' and password='$password' and l_name='$lastname'");

	if(mysqli_num_rows($result)>0)
	{
	$row = mysqli_fetch_array($result);
	$_SESSION["user_id"]=$row["f_id"];
    $_SESSION["f_name"]=$row["f_name"];
	$_SESSION["l_name"]=$row["l_name"];
	$_SESSION["b_id"]=$row["b_id"];
		
	header("location:result.php");
	
	}else
	{
	header("location: Login.php?error=wrong firstname or passwordor or lastname");
	}	
?>