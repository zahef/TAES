<?php
  
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';//password
$dbname = 'feedback';  
  
include("includes/config_db.php");
include("ajax_script.php");
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname) or die ('Error connecting to mysql');



?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script src="php_calendar/scripts.js" type="text/javascript"></script>
<title>College Evaluation System</title>
<link rel="stylesheet" type="text/css" href="includes/style.css" />
<meta charset="utf-8">
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {

 var data = google.visualization.arrayToDataTable([
 ['Browser', 'Visits'],
  ]);

 var options = {
 title: 'Browser wise visits'
 };

 var chart = new google.visualization.PieChart(document.getElementById('piechart'));

 chart.draw(data, options);
 }
 </script>
</head>

<body class="body">
	<table width="" height=""  border="0" align="center" cellpadding="5" cellspacing="5" >
	  <tr>
			  <td>
			  <form style="float: left; text-align:left; margin:5px 5px;"action="question.php" method="GET">
			  Select Question :<select name="chart">
			
			 <?php $sel_sem=mysqli_query($conn,"select * from feedback_ques_master");
						
				while($myrow = mysqli_fetch_assoc($sel_sem)){
					if($myrow > 0){ ?>
					<option value="<?php  echo $myrow['q_id']; ?>"> <?php  echo $myrow['q_id']."-". $myrow['ques']; ?> </option> 
			<?php }}?>
			</select>
			  <input name="char" type="submit" value="Show"/> 
			  </form>
				</td>	
	  </tr>
	  </table>

 <?php 
 
$idr=$myrow['q_id'];
$exec=mysqli_query($conn,"SELECT count(ques_id) AS count, answer FROM feedback where ques_id=1 and page_id=37 GROUP BY answer");
 
 while($row = mysqli_fetch_assoc($exec)){

 echo "['".$row['answer']."',".$row['count']."],";
 }
 
 ?>



 <h3>Pie Chart</h3>
 <div id="piechart" style="width: 900px; height: 500px;"></div>
</body>
</html>