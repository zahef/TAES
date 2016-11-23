<?php 
	
	  include('session_chk.php');
	  include("includes/config_db.php");
	  $conn = mysqli_connect(dbhost, dbuser, dbpass,dbname) or die ('Error connecting to mysql');
?> 	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Edit Feedback Question</title>
<link rel="stylesheet" type="text/css" href="includes/style.css" />
</head>

<body>
<table width="57%" align="center" border="0" cellpadding="0" cellspacing="1">
<?php include('admin_panel_heading.php'); ?>
<tr>
<td width="22%" valign="top">
<?php include('left_side.php');?>
</td>

<td width="78%" align="center" valign="top">
<?php
if(isset($_POST['submit']))
  {//begin of if($submit).
      // Set global variables to easier names
      
     
	    $s_id = $_POST['s_id'];

		$title =stripcslashes($_POST['ques']);
		$s_one_word =stripcslashes($_POST['one_word']);
			  
		$result = mysqli_query($conn,"UPDATE store SET s_ques='$title', s_one_word='$s_one_word' WHERE s_id='$s_id'");
		
		echo "<b>Question updated Successfully!</b><br>You'll be redirected after (1) Seconds";
        echo "<meta http-equiv=Refresh content=1;url=archive.php>";
		
	
  }//end of if($submit).


  // If the form has not been submitted, display it!
else
  {//begin of else
   $s_id = $_GET['s_id'];
    $result = mysqli_query($conn,"SELECT * FROM store WHERE s_id='$s_id' ");
        while($myrow = mysqli_fetch_assoc($result))
             {
                $title = $myrow["s_ques"];
				$s_one_word = $myrow["s_one_word"];

      ?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<input type="hidden" name="s_id" value="<? echo $myrow['s_id']?>">
<table width="283" border="0" cellpadding="3" cellspacing="1">
<tr><td colspan="2" align="center" style="font-size:20px">Update Feedback Archive Question</td></tr>
  <tr>
    <td width="92">Que.&nbsp;<?php echo $s_id;?></td>
    <td width="163">
     <textarea name="ques" style="width:250px; height:60px"><?php echo $title;?></textarea>
    </td>
  </tr>
  <tr>
    <td width="92">One word</td>
    <td width="163">
     <input type="text" name="one_word" id="id_one_word" value="<?php echo $s_one_word;?>">
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><table border="0" width="100%">
	<tr><td> <input type="submit" name="submit" value="Update" class="button"></td><td align="right"><input type="button" name="Back" value="Back"  onclick="javascript: history.go(-1)" class="button" /></td></tr></table>
    </td>
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
</script>