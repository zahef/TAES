<?php 

	  include('session_chk.php');
	  include("includes/config_db.php");
	  $conn = mysqli_connect(dbhost, dbuser, dbpass,dbname) or die ('Error connecting to mysql');
?> 	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Edit Subject</title>
<link rel="stylesheet" type="text/css" href="includes/style.css" />
</head>

<body>
<table width="57%" align="center" border="0" cellpadding="0" cellspacing="1" >
<?php include('admin_panel_heading.php'); ?>
<tr>
<td width="22%" valign="top">
<?php include('left_side.php');?>
</td>

<td width="78%" align="center" valign="top" >
<?php
if(isset($_POST['submit']))
  {//begin of if($submit).
      // Set global variables to easier names
      $title = $_POST['sub_name'];
     
              //check if (title) field is empty then print error message.
              if(!$title){  //this means If the title is really empty.
                     echo "Error: Add Subject Name. Please fill it.";
					 echo '<br/><input type="button" name="Back" value="Back"  onclick="javascript: history.go(-1)" />';
                     exit(); //exit the script and don't do anything else.
              }// end of if
    //check duplication
	$dup="select * from subject_master where sub_name='".$title."' and sub_id!=".$_POST['sub_id'];
	$dup_res=mysqli_query($conn,$dup) or die(mysqli_error());
	if(mysqli_num_rows($dup_res)==1)
	{
		echo "Subject name is already available in database.";
		echo "<br/><input type=\"button\" name=\"Back\" value=\"Back\"  onclick=\"javascript: history.go(-1)\" />";
		//header("Location:add_branch.php");
		//exit;
	}
	else
	{
     
	    $sub_id = $_POST['sub_id'];

		$title = $_POST['sub_name'];
			  
		$result = mysqli_query($conn,"UPDATE subject_master SET sub_name='$title' WHERE sub_id='$sub_id'");
		
		
		echo "<b>Subject is updated Successfully!</b><br>You'll be redirected after (1) Seconds";
        echo "<meta http-equiv=Refresh content=1;url=Subject.php>";
		
	}
  }//end of if($submit).


  // If the form has not been submitted, display it!
else
  {//begin of else
   $sub_id = $_GET['sub_id'];
    $result = mysqli_query($conn,"SELECT * FROM subject_master WHERE sub_id='$sub_id' ");
        while($myrow = mysqli_fetch_assoc($result))
             {
                $title = $myrow["sub_name"];

      ?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<input type="hidden" name="sub_id" value="<?php echo $myrow['sub_id']?>">
<table width="283" border="0" cellpadding="3" cellspacing="1">
<tr><td colspan="2" align="center" style="font-size:20px">Update Subject</td></tr>
  <tr>
    <td width="92">Subject Name</td>
    <td width="163"><label>
      <input type="text" name="sub_name" value="<?php echo $title?>" onkeypress="return isCharOnly(event);"/>
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><table border="0" width="100%">
	<tr><td> <input type="submit" class="button" name="submit" value="Update"></td><td align="right"><input class="button" type="button" name="Back" value="Back"  onclick="javascript: history.go(-1)" /></td></tr></table>
    </td>
  </tr>
</table>
</form>
    
 <?php
 	}//end of while loop
  }//end of else
?>
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

		var RefForm = document.update_sub;
		
		if (RefForm.sub_name.value.length < 1 )
		{
			alert("Enter Subject Name");			
			RefForm.sub_name.focus();
			return false;
		}
		
		if (RefForm.sem_name.value == 0 )
		{
			alert("Select Semester");	
			RefForm.sem_name.focus();		
			return false;
		}
		if (RefForm.batch_name.value == 0 )
		{
			alert("Select Batch");	
			RefForm.batch_name.focus();		
			return false;
		}
}
</script>