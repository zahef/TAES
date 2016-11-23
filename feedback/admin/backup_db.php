<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';//password
$dbname = 'feedback';

backup_tables($dbhost, $dbuser, $dbpass, $dbname);


/* backup the db OR just a table */
function backup_tables($host, $user, $pass, $name, $tables = '*')
{
  
  $conn = mysqli_connect(dbhost, dbuser, dbpass,dbname);
  
  
  //get all of the tables
  if($tables == '*')
  {
    $tables = array();
    $result = mysqli_query($conn,'SHOW TABLES');
    while($row = mysqli_fetch_row($result))
    {
      $tables[] = $row[0];
    }	
  }
  else
  {
    $tables = is_array($tables) ? $tables : explode(',',$tables);
  }
  
  //cycle through
  $return = '';
  foreach($tables as $table)
  {
    $result = mysqli_query($conn,'SELECT * FROM '.$table);
    $num_fields = mysqli_num_fields($result);
    
    $return.= 'DROP TABLE '.$table.';';
    $row2 = mysqli_fetch_row(mysqli_query($conn,'SHOW CREATE TABLE '.$table));
    $return.= "\n\n".$row2[1].";\n\n";
    
    for ($i = 0; $i < $num_fields; $i++) 
    {
      while($row = mysqli_fetch_row($result))
      {
        $return.= 'INSERT INTO '.$table.' VALUES(';
        for($j=0; $j<$num_fields; $j++) 
        {
          $row[$j] = addslashes($row[$j]);
          $row[$j] = mysqli_real_escape_string($row[$j]);
          if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
          if ($j<($num_fields-1)) { $return.= ','; }
        }
        $return.= ");\n";
      }
    }
    $return.="\n\n\n";
  }
  //save file
  $file_name = 'database_backup/db-backup-'.time().'.sql';
  $handle = fopen($file_name, 'w+');  
  fwrite($handle, $return);
  fclose($handle);
  
  // Print the message
  //print("The backup has been created successfully. You can get the file <a href='$file_name' target='_blank'>here</a>.<br/><input type=\"button\" name=\"Back\" value=\"Back\"  onclick=\"javascript: history.go(-1)\" />\n");
  header('Content-disposition: attachment; filename='.$file_name);
  header('Content-type: application/sql');
  readfile($file_name);
  
  //unlink from server 
  unlink($file_name);
   
}

?>