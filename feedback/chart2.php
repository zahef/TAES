
<?php
	include('session_chk.php');
 $con = mysqli_connect('localhost','root','','feedback');

?>
<!DOCTYPE HTML>
<html>
<head>
 <meta charset="utf-8">
 <title>
 Create Google Charts
 </title>
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
 google.load("visualization", "1", {packages:["corechart"]});
 google.setOnLoadCallback(drawChart);
 function drawChart() {

 var data = google.visualization.arrayToDataTable([
 ['Browser', 'Visits'],
 <?php 
 $id=$_GET["id"];
 
 if(isset($_GET['chart'])){
	 $idc = $_GET['chart'];
	
 $query = "SELECT count(ques_id) AS count, answer FROM feedback where ques_id='$idc' GROUP BY answer";

 $exec = mysqli_query($con,$query);
 while($row = mysqli_fetch_array($exec)){
	
 echo "['".$row['answer']."',".$row['count']."],";
 }
 }
 
 ?>
 ]);

 var options = {
 title: 'Evaluations Average Results'
 };

 var chart = new google.visualization.PieChart(document.getElementById('piechart'));

 chart.draw(data, options);
 }
 </script>
</head>
<body>
<table width="" height=""  border="0" align="center" cellpadding="5" cellspacing="5" >
	  <tr>
			  <td>
			  <form style="float: left; text-align:left; margin:5px 5px;"action="chart2.php" method="GET">
			  Select Question :<select name="chart">
			
			 <?php $sel_sem=mysqli_query($con,"select * from feedback_ques_master");
						
				while($myrow = mysqli_fetch_assoc($sel_sem)){
					if($myrow > 0){ ?>
					
					<option name="idq" value="<?php  echo $myrow['q_id']; ?>"> <?php  echo $myrow['q_id']."-". $myrow['ques']; ?> </option> 
			<?php }}?>
			</select>
			
			<input readonly name="id" type="text" value="<?php  echo "$id" ?>"/> 
			  <input type="submit" value="Show"/> 
			  </form>
				</td>	
	  </tr>
	  </table>
 <h3>Pie Chart</h3>
 <div id="piechart" style="width: 900px; height: 500px;"></div>
</body>
</html>
