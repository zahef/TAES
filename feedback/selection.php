<?php
  
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';//password
$dbname = 'feedback';  
  
include("includes/config_db.php");
include("ajax_script.php");
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname) or die ('Error connecting to mysql');
$default = 1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script src="php_calendar/scripts.js" type="text/javascript"></script>
<title>Teacher Evaluation System</title>
<link rel="stylesheet" type="text/css" href="includes/style.css" />
</head>

<body class="body">
<table width="" height=""  border="0" align="center" cellpadding="5" cellspacing="5" >
  <?php include('admin/admin_panel_heading.php'); ?>
<tr>
<td width="22%" bgcolor="#FFFFFF">
<?php include('left_side.php');?>
</td>
  <tr>
    <td width=""  valign="bottom" align="center"><p><b><font size="5" >Faculty Evaluation</font></b></p></td>
  </tr>
  <tr>
    <td width="" height="" valign=top>
	<form action="ch_page.php" method="post" name="feedback_form" onsubmit="return chkForm();">
      <table width="711" border="0" align="center">        
        <tr>
            <?php
			$sel_para="select * from feedback_para";
			$res_para=mysqli_query($conn,$sel_para) or die(mysqli_error($conn));
			$result_para=mysqli_fetch_array($res_para);
			?>
          <td>Department</td>
          <td><label>
            <?php
			$sel_b="select * from branch_master";
			$res=mysqli_query($conn,$sel_b) or die(mysqli_error($conn));
			
			 while($b_combo=mysqli_fetch_array($res))
			 {							
				$branch_combo[] = array('id' => $b_combo['b_id'],
									    'text' => $b_combo['b_name']);								  
			 }
			 echo tep_draw_pull_down_menu('b_name',$branch_combo,$default,' tabindex="3" ');
			?>
          </label></td>
          
          	<td>Semester</td>
          <td>
		  <?php
			 $sel_sem="select * from semester_master ";
			 $res_sem=mysqli_query($conn,$sel_sem) or die(mysqli_error($conn));
			
			 while($sem_combo=mysqli_fetch_array($res_sem))
			 {							
				$sem_array[] = array('id' => $sem_combo['sem_id'],
									 'text' => $sem_combo['sem_name']);								  
			 }
			 
			echo tep_draw_pull_down_menu('sem_name',$sem_array,$default,' tabindex="4" ');
	      ?>
		  	</td>		          
        </tr>
		
		<tr>
		<td>Subject Taught </td>
          <td><label>
            <?php
			 $sel_sub="select * from subject_master";
			 $res_sub=mysqli_query($conn,$sel_sub) or die(mysqli_error($conn));
			
			 while($sub_combo=mysqli_fetch_array($res_sub))
			 {							
				$sub_array[] = array('id' => $sub_combo['sub_id'],
									  'text' => $sub_combo['sub_name']);								  
			 }
			 
			echo tep_draw_pull_down_menu('sub_name',$sub_array,$default,' tabindex="6" ');
	      ?>
          </label></td>
		<td>Class</td>
        <td>
		  <?php
			 $sel_div="select * from division_master ";
			 $res_div=mysqli_query($conn,$sel_div) or die(mysqli_error($conn));
			
			 while($div_combo=mysqli_fetch_array($res_div))
			 {							
				$div_array[] = array('id' => $div_combo['id'],
									  'text' => $div_combo['division']);								  
			 }
			 
			echo tep_draw_pull_down_menu('division',$div_array, $default,' tabindex="6" ');
	      ?>
		</td>
		</tr>
        <tr>
          <td>Teacher Name </td>
          <td><label>
            <?php
			 $sel_fac="select * from faculty_master ";
			 $res_fac=mysqli_query($conn,$sel_fac) or die(mysqli_error($conn));
			
			 while($fac_combo=mysqli_fetch_array($res_fac))
			 {							
				$fac_array[] = array('id' => $fac_combo['f_id'],
									 'text' => $fac_combo['f_name'].'&nbsp;'.$fac_combo['l_name']);								  
			 }
			 
			 echo tep_draw_pull_down_menu('fac_name', $fac_array, $default,' tabindex="5" onChange="AjaxFunction(this.value);"');
	      ?>
          </label></td>
          <td>Year</td>
		  <td> <select name="fromYear"';
		  <?php
		   $starting_year  =date('Y', strtotime('-1 year'));
		   $ending_year = date('Y', strtotime('+0 year'));

			for($starting_year; $starting_year <= $ending_year; $starting_year++) {
			echo '<option value="'.$starting_year.'">'.$starting_year.'</option>';
		  }             
		 ?> </select>
		 <select name="year">
		  <option value="1">1</option>
		  <option value="2">2</option>
		  </select></td>
        </tr>
				<tr>
		<td>Valid For</td>
        <td>
		  <select name="end">
		  <option value="1"> 00:30 min</option>
		  <option value="2"> 01:00 hr</option> 
		  <option value="3"> 01:30 hr</option> 
		  </select>
		</td>
		</tr>
		<tr>
          <td colspan="5" align="center"><input class="btn btn-success"  type="submit" name="submit" value="Submit" tabindex="17"/></td>
        </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td width="697"  height="1"><?php include("footer.php")?></td>
  </tr>
  
</table>
</body>
</html>