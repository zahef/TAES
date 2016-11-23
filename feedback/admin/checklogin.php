<?php
session_start();
include("includes/config_db.php");  
$conn = mysqli_connect(dbhost, dbuser, dbpass,dbname) or die ('Error connecting to mysql');
 // Define $myusername and $mypassword
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($conn,$myusername);
$mypassword = mysqli_real_escape_string($conn,$mypassword);

$sql="SELECT * FROM members WHERE username='$myusername' and password=password('$mypassword')";
$result=mysqli_query($conn,$sql);

// mysqli_num_row is counting table row
$count=mysqli_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
// Register $myusername, $mypassword and redirect to file "login_success.php"
$_SESSION['myusername'] = $myusername;
$_SESSION['mypassword'] = $mypassword;
//session_register("myusername");
//session_register("mypassword");
header("location:login_success.php");
}
else {
?>
<table align="center" width="100%" border="0" cellpadding="0" cellspacing="1">
<tr><td align="center"><br/><br/>
<?php
echo "Wrong Username or Password";
echo "<br/><input type=\"button\" name=\"Back\" value=\"Back\"  onclick=\"javascript: history.go(-1)\" />";
?>
</td></tr></table>
<?php
}

ob_end_flush();
?>