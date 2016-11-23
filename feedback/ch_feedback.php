<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';//password
$dbname = 'feedback';  
$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname) or die ('Error connecting to mysql');

$page_id = $_POST['id'];

$q_array = $_POST['q'];
$ans_array = $_POST['ans'];

$remark = $_POST['remark'];

mysqli_query($conn,"insert into msg values('','$remark','$page_id')");

$sel="select id from msg order by id desc";
$res=mysqli_query($conn,$sel);
$last_id = mysqli_fetch_array($res);

$i=1;
while($i<count($q_array)){
mysqli_query($conn,"insert into feedback values('','{$q_array[$i]}','{$ans_array[$i]}','$page_id','{$last_id['id']}')");
$i++;
}

echo "ok";?>
<script type="text/javascript">
   setTimeout(function(){
    window.location.href = "login_in.php";
}, 300);
    </script>