<?php 

	  include('session_chk.php');
	  include("includes/config_db.php");
	  $conn = mysqli_connect(dbhost, dbuser, dbpass,dbname) or die ('Error connecting to mysql');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Questions</title>
<link rel="stylesheet" type="text/css" href="includes/style.css" />
</head>

<body>
<table width="57%" align="center" border="0" cellpadding="0" cellspacing="1">
<?php include('admin_panel_heading.php'); ?>
<tr>
<td width="22%" bgcolor="#FFFFFF">
<?php include('left_side.php');?>
</td>

<td width="78%" align="center" valign="top" bgcolor="#FFFFFF">

</p>
<table width="100%" id="rounded-corner" border="0" align="center" cellpadding="0" cellspacing="0" >
<thead>
<tr>
	<th align="center" scope="col" class="rounded-company">Id</th>
	<th align="center" scope="col" class="rounded-q1">Question</th>
	<th align="center" scope="col" class="rounded-q1">One Word</th>
	<th align="center" scope="col" class="rounded-q4"> Delete</th>
</tr>
</thead>

<?php

        $result = mysqli_query($conn,"SELECT * FROM feedback_ques_master ORDER BY q_id");
        //lets make a loop and get all news from the database
		$i=1;
		if(mysqli_num_rows($result)>0)
		{
			 while($myrow = mysqli_fetch_array($result))
			 {//begin of loop
			   //now print the results:
			   echo '<tr>';
			   echo "<td align=center>".$i."</td>";$i++;
			   echo "<td align=center>".$myrow['ques']."</td>";
			   echo "<td align=center>".$myrow['one_word']."</td>";
			   echo "<td align=center>"."<a href=\"delete_ques_1.php?q_id=$myrow[q_id]\">delete</a>"."</td>";
			  echo '</tr>';  
			  			 
			 }//end of loop
		}
		else
		{
			echo '<tr><td colspan=3 align=center>No record found!</td></tr>';
		}
?>
</table>
</td>
</tr>
</table>
</body>
</html>