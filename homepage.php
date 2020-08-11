<!Doctype html>
<html>
<head>
<link rel="shortcut icon" href="img/flag.gif" type="image/x-icon" />

</div>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="$1">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="style.css">
 
<title> Admin Page </title>

	<div class="msg">
<?php
   session_start();

   if(isset($_SESSION["use1"])and isset($_SESSION["use"]) ) 
 {
 	 echo "Welcome: ".$_SESSION['use1']."";
 	 
 }
 else{
  header("location: index.php");
 }

?></div>
</head>
<body>
<a href="registerstaff.php">	
<img src="img/1.png" alt="Register Staff" height="20%" width="30%"></a>
<a href="staffsearch.php">
<img src="img/9.png" alt="Search Staff" height="20%" width="30%"></a>
<a href="staffattendance.php">
<img src="img/8.png" alt="Attendance Staff" height="20%" width="30%"></a>
<br><br><br>
<a href="registerstudent.php">
<img src="img/5.png" alt="Register Student" height="20%" width="30%"></a>
<a href="searchstudent.php">
<img src="img/6.png" alt="Search Student" height="20%" width="30%"></a>
<a href="sattendance.php">
<img src="img/7.png" alt="Attendance Student" height="20%" width="30%"></a>
<br><br><br>
<a href="changepass.php">
<img src="img/0.png" alt="Change Password" height="20%" width="30%"></a>
<a href="logout.php">
<img src="img/10.png" alt="Log Out" height="20%" width="30%"></a>

</div>

</body>
</html>