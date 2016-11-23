<?php
session_start();
?>
<html>
<head>

<link type="text/css" 
rel="stylesheet" link href="css/bootstrap.css" rel="stylesheet">
<meta charset="utf-8">
</head>
<body>
<div id="header">

 
<center><h1> Teacher Page  </h1></center>

</div>



<div class="main">
<?php

echo '<br><br><br><br>';
?>
<html>
<head>
<title> Login In </title>
</head>
<body>
<center>

<form action="ch_login.php" method="POST" >

First name:     <input type="text" name="firstname" /> 
Last name:     <input type="text" name="lastname" />  <br><br><br>
Password:     <input type="password" name="password" /> <br><br><br> 

<input type="submit" class="btn btn-primary" value="Login" /><br><br><br>

</form>

<!--<a href="sign_up.php">Sign Up</a>-->

</center>

</body>
</html>
