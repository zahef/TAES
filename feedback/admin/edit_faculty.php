<?php 
	
	  include('session_chk.php');
	  include("includes/config_db.php");
	  $conn = mysqli_connect(dbhost, dbuser, dbpass,dbname) or die ('Error connecting to mysql');
?> 	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Edit Teacher</title>
<link rel="stylesheet" type="text/css" href="includes/style.css" />
</head>

<body>
<table width="57%" align="center" border="0" cellpadding="0" cellspacing="1" >
<?php include('admin_panel_heading.php'); ?>
<tr>
<td width="22%" valign="top" bgcolor="#FFFFFF">
<?php include('left_side.php');?>
</td>

<td width="78%" align="center" valign="top" bgcolor="#FFFFFF">

<?php
if(isset($_POST['submit']))
  {//begin of if($submit).
      // Set global variables to easier names
      
    //check duplication
	$dup="select * from  faculty_master where f_name='".$_POST['f_name']."' and l_name='".$_POST['f_name']."' and f_id!=".$_POST['f_id'];
	$dup_res=mysqli_query($conn,$dup) or die(mysqli_error());
	if(mysqli_num_rows($dup_res)==1)
	{
		echo "Faculty name is already available in database.";
		echo "<br/><input type=\"button\" name=\"Back\" value=\"Back\"  onclick=\"javascript: history.go(-1)\" />";
		//header("Location:add_branch.php");
		//exit;
	}
	else
	{
     
	    $f_id = $_POST['f_id'];
		$f_name = $_POST['f_name'];
		$pass = $_POST['pass'];
		  
		$result = mysqli_query($conn,"UPDATE  faculty_master  SET f_name='".$_POST['f_name']."' , l_name='".$_POST['l_name']."' ,password='".$_POST['pass']."', b_id='".$_POST['b_name']."' WHERE f_id='$f_id'");
		
		echo "<b>Faculty detail is updated successfully!</b><br>You'll be redirected after (1) Seconds";
          echo "<meta http-equiv=Refresh content=1;url=faculty.php>";
		
	}
  }//end of if($submit).


  // If the form has not been submitted, display it!
else
  {//begin of else
   $f_id = $_GET['f_id'];
    $result = mysqli_query($conn,"SELECT * FROM  faculty_master WHERE f_id='$f_id' ");
        while($myrow = mysqli_fetch_assoc($result))
             {

  ?>

			
<?php
/*
	
	if(isset($_POST['do']) and $_POST['do']='upload' )
	{
		if(empty($filename))
		{
			echo "where is the photo ????";
		}
		else
		{
     
			$filename=$_FILES['image']['name'];
			$tmpname = $_FILES['image']['tmp_name'];
			$folder = "images/";
			move_uploaded_file($tmpname,$folder.$filename);
			$result = mysqli_query($conn,"UPDATE  faculty_master  SET img='".$filename."' WHERE f_id='$f_id'");
			echo " Photo is uploded";
			//echo "<b>Faculty detail is updated successfully!</b><br>You'll be redirected after (1) Seconds";
			//echo "<meta http-equiv=Refresh content=1;url=faculty.php>";
		
		}
	
	}*/
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" name="update_fac" onsubmit="return chkForm();">
<input type="hidden" name="f_id" value="<?php echo $myrow['f_id']?>">
<table width="283" border="0" cellpadding="3" cellspacing="1">
<tr><td colspan="2" align="center" style="font-size:20px">Update Depatment</td></tr>
  <tr>
    <td width="92"><div align="left">First Name</div></td>
    <td width="163"><label>
      <div align="left">
        <input type="text" name="f_name" onkeypress="return isCharOnly(event);" value="<?php echo $myrow["f_name"]?>"/>
        </div>
    </label></td>
  </tr>
  <tr>
    <td width="92"><div align="left">Last Name</div></td>
    <td width="163"><label>
      <div align="left">
        <input type="text" name="l_name" onkeypress="return isCharOnly(event);" value="<?php echo $myrow["l_name"]?>"/>
        </div>
    </label></td>
  </tr>
  <tr>
   <td width="92"><div align="left">Password</div></td>
    <td width="163"><label>
              <input type="text" name="l_name" onkeypress="return isCharOnly(event);" value="<?php echo $myrow["password"]?>"/>
        
	</tr>
  <tr>
    <td width="92"><div align="left">Department Name</div></td>
    <td width="163">
	  <div align="left">
	    <?php
			$sel_b="select * from branch_master";
			$res=mysqli_query($conn,$sel_b) or die(mysqli_error());
	
			 while($b_combo=mysqli_fetch_array($res))
			 {							
				$branch_combo[] = array('id' => $b_combo['b_id'],
									   'text' => $b_combo['b_name']);								  
			 }
			 echo tep_draw_pull_down_menu('b_name',$branch_combo,$myrow["b_id"]);
	?>      
	    </div></td>
  </tr>
  <tr>
    <td><div align="left"></div></td>
    <td><div align="left">
      <table border="0" width="100%">
        <tr><td> <input type="submit" class="button" name="submit" value="Update"></td><td align="right"><input type="button" name="Back" value="Back"  onclick="javascript: history.go(-1)" class="button" /></td></tr>
      </table>
	  <?php /*<form action='' method='post' enctype='multipart/form-data'/>
	 <tr>
    <td width="92"> Photo : <input type='file' name='file'/></br>
	<tr><td> <input type="submit" name='do' value='upload'/>*/?>
    </div></td>
  </tr>
</table>
</form>

    
 <?php
 	}//end of while loop
  }//end of else
?>
<p>&nbsp;</p></td>
</tr>
</table>
</body>
</html>
<script language="javascript" type="text/javascript">
function isCharOnly(e)
{
	var unicode=e.charCode? e.charCode : e.keyCode
	//if (unicode!=8 && unicode!=9)
	//{ //if the key isn't the backspace key (which we should allow)
		 //disable key press
		if (unicode==45)
			return true;
		if (unicode>48 && unicode<57) //if not a number
			return false
	//}
}
function chkForm(form)
{

		var RefForm = document.update_fac;
		if (RefForm.f_name.value.length < 1 )
		{
			alert("Enter First Name");	
			RefForm.f_name.focus();		
			return false;
		}
		if (RefForm.l_name.value.length < 1 )
		{
			alert("Enter Last Name");			
			RefForm.l_name.focus();
			return false;
		}
		
		if (RefForm.b_name.value == 0 )
		{
			alert("Select Branch Name");			
			return false;
		}
}
</script>