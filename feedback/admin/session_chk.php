<?php

session_start();
if(!isset($_SESSION['myusername']))
{
	header("location:index.php");
}
//if(!session_is_registered("myusername")){
//header("location:index.php");
//}
?>
