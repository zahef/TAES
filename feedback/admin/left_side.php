<html>
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="css/bootstrap.css" rel="stylesheet">
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.rawgit.com/AndreaLombardo/BootSideMenu/master/css/BootSideMenu.css">
	<script src="js/BootSideMenu.js"></script>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<style type="text/css">
  .user{
    padding:5px;
    margin-bottom: 5px;
  }
</style>
 <script type="text/javascript">
  $(document).ready(function(){
      $('#test').BootSideMenu({side:"left", autoClose:false});
      $('#test2').BootSideMenu({side:"right"});
  });
  </script>
</head>
<body>
<style>
body {
    font-family: "Lato", sans-serif;
}
.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: white;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size:22px;
    color: black;
    display: white;
    transition: 0.3s
}

.sidenav a:hover, .offcanvas a:focus{
    color: blue;
}

.closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px !important;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
	<div id="mySidenav" class="sidenav">
		
		<div class="list-group">
			<a href="login_success.php" class="list-group-item active">Home</a>
			<a href="branch.php" class="list-group-item">Depatment</a>
			<a href="semester.php" class="list-group-item">Semester</a>
			<a href="division.php" class="list-group-item">Class</a>
			<a href="subject.php" class="list-group-item">Subjects</a>
			<a href="faculty.php" class="list-group-item">Teacher</a>
			<a href="feed_ques.php" class="list-group-item">Questions</a>
			<a href="archive.php" class="list-group-item">Archive</a>
			<a href="result.php" class="list-group-item">Result</a>
			<a href="change_passwd.php" class="list-group-item">Change Password</a>
			<a href="/feedback/selection.php" class="list-group-item">Create Evaluation</a>
			<a href="logout.php" class="list-group-item">Log out</a>
	</div>
	</div>
	<span style="font-size:30px;cursor:pointer" onclick="openNav()">>></span>
	<script>
		function openNav() {
			document.getElementById("mySidenav").style.width = "250px";
		}

		function closeNav() {
			document.getElementById("mySidenav").style.width = "0";
		}
	</script>
	</body>
	</html>
		
		
	

