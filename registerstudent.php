
<?php include('dbConfig.php') 
?>

<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="img/flag.gif" type="image/x-icon" />


  
	<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="$1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="img/flag.gif" type="image/x-icon" /> 
<link rel="stylesheet" type="text/css" href="style.css">

	<title> Register Student</title>

    <div class="msg">
<?php
   session_start();

   if(isset($_SESSION["use"])) 
 {
   echo "Welcome: ".$_SESSION['use']."";
   if($_SESSION['use']=="admin"){ ?>
	   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <a href="homepage.php">Home</a>
	   <?php
   }
	   else{
		   ?>
		   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <a href="stafflogin.php">Home</a>
		   <?php
		   
	   }
 }
 else{
  header("location: index.php");
 }

?>
</div>
</head>
<body>
<div class="msg">
 <?php




  if(isset($_POST['save']))
{
  $name=($_POST['sname']);
$cls=($_POST['class']);
$rl=($_POST['roll']);
$sec=($_POST['section']);



if (empty($name)|| empty($rl)||empty($cls)|| empty($sec)) {
 echo "Unable to save ";
 echo "please fill all fields";

}

else{
    $sql = "INSERT INTO student (name, class, roll, section)
    VALUES ('$name','$cls','$rl','$sec')";

    $result = mysqli_query($conn,$sql);
    echo "Save Succesful"; 
       $last_id =($conn->insert_id);
       $tb=($last_id);

    $sql1="CREATE TABLE IF NOT EXISTS ams.$last_id ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    adate VARCHAR(30) NOT NULL,
    status VARCHAR(30) NOT NULL)";
    $result1 = mysqli_query($conn, $sql1);
    
    
   
}
}

?>
</div>
     
<form action="registerstudent.php" method="post">
<p><h3><u>Register Student</u></h3></p>
 <div class="input-group">
<input type="text" name="sname" placeholder="Student Name"></div>
<div class="input-group">
<input type="text" name="class" placeholder="Class"></div>
<div class="input-group">
<input type="text" name="roll" placeholder="Roll No."></div>
<div class="input-group">
<input type="text" name="section" placeholder="Section"></div>
</div>
<div class="input-group">
<button type="submit" name="save" class="btn">Register</button>
</div>

</form>
</body>
</html>