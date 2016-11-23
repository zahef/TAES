<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';//password
$dbname = 'feedback';  
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname) or die ('Error connecting to mysql');
function randompassword($len)
	{
	$pass = '';
	$lchar = 0;
	$char = 0;
	for($i = 0; $i < $len; $i++)
	{
		while($char == $lchar)
		{
		 $char = rand(38, 109);
		 if($char > 60) $char += 7;
		 if($char > 90) $char += 6;
		}
		$pass .= chr($char);
		$lchar = $char;
	}
	return $pass;
	}  
	
	$active_code=randompassword(8);  
	//$today = date("d.m.Y");
	$time=$_POST['end'];
if($time==3){
	
	date_default_timezone_set("Asia/Kabul");
	$end= date('Y-m-d h:i:s:a');
}
else if($time==1){
	date_default_timezone_set("Asia/Tehran");
	$end= date('Y-m-d H:i:s:a');
}

else if($time==2){
	date_default_timezone_set("Asia/Dubai");
	$end= date('Y-m-d H:i:s:a');
	
}


mysqli_query($conn,"insert into pages values('','$active_code','{$_POST['b_name']}','{$_POST['division']}','{$_POST['fac_name']}','{$_POST['sem_name']}','{$_POST['sub_name']}','{$_POST['fromYear']}','{$_POST['year']}','$end')" )or die(mysqli_error($conn));
 
 echo 'Evaluation Passwoed  '?> <br/> <?php echo $active_code;?><br/>


<?php echo 'Passwoed Ends at  '?> <br/> <?php echo $end;?>
