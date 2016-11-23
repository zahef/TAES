<?php 

	  include('session_chk.php');
	  include("includes/config_db.php");
	  $conn = mysqli_connect(dbhost, dbuser, dbpass,dbname) or die ('Error connecting to mysql');
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Result</title>
		<link rel="stylesheet" type="text/css" href="includes/style.css" />
		
		<meta charset="utf-8">
	</head>
	
	

	<body>
	<table width="57%" align="center"  border="0" cellpadding="0" cellspacing="1" >
		<?php include('admin_panel_heading.php'); ?>
		<tr>
		<td width="17%" >
		<?php include('left_side.php');?>
		</td>
		<td width="83%" align="center" valign="top" bgcolor="#FFFFFF">
		<table id="rounded-corner" border="0" align="center" cellpadding="0" cellspacing="0" >
		<?php
		
		
			
			$result = mysqli_query($conn,"SELECT pages.id,pages.password,date,year ,branch_master.b_name, faculty_master.f_name,l_name,subject_master.sub_name  
			FROM pages ,branch_master, faculty_master,subject_master 
			WHERE pages.faculty_id= faculty_master.f_id and pages.branch_id=branch_master.b_id and pages.subject_id=subject_master.sub_id order by pages.id");
			//lets make a loop and get all news from the database
			
			
				 while($myrow = mysqli_fetch_assoc($result))
				 {
					 if($myrow>0)
					{
						?>		  
						<tr>
						<form action="chart.php" method="GET">
						 <td> <?php echo $myrow['id']; ?></td>
						<td><?php echo $myrow['f_name'].'&nbsp;'.$myrow['l_name']; ?> </td>
						<td> <?php echo $myrow['b_name']; ?> </td> 
						<td> <?php echo $myrow['sub_name']; ?> </td> 
						<td> <?php echo $myrow['password']; ?> </td> 
						<td> <?php echo $myrow['date'].'-'.$myrow['year']; ?> </td> 
						<td> <a href=""><button>Show</button> </a> </td> 
							<input name="id" type="hidden" value="<?php echo $myrow['id']; ?>" />
							</form>
						  </tr>  
				  <?php
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
