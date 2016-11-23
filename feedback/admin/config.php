<?php

// Don't touch here anything.
// Connect to Mysql
$connect = mysqli_connect(dbhost, dbusername, dbpassword,dbname);
//Select the correct database.
$db = mysqli_select_db($dbname,$connect) or die ("Could not select database");
?> 


