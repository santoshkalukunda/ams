<?php include('dbConfig.php') ?>
<div class="msg">
<?php
if (isset($_GET['idd'])) {
$sql="SELECT * FROM staff WHERE id=".$_GET['idd']."";
$result=mysqli_query($conn, $sql);
$record=mysqli_fetch_array($result);
$name=$record['name'];
$password=$record['password'];
$id=$record['id'];
}

?>
<?php    if(isset($_POST['update']))
{
	
	$name=($_POST['username']);
	$password=($_POST['password']);
	$id=($_POST['id']);

if (empty($name)||empty($password)) {
 echo "Unable to update ";
 echo "please fill all fields";
}

else{
  $sql="UPDATE staff SET name='$name', password='$password' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    header("location: staffsearch.php");	
}
}
?>
</div>
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
	<title> Edit Staff</title>
          <div class="msg">
<?php
   session_start();

   if(isset($_SESSION["use1"])) 
 {
     echo "Welcome: ".$_SESSION['use1']."";
     
 }
 else{
  header("location: index.php");
 }

?>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <a href="homepage.php">Home</a>
</div>
</head>
<body>  
<form action="editstaff.php" method="post">
<p><h3><u>Update Staff Details</u></h3></p>
 <div class="input-group">
<label id="first"> Usern Name:</label>

<input type="text" name="username" value="<?php echo $name; ?>">
<label>Password</label>
<input type="password" id="myInput" name="password" value="<?php echo $password; ?>"></div>
<input type="checkbox" onclick="myFunction()">Show Password

<script type="text/javascript">
function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
<input type="hidden" name="id" value="<?php echo $id;?>">

<div class="input-group">
<button type="submit" name="update" class="btn">Update</button>
</div>

</form>
</body>
</html>