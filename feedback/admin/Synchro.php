<?php 

		include('session_chk.php');
	    include("includes/config_db.php");  $conn = mysqli_connect(dbhost, dbuser, dbpass,dbname) or die ('Error connecting to mysql');

        $s_id =$_GET['s_id'];
        $dup=mysqli_query($conn,"select * from feedback_ques_master where q_id=$s_id");
		
		if(mysqli_num_rows($dup)>=1)
		{
			echo "Question name is already available in on the main list.";
			header("Location:archive.php");
			exit;
		}
			else
		{
			$result = mysqli_query($conn,"SELECT * FROM store where s_id='$s_id'");
			while($myrow = mysqli_fetch_array($result))
			{
			 $one_word=$myrow['s_one_word'];
			 $title=$myrow['s_ques'];
			
		}
			 //run the query which adds the data gathered from the form into the database
			 $dup_res = mysqli_query($conn,"INSERT INTO feedback_ques_master (ques,one_word) VALUES ('$title','$one_word')");
			  //print success message.
			  echo "<b>Question is added Successfully!</b><br>You'll be redirected after (1) Seconds";
			  echo "<meta http-equiv=Refresh content=1;url=archive.php>";
		}
		   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Synchronize Question</title>
<link rel="stylesheet" type="text/css" href="includes/style.css" />
</head>

<body>
<table width="57%" align="center" border="0" cellpadding="0" cellspacing="1">
<?php include('admin_panel_heading.php'); ?>
<tr>
<td width="22%" valign="top" bgcolor="#FFFFFF">
<?php include('left_side.php');?>
</td>

<td width="78%" align="center" valign="top">
<table width="100%" border="0" align="center" >
<tr><td></td></tr>
<tr><td colspan="3" align="center" style="font-size:20px"></td></tr>
<tr><td></td></tr>
</table>
</td>
</tr>
</table>
</body>
</html>
