<?php
date_default_timezone_set("Asia/Riyadh");
$now= date('Y-m-d H:i:s:a');
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';//password
$dbname = 'feedback';  
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname) or die ('Error connecting to mysql'); 
$raw = mysqli_fetch_array(mysqli_query($conn,"select * from pages where password='{$_GET['password']}'"));


include("includes/config_db.php");
include("ajax_script.php");
session_start();
/*$end= date('Y/m/d H:i:s', time()+1200);
$date=$raw['date'];|| $date>$end*/
if(!isset($_GET['password'])){
		
	header("location: Login_in.php");
}
	$sel_page="select * from pages where password='{$raw['password']}'";
	$res_page=mysqli_query($conn,$sel_page) or die(mysqli_error($conn));
	$pass = mysqli_fetch_array($res_page);
if($now>=$pass['end']){
	
	header("location: Login_in.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="css/bootstrap.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
   <meta charset="utf-8">
   <meta name="viewport" content="width = device-width, initial-scale = 1"> 
   
<head>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script src="php_calendar/scripts.js" type="text/javascript"></script>
<script src="js/respond.js"></script>
<div id="wrapperHeader">
 
</div>

<style>
div#wrapperHeader {
 width:auto;
 height;200px; /* height of the background image? */
float:.left;
 text-align:center;
}



<!--<link rel="stylesheet" type="text/css" href="includes/style.css" />-->
</style>
</head>

<body class="body">
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<table width="650" height="561"  border="0" align="center" cellpadding="0"  cellspacing="0">
  
  <tr>
  <br/><br/>
    <td width="650"  valign="bottom" align="center"><p><b><font size="5" >TEACHER ANONYMOUS EVALUATION WEB SYSTEM</font></b></p></td>
  </tr>
  <tr>
    <td width="650" height="126" valign=top>
	<form action="ch_feedback.php" method="post" name="feedback_form" onsubmit="return chkForm();">
      <table  cellpadding="0" cellspacing="5"  width="500px" border="0" align="center">
	  <?php
		$sel_img="select * from faculty_master where f_id='{$raw['faculty_id']}'";
		$res_img=mysqli_query($conn,$sel_img) or die(mysqli_error($conn));
		$im = mysqli_fetch_array($res_img);?>
		
		<center><img width="88" height="141" src="admin/images/
		<?php echo $im["img"]; ?>" /></center>

		<tr >
          <?php
			 $sel_fac="select * from faculty_master where f_id='{$raw['faculty_id']}'";
			 $res_fac=mysqli_query($conn,$sel_fac) or die(mysqli_error($conn));
			 $fac = mysqli_fetch_array($res_fac);
			
	      ?>
          
		  
        
          <td>Teacher Name: <?php echo $fac['f_name']." ".$fac['l_name'];?> </td>
          <label>
            
          </label>
          <?php
			 $sel_sub="select * from subject_master where sub_id='{$raw['subject_id']}' ";
			 $res_sub=mysqli_query($conn,$sel_sub) or die(mysqli_error($conn));
			$sub = mysqli_fetch_array($res_sub);
			
	      ?>
          <td>Subject Taught: <?php echo $sub['sub_name'];?></td>
          <label>
            
          </label>
        </tr>
        <tr>
		<label>
            <?php
			$sel_b="select * from branch_master where b_id='{$raw['branch_id']}'";
			$res=mysqli_query($conn,$sel_b) or die(mysqli_error($conn));
			$b = mysqli_fetch_array($res);
			/*<td><img width="75" height="141" src="image/<?php echo $row["image"]; ?>" /></td>*/
			?>
          </label>
          <td>Department: <?php echo $b['b_name'];?></td>
          <?php
			 $sel_div="select * from division_master where id='{$raw['division_id']}'";
			 $res_div=mysqli_query($conn,$sel_div) or die(mysqli_error($conn));
			$div = mysqli_fetch_array($res_div);
			  
	      ?>
		  
          <td width="0">Class: <?php echo $div['division'];?></td>			          
        </tr>
		
		<tr>
		<?php
			 $sel_sem="select * from semester_master where sem_id='{$raw['semester_id']}'";
			 $res_sem=mysqli_query($conn,$sel_sem) or die(mysqli_error($conn));
			$sem = mysqli_fetch_array($res_sem);
			 
	      ?>
		<td>Semester: <?php echo $sem['sem_name'];?></td>
		<td>Year: <?php echo $raw['date'];?> 
		
					 <?php echo - $raw['year'];?></td>
		</tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td><div id="count"></div></td></tr>
		<tr><td>&nbsp;</td></tr>
		
		<script src="js/main.js"></script>
		<tr>
          <td colspan="5" align="center">Note: 1 means very bad and  5 is perfect</td>
		  
        </tr>
		<td colspan="5" align="center">  ملاحظة: لانهتم من انت ولن نحاول معرفتك, فقط نريد رأيك الحقيقي</td>
		<tr>
		</tr>
		</table>
		<tr>
          <td colspan="5">
		  <table width="100%" id="rounded-corner" cellpadding="10" cellspacing="0" border="0" align="center">
			
		 <thead>
		  <tr >
		     <th width="10%" class="rounded-company" align="center">ID</th>			 
			 <th width="100%"  align="center">Questions </th>

		  </tr>
		  </thead>
		  
		  
		  <?php
		  	$sql_que="select * from feedback_ques_master";
			$res_que=mysqli_query($conn,$sql_que) or die(mysqli_error($conn));
			$i=1;
			$tab_ind=7;
			while($row_que=mysqli_fetch_array($res_que))
			{
				echo "<tr>";
				echo "<td align=\"center\">".$i."</td>";
				echo "<td>".$row_que['ques']."<input type='hidden' name='q[$i]' value='{$row_que['q_id']}'</td>";
				
				echo "<td> 1 <input type=\"radio\"\ value=\"1\"name=\"ans[$i]\" size=\"3\"/></td>";
				echo "<td> 2 <input type=\"radio\"\ value=\"2\"name=\"ans[$i]\" size=\"3\"/></td>";
				echo "<td> 3 <input type=\"radio\"\ value=\"3\"name=\"ans[$i]\" size=\"3\"/></td>";
				echo "<td> 4 <input type=\"radio\"\ value=\"4\"name=\"ans[$i]\" size=\"3\"/></td>";
				echo "<td> 5 <input type=\"radio\"\ value=\"5\"name=\"ans[$i]\" size=\"3\"/></td>";
				echo "</tr>";$i++;
			}
		  ?>		
				  
		  <tr>
		  <td>Remark:</td>
		  <td colspan="2"><textarea name="remark" style="width:655px; height:40px;" onkeypress="return isCharOnly(event);" tabindex="16"></textarea></td>
		  </tr>		  
		  	<tr>
				<td colspan="2"   align="center"><input  type="submit" class = "btn btn-warning btn-lg" name="submit" value="Submit" tabindex="17"/>
				&nbsp;<input type="reset" name="reset" class = "btn btn-danger btn-lg" value="Reset" tabindex="18" class="button"/></td>
				<td width="3%" align="center" class="rounded-foot-right"></td>
			</tr>			
		  </table>
		  </td>
        </tr>
      </table>
	  <input type="hidden" value="<?php echo $raw['id']; ?>" name="id"/>
    </form>
</td>
  </tr>
  <tr>
    <td width="697"  height="1"><?php include("footer.php")?></td>
  </tr>
  
<script type="text/javascript">
   setTimeout(function(){
    window.location.href = "login_in.php";
}, 1200000);
    </script>
</table>
</body>
</html>


<SCRIPT LANGUAGE="JavaScript">

var mikExp = /[$\\@\\!\\\#%\^\&\*\(\)\[\]\+\_\{\}\`\~\=\|]/;
function dodacheck(val) {
var strPass = val.value;
var strLength = strPass.length;
var lchar = val.value.charAt((strLength) - 1);
if(lchar.search(mikExp) != -1) {
var tst = val.value.substring(0, (strLength) - 1);
val.value = tst;
   }
}

//  End -->
</script>

<script language="javascript" type="text/javascript">
function isCharOnly(e)
{
	var unicode=e.charCode? e.charCode : e.keyCode
	if (unicode!=8 && unicode!=9)
	{ //if the key isn't the backspace key (which we should allow)
		 //disable key press
		if (unicode==45)
			return true;
		if (unicode>48 && unicode<57) //if not a number
			return false
	}
}
function isNumberOnly(e)
{
	var unicode=e.charCode? e.charCode : e.keyCode
	if (unicode!=8 && unicode!=9)
	{ //if the key isn't the backspace key (which we should allow)
		 //disable key press
		if (unicode==45)
			return true;
		if (unicode<48||unicode>57) //if not a number
			return false
	}
}
function chkForm(form)
{

		var RefForm = document.feedback_form;
		if (RefForm.roll_no.value.length != 11 )
		{
			alert("Enter Roll Number");	
			RefForm.roll_no.focus();				
			return false;
		}
		
		if (RefForm.date.value == '' )
		{
			alert("Enter Date");
			RefForm.date.focus();			
			return false;
		}
		if (RefForm.batch_name.value == 0 )
		{
			alert("Select Batch");
			RefForm.batch_name.focus();			
			return false;
		}
		if (RefForm.b_name.value == 0 )
		{
			alert("Select Branch");
			RefForm.b_name.focus();			
			return false;
		}
		if (RefForm.sem_name.value  == 0 )
		{
			alert("Select Semester");			
			RefForm.sem_name.focus();
			return false;
		}
		if (RefForm.fac_name.value == 0 )
		{
			alert("Select Faculty Name.");			
			RefForm.fac_name.focus();
			return false;
		}
		if (RefForm.sub_name.value == 0 )
		{
			alert("Select Subject");
			RefForm.sub_name.focus();			
			return false;
		}
		
		for(i=1;i<=9;i++)
		{
			if(eval("document.feedback_form.ans_"+i).value == '')
			{
				alert("Enter rating.");
				eval("document.feedback_form.ans_"+i).focus();	
				return false;
			}
			if(eval("document.feedback_form.ans_"+i).value > 9)
			{
				alert("Enter rating from 0 to 9.");
				eval("document.feedback_form.ans_"+i).focus();	
				return false;
			}
				
		}
		
}
</script>