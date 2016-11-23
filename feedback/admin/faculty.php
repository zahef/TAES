<?php 
	
	  include('session_chk.php');
	  include("includes/config_db.php");
	  $conn = mysqli_connect(dbhost, dbuser, dbpass,dbname) or die ('Error connecting to mysql');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Teachers</title>
<link rel="stylesheet" type="text/css" href="includes/style.css" />
</head>

<body>
<table width="57%" align="center"  border="0" cellpadding="0" cellspacing="1" >
<?php include('admin_panel_heading.php'); ?>
<tr>
<td width="17%" >
<?php include('left_side.php');?>
</td>

<td width="83%" align="center" valign="top" bgcolor="#FFFFFF">
<p>
<table width="480px" align="center"><tr><td colspan="3" align="right"><a href='add_faculty.php' class="button">Add Teacher</a></td></tr></table>
</p>
<table id="rounded-corner" border="0" align="center" cellpadding="0" cellspacing="0" >
<?php
		
		$group_by=mysqli_query($conn,"SELECT distinct(b_id) FROM faculty_master  ORDER BY b_id");
		echo '<tr><td align="center">Teacher Id</td><td align="center">Teacher Name</td><td align="center"><td align="center">Teacher Setting</td>&nbsp;</td></tr>';
		while($group_b_id = mysqli_fetch_array($group_by))
		{
			echo '<tr><th colspan=5 class="rounded-q1" align=center><b>'.branch_name($group_b_id['b_id']).'</b></th></tr>';
			
			$result = mysqli_query($conn,"SELECT * FROM faculty_master where b_id='".$group_b_id['b_id']."' ORDER BY b_id,f_id");
	//lets make a loop and get all news from the database
			$i=1;
			if(mysqli_num_rows($result)>0)
			{
				 while($myrow = mysqli_fetch_array($result))
				 {//begin of loop
									  
				   echo '<tr>';
				   echo "<td align=center>".$i."</td>";$i++;
				   echo "<td align=center>".$myrow['f_name'].'&nbsp;'.$myrow['l_name']."</td>";
				   echo "<td align=center>".branch_name($myrow['b_id'])."</td>";
				   echo "<td align=center>"."<a href=\"subject.php?f_id=$myrow[f_id]\">Subject List</a> / <a href=\"edit_faculty.php?f_id=$myrow[f_id]\">edit</a> /"."<a href=\"delete_faculty.php?f_id=$myrow[f_id]\">delete</a>"."</td>";
				  echo '</tr>';  
				  
				 }//end of loop
			}
			else
			{
				echo '<tr><td colspan=4 align=center>No record found!</td></tr>';
			}
		} 
		
?>
</table>
</td>
</tr>
</table>
</body>
</html>
