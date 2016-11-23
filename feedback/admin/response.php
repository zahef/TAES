<?php

include("includes/config_db.php");       $conn = mysqli_connect(dbhost, dbuser, dbpass,dbname) or die ('Error connecting to mysql');
$f_id=$_GET['fac_name'];


$sel_para="select * from feedback_para";
$res_para=mysqli_query($conn,$sel_para) or die(mysqli_error());
$result_para=mysqli_fetch_array($res_para);


$q=mysqli_query($conn,"select * from subject_master  where sem_id=".$result_para['sem_id']." and batch_id=".$result_para['batch_id']." and f_id=".$f_id);
echo mysqli_error();
$myarray=array();
$str="";
while($nt=mysqli_fetch_array($q)){
$str=$str . "\"$nt[sub_id]$nt[sub_name]\"".",";

}
$str=substr($str,0,(strLen($str)-1)); // Removing the last char , from the string
echo "new Array($str)";

?>