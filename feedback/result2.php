<?php 
	  session_start();
	  include("includes/config_db.php");
	  $conn = mysqli_connect(dbhost, dbuser, dbpass,dbname) or die ('Error connecting to mysql');
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title> Department Result</title>
		<link rel="stylesheet" type="text/css" href="includes/style.css" />
		
		<meta charset="utf-8">
	</head>
	
	

	<body>
	<?php
		$b_id=$_SESSION["b_id"];
		echo $b_id;
		$result = mysqli_query($conn,"SELECT * from feedback_ques_master inner join feedback on q_id=id where q=");
			//lets make a loop and get all news from the database
			
			
				 while($myrow= mysqli_fetch_array($result))
				 {
					 if($myrow>0)
					{
						?>		  
						<tr>
						<form action="chart2.php" method="GET">
						
						
						
						<td> <?php $result1 = mysqli_query($conn,"SELECT * from branch_master where b_id='{$myrow["branch_id"]}'"); 
						$myrow1= mysqli_fetch_array($result1); 
						echo $myrow1['b_name']; ?> </td>  
						<td> <a href=""><button>Show</button> </a> </td> 
							<input name="id" type="hidden" value="<?php echo $myrow['branch_id']; ?>" />
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
