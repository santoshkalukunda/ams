<?php include('dbConfig.php') ?>

<?php
if (isset($_GET['idd'])) {
$sql="SELECT * FROM student WHERE id=".$_GET['idd']."";
$result=mysqli_query($conn, $sql);
$record=mysqli_fetch_array($result);
$name=$record['name'];
$cls=$record['class'];
$rl=$record['roll'];
$sec=$record['section'];
$id=$record['id'];
}

?>
<?php    if(isset($_POST['update']))
{
	
  $name=($_POST['sname']);
$cls=($_POST['class']);
$rl=($_POST['roll']);
$sec=($_POST['section']);
$id=($_POST['id']);

if (empty($name)|| empty($rl)||empty($cls)|| empty($sec)) {
 echo "Unable to update ";
 echo "please fill all fields";
}

else{
  $sql="UPDATE student SET name='$name', class='$cls', roll='$rl', section='$sec' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    header("location: searchstudent.php");	
}
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="img/flag.gif" type="image/x-icon" />
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
	
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="$1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="img/flag.gif" type="image/x-icon" /> 
<link rel="stylesheet" type="text/css" href="style.css">

    <title> Update Student</title>
</head>
<body>
     
<form action="editstudent.php" method="post">
<p><h3><u>Update Student</u></h3></p>
<input type="hidden" name="id" value="<?php echo $id;?>">
 <div class="input-group">
<input type="text" name="sname" value="<?php echo $name; ?>" placeholder="Student Name"></div>
<div class="input-group">
<input type="text" name="class" value="<?php echo $cls;?>" placeholder="Class"></div>
<div class="input-group">
<input type="text" name="roll" value="<?php echo $rl; ?>" placeholder="Roll No."></div>
<div class="input-group">
<input type="text" name="section" value="<?php echo $sec; ?>" placeholder="Section"></div>
</div>
<div class="input-group">
<button type="submit" name="update" class="btn">Update</button>
</div>

</form>
</body>
</html>