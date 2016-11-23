<?php 

include('session_chk.php');
include("includes/config_db.php");       $conn = mysqli_connect(dbhost, dbuser, dbpass,dbname) or die ('Error connecting to mysql');
?> 	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Add Subject</title>
<link href="css/bootstrap.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
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
      $title = $_POST['sub_name'];
     
              //check if (title) field is empty then print error message.
              if(!$title){  //this means If the title is really empty.
                     echo "Error: Add Subject Name. Please fill it.";
					 echo '<br/><input type="button" name="Back" value="Back"  onclick="javascript: history.go(-1)" />';
                     exit(); //exit the script and don't do anything else.
              }// end of if
    //check duplication
	$dup="select * from subject_master where sub_name='".$title."'";
	$dup_res=mysqli_query($conn,$dup) or die(mysqli_error());
	if(mysqli_num_rows($dup_res)==1)
	{
		echo "Subject name is already available in database.";
		//header("Location:add_branch.php");
		//exit;
	}
	else
	{
     
	     //run the query which adds the data gathered from the form into the database
         $result = mysqli_query($conn,"INSERT INTO subject_master (sub_name) VALUES ('$title')");
          //print success message.
          echo "<b>Subject is added Successfully!</b><br>You'll be redirected after (1) Seconds";
          echo "<meta http-equiv=Refresh content=1;url=Subject.php>";
	}
  }//end of if($submit).


  // If the form has not been submitted, display it!
else
  {//begin of else

      ?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<table width="283" border="0" cellpadding="3" cellspacing="1">
<tr><td colspan="2" align="center" style="font-size:20px">Add Subject</td></tr>
  <tr>
    <td width="92">Subject Name:</td>
    <td width="163"><label>
      <input type="text" name="sub_name" onkeypress="return isCharOnly(event);"/>
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><table border="0" width="100%">
	<tr><td> <input type="submit" class="btn btn-success" name="submit" value="Add"></td><td align="right"><input type="button" name="Back" value="Back"  onclick="javascript: history.go(-1)" class="btn btn-warning" /></td></tr></table>
    </td>
  </tr>
</table>
</form>

 <?php
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
</script>