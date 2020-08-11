

<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="img/flag.gif" type="image/x-icon" /> 

	
	<title>Staff Page</title>
		<div class="msg">
<?php
   session_start();

   if(isset($_SESSION["use"])) 
 {
 	 echo "Welcome: ".$_SESSION['use']."";
 	 
 }
 else{
  header("location: index.php");
 }

?>
</div>
</head>

<body>

<a href="registerstudent.php">
<img src="img/5.png" alt="Register Student" height="20%" width="30%"></a>
<a href="searchstudent.php">
<img src="img/6.png" alt="Search Student" height="20%" width="30%"></a>
<a href="sattendance.php">
<img src="img/7.png" alt="Attendance Student" height="20%" width="30%"></a>
<br><br><br>
<a href="index.php">
<a href="staffviewreport.php">
<img src="img/9.png" alt="Search Staff" height="20%" width="30%"></a>
<a href="staffchangepass.php">
<img src="img/0.png" alt="Change Password" height="20%" width="30%"></a>
<a href="logout.php">
<img src="img/10.png"  name="logout" alt="Log Out" height="20%" width="30%"></a>
</body>
</html>
